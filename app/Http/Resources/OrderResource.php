<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;

class OrderResource extends MainResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $is_map = 1;
        $is_print = 0;
        if(in_array($this->status,$this->order_status_finish_array)){
            $is_map = 0;
        }
        if(in_array($this->status,$this->order_status_deliver_array)){
            $is_print = 1;
        }
        return [
            'id'                => $this->id,
            'user_id'           => $this->user_id,
            'store_id'          => $this->store_id,
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
            'is_map'            => $is_map,
            'is_print'          => $is_print,
            'polygon'           => $this->polygon,
            'note'              => $this->note,
            'admin_note'        => $this->admin_note,
            'delivery_note'     => $this->delivery_note,
            'reject_note'       => $this->reject_note,
            'status'            => $this->status,
            'status_name'       => orderName($this->status),
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,

            // relations :
            'user'              => new UserResource($this->whenLoaded('user')),
            'user_cancel'       => new UserResource($this->whenLoaded('cancelBy')),
            'delivery'          => new UserResource($this->whenLoaded('delivery')),
            'store'             => new UserResource($this->whenLoaded('store')),
            'payment'           => new PaymentResource($this->whenLoaded('payment')),
            'coupon'            => new CouponResource($this->whenLoaded('coupon')),
            'country'           => new CountryResource($this->whenLoaded('country')),
            'city'              => new CityResource($this->whenLoaded('city')),
            'region'            => new RegionResource($this->whenLoaded('region')),
            //'address'           => new AddressResource($this->whenLoaded('address')),
            'branch'            => new BranchResource($this->whenLoaded('branch')),
            'order_meta'        => new OrderMetaResource($this->whenLoaded('orderMeta')),
            'order_reject'      => new OrderMetaResource($this->whenLoaded('orderReject')),
            'order_items'       => new OrderItemCollection($this->whenLoaded('orderItems')),
            'reviews'           => new ReviewCollection($this->whenLoaded('reviews')),
            'wallets'           => new WalletCollection($this->whenLoaded('wallets')),
            'points'            => new PointCollection($this->whenLoaded('points')),
        ];
    }
}
