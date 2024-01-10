<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;


class CartItem extends SiteModel {

    protected $table = 'cart_items';
    protected $fillable = [
        'product_id','product_child_id','cart_id','price_addition','amount_addition','price','offer_price','total_amount','amount','offer_amount','offer_amount_add', 'total','total_price','note'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::Class);
    }

    public function product() {
        return $this->belongsTo(Product::Class)->withTrashed();
    }

    public function productChild() {
        return $this->belongsTo(Product::Class,'product_child_id')->withTrashed();
    }

    public function cartItemAdditions() {
        return $this->hasMany(CartItemAddition::Class);
    }
    public function insertItem($cart_id,$product_id,$product_child_id,$price_addition,$offer_price,$price,$total,$total_price,$amount_addition,$amount,$total_amount,$offer_amount = 0,$offer_amount_add = 0,$note = NULL) {
        $this->cart_id = $cart_id;
        $this->product_id = $product_id;
        $this->product_child_id = $product_child_id;
        $this->price_addition  = $price_addition;
        $this->amount_addition  = $amount_addition;
        $this->offer_price  = $offer_price;
        $this->price  = $price;
        $this->amount = $amount;
        $this->offer_amount = $offer_amount;
        $this->offer_amount_add = $offer_amount_add;
        $this->total_amount = $total_amount;
        $this->total = $total;
        $this->total_price = $total_price;
        $this->note = $note;
        return $this->save();
    }

    public static function updateItem($id,$product_child_id,$price_addition,$offer_price,$price,$total,$total_price,$amount_addition,$amount,$total_amount,$offer_amount = 0,$offer_amount_add = 0,$note = NULL) {
        $item = static::findOrFail($id);
        $item->product_child_id = $product_child_id;
        $item->price_addition  = $price_addition;
        $item->amount_addition  = $amount_addition;
        $item->offer_price  = $offer_price;
        $item->price  = $price;
        $item->amount = $amount;
        $item->offer_amount = $offer_amount;
        $item->offer_amount_add = $offer_amount_add;
        $item->total_amount = $total_amount;
        $item->total = $total;
        $item->total_price = $total_price;
        $item->note = $note;
        return $item->save();
    }

    public static function updateItemAddition($id,$price_addition,$total_price,$amount_addition,$total_amount) {
        $item = static::findOrFail($id);
        $item->price_addition  = $price_addition;
        $item->total_price = $total_price;
        $item->amount_addition  = $amount_addition;
        $item->total_amount = $total_amount;
        return $item->save();
    }

    public static function cartCount($cart_id)  {
        return static::where('cart_id', $cart_id)->Join('products', function ($join) {$join->on('cart_items.product_id', 'products.id')->where('products.shipping', 0);})->count();
    }

    public static function deleteItem($cart_id,$product_id)  {
        return static::where('product_id', $product_id)->where('cart_id', $cart_id)->delete();
    }

    public static function getTotal($cart_id)
    {
        return static::where('cart_id', $cart_id)->where('amount','>', 0)->where('price','>', 0)->sum('total_price');
    }

    public static function getAmount($cart_id)
    {
        return static::where('cart_id', $cart_id)->where('amount','>', 0)->where('price','>', 0)->sum('amount');
    }

    public static function foundItemProduct($cart_id,$product_id) {
        $item  = static::where('product_id', $product_id)->where('cart_id', $cart_id)->first();
        if (isset($item)) {
            return $item;
        }  else {
            return null;
        }
    }

    public static function foundItem($cart_id,$product_id) {
        $item  = static::where('product_id', $product_id)->where('cart_id', $cart_id)->first();
        if (isset($item)) {
            return $item->id;
        }  else {
            return 0;
        }
    }

    public static function foundItemAmount($cart_id,$product_id) {
        $item  = static::where('product_id', $product_id)->where('cart_id', $cart_id)->first();
        if (isset($item)) {
            return $item->amount;
        }  else {
            return 0;
        }
    }

}
