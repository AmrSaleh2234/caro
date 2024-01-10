<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class ActionResource extends MainResource
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
            'user_id'              => $this->user_id,
            'actionable_type'      => $this->actionable_type,
            'actionable_id'        => $this->actionable_id,
            'type'                 => $this->type,
            'key'                  => $this->key,
            'value'                => $this->value,
            'group'                => $this->group,
            'parent_id'            => $this->parent_id,
            'created_at'           => $this->created_at,
            'updated_at'           => $this->updated_at,

            // relations :
            'user'                 => new UserResource($this->whenLoaded('user')),
            'parent'     => new ActionResource($this->whenLoaded('parent')),

        ];
    }
}
