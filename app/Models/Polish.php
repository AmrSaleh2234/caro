<?php

namespace App\Models;

class Polish extends SiteModel {

    protected $table = 'polishes';
    protected $fillable = [
       'name','image','order_id','active'
    ];


    protected $casts = ['name' => 'array'];

    public function products() {
        return $this->hasMany(Product::Class);
    }

}

