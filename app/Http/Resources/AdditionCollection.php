<?php

namespace App\Http\Resources;



class AdditionCollection extends MainResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    // public function toArray($request)
    // {
    //     return [
    //         'data' => $this->collection,
    //     ];
    // }

    protected $productId = 0;
    protected $cartId = 0;
    public function productId($value = 0){
        $this->productId = $value;
        return $this;
    }

    public function cartId($cart_value = 0){
        $this->cartId = $cart_value;
        return $this;
    }

    public function toArray($request){
        return $this->collection->map(function(AdditionResource $resource) use($request){
            return $resource->productId($this->productId)->cartId($this->cartId)->toArray($request);
        })->all();
    }
}
