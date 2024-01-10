<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;


use DB;

class Region extends SiteModel {

    protected $table = 'regions';
    protected $fillable = [
        'city_id','name','shipping','order_id','active','latitude','longitude','polygon'
        // ,'content'
    ];

    protected $casts = [
        'name' => 'array',
        // 'content' => 'array'
    ];

    public function city() {
        return $this->belongsTo(City::Class);
    }

    public function insertRegion($city_id,$name,$shipping = 0,$active = 1,$order_id = 1) {
        $this->city_id = $city_id;
        $this->name = $name;
        $this->shipping = $shipping;
        $this->order_id = $order_id;
        $this->active = $active;
        return $this->save();
    }

    public static function updateRegion($id,$city_id,$name,$shipping = 0,$active = 1,$order_id = 1) {
        $region = static::findOrFail($id);
        $region->city_id = $city_id;
        $region->name = $name;
        $region->shipping = $shipping;
        $region->order_id = $order_id;
        $region->active = $active;
        return $region->save();
    }

}
