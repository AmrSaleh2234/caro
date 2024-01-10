<?php

namespace App\Observers;

use App\Models\CartItem;
use App\Models\Product;
use App\Traits\HelperTrait;
class ProductObserver
{

    use HelperTrait;
    public function updated(Product $product)
    {
        if ($product->isDirty('price') || $product->isDirty('offer_price')) {
            $this->removeItems($product);
        }

        if ($product->isDirty('active')) {
            if ($product->active == 0) {
                $product->cartItems()->delete();
            }
        }

        // if ($product->isDirty('max_amount')) {
        //     if ($product->max_amount <= 0) {
        //         $this->removeItems($product,true);
        //     }
        // }
    }

    public function deleted(Product $product)
    {
        $product->cartItems()->delete();
        $product->favorites()->delete();
    }

    public function removeItems($product,$max_amount =  false){
        $items = $product->cartItems()->where('amount', '>', 0)->get();
                if (!empty($items)) {
                    foreach ($items as $item) {
                        $amount = $item->amount;
                        $item_id = $item->id;
                        if($max_amount ==  true){
                            $amount = 0;
                        }
                        CartItem::where('id',$item_id)->update([
                            "amount" => round($amount, getNumberViewOperation()),
                            "offer_price" => round($product->offer_price, getNumberViewOperation()),
                            "price" => round($product->price, getNumberViewOperation()),
                            "total" => round(multiple(sum($product->price,$item->price_addition), $amount),getNumberViewOperation()),
                        ]);
                    }
                }
    }
}
