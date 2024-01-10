<?php

namespace App\Models;

class Currency extends SiteModel {

    protected $table = 'currencies';
    protected $fillable = [
       'name','code','order_id','active',
    ];

    protected $casts = [
        'name' => 'array'
    ];

    public function countries() {
        return $this->hasMany(Country::Class);
    }

}

