<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use DB;

class City extends SiteModel {

    protected $table = 'cities';
    protected $fillable = [
       'name','country_id','shipping','order_id','active','latitude','longitude','polygon'
    ];

    protected $casts = [
        'name' => 'array',
        // 'content' => 'array'
    ];

    public function users() {
        return $this->hasMany(User::Class);
    }

    public function orders() {
        return $this->hasMany(Order::Class);
    }

    public function addresses() {
        return $this->hasMany(Address::Class);
    }

    public function country() {
        return $this->belongsTo(Country::Class);
    }


    public function insertCity($name,$country_id,$active = 1,$order_id = 1) {
        $this->name = $name;
        $this->country_id = $country_id;
        $this->order_id = $order_id;
        $this->active = $active;
        return $this->save();
    }

    public static function updateCity($id,$name,$country_id,$active = 1,$order_id = 1) {
        $city = static::findOrFail($id);
        $city->name = $name;
        $city->country_id = $country_id;
        $city->order_id = $order_id;
        $city->active = $active;
        return $city->save();
    }

}

