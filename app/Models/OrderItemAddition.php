<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;


class OrderItemAddition extends SiteModel {

    protected $table = 'order_item_additions';
    protected $fillable = [
        'order_item_id','addition_id','price','amount', 'total'
    ];

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::Class);
    }

    public function addition() {
        return $this->belongsTo(Addition::Class);
    }

    public function insertItem($order_item_id,$addition_id,$price, $amount,$total) {

        $this->addition_id = $addition_id;
        $this->order_item_id = $order_item_id;
        $this->price  = $price;
        $this->amount = $amount;
        $this->total = $total;
        return $this->save();
    }

    public static function getTotal($order_item_id)
    {
        return static::whereIn('order_item_id', $order_item_id)->where('amount','>', 0)->where('price','>', 0)->sum('total');
    }

    public static function getAmount($order_item_id)
    {
        return static::whereIn('order_item_id', $order_item_id)->where('amount','>', 0)->where('price','>', 0)->sum('amount');
    }

    public static function foundItem($order_item_id,$addition_id) {
        $item  = static::where('addition_id', $addition_id)->where('order_item_id', $order_item_id)->first();
        if (isset($item)) {
            return $item->id;
        }  else {
            return 0;
        }
    }

    public static function foundItemAmount($order_item_id,$addition_id) {
        $item  = static::where('addition_id', $addition_id)->where('order_item_id', $order_item_id)->first();
        if (isset($item)) {
            return $item->amount;
        }  else {
            return 0;
        }
    }

}
