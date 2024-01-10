<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;


class Review extends SiteModel {

    protected $table = 'reviews';
    protected $fillable = [
        'user_id','order_id', 'product_id','rate','comment','active'
    ];


    public function product() {
        return $this->belongsTo(User::Class)->withTrashed();
    }

    public function user() {
        return $this->belongsTo(Product::Class)->withTrashed();
    }

    public function order() {
        return $this->belongsTo(Order::Class);
    }

    public function insertReview($user_id, $order_id,$product_id, $rate,$comment = NULL,$active = 1) {

        $this->user_id  = $user_id;
        $this->order_id = $order_id;
        $this->product_id  = $product_id;
        $this->rate     = $rate;
        $this->active   = $active;
        $this->comment  = $comment;
        return $this->save();
    }

    public static function countReview($product_id) {
        return static::where('product_id', $product_id)->count();
    }

    public static function sumReview($product_id) {
        return static::where('product_id', $product_id)->sum('rate');
    }


    public static function updateReview($user_id,$order_id,$product_id, $rate,$comment = NULL,$active = 1) {
        $rate_id = static::where('user_id', $user_id)->where('order_id', $order_id)->where('product_id', $product_id)->first();
        if (isset($rate_id)) {
            $rate_id->rate    = $rate;
            $rate_id->active  = $active;
            $rate_id->comment = $comment;
            return $rate_id->save();
        } else {
             $insert = new Review();
            return $insert->insertReview($user_id,$order_id,$product_id, $rate,$comment,$active);
        }
    }

    public static function deleteReview($product_id,$order_id) {
        return static::where('product_id', $product_id)->where('order_id', $order_id)->delete();
    }

    public static function foundReview($user_id,$product_id,$order_id) {
        $rate = static::where('user_id', $user_id)->where('order_id', $order_id)->where('product_id', $product_id)->first();
        if (isset($rate)) {
            return $rate->id;
        } else {
            return 0;
        }
    }

}
