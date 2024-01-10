<?php

namespace App\Models;

class Group extends SiteModel {

    protected $table = 'groups';
    protected $fillable = [
        'name','order_id','active','type'
    ];

    protected $casts = [
        'name' => 'array',
        // 'content' => 'array'
    ];

    public function users() {
        return $this->belongsToMany(User::Class);
    }

    public function coupons() {
        return $this->belongsToMany(Coupon::Class);
    }

    public function branches() {
        return $this->belongsToMany(Branch::Class);
    }

}

