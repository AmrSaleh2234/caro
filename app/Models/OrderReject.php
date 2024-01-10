<?php

namespace App\Models;

class OrderReject extends SiteModel {

    protected $table = 'order_rejects';
    protected $fillable = [
       'name','order_id','active'
    ];

    protected $casts = ['name' => 'array'];

    public function orders() {
        return $this->hasMany(Order::Class);
    }

}

