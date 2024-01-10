<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use DB;

class Cart extends SiteModel {

    protected $table = 'carts';
    protected $fillable = [
       'user_id','type'
    ];

    public function cartItems() {
        return $this->hasMany(CartItem::Class);
    }


    public function user() {
        return $this->belongsTo(User::Class);
    }

    public function insertCart($user_id,$type = "cart") {
        $this->user_id = $user_id;
        $this->type  = $type;
        return $this->save();
    }


    public static function foundCart($user_id) {

        $cart  = self::where('user_id', $user_id)->where('type', 'cart')->first();
        if (isset($cart)) {
            return $cart->id;
        }  else {
            return 0;
        }
    }

    public static function getCart($cart_id) {

        $cart  = self::where('id', $cart_id)->where('type', 'cart')->first();
        if (isset($cart)) {
            return $cart;
        }  else {
            return Null;
        }
    }

    public static function getCartUser() {

        $cart  = self::where('type', 'cart')->first();
        if (isset($cart)) {
            return $cart;
        }  else {
            return Null;
        }
    }

    public static function UpdateType($id,$type = "order") {
        return self::where('id', $id)->update(['type'=>$type]);
    }


}

//return $this->belongsTo('\App\Models\User', 'foreign_key', 'other_key');
