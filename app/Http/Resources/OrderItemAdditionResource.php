<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class OrderItemAdditionResource extends MainResource
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
            'order_id'          => $this->order_id,
            'addition_id'       => $this->addition_id,
            'amount'            => number_format($this->amount,getNumberView(),'.', ''),
            'price'             => number_format($this->price,$this->getCurrencyViewShow(),'.', ''),
            'total'             => number_format($this->total,$this->getCurrencyViewShow(),'.', ''),
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,

            // relations :
            'addition'          => new AdditionResource($this->whenLoaded('addition')),
        ];
    }
}
