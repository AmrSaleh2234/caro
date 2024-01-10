<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;
use App\Models\CartItem;
use App\Models\Favorite;
use App\Models\Product;

class ProductResource extends MainResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */


    public function toArray($request)
    {
        $favorite = $in_cart = "no";
        $id_in_cart = $count_in_cart = 0;
        if(in_array($this->id,$this->favoritedByUser())){
            $favorite = "yes";
        }
        // $items_cart = $this->itemCartByUser();
        // if(!empty($items_cart)){
        //     foreach($items_cart as  $item_cart){
        //         if($item_cart->product_id ==  $this->id){
        //             $in_cart = "yes";
        //             $id_in_cart = $item_cart->id;
        //             $count_in_cart = $item_cart->amount;
        //         }
        //     }
        // }
        return
         [
            'id'         => $this->id,
            'code'       => $this->code,
            'link'       => $this->link,
            'name'       => $this->name[$this->getLang()],
            'content'    => $this->content[$this->getLang()],
            'favorite'   => $favorite,
            'in_cart'    => $in_cart,
            'id_in_cart' => (int) $id_in_cart,
            'count_in_cart' => number_format($count_in_cart,getNumberView(),'.', '') ,
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
            'type'        => $this->type,
            'status'     => $this->status,
            'order_id'   => $this->order_id,
            'parent_id'  => $this->parent_id,
            'unit_id'   => $this->unit_id,
            'brand_id'  => $this->brand_id,
            'size_id'   => $this->size_id,
            'polish_id' => $this->polish_id,
            'color_id' => $this->color_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            // relations :
            'unit'     => new UnitResource($this->whenLoaded('unit')),
            //'categories' => new CategoryCollection($this->whenLoaded('categories')),
            'childrens' => new ProductChildCollection($this->whenLoaded('childrens')),
            // 'additions' => AdditionResource::collection($this->whenLoaded('additions'))->productId($this->id)->cartId($this->getCartID()),
            'product_galleries' => new ProductGalleryCollection($this->whenLoaded('productGalleries')),
            'features' => new FeatureCollection($this->whenLoaded('features')),
            'terms' => new TermCollection($this->whenLoaded('terms')),
            'tags' => new TagCollection($this->whenLoaded('tags')),
            'user'       => new UserResource($this->whenLoaded('user')),
            // 'parent'     => new ProductResource($this->whenLoaded('parent')),
            'brand'     => new BrandResource($this->whenLoaded('brand')),
            'polish'     => new PolishResource($this->whenLoaded('polish')),
            'color'     => new ColorResource($this->whenLoaded('color')),
            'size'     => new SizeResource($this->whenLoaded('size')),
            // 'favorites' => new FavoriteCollection($this->whenLoaded('favorites')),

        ];
    }

    private function favoritedByUser() {
        $user = $this->getAuhtUser();
        if (isset($user) && $user->is_client == 1) {
            return Favorite::where('user_id',$user->id)->where('favorite','yes')->pluck('product_id','product_id')->toArray();
        }
        else {
            return [];
        }
    }

    private function itemCartByUser() {
        $user = $this->getAuhtUser();
        if (isset($user) && $user->is_client == 1) {
            return CartItem::where('cart_id',$this->getCartID())->where('total_amount','>',0)->select('id','product_id','amount','total_amount')->get();
        }
        else {
            return null;
        }
    }
}
