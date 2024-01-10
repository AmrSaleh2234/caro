<?php

namespace App\Traits;

use App\Http\Resources\CartItemResource;
use DB;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Addition;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\OrderMeta;
use App\Traits\CouponTrait;
use App\Traits\HelperTrait;
use App\Traits\NotifiTrait;
use Illuminate\Http\Request;
use App\Models\CartItemAddition;
use App\Traits\ApiResponseTrait;
use App\Models\OrderItemAddition;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

trait CartTrait
{

    use ApiResponseTrait, HelperTrait, CouponTrait, NotifiTrait;

    public function saveCart(Request $request)
    {
        $payment_id = $coupon_id = $delivery_cost = $discount = $cart_id = 0;
        $note = $name = $phone = $email = $region_id = $city_id = $address_id = NULL;
        $rules = [
            'address_id' => 'nullable|integer|exists:addresses,id',
            'payment_id' => 'required|integer|exists:payments,id',
            'coupon_id'  => 'nullable|integer|exists:coupons,id',
            'note'       => 'nullable',
            'name'       => 'nullable',
            'phone'       => 'nullable',
            'email'       => 'nullable',
        ];
        $validateRequest = $this->validateRequest($request, $rules, true);
        if (isset($validateRequest)) {
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $$key = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        $options = $this->getOptionsCart();
        $min_order = $options['min_order'] ?? 0;
        $max_order = $options['max_order'] ?? 0;
        $delivery_cost = $options['delivery_cost'] ?? 0;
        // $paid   = 0;
        // $status = "request";
        // $active = 1;
        $address_check = $this->checkAddress($request);
        if ($address_check['status'] == $this->errorStatus) {
            return $address_check;
        } elseif ($address_check['status'] == $this->successStatus) {
            $delivery_cost = $address_check['delivery_cost'];
        }
        $user = auth()->user();
        $full_address = $user->addresses()->where('id', $address_id)->first();
        if (isset($full_address)) {
            $city_id   = $full_address->city_id;
            $region_id = $full_address->region_id;
        }
        $cart = $this->getCartUser();
        if (isset($cart)) {
            $cart_id = $cart->id;
        }
        $count = $this->cartCount();
        if ($cart_id > 0 && $count > 0) {
            $cart_not_active = $this->cartNotActive($cart_id);
            if ($cart_not_active > 0) {
                $message = $cart_not_active . " " . __('Products Not Available');
                return $this->defaultResponse($message, false);
            }
            $cart_total = $this->cartTotal();
            if ($cart_total < $min_order) {
                $message = __('Minimum order');
                return $this->defaultResponse($message, false);
            } elseif ($cart_total > $max_order && $max_order > 0) {
                $message = __('Maximum order');
                return $this->defaultResponse($message, false);
            }
            $order_total = sum($cart_total, $delivery_cost);
            $status = "request";
            $coupon_id = (int) $coupon_id;
            if ($coupon_id > 0) {
                $code_id = Coupon::checkVaildID($coupon_id);
                if ($code_id > 0) {
                    $check_coupon = $this->checkCoupon($code_id, $cart_total, $user);
                    if ($check_coupon['status'] == $this->errorStatus) {
                        return $check_coupon;
                    } elseif ($check_coupon['status'] == $this->successStatus) {
                        $discount = $check_coupon['total_discount'] ?? 0;
                    }
                } else {
                    $message = __('Coupon Not Found');
                    return $this->defaultResponse($message, false);
                }
            }
            if ($discount > 0) {
                $order_total = sub($order_total, $discount);
            }
            if ($coupon_id == 0) {
                $coupon_id = NULL;
            }
            DB::beginTransaction();
            $order_insert = new Order();
            $order_insert->insertOrder($user->id, $cart_total, $discount, $order_total, $address_id, $coupon_id, $payment_id, $region_id, $city_id, $delivery_cost, $note);
            // insert order meta
            $this->insertOrderMeta($order_insert, $user, $name, $phone, $email);
            // insert order item
            $this->insertOrderItem($cart_id, $order_insert->id);
            // update order total
            $order_total_final = $this->orderTotal($order_insert->id);
            $order_total_discount = sub(sum($order_total_final, $delivery_cost), $discount);
            $this->updateOrder($order_insert->id, $order_total_final, $order_total_discount);
            // update cart and delete items
            $this->deleteCart($cart);
            DB::commit();
            // add notifi to admin
            $users_admin = $this->getusersAdmin();
            if (!empty($users_admin)) {
                $this->notifiAdmin($order_insert->id, $order_total_discount, $users_admin);
            }
            $message = __('Cart Complete');
            return  $this->defaultResponse($message);
        } else {
            $message = __('Cart Failed');
            return $this->defaultResponse($message, false);
        }
    }

    public function createCart(Request $request)
    {
        $amount = $product_id = $is_addition = 0;
        $product_id_child = $product_child_id = $note = NULL;
        $rules = [
            'amount' => 'required|numeric|min:0',
            'product_id' => 'required|integer|exists:products,id',
            'product_id_child' => 'nullable|integer|exists:products,id',
            'product_child_id' => 'nullable|integer|exists:products,id',
            'is_addition' => 'required|in:0,1',
            'note' => 'nullable',
            'additions' => 'nullable|array',//|required_if:is_addition,1
            'additions.*.addition_id' => 'required|integer|exists:additions,id',
            'additions.*.amount' => 'required|numeric',
        ];

        $validateRequest = $this->validateRequest($request, $rules, true);
        if (isset($validateRequest)) {
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != "additions") {
                $$key = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }
        if($product_child_id == NULL || $product_child_id == ""){
            $product_child_id = $product_id_child;
        }
        $additions = isset($input['additions']) ? $input['additions'] : array();
        // $amount = round(doubleval($amount), $this->getCurrencyViewShow());
        $user = auth()->user();
        $cart_id = $this->cartID();
        if ($cart_id == 0) {
            $cart_insert = new Cart();
            $cart_insert->insertCart($user->id);
            $cart_id = $cart_insert->id;
        }
        // $date = date('Y-m-d H:i:s');
        $product = Product::find($product_id);
        if ($amount <= 0) {
            return  $this->deleteCartProduct($cart_id, $product->id);
        }
        if (isset($product) && $product->active > 0 && $product->price > 0) {
            $order_product_items = $product->order_limit;
            // $order_product_items = $product->max_amount;
            // if ($product->order_limit >= 0) {
            //     $order_product_items = $product->order_limit;
            // }
            // if ($product->is_max == 1 && $product->date_start != NULL && $product->date_expire != NULL && $product->date_start <= $date && $product->date_expire >= $date) {
            //     $order_ids  = Order::where('created_at', '>=', $product->date_start)->where('created_at', '<=', $product->date_expire)->where('user_id', $user->id)->whereIn('status', ['request', 'approve', 'shipping', 'deliver'])->pluck('id')->toArray();
            //     if (!empty($order_ids)) {
            //         $product_items = OrderItem::whereIn('order_id', $order_ids)->where('product_id', $product_id)->sum('amount');
            //         $order_product_items = sub($product->order_max, $product_items);
            //     }
            // }
            if ($amount <= $order_product_items) { // && $amount <= $product->max_amount
                $cart_items = $this->updateCartItem($cart_id, $product, $amount, (int) $product_child_id, $note);
                $this->updateCartItemAddition($cart_items['cart_item'], $cart_items['cart_item_id'], $additions, $product_id, $is_addition);
                $cart_item = CartItem::find($cart_items['cart_item_id']);
                $data = ['cart_item' => new CartItemResource($cart_item)];
                return $this->defaultResponse($cart_items['message'], true, $data);
            } else {
                $message = __('Product amount is limited');
                return $this->defaultResponse($message, false);
            }
        } else {
            $message = __('Product not found');
            return $this->defaultResponse($message, false);
        }
    }

    public function deleteCartProduct($cart_id = 0, $product_id = 0)
    {
        $message = __('Delete Product');
        $item_id = CartItem::foundItem($cart_id, $product_id);
        if ($item_id > 0) {
            CartItem::where('id', $item_id)->delete();
            if ($this->cartCount() == 0) {
                $message = __('Cart Empty');
            }
            return $this->defaultResponse($message);
        } else {
            $message = __('Cart Item not found');
            return $this->defaultResponse($message, false);
        }
    }

    public function checkAddress(Request $request)
    {
        $address_id = null;
        $rules = [
            'address_id' => 'nullable|integer|exists:addresses,id',
        ];
        $validateRequest = $this->validateRequest($request, $rules, true);
        if (isset($validateRequest)) {
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $$key = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        $delivery_cost = 0;
        if ((int) $address_id > 0) {
            $user = $this->authUser();
            $options = $this->getOptionsCart();
            $shipping_order_free = $options['shipping'] ?? 0;
            $full_address = $user->addresses()->where('id', $address_id)->first();
            if ($user->vip == 0) {
                if ($shipping_order_free == 0 || ($shipping_order_free > 0 && $shipping_order_free > $this->cartTotal())) {
                    if (!empty($full_address)) {
                        if (isset($full_address->region) && $full_address->region->shipping > 0) {
                            $delivery_cost = doubleval(optional($full_address->region)->shipping);
                        } elseif (isset($full_address->city) && $full_address->city->shipping > 0) {
                            $delivery_cost = doubleval(optional($full_address->city)->shipping);
                        } else {
                            $delivery_cost = $options['delivery_cost'] ?? 0;
                        }
                    } else {
                        $message = __('Address Fail');
                        return $this->defaultResponse($message, false);
                    }
                }
            }
        }
        $message   = __('Shipping');
        $response  = $this->defaultResponse($message);
        $response += ['address_id' => $address_id, 'delivery_cost' => $delivery_cost];
        return $response;
    }

    public function updateOrder($order_id, $order_total_all, $order_total_discount)
    {
        return Order::where('id', $order_id)->update([
            'price' => $order_total_all,
            'total' => $order_total_discount
        ]);
    }

    public function deleteCart($cart)
    {
        return $cart->cartItems()->delete();
    }

    public function notifiAdmin($order_id, $order_total_discount, $user_id = [])
    {
        if (!empty($user_id)) {
            $currency = getCountryView();
            $name_en = 'New Order #' . ' ' . $order_id;
            $content_en = 'Total Order ' . ' ' . number_format((float) $order_total_discount, $this->getCurrencyViewShow(), '.', '') . ' ' . $currency["en"];
            $name_ar = 'طلب جديد' . ' # ' . $order_id;
            $content_ar = 'إجمالى الطلب' . ' ' . number_format((float) $order_total_discount, $this->getCurrencyViewShow(), '.', '') . ' ' . $currency["ar"];
            $title = $this->getName($name_ar, $name_en);
            $message = $this->getName($content_ar, $content_en);
            return $this->notificationUser($user_id, $title, $message, 'order', 'orders', $order_id, 'request');
        }
    }

    public function insertOrderItem($cart_id, $order_id)
    {
        $cart_items = CartItem::with('product', 'cartItemAdditions')->where('cart_id', $cart_id)->where('amount', '>', 0)->where('price', '>', 0)->get();
        if (!empty($cart_items)) {
            foreach ($cart_items as $item) {
                //&& $item->product->max_amount > 0
                if (isset($item->product) && $item->product->active > 0) {
                    $order_item = new OrderItem();
                    // $item->product->decrement("max_amount", $item->amount);
                    $order_item->insertItem(
                        $order_id,
                        $item->product_id,
                        $item->product_child_id,
                        $item->price_addition,
                        $item->offer_price,
                        $item->price,
                        $item->total,
                        $item->total_price,
                        $item->amount_addition,
                        $item->amount,
                        $item->total_amount,
                        $item->offer_amount,
                        $item->offer_amount_add,
                        $item->note
                    );
                    $order_item_id = $order_item->id;
                    if (isset($item->cartItemAdditions)) {
                        foreach ($item->cartItemAdditions as $item_addition) {
                            $order_item_addition = new OrderItemAddition();
                            $order_item_addition->insertItem($order_item_id, $item_addition->addition_id, $item_addition->price, $item_addition->amount, $item_addition->total);
                        }
                    }
                }
            }
        }
    }

    public function cartNotActive($cart_id)
    {
        return CartItem::where('cart_id', $cart_id)->where('amount', '>', 0)->where('price', '>', 0)->whereHas('product', function ($query) {
            $query->where('active', 0);
        })->count();
    }

    public function getCartPrice()
    {
        $total_cart = $this->cartTotal();
        $count_cart = $this->cartCount();
        $amount_cart = $this->cartAmount();
        $price = round($total_cart, $this->getCurrencyViewShow());
        $coupon = Session::get('coupon');
        $address = Session::get('address');
        $coupon_code = $coupon['code'] ?? Null;
        $zero_view = 0.00;
        $currency_view = $this->getCurrencyViewShow();
        if ($currency_view == 3) {
            $zero_view = 0.000;
        }
        $delivery_cost = $zero_view;
        $discount = $coupon['total_discount'] ?? $zero_view;
        $address_id = $address['address_id'] ?? NULL;
        if (auth()->user()->vip == 0) {
            $delivery_cost = $address['delivery_cost'] ?? $zero_view;
        }
        $total = sub(sum($price, $delivery_cost), $discount);
        $cart_data = [
            'coupon_code' => $coupon_code,
            'address_id' => $address_id,
            'count_cart' => $count_cart,
            'amount_cart' => $amount_cart,
            'price' => number_format((float) $price, $this->getCurrencyViewShow(), '.', ''),
            'coupon_discount' => number_format((float) $discount, $this->getCurrencyViewShow(), '.', ''),
            'delivery_cost' => number_format((float) $delivery_cost, $this->getCurrencyViewShow(), '.', ''),
            'total' => number_format((float) $total, $this->getCurrencyViewShow(), '.', '')
        ];
        return $cart_data;
    }
    public function insertOrderMeta($order, $user, $name, $phone, $email)
    {
        $full_address = $user->addresses()->where('id', (int) $order->address_id)->first();
        $order_meta = new OrderMeta();
        $order_meta->insertMeta(
            $order->id,
            $name ?? $user->name,
            $phone ?? $user->phone,
            $email ?? $user->email,
            $full_address ? $full_address->address : null,
            $full_address ? $full_address->geo_address : null,
            $full_address ? $full_address->latitude : null,
            $full_address ? $full_address->longitude : null
        );
    }
}
