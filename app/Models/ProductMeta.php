<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;


class ProductMeta extends SiteModel {

    protected $table = 'product_metas';
    protected $fillable = [
         'product_id','type', 'key', 'value', 'group','parent_id'
    ];

    public function childrens() {
        return $this->hasMany(ProductMeta::Class, 'parent_id');
    }

    public function parent() {
        return $this->belongsTo(ProductMeta::Class, 'parent_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::Class)->withTrashed();
    }

    public function insertProductMeta($product_id, $type, $key, $value , $group = NULL,$parent_id = NULL) {

        $this->product_id = $product_id;
        $this->type  = $type;
        $this->key   = $key;
        $this->value = $value;
        $this->group = $group;
        $this->parent_id  = $parent_id;
        return $this->save();
    }

    public function updateProductMeta($product_id,$type, $key, $value,$group = NULL,$parent_id = NULL) {
        $meta = static::where('product_id', $product_id)->where('type', $type)->first();
        if (isset($meta)) {
            $meta->key   = $key;
            $meta->value = $value;
            $meta->group = $group;
            $meta->parent_id  = $parent_id;
            return $meta->save();
        } else {
            $insert =  new ProductMeta();
            return $insert->insertProductMeta($product_id, $type, $key, $value,$group,$parent_id);
        }
    }

    public static function deleteProductMeta($product_id) {
        return static::where('product_id', $product_id)->delete();
    }

    public static function deleteProductMetaType($product_id,$type) {
        return static::where('product_id', $product_id)->where('type', $type)->delete();
    }

}
