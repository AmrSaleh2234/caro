<?php

namespace App\Traits;

use App\Models\Order;
use App\Models\Coupon;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Validator;

trait CouponTrait
{
    use ApiResponseTrait,HelperTrait;
    public function checkCoupon($coupon_id, $cart_total, $user)
    {
        $coupon = Coupon::find($coupon_id);
        $user_coupon = Order::where('user_id', $user->id)->where('coupon_id', $coupon_id)->acceptOrder()->count();
        $users_coupon = Order::where('coupon_id', $coupon_id)->groupBy('user_id')->acceptOrder()->get()->count();
        $users_all_coupon = Order::where('coupon_id', $coupon_id)->acceptOrder()->count();
        if ($coupon->count_used > $user_coupon || $coupon->count_used == 0) {
            if ($coupon->user_limit > $users_coupon || ($coupon->user_limit <= $users_coupon && $user_coupon > 0) || $coupon->user_limit == 0) {
                if ($coupon->use_limit > $users_all_coupon || $coupon->use_limit == 0) {
                    if ($cart_total >= $coupon->min_order || $coupon->min_order == 0) {
                        $total_discount = 0;
                        if ($coupon->type == "percentage") {
                            $total_discount = round(multiple(percent($coupon->discount), $cart_total), $this->getCurrencyViewShow());
                        } elseif ($coupon->type == "fixed") {
                            $total_discount = $coupon->discount;
                        }
                        if ($total_discount > $coupon->max_discount && $coupon->max_discount > 0) {
                            $total_discount = $coupon->max_discount;
                        }
                        $message = __('Check Coupon');
                        $data = [
                            'coupon_id' => $coupon_id,
                            'discount_type' => $coupon->type,
                            'discount' => number_format((float) $coupon->discount, $this->getCurrencyViewShow(), '.', ''),
                            'total_discount' => number_format((float) $total_discount, $this->getCurrencyViewShow(), '.', ''),
                            'cart_total_discount' => number_format((float) sub($cart_total,$total_discount), $this->getCurrencyViewShow(), '.', ''),
                        ];
                        $data += $this->getCartResponse();
                        return $this->defaultResponse($message,true,$data);
                    } else {
                        $message = __('Minimum order');
                        $coupon_check = $this->defaultResponse($message,false);
                    }
                } else {
                    $message = __('Coupon Limit');
                    $coupon_check = $this->defaultResponse($message,false);
                }
            } else {
                $message = __('Users Coupon Limit');
                $coupon_check = $this->defaultResponse($message,false);
            }
        } else {
            $message = __('User Coupon Limit');
            $coupon_check = $this->defaultResponse($message,false);
        }
        return $coupon_check;
    }

    public function checkCouponCode(Request $request)
    {
        $code =NULL;
        $rules = [
            'code' => 'required|exists:coupons,code',
        ];
        $validateRequest = $this->validateRequest($request, $rules, true);
        if (isset($validateRequest)) {
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $$key = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        $cart_total = $this->cartTotal();
        $user = auth()->user();
        $coupon_id = Coupon::checkVaild($code);
        if ($coupon_id > 0) {
            $check_coupon = $this->checkCoupon($coupon_id, $cart_total, $user);
            if ($check_coupon['status'] == $this->successStatus) {
                $check_coupon += ['code' => $code];
            }
            return $check_coupon;
        } else {
            $message = __('Coupon Not Found');
            return $this->defaultResponse($message,false);
        }
    }
}
