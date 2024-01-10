<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use DB;

class Country extends SiteModel {

    protected $table = 'countries';
    protected $fillable = [
       'name','code','image','phone_code','currency_id','currency_type','order_id','active'
    ];

    protected $casts = [
        'name' => 'array'
    ];

    public function currency() {
        return $this->belongsTo(Currency::Class);
    }

    public function users() {
        return $this->hasMany(User::Class);
    }

    public function orders() {
        return $this->hasMany(Order::Class);
    }

    public function addresses() {
        return $this->hasManyThrough(Address::Class,City::Class);
    }

    public function cities() {
        return $this->hasMany(City::Class);
    }

}
// countries
//     id - integer
//     name - string

// users
//     id - integer
//     country_id - integer
//     name - string

// products
//     id - integer
//     user_id - integer
//     title - string

//return $this->hasManyThrough(
//     'App\Product',
//     'App\User',
//     'country_id', // Foreign key on users table...
//     'user_id', // Foreign key on products table...
//     'id', // Local key on countries table...
//     'id' // Local key on users table...
// );

//return $this->belongsTo('\App\Models\User', 'foreign_key', 'other_key');
