<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class ProductGalleryResource extends MainResource
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
            'product_id'    => $this->product_id,
            'image'         => $this->image,
        ];
    }
}
