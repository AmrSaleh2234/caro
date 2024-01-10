<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class BranchResource extends MainResource
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
            'name'          => $this->name[$this->getLang()],
            'content'       => $this->content[$this->getLang()],
            'address'       => $this->address[$this->getLang()],
            'phone'         => $this->phone,
            'email'         => $this->email,
            'type'          => $this->type,
            'image'         => $this->image,
            'latitude'      => $this->latitude,
            'longitude'     => $this->longitude,
            'polygon'       => $this->polygon,
            'order_id'      => $this->order_id,
            'region_id'     => $this->region_id,
            'city_id'       => $this->city_id,
            // 'country_id'    => $this->country_id,
            'active'        => $this->active,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,

            // relations :
            // 'country'       => new CountryResource($this->whenLoaded('country')),
            'city'          => new CityResource($this->whenLoaded('city')),
            'region'        => new RegionResource($this->whenLoaded('region')),
        ];
    }
}
