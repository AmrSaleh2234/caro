<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class OrderItemResource extends MainResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'product_id'        => $this->product_id,
            'product_child_id'  => $this->product_child_id,
            'order_id'          => $this->order_id,
            'amount_addition'   => number_format($this->amount_addition,getNumberView(),'.', ''),
            'amount'            => number_format($this->amount,getNumberView(),'.', ''),
            'offer_amount'      => number_format($this->offer_amount,getNumberView(),'.', ''),
            'offer_amount_add'  => number_format($this->offer_amount_add,getNumberView(),'.', ''),
            'total_amount'      => number_format($this->total_amount,getNumberView(),'.', ''),
            'price_addition'    => number_format($this->price_addition,$this->getCurrencyViewShow(),'.', ''),
            'price'             => number_format($this->price,$this->getCurrencyViewShow(),'.', ''),
            'offer_price'       => number_format($this->offer_price,$this->getCurrencyViewShow(),'.', ''),
            'total'             => number_format($this->total,$this->getCurrencyViewShow(),'.', ''),
            'total_price'       => number_format($this->total_price,$this->getCurrencyViewShow(),'.', ''),
            'note'              => $this->note,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,

            // relations :
            'order_item_additions' => new OrderItemAdditionCollection($this->whenLoaded('orderItemAdditions')),
            'product'              => new ProductResource($this->whenLoaded('product')),
            'product_child'        => new ProductChildResource($this->whenLoaded('productChild')),
        ];
    }
}
