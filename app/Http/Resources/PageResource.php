<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class PageResource extends MainResource
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
            'user_id'  => $this->user_id,
            'product_id'  => $this->product_id,
            'store_id'  => $this->store_id,
            'parent_id'  => $this->parent_id,
            'name'       => $this->name[$this->getLang()],
            'link'       => $this->link,
            'title'      => $this->title[$this->getLang()],
            'content'    => $this->content[$this->getLang()],
            'video'      => $this->video,
            'image'      => $this->image,
            'icon'       => $this->icon,
            'type'       => $this->type,
            'page_type'  => $this->page_type,
            'order_id'   => $this->order_id,
            'active'     => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            // relations :
            'parent'     => new PageResource($this->whenLoaded('parent')),
            'product'    => new ProductResource($this->whenLoaded('product')),
            'store'      => new UserResource($this->whenLoaded('store')),
            'user'       => new UserResource($this->whenLoaded('user')),

        ];
    }
}
