<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class CouponResource extends MainResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // 'use_count','use_limit','user_limit','count_used','date_start','date_expire',

        return [
            'id'         => $this->id,
            'code'       => $this->code,
            'type'       => $this->type,
            'name'       => $this->name[$this->getLang()],
            'content'    => $this->content[$this->getLang()],
            'discount'      => number_format($this->discount,$this->getCurrencyViewShow(),'.', ''),
            'min_order'     => number_format($this->min_order,$this->getCurrencyViewShow(),'.', ''),
            'max_discount'  => number_format($this->max_discount,$this->getCurrencyViewShow(),'.', ''),
            'use_count'     => (int)  $this->use_count,
            'use_limit'       => (int)  $this->use_limit,
            'user_limit'   => (int)  $this->user_limit,
            'count_used'      => (int) $this->count_used,
            'date_start'       => $this->date_start,
            'date_expire'   => $this->date_expire,
            'day_start'       => $this->day_start,
            'day_expire'   => $this->day_expire,
            'finish'     => $this->finish,
            'active'     => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            // relations :
            'groups'     => new GroupResource($this->whenLoaded('groups')),

        ];
    }
}
