<?php

namespace App\Http\Resources;

use App\Http\Resources\MainResource;
use App\Models\CartItemAddition;

class AdditionResource extends MainResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    protected $productId = 0;
    protected $cartId = 0;

    public function productId($value = 0){
        $this->productId = $value;
        return $this;
    }

    public function cartId($cart_value = 0){
        $this->cartId = $cart_value;
        return $this;
    }

    public function toArray($request)
    {

        $in_cart = "no";
        $id_in_cart = $count_in_cart = 0;
        $items_cart = $this->getProductCartItems();
        if(!empty($items_cart)){
            foreach($items_cart as  $item_cart){
                if($item_cart->addition_id ==  $this->id){
                    $in_cart = "yes";
                    $id_in_cart = $item_cart->id;
                    $count_in_cart = $item_cart->amount;
                }
            }
        }
        return [
            'id'                => $this->id,
            'name'              => $this->name[$this->getLang()],
            'image'             => $this->image,
            'price'             => number_format($this->price,$this->getCurrencyViewShow(),'.', ''),
            'in_cart'           => $in_cart,
            'id_in_cart'        => (int) $id_in_cart,
            'count_in_cart'     => number_format($count_in_cart,getNumberView(),'.', '') ,
            'type'              => $this->type,
            'order_id'          => $this->order_id,
            'active'            => $this->active,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }

    public static function collection($resource){
        return new AdditionCollection($resource);
    }

    private function getProductCartItems() {
        $user = $this->getAuhtUser();
        if (isset($user) && $user->is_client == 1) {
            return CartItemAddition::whereHas('cartItem', function ($query) {$query->where('cart_id',$this->cartId)->where('product_id',$this->productId);})->get();
        }
        else {
            return null;
        }
    }
}
