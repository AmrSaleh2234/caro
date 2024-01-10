<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class CategoryResource extends MainResource
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
            'id'         => $this->id,
            'parent_id'  => $this->parent_id,
            'link'       => $this->link,
            'name'       => $this->name[$this->getLang()],
            'content'    => $this->content[$this->getLang()],
            'image'      => $this->image,
            'type'       => $this->type,
            'status'     => $this->status,
            'order_id'   => $this->order_id,
            'active'     => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            // relations :
            'childrens' => new CategoryCollection($this->whenLoaded('childrens')),
            // 'parent'        => new CategoryResource($this->whenLoaded('parent')),

        ];
    }
}
