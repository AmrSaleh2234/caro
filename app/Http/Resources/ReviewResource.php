<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class ReviewResource extends MainResource
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
            'id'            => $this->id,
            'user_id'       => $this->user_id,
            'product_id'    => $this->product_id,
            'order_id'      => $this->order_id,
            'rate'          => $this->rate,
            'comment'       => $this->comment,
            'active'        => $this->active,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,

            // relations :
            'user'          => new UserResource($this->whenLoaded('user')),
            'product'       => new ProductResource($this->whenLoaded('product')),
            'order'         => new OrderResource($this->whenLoaded('order')),
        ];
    }
}
