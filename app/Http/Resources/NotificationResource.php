<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;
use App\Models\Region;

class NotificationResource extends MainResource
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
            'title'                 => $this->data['title'][$this->getLang()],
            'body'                  => $this->data['body'][$this->getLang()],
            'type'                  => $this->data['type'],
            'model_id'              => $this->data['model_id'],
            'model'                 => $this->data['model'],
            'status'                => $this->data['status'],
            'read_at'               => $this->read_at,
            'created_at'            => $this->created_at,
            'updated_at'            => $this->updated_at,

            // relations :
            //'user'                 => new UserResource($this->whenLoaded('user')),
        ];
    }
}
