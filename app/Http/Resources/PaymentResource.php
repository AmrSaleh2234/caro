<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class PaymentResource extends MainResource
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
            'name'          => $this->name[$this->getLang()],
            'content'       => $this->content[$this->getLang()],
            'order_id'      => $this->order_id,
            'image'         => $this->image,
            'type'          => $this->type,
            'active'        => $this->active,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,

            // relations :
        ];
    }
}
