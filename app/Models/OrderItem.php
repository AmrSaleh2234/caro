<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;


class OrderItem extends SiteModel {

    protected $table = 'order_items';
    protected $fillable = [
        'product_id','product_child_id','order_id','price_addition','amount_addition','price','offer_price','total_amount','amount','offer_amount','offer_amount_add', 'total','total_price','note'
    ];

    public function order()
    {
        return $this->belongsTo(Order::Class);
    }

    public function product() {
        return $this->belongsTo(Product::Class)->withTrashed();
    }

    public function productChild() {
        return $this->belongsTo(Product::Class,'product_child_id')->withTrashed();
    }

    public function orderItemAdditions() {
        return $this->hasMany(OrderItemAddition::Class);
    }

    public function insertItem($order_id,$product_id,$product_child_id,$price_addition,$offer_price,$price,$total,$total_price,$amount_addition,$amount,$total_amount,$offer_amount = 0,$offer_amount_add = 0,$note = NULL) {
        $this->order_id = $order_id;
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
    public static function foundItem($product_id, $order_id) {
        $item  = static::where('product_id', $product_id)->where('order_id', $order_id)->first();
        if (isset($item)) {
            return $item->id;
        }  else {
            return 0;
        }
    }

    public static function getTotal($order_id)
    {
        return static::where('order_id', $order_id)->where('amount','>', 0)->where('price', '>', 0)->sum('total_price');
    }

    public static function getAmount($order_id)
    {
        return static::where('order_id', $order_id)->where('amount','>', 0)->where('price', '>', 0)->sum('amount');
    }

}
