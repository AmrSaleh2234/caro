<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Order;
use App\Models\Device;
use App\Models\Item;
use App\Models\Itemable;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use DB;

class OrderController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->class        = "order";
        $this->table        = "orders";
    }

    public function index(Request $request) {
        $input = $request->all();
        $limit = isset($input['limit']) ? $input['limit'] : $this->limit;
        $date_start = isset($input['date_start']) ? $input['date_start'] : '';
        $date_end   = isset($input['date_end']) ? $input['date_end'] : '';
        $payment_id = isset($input['payment_id']) ? (int) $input['payment_id'] : 0;
        $coupon_id  = isset($input['coupon_id']) ? (int) $input['coupon_id'] : 0;
        $branch_id  = isset($input['branch_id']) ? (int) $input['branch_id'] : 0;
        $region_id  = isset($input['region_id']) ? (int) $input['region_id'] : 0;
        $city_id    = isset($input['city_id']) ? (int) $input['city_id'] : 0;
        $user_id    = isset($input['user_id']) ? (int) $input['user_id'] : 0;
        $delivery_id= isset($input['delivery_id']) ? (int) $input['delivery_id'] : 0;
        $is_read    = isset($input['is_read']) ? (int) $input['is_read'] : -1;
        $active    = isset($input['active']) ? (int) $input['active'] : -1;
        $price_min  = isset($input['price_min']) ? doubleval($input['price_min']) : 0;
        $price_max  = isset($input['price_max']) ? doubleval($input['price_max']) : 0;
        $status     = isset($input['status']) ? $input['status'] : '';
        $table = "orders";
        $data_all = Order::with('user', 'delivery', 'cancelBy', 'orderReject', 'payment', 'coupon', 'orderMeta')->latest();
        if ($is_read > -1) {
            $data_all->where('is_read', $is_read);
        }
        if ($active > -1) {
            $data_all->where('active', $active);
        }
        if (in_array($this->type, $this->user_admins)) {
            if($user_id > 0){
                $data_all->where('user_id',$user_id);
            }
            if($coupon_id > 0){
                $data_all->where('coupon_id',$coupon_id);
            }
            if($payment_id > 0){
                $data_all->where('payment_id',$payment_id);
            }
            if ($status != '' && in_array($status, $this->order_status_array)) {
                $data_all->where('status',$status);
            }
        }
        if ($price_min > 0) {
            $data_all->where('price', '>=', $price_min);
        }
        if ($price_max > 0 && $price_max > $price_min) {
            $data_all->where('price', '<=', $price_max);
        }
        $data_all = $this->dateFilter($data_all,$date_start,$date_end,$table);
        if ($limit > 0) {
            $data = $data_all->paginate($limit);
        } else {
            $count = $data_all->count();
            $data = $data_all->paginate($count);
        }
        $class= $this->class;
        $lang = $this->user->locale;
        $regions = $this->getRegions($lang,true);
        $cities = $this->getCities($lang,true);
        $payments = $this->getPayments($lang,true);
        $coupons = $this->getCoupons($lang,true);
        $branches = $this->getBranches($lang,true);
        $clients = $this->getClients();
        $deliveries = $this->getDeliveries();
        return view('admin.orders.index', compact('data','class','deliveries','clients','branch_id','branches','regions','payments','coupons','cities','limit','date_start','date_end','status',
        'city_id','user_id','payment_id','region_id','coupon_id'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function type(Request $request,$type) {
        if (!in_array($type, $this->order_status_array_coupon)) {
            return $this->pageUnauthorized();
        }
        $data_all = Order::with('user', 'delivery', 'cancelBy', 'orderReject', 'payment', 'coupon', 'orderMeta')->latest();
        if($type == "coupon"){
            $data_all->whereNotNull('coupon_id');
        }elseif($type == "notcoupon"){
            $data_all->whereNull('coupon_id');
        }else{
            $data_all->where('status',$type);
        }
        $data= $data_all->paginate($this->limit);
        $class= $this->class;
        return view('admin.orders.index', compact('data','class'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function print($id)
    {
        $order = Order::find($id);
        if (!empty($order)) {
            $class= $this->class;
            $data = OrderItem::with('product','productChild','productChild.size','orderItemAdditions','orderItemAdditions.addition')->where('order_id',$id)->get();
            $lang = $this->user->locale;
            $setting = DB::table('settings')->where('group', 'setting')->pluck('value', 'key')->toArray();
            return view('admin.orders.print', compact('order','data','class','setting'));
        } else {
            return $this->pageError();
        }
    }

    public function show($id)
    {
        $order = Order::find($id);
        if (!empty($order)) {
            $class= $this->class;
            $data = OrderItem::with('product','productChild','productChild.size','orderItemAdditions','orderItemAdditions.addition')->where('order_id',$id)->get();
            $lang = $this->user->locale;
            $branches   = $this->getBranches($lang);
            $deliveries = $this->getDeliveries();
            Order::updateRead($id);
            return view('admin.orders.show', compact('order','deliveries','branches','data','class'));
        } else {
            return $this->pageError();
        }
    }

    public function edit($id)
    {
        return $this->show($id);
    }

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        Order::updateRead($id);
        if (!empty($order)) {
            $this->validate($request, [
                'paid' => 'required',
                'status' => 'required',
                'branch_id' => 'required|integer',
                'delivery_id' => 'required|integer',
            ]);

            $input = $request->all();
            foreach ($input as $key => $value) {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            if($order->status == "delivered" && $input['paid'] == 0){
                $input['paid'] = $order->total;
            }
            if((int) $order->address_id <= 0){
                $input['delivery_id'] = NULL;
            }
            $order->update($input);
            return redirect()->route('admin.orders.show',$id)->with('success', 'Order updated successfully');
        } else {
            return $this->pageError();
        }
    }
}
