<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;


class Favorite extends SiteModel {

    protected $table = 'favorites';
    protected $fillable = [
        'user_id', 'product_id','favorite'
    ];

    public function user() {
        return $this->belongsTo(User::Class)->withTrashed();
    }

    public function product() {
        return $this->belongsTo(Product::Class)->withTrashed();
    }

    public function insertFavorite($user_id, $product_id,$favorite) {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->favorite  = $favorite;
        return $this->save();
    }

    public static function updateFavorite($user_id,$product_id,$favorite) {
        $favorite_id = static::where('user_id', $user_id)->where('product_id', $product_id)->first();
        if (isset($favorite_id)) {
            $favorite_id->favorite = $favorite;
            return $favorite_id->save();
        } else {
            $insert = new Favorite();
            return $insert->insertFavorite($user_id,$product_id,$favorite);
        }
    }

    public static function deleteFavorite($product_id) {
        return static::where('product_id', $product_id)->delete();
    }

    public static function foundFavorite($user_id,$product_id) {
        $favorite = static::where('user_id', $user_id)->where('product_id', $product_id)->first();
        if (isset($favorite)) {
            return $favorite->id;
        } else {
            return 0;
        }
    }

}
