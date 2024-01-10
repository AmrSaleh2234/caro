<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class CountryResource extends MainResource
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
            'id'              => $this->id,
            'name'            => $this->name[$this->getLang()],
            'code'            => $this->code,
            'phone_code'      => $this->phone_code,
            'image'           => $this->image,
            'currency_id'     => $this->currency_id,
            'currency_type'   => $this->currency_type,
            'active'          => $this->active,
            'order_id'        => $this->order_id,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,

            // relations :
            'currency'       => new CurrencyResource($this->whenLoaded('currency')),
        ];
    }
}
