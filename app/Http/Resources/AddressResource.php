<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;
use App\Models\Region;

class AddressResource extends MainResource
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
            'id'                    => $this->id,
            'user_id'               => $this->user_id,
            'region_id'             => $this->region_id,
            'city_id'               => $this->city_id,
            'type'                  => $this->type,
            'address'               => $this->address,
            'latitude'              => $this->latitude,
            'longitude'             => $this->longitude,
            'geo_address'           => $this->geo_address,
            'geo_state'             => $this->geo_state,
            'geo_city'              => $this->geo_city,
            'place_id'              => $this->place_id,
            'postcode'              => $this->postcode,
            'building'              => $this->building,
            'floor'                 => $this->floor,
            'apartment'             => $this->apartment,
            'additional_info'       => $this->additional_info,
            'created_at'            => $this->created_at,
            'updated_at'            => $this->updated_at,

            // relations :
            // 'user'                 => new UserResource($this->whenLoaded('user')),
            'city'                 => new CityResource($this->whenLoaded('city')),
            'region'               => new RegionResource($this->whenLoaded('region')),
        ];
    }
}
