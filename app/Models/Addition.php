<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use DB;

class Addition extends SiteModelSoftDelete {

    protected $table = 'additions';
    protected $fillable = [
        'name','type','price','image','order_id','active'
    ];
    //'options'

    protected $casts = [
        'name' => 'array',
    ];

    public function products() {
        return $this->belongsToMany(Product::Class)->withTrashed();
    }

    public function cartItemAdditions() {
        return $this->belongsToMany(CartItemAddition::Class);
    }

    public function orderItemAdditions() {
        return $this->belongsToMany(OrderItemAddition::Class);
    }

}

//return $this->belongsTo('\App\Models\User', 'foreign_key', 'other_key');
