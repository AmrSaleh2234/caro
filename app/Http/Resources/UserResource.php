<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class UserResource extends MainResource
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
            'name_first'           => $this->name_first,
            'name_last'            => $this->name_last,
            'name'                 => $this->name,
            'username'             => $this->username,
            'phone'                => $this->phone,
            'email'                => $this->email,
            // 'type'                 => $this->type,
            // 'is_client'            => $this->is_client,
            // 'is_admin'             => $this->is_admin,
            // 'is_delivery'          => $this->is_delivery,
            // 'is_store'             => $this->is_store,
            'is_available'         => $this->is_available,
            'vip'                  => $this->vip,
            'country_id'           => $this->country_id,
            'city_id'              => $this->city_id,
            'branch_id'            => $this->branch_id,
            'group_id'             => $this->group_id,
            'address_id'           => $this->address_id,
            'image'                => $this->image,
            'gender'               => $this->gender,
            'gender_name'          => genderName($this->gender),
            'birth_date'           => $this->birth_date,
            'code'                 => $this->code,
            'code_expire'          => $this->code_expire,
            'sms_code'             => $this->sms_code,
            'sms_code_expire'      => $this->sms_code_expire,
            'wallet'               => $this->wallet,
            'point'                => $this->point,
            'locale'               => $this->locale,
            'latitude'             => $this->latitude,
            'longitude'            => $this->longitude,
            'polygon'              => $this->polygon,
            'active'               => $this->active,
            'last_active'          => $this->last_active,
            'created_at'           => $this->created_at,
            'updated_at'           => $this->updated_at,

            // relations :
            'branch'                => new BranchResource($this->whenLoaded('branch')),
            'country'               => new CountryResource($this->whenLoaded('country')),
            //'city'                  => new CityResource($this->whenLoaded('city')),
            //'group'                 => new GroupResource($this->whenLoaded('group')),
            'address'               => new AddressResource($this->whenLoaded('address')),
            'branches'              => new BranchCollection($this->whenLoaded('branches')),
            // 'wallets'               => new WalletCollection($this->whenLoaded('wallets')),
            // 'points'                => new PointCollection($this->whenLoaded('points')),

        ];
    }
}
