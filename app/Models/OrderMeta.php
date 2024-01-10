<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;


class OrderMeta extends SiteModel {

    protected $table = 'order_metas';
    protected $fillable = [
        'order_id','name','phone','email','address','geo_address','latitude','longitude',
    ];

    public function order()
    {
        return $this->belongsTo(Order::Class);
    }

    public function insertMeta($order_id,$name = NULL,$phone = NULL,$email = NULL,$address = NULL,$geo_address = NULL,$latitude = NULL,$longitude = NULL) {

        $this->order_id = $order_id;
        $this->name     = $name;
        $this->phone    = $phone;
        $this->email    = $email;
        $this->address  = $address;
        $this->geo_address  = $geo_address;
        $this->latitude  = $latitude;
        $this->longitude  = $longitude;
        return $this->save();
    }

    public static function updateMeta($id,$name = NULL,$phone = NULL,$email = NULL,$address = NULL,$geo_address = NULL,$latitude = NULL,$longitude = NULL) {
        $meta = static::findOrFail($id);
        $meta->name     = $name;
        $meta->phone    = $phone;
        $meta->email    = $email;
        $meta->address  = $address;
        $meta->geo_address  = $geo_address;
        $meta->latitude  = $latitude;
        $meta->longitude  = $longitude;
        return $meta->save();
    }

}
