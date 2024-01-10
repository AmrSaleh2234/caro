<?php

namespace App\Models;

class Unit extends SiteModel {

    protected $table = 'units';
    protected $fillable = [
       'name','image','order_id','active'
    ];

    protected $casts = ['name' => 'array'];

    public function products() {
        return $this->hasMany(Product::Class);
    }

}

