<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Order;
use App\Models\OrderReject;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderRejectCollection;
use Carbon\Carbon;

class OrderController extends ApiHomeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        parent::__construct();
        $this->middleware('check.delivery', ['only' => ['update']]);
    }

    public function index(Request $request)
    {
        try {
            $input  = $request->all();
            $type    = isset($input['type']) ? $input['type'] : '';
            $limit   = isset($input['limit']) ? (int) $input['limit'] : $this->limit;
            $field   = 'user_id';
            $user_type = $this->auhtUserType();
            $orders_all = Order::latest()->with('user', 'delivery', 'cancelBy', 'orderReject', 'payment', 'coupon', 'orderMeta');
            if ($user_type == "delivery") {
                $orders_all->where('delivery_id', $this->authUserID());
                $field = 'delivery_id';
            } else {
                $orders_all->where('user_id', $this->authUserID());
            }
            if($type == "current"){
                $orders_all->currentOrder();
            }elseif($type == "history"){
                $orders_all->historyOrder();
            }
            $orders = $orders_all->paginate($limit);
            $order_rejects = OrderReject::defaultOrder()->get();
            $data = ['order_status'=>$this->order_status_array,'order_rejects' => new OrderRejectCollection($order_rejects)];
            $data += $this->getOrderResponse($field);
            $data +=$this->getSettingApi();
            return $this->collectionResponse(new OrderCollection($orders),$data);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_type = $this->auhtUserType();
        $order_single = Order::where('id', $id)->with('user', 'delivery', 'cancelBy', 'orderReject', 'payment', 'coupon', 'orderMeta','orderItems', 'orderItems.product', 'orderItems.productChild','orderItems.productChild.size', 'orderItems.orderItemAdditions','orderItems.orderItemAdditions.addition');
        if ($user_type == "delivery") {
            $order_single->where('delivery_id', $this->authUserID());
        } else {
            $order_single->where('user_id', $this->authUserID());
        }
        $order = $order_single->first();
        $order_rejects = OrderReject::defaultOrder()->get();
        $data = ['order' => new OrderResource($order),'order_rejects' => new OrderRejectCollection($order_rejects)];
        $data +=$this->getSettingApi();
        return $this->successResponse($data);
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
        if (!empty($order) && $order->delivery_id == $this->authUserID()) {
            $rules = [
                'status' => 'required|string',
                'paid' => 'nullable|required_if:status,delivered|numeric',
                'delivery_note' => 'nullable',
                'polygon' => 'nullable',
                'reject_note' => 'nullable',//|required_if:status,cancelled,rejected,returned
                'order_reject_id' => 'nullable|integer|exists:order_rejects,id|required_if:status,cancelled,rejected,returned',
            ];

            $validateRequest = $this->validateRequest($request, $rules);
            if (isset($validateRequest)) {
                return $validateRequest;
            }
            $input = $request->all();
            foreach ($input as $key => $value) {
                if($key != "polygon"){
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
                }
            }
            $input = Arr::except($input, array('price', 'shipping', 'discount', 'total', 'note', 'admin_note', 'active', 'is_read', 'user_id', 'user_id', 'delivery_id', 'payment_id', 'country_id', 'branch_id', 'coupon_id', 'address_id', 'region_id', 'city_id'));
            $order->update($input);
            $data = ['order' => new OrderResource($order)];
            return $this->successResponse($data);
        } else {
            return $this->errorResponse();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if (!empty($order)) {
            return $this->successResponse();
        } else {
            return $this->errorResponse();
        }
    }
}
