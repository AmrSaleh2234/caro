<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;


class CartItemAddition extends SiteModel {

    protected $table = 'cart_item_additions';
    protected $fillable = [
        'cart_item_id','addition_id','price','amount', 'total'
    ];

    public function cartItem()
    {
        return $this->belongsTo(CartItem::Class);
    }

    public function addition() {
        return $this->belongsTo(Addition::Class);
    }

    public function insertItem($cart_item_id,$addition_id,$price, $amount,$total) {

        $this->addition_id = $addition_id;
        $this->cart_item_id = $cart_item_id;
        $this->price  = $price;
        $this->amount = $amount;
        $this->total = $total;
        return $this->save();
    }

    public static function updateItem($id,$price,$amount,$total) {
        $item = static::findOrFail($id);
        $item->price  = $price;
        $item->amount = $amount;
        $item->total = $total;
        return $item->save();
    }

    public static function getTotal($cart_item_id)
    {
        return static::whereIn('cart_item_id', $cart_item_id)->where('amount','>', 0)->where('price','>', 0)->sum('total');
    }

    public static function getAmount($cart_item_id)
    {
        return static::whereIn('cart_item_id', $cart_item_id)->where('amount','>', 0)->where('price','>', 0)->sum('amount');
    }

    public static function foundItem($cart_item_id,$addition_id) {
        $item  = static::where('addition_id', $addition_id)->where('cart_item_id', $cart_item_id)->first();
        if (isset($item)) {
            return $item->id;
        }  else {
            return 0;
        }
    }

    public static function foundItemAmount($cart_item_id,$addition_id) {
        $item  = static::where('addition_id', $addition_id)->where('cart_item_id', $cart_item_id)->first();
        if (isset($item)) {
            return $item->amount;
        }  else {
            return 0;
        }
    }

}
