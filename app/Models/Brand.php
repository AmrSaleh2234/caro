<?php

namespace App\Models;

class Brand extends SiteModel {

    protected $table = 'brands';
    protected $fillable = [
       'name','image','order_id','active'
    ];

    protected $casts = ['name' => 'array'];

    public function products() {
        return $this->hasMany(Product::Class);
    }

}

