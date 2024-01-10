<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;
use App\Models\CartItem;
use App\Models\Favorite;
use App\Models\Product;

class ProductChildResource extends MainResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */


    public function toArray($request)
    {
        return
         [
            'id'         => $this->id,
            'code'       => $this->code,
            'link'       => $this->link,
            'name'       => $this->name[$this->getLang()],
            'content'    => $this->content[$this->getLang()],
            'video'      => $this->video,
            'image'      => $this->image,
            'rate'       => number_format($this->rate,getNumberView(),'.', ''),
            'rate_count' => (int) $this->rate_count,
            'rate_all'   => number_format($this->rate_all,getNumberView(),'.', ''),
            'prepare_time'=> $this->prepare_time,
            'price'  => number_format($this->price,$this->getCurrencyViewShow(),'.', ''),
            'start'  => number_format($this->start,getNumberView(),'.', ''),
            'skip'  => number_format($this->skip,getNumberView(),'.', ''),
            'order_limit'  => number_format($this->order_limit,getNumberView(),'.', ''),
            'offer'      => $this->offer,
            'offer_type'  => $this->offer_type,
            'offer_price'  => number_format($this->offer_price,$this->getCurrencyViewShow(),'.', ''),
            'offer_percent'=> number_format($this->offer_percent,getNumberView(),'.', ''),
            'offer_amount'  =>  number_format($this->offer_amount,getNumberView(),'.', ''),
            'offer_amount_add'=> number_format($this->offer_amount_add,getNumberView(),'.', ''),
            'max_amount'=> number_format($this->max_amount,getNumberView(),'.', ''),
            'max_addition_free'  => (int) $this->max_addition_free,
            'max_addition'=> (int) $this->max_addition,
            'active'     => $this->active,
            'feature'    => $this->feature,
            'filter'     => $this->filter,
            'shipping'   => $this->shipping,
            'sale'       => $this->sale,
            'is_late'     => $this->is_late,
            'is_size'    => $this->is_size,
            'is_max'     => $this->is_max,
            'order_max'   => number_format($this->order_max,getNumberView(),'.', ''),
            'date_start'  => $this->date_start,
            'date_expire' => $this->date_expire,
            'day_start'  => $this->day_start,
            'day_end'     => $this->day_end,
            'status'     => $this->status,
            'type'       => $this->type,
            'order_id'   => $this->order_id,
            'parent_id'  => $this->parent_id,
            'unit_id'   => $this->unit_id,
            'brand_id'  => $this->brand_id,
            'size_id'   => $this->size_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            // relations :
            'size'     => new SizeResource($this->whenLoaded('size')),
        ];
    }
}
