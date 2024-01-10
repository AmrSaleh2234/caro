<?php

namespace App\Models;

class Color extends SiteModel {

    protected $table = 'colors';
    protected $fillable = [
       'name','color','order_id','active'
    ];

    protected $casts = ['name' => 'array'];

    public function products() {
        return $this->hasMany(Product::Class);
    }

}

