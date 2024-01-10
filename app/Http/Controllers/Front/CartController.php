<?php

namespace App\Http\Controllers\Front;

use DB;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\CartTrait;
class CartController extends FrontController {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    use CartTrait;
    public function __construct() {
        parent::__construct();
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });


    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $request)
    {
        $lang  = $this->lang;
        $cart_id = $this->cartID();
        $items = $this->getAllCartItem($lang,$this->user_id,$cart_id);
        $cart_data = $this->getCartPrice();
        $payments = $this->getPayments($lang,true);
        $coupon = Session::get('coupon');
        $coupon_id= $coupon['coupon_id'] ?? 0;
        $address = Session::get('address');
        $address_id= $coupon['address_id'] ?? 0;
        $addresses = $this->getUserAddresses($lang, $this->user_id);
        $title = __('Cart') . $this->site_mark . $this->site_title;
        $class = 'cart';
        return view('front.profile.orders.cart', compact('class','title','items','payments','cart_data','addresses','address_id','coupon_id'));
    }


    public function create(Request $request)
    {
        $save = $this->createCart($request);
        if ($save['status'] == $this->error) {
            return response()->json($save);
        } else if ($save['status'] == $this->success) {
            Session::forget('coupon');
            Session::forget('address');
        }
        $save += $this->getCartPrice();
        return response()->json($save);
    }

    public function delete(Request $request)
    {
        $this->deleteCart($request);
        Session::forget('coupon');
        Session::forget('address');
        $response = $this->getCartPrice();
        return response()->json($response);
    }

    public function coupon(Request $request)
    {
        $save = $this->checkCouponCode($request);
        if ($save['status'] == $this->error) {
            Session::forget('coupon');
        } else if ($save['status'] == $this->success) {
            Session::put('coupon', $save);
        }
        $save += $this->getCartPrice();
        return response()->json($save);
    }

    public function address(Request $request)
    {
        $save = $this->checkAddress($request);
        if ($save['status'] == $this->error) {
            Session::forget('address');
        } else if ($save['status'] == $this->success) {
            Session::put('address', $save);
        }
        $save += $this->getCartPrice();
        return response()->json($save);

    }

    public function checkout(Request $request)
    {
        $save = $this->checkAddress($request);
        if ($save['status'] == $this->error) {
            Session::forget('address');
        } else if ($save['status'] == $this->success) {
            Session::put('address', $save);
        }
        $save += $this->getCartPrice();
        return response()->json($save);
    }

    public function save(Request $request)
    {
        $save = $this->saveCart($request);
        if ($save['status'] == $this->success) {
            Session::forget('coupon');
            Session::forget('address');
        }
        return response()->json($save);

    }
}
