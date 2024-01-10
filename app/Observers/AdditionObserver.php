<?php

namespace App\Observers;

use App\Models\CartItem;
use App\Models\CartItemAddition;
use App\Models\Addition;
use App\Models\Product;
use App\Traits\HelperTrait;

class AdditionObserver
{
    use HelperTrait;

    public function updated(Addition $addition)
    {
        if ($addition->isDirty('price')) {
            $this->removeItems($addition);
        }

        if ($addition->isDirty('active')) {
            if ($addition->active == 0) {
                $addition->removeItems($addition,0);
            }
        }
    }

    public function removeItems($addition,$active = 1){
        $items = CartItemAddition::with('cartItem')->where('addition_id',$addition->id)->where('amount', '>', 0)->get();
                if (!empty($items)) {
                    foreach ($items as $item) {
                        $item_id = $item->id;
                        $cart_item_id = $item->cart_item_id;
                        $cart_item = $item->cartItem;
                        if($active > 0 ){
                            CartItemAddition::where('id',$item_id)->update([
                                "price" => round($addition->price, getNumberViewOperation()),
                                "total" => round(multiple($addition->price, $item->amount),getNumberViewOperation()),
                            ]);
                        }else{
                            CartItemAddition::find($item_id)->delete();
                        }
                        return $this->changeCartItem($cart_item,$cart_item_id);
                    }
                }
    }

}
