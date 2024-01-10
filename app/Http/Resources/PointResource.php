<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class PointResource extends MainResource
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
            'order_id'      => $this->order_id,
            'point'         => $this->point,
            'type'          => $this->type,
            'active'        => $this->active,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,

            // relations :
            // 'user'          => new UserResource($this->whenLoaded('user')),
            'order'       => new OrderLiteResource($this->whenLoaded('order')),
        ];
    }
}
