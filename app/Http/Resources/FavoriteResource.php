<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class FavoriteResource extends MainResource
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

            // relations :
            'user'          => new UserResource($this->whenLoaded('user')),
            'product'       => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
