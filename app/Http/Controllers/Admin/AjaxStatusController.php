<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Page;
use App\Models\Group;
use App\Models\Branch;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\OrderReject;
use App\Models\Order;
use App\Models\Region;
use App\Models\City;
use App\Models\Category;
use App\Models\Addition;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Review;

class AjaxStatusController extends AdminController
{


    public function userStatus(Request $request)
    {
        $response = false;
            $input = $request->all();
            if (!in_array($input['id'],$this->access_all_id)) {
                $response = User::updateActive($input['id'], $input['status']);
            }
        return response()->json($response);
    }

    public function groupStatus(Request $request)
    {
        $response = false;
            $input = $request->all();
            if ($input['id'] != 1) {
                $response = Group::updateActive($input['id'], $input['status']);
            }
        return response()->json($response);
    }

    public function pageStatus(Request $request)
    {
        $input = $request->all();
        $input['id'] = (int) $input['id'];
        if($input['status'] != 1){
            $input['status']=0;
        }
        $response = Page::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function productPrice(Request $request)
    {
        $input = $request->all();
        $input['id'] = (int) $input['id'];
        $input['offer_price'] = round($input['offer_price'],getCurrencyView());
        $input['price'] = round($input['price'],getCurrencyView());

        if ($input['offer_price'] == "" || $input['offer_price'] == 0) {
            $input['offer_price'] = null;
        }

        if ($input['price'] == "" || $input['price'] == 0) {
            $input['price'] = null;
        }
        Product::updatePriceOffer($input['id'],$input['price'],$input['offer_price']);
        $product = array('price' => number_format((float)$input['price'], getCurrencyView(), '.', ''),'offer_price' => number_format((float)$input['offer_price'], getCurrencyView(), '.', ''));
        return response()->json($product);
    }

    public function productCode(Request $request)
    {
        $input = $request->all();
        $input['id'] = (int) $input['id'];
        Product::updateColumn($input['id'],'code',$input['code']);
        $product = array('code' => $input['code']);
        return response()->json($product);
    }

    public function productMax(Request $request)
    {
        $input = $request->all();
        $input['max_amount'] = doubleval($input['max_amount']);
        if ($input['max_amount'] == "" || $input['max_amount'] <= 0) {
            $input['max_amount'] = 0;
        }
        $input['id'] = (int) $input['id'];
        Product::updateMax($input['id'],$input['max_amount']);
        $product = array('max_amount' => $input['max_amount']);
        return response()->json($product);
    }

    public function productStatus(Request $request)
    {
        $input = $request->all();
        $input['id'] = (int) $input['id'];
        if($input['status'] != 1){
            $input['status']=0;
        }
        $response = Product::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function productFeature(Request $request)
    {
        $input = $request->all();
        $input['id'] = (int) $input['id'];
        $input['feature'] = (int) $input['feature'];
        if($input['feature'] != 1){
            $input['feature']=0;
        }
        $response = Product::updateColumn($input['id'],'feature', $input['feature']);
        return response()->json($response);
    }

    public function productFilter(Request $request)
    {
        $input = $request->all();
        $input['id'] = (int) $input['id'];
        $input['filter'] = (int) $input['filter'];
        if($input['filter'] != 1){
            $input['filter']=0;
        }
        $response = Product::updateColumn($input['id'],'filter', $input['filter']);
        return response()->json($response);
    }

    public function productOffer(Request $request)
    {
        $input = $request->all();
        $input['id'] = (int) $input['id'];
        $input['offer'] = (int) $input['offer'];
        if($input['offer'] != 1){
            $input['offer']=0;
        }
        $response = Product::updateColumn($input['id'],'offer', $input['offer']);
        return response()->json($response);
    }

    public function productSale(Request $request)
    {
        $input = $request->all();
        $response = Product::updateColumn($input['id'],'sale', $input['sale']);
        return response()->json($response);
    }

    public function categoryStatus(Request $request)
    {
        $input = $request->all();
        $response = Category::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function AdditionStatus(Request $request)
    {
        $input = $request->all();
        $response = Addition::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function cityStatus(Request $request)
    {
        $input = $request->all();
        $response = City::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function branchStatus(Request $request)
    {
        $input = $request->all();
        $response = Branch::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function brandStatus(Request $request)
    {
        $input = $request->all();
        $response = Brand::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function unitStatus(Request $request)
    {
        $input = $request->all();
        $response = Unit::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function sizeStatus(Request $request)
    {
        $input = $request->all();
        $response = Size::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function orderRejectStatus(Request $request)
    {
        $input = $request->all();
        $response = OrderReject::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function regionStatus(Request $request)
    {
        $input = $request->all();
        $response = Region::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function contactRead(Request $request)
    {
        $input = $request->all();
        $response = Contact::updateRead($input['id']);
        return response()->json($response);
    }

    public function couponFinish (Request $request)
    {
        $input = $request->all();
        $response = Coupon::updateColumn($input['id'],'finish', $input['finish']);
        return response()->json($response);
    }

    public function reviewStatus(Request $request)
    {
        $input = $request->all();
        $response = Review::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function couponStatus(Request $request)
    {
        $input = $request->all();
        $response = Coupon::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function paymentStatus(Request $request)
    {
        $input = $request->all();
        $response = Payment::updateActive($input['id'], $input['status']);
        return response()->json($response);
    }

    public function orderStatus(Request $request)
    {
            $response = false;
            $input = $request->all();
            foreach ($input as $key => $value) {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            $order = Order::find($input['id']);
            if (!empty($order)) {
            if($input['status'] == "delivered"){
                $input['paid'] = $order->total;
            }
            $order->update($input);
            $response = orderType($input['status']);
        }
        return response()->json($response);
    }

    public function orderCancel(Request $request,$id)
    {
            $response = false;
            $input['id'] = $id;
            $order = Order::find($input['id']);
            if (!empty($order)) {
            $input['status'] = "cancelled";
            $response = Order::updateColumn($input['id'],'status',$input['status']);
            return redirect()->route('admin.orders.index')->with('success', 'Order canceled successfully');
        }
        return response()->json($response);
    }
}
