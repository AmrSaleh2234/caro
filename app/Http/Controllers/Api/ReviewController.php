<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Review;
use App\Models\OrderItem;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\ReviewCollection;

class ReviewController extends ApiHomeController
{
    protected $rules = [
        'rate' => 'required|integer|min:1|max:5',
        'order_id' => 'required|integer|exists:orders,id',
        'product_id' => 'required|integer|exists:products,id',
        'comment' => 'required|string',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $input  = $request->all();
            $product_id    = isset($input['product_id']) ? (int) $input['product_id'] : 0;
            $reviews_all = Review::with('user','product','order');
            if($product_id > 0){
                $reviews_all->where('product_id', $product_id);
            }else{
                $reviews_all->where('user_id', $this->authUserID());
            }
            $reviews = $reviews_all->paginate($this->limit);
            return $this->collectionResponse(new ReviewCollection($reviews));
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
        $validateRequest = $this->validateRequest($request, $this->rules);
        if(isset($validateRequest)){
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        $order_item_count = OrderItem::where('order_id',$input['order_id'])->where('product_id',$input['product_id'])->whereHas('Order', function ($query) {$query->where('user_id',$this->authUserID());})->count();
        if($order_item_count > 0){
            $input['user_id'] =$this->authUserID();
            $input['active'] =1;
            $review = Review::create($input);
            $data = ['review' => new ReviewResource($review)];
            return $this->successResponse($data);
        }else{
            $message = $this->getMessageError('not_found');
            return $this->errorResponse($message);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::where('id', $id)->where('user_id', $this->authUserID())->with('user','product','order')->first();
        $data = ['review' => new ReviewResource($review)];
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
        $review = Review::find($id);
        if (!empty($review) && $review->user_id == $this->authUserID()) {
            return $this->successResponse();
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
        $review = Review::find($id);
        if (!empty($review)) {
            return $this->successResponse();
        } else {
            return $this->errorResponse();
        }
    }
}
