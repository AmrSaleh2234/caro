<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class CartResource extends MainResource
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
            'id'                   => $this->id,
            'user_id'              => $this->user_id,
            'type'                 => $this->type,
            'created_at'           => $this->created_at,
            'updated_at'           => $this->updated_at,

            // relations :
            'cart_items'           => new CartItemCollection($this->whenLoaded('cartItems')),
        ];
    }
}
