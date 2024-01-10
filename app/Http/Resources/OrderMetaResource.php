<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class OrderMetaResource extends MainResource
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
            'name'              => $this->name,
            'phone'             => $this->phone,
            'email'             => $this->email,
            'address'           => $this->address,
            'geo_address'       => $this->geo_address,
            'latitude'          => $this->latitude,
            'longitude'         => $this->longitude,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
