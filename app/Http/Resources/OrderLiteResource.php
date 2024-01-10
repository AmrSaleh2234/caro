<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class OrderLiteResource extends MainResource
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
            'id'                => $this->id,
            'user_id'           => $this->user_id,
            'cancel_by'         => $this->cancel_by,
            'cancel_date'       => $this->cancel_date,
            'delivery_id'       => $this->delivery_id,
            'address_id'        => $this->address_id,
            'region_id'         => $this->region_id,
            'city_id'           => $this->city_id,
            'country_id'        => $this->country_id,
            'branch_id'         => $this->branch_id,
            'coupon_id'         => $this->coupon_id,
            'payment_id'        => $this->payment_id,
            'price'             => number_format($this->price,$this->getCurrencyViewShow(),'.', ''),
            'shipping'          => number_format($this->shipping,$this->getCurrencyViewShow(),'.', ''),
            'discount'          => number_format($this->discount,$this->getCurrencyViewShow(),'.', ''),
            'total'             => number_format($this->total,$this->getCurrencyViewShow(),'.', ''),
            'paid'              => number_format($this->paid,$this->getCurrencyViewShow(),'.', ''),
            'active'            => $this->active,
            'is_read'           => $this->is_read,
            'note'              => $this->note,
            'admin_note'        => $this->admin_note,
            'delivery_note'     => $this->delivery_note,
            'reject_note'       => $this->reject_note,
            'status'            => $this->status,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
