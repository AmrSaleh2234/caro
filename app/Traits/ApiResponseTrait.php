<?php

namespace App\Traits;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Setting;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Traits\HelperTrait;
use Illuminate\Http\Response;
use App\Traits\AdminHelperTrait;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait ApiResponseTrait
{
    use HelperTrait,AdminHelperTrait;
    protected function authUser($guard = null)
    {
        if(auth('sanctum')->user()){
            return auth('sanctum')->user();
        }elseif(auth()->guard($guard)->check()){
            return auth()->user();
        }
    }

    protected function authUserID()
    {
        $id = 0;
        $user = $this->authUser();
        if ($user) {
            $id = $user->id;
        }
        return $id;
    }

    protected function auhtUserType($guard = null) {
        if (auth('sanctum')->check()) {
            if(auth('sanctum')->user()->is_client == 1){
                return "client";
            }elseif(auth('sanctum')->user()->is_store == 1){
                return "store";
            }elseif(auth('sanctum')->user()->is_delivery == 1){
                return "delivery";
            }else{
                return "";
            }
        }elseif (auth()->guard($guard)->check()) {
            if(auth()->user()->is_client == 1){
                return "client";
            }elseif(auth('sanctum')->user()->is_store == 1){
                return "store";
            }elseif(auth()->user()->is_delivery == 1){
                return "delivery";
            }else{
                return "";
            }
        }
        else {
            return "";
        }
    }

    public function unreadNotifications()
    {
        $id = $this->authUserID();
        if($id == 0){
            return 0;
        }
        return $this->authUser()->unreadNotifications()->groupBy('notifiable_type')->count();
    }

    public function getCartUser() {

        return Cart::where('user_id', $this->authUserID())->where('type', 'cart')->first();
    }

    public function getCart($id = 0)
    {
        if ($id == 0) {
            $id = $this->authUserID();
        }
        return Cart::foundCart($id);
    }

    public function cartID($id = 0)
    {
        if ($id == 0) {
            $id = $this->authUserID();
        }
        return Cart::foundCart($id);
    }

    public function cartCount()
    {
        return (int) CartItem::where('cart_id', $this->cartID())->where('amount', '>', 0)->where('price', '>', 0)->count();
    }

    public function cartAmount()
    {
        $total = CartItem::where('cart_id', $this->cartID())->where('amount', '>', 0)->where('price', '>', 0)->sum('amount');
        return round($total, $this->getCurrencyViewShow());
    }

    public function cartTotal()
    {
        $total = CartItem::getTotal($this->cartID());
        return round($total, $this->getCurrencyViewShow());
    }

    public function cartAmountNumber()
    {
        return number_format($this->cartAmount(),$this->getCurrencyViewShow(),'.', '');
    }

    public function cartTotalNumber()
    {
        return number_format($this->cartTotal(),$this->getCurrencyViewShow(),'.', '');
    }

    public function currentOrderCount($field = "user_id")
    {
        return (int) Order::where($field, $this->authUserID())->whereNotIn('status',$this->order_status_finish_array)->count();
    }

    public function failedOrderCount($field = "user_id")
    {
        return (int) Order::where($field, $this->authUserID())->whereIn('status',$this->order_status_failed_array)->count();
    }

    public function successOrderCount($field = "user_id")
    {
        return (int) Order::where($field, $this->authUserID())->where('status','delivered')->count();
    }
    public function orderTotal($order_id)
    {
        $total = OrderItem::getTotal($order_id);
        return round($total, $this->getCurrencyViewShow());
    }
    protected function successResponse($data = null, $message = 'Success', $statusCode = Response::HTTP_OK)
    {
        return response()->json([
            'status' => $this->successStatus,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    protected function errorResponse($message = 'Error', $statusCode = Response::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'status' => $this->errorStatus,
            'message' => $message,
        ], $statusCode);
    }
    // MessageBag
    protected function validationErrorResponse($errors, $message = 'validation_error', $statusCode = Response::HTTP_FORBIDDEN)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
        ], $statusCode);
    }

    protected function resourceResponse(JsonResource $resource,$data_with = null, $statusCode = Response::HTTP_OK)
    {
        $data = ['data' => $resource];
        if ($data_with) {
            foreach($data_with as $key => $value){
                $data[$key] = $value;
            }
        }
        return $this->successResponse($data, 'Success', $statusCode);
    }

    protected function collectionResponse(ResourceCollection $collection, $data_with = null,$data_with_array = null,$includeMetaLinks = true, $statusCode = Response::HTTP_OK)
    {
        $data = ['data' => $collection->collection];

        if ($includeMetaLinks) {
            $meta = [
                'total'         => $collection->total(),
                'count'         => $collection->count(),
                'per_page'      => $collection->perPage(),
                'current_page'  => $collection->currentPage(),
                'total_pages'   => $collection->lastPage(),
                'from'          => $collection->firstItem(),
                'last_page'     => $collection->lastPage(),
                'path'          => $collection->path(),
                'to'            => $collection->lastItem(),
            ];

            $links = [
                'first' => $collection->url(1),
                'last'  => $collection->url($collection->lastPage()),
                'prev'  => $collection->previousPageUrl(),
                'next'  => $collection->nextPageUrl(),
            ];
            $data['meta'] = $meta;
            $data['links'] = $links;
        }
        if ($data_with) {
            foreach($data_with as $key => $value){
                $data[$key] = $value;
            }
        }
        if ($data_with_array) {
            foreach($data_with_array as $key_array => $value_array){
                if(!empty($value_array)){
                    $data[$key_array] = [];
                    foreach ($value_array as $key_array_value => $array_value){
                        // if($key_array_value != "data"){
                            $data[$key_array][$key_array_value] = $array_value;
                        // }
                    }
                    }
            }
        }

        return $this->successResponse($data, 'Success', $statusCode);
    }

    public function defaultResponse($message = null, $success = true,$data = null)
    {
        $status = $this->successStatus;
        if ($success != true) {
            $status = $this->errorStatus;
        }
        return ['status'=> $status,'message'=> $message,'data'=>$data];
    }

    // MessageBag
    protected function defaultValidationErrorResponse($errors, $message = 'validation_error')
    {
         return [
            'status' => $this->errorStatus,
            'message' => $message,
            'errors' => $errors,
        ];
    }
    protected function getOptionsResponse(){
        $options = $this->getOptionsCart();
        $min_order = $options['min_order'] ?? 0;
        $max_order = $options['max_order'] ?? 0;
        $delivery_cost = $options['delivery_cost'] ?? 0;
        $free_shipping = $options['shipping'] ?? 0;
        return [
            'min_order'=>number_format($min_order,$this->getCurrencyViewShow(),'.', ''),'max_order'=>number_format($max_order,$this->getCurrencyViewShow(),'.', ''),
            'delivery_cost'=>number_format($delivery_cost,$this->getCurrencyViewShow(),'.', ''),'free_shipping'=>number_format($free_shipping,$this->getCurrencyViewShow(),'.', ''),
        ];
    }

    protected function getCartResponse(){
        return [
            'cart_total' => $this->cartTotalNumber(),'cart_amount' => $this->cartAmountNumber(),'cart_count' => $this->cartCount()
        ];
    }

    protected function getOrderResponse($field ="user_id"){
        return [
            'current_order' => $this->currentOrderCount($field),'failed_order' => $this->failedOrderCount($field),'success_order' => $this->successOrderCount($field),
        ];
    }

    protected function getSettingApi(){
    foreach($this->setting_array_api as $setting_value_api){
        $$setting_value_api = null;
    }
    foreach($this->setting_social_array as $setting_value){
        $$setting_value = null;
    }
    $setting = Setting::where('group', 'social')->orWhereIn('key',['address','site_phone','site_email'])->pluck('value', 'key')->toArray();
    foreach ($setting as $key => $value) {
        $$key = $value;
    }
    return ['site_email' =>$site_email ?? null, 'site_phone' =>$site_phone ?? null,'address' =>$address ?? null,
    'apple'=>$apple ?? null,'android' =>$android ?? null,'huawei' =>$huawei ?? null,'facebook' =>$facebook ?? null,'tiktok' =>$tiktok ?? null,
    'twitter' =>$twitter ?? null,'youtube' =>$youtube ?? null,'instagram' =>$instagram ?? null,'whatsapp' =>$whatsapp ?? null,'snapchat' =>$snapchat ?? null];
    }

}
