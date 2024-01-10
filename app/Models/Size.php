<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
class Size extends SiteModelSoftDelete {

    protected $table = 'sizes';
    protected $fillable = [
        'name', 'order_id','active','service_id'
    ];
    protected $casts = ['name' => 'array'];

    public function products() {
        return $this->belongsToMany(Product::Class)->withTrashed();
    }

    public function insertSize($name,$order_id = 1,$active = 1) {
        $this->name         = $name;
        $this->order_id = $order_id;
        $this->active       = $active;
        return $this->save();
    }

    public static function updateSize($id, $name,$order_id =1 ,$active = 1) {

        $size = static::findOrFail($id);
        $size->name     = $name;
        $size->order_id = $order_id;
        $size->active   = $active;
        return $size->save();
    }

}

