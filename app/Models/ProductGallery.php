<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;


class ProductGallery extends SiteModel {

    protected $table = 'product_galleries';
    public $timestamps = false;

    protected $fillable = [
         'product_id','image'
    ];

    public function product()
    {
        return $this->belongsTo(Product::Class)->withTrashed();
    }

    public function insertProductGallery($product_id, $image) {
        $this->product_id = $product_id;
        $this->image  = $image;
        return $this->save();
    }

    public static function foundProductGallery($product_id, $image) {

        $gallery  = self::where('product_id', $product_id)->where('image', $image)->first();
        if (isset($gallery)) {
            return 1;
        }  else {
            return 0;
        }
    }

    public static function deleteProduct($product_id) {
        return static::where('product_id', $product_id)->delete();
    }

}
