<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use DB;

class Address extends SiteModel {

    protected $table = 'addresses';
    protected $fillable = [
       'user_id','region_id','city_id','address','type','latitude','longitude','geo_address','geo_state','geo_city','place_id','postal_code',
       'building','floor','apartment','additional_info'
    ];

    public function user() {
        return $this->belongsTo(User::Class)->withTrashed();
    }

    public function userAddress() {
        return $this->hasOne(User::Class);
    }

    public function city() {
        return $this->belongsTo(City::Class);
    }

    public function region() {
        return $this->belongsTo(Region::Class);
    }

    public function insertAddress($user_id,$region_id,$city_id,$address,$type,$latitude,$longitude) {
        $this->user_id      = $user_id;
        $this->region_id    = $region_id;
        $this->city_id      = $city_id;
        $this->address      = $address;
        $this->type         = $type;
        $this->latitude     = $latitude;
        $this->longitude    = $longitude;
        return $this->save();
    }

    public function insertAddressGeo($user_id,$region_id,$city_id,$address,$type,$latitude,$longitude,$geo_address,$geo_state,$geo_city,$place_id,$postal_code) {
        $this->user_id      = $user_id;
        $this->region_id    = $region_id;
        $this->city_id      = $city_id;
        $this->address      = $address;
        $this->type         = $type;
        $this->latitude     = $latitude;
        $this->longitude    = $longitude;
        $this->geo_address  = $geo_address;
        $this->geo_state    = $geo_state;
        $this->geo_city     = $geo_city;
        $this->place_id     = $place_id;
        $this->postal_code     = $postal_code;
        return $this->save();
    }

    public static function updateAddress($id,$user_id,$geo_address,$geo_state,$geo_city,$place_id,$postal_code) {
        $addresses  = self::where('user_id', $user_id)->where('id', $id)->first();
        if(isset($addresses)){
        $addresses->geo_address  = $geo_address;
        $addresses->geo_state    = $geo_state;
        $addresses->geo_city     = $geo_city;
        $addresses->place_id     = $place_id;
        $addresses->postal_code     = $postal_code;
        return $addresses->save();
        }
    }

    public static function updateAddressUser($id,$user_id,$region_id,$city_id,$address,$type,$latitude,$longitude,$geo_address,$geo_state,$geo_city,$place_id,$postal_code) {
        $addresses  = self::where('user_id', $user_id)->where('id', $id)->first();
        if(isset($addresses)){
            $addresses->region_id   = $region_id;
            $addresses->city_id     = $city_id;
            $addresses->address     = $address;
            $addresses->type        = $type;
            $addresses->latitude    = $latitude;
            $addresses->longitude    = $longitude;
            $addresses->geo_address  = $geo_address;
            $addresses->geo_state    = $geo_state;
            $addresses->geo_city     = $geo_city;
            $addresses->place_id     = $place_id;
            $addresses->postal_code     = $postal_code;
        return $addresses->save();
        }
    }

    public static function deleteAddress($id,$user_id) {
        return static::where('id', $id)->where('user_id', $user_id)->delete();
    }

    public static function deleteAddressCity($id,$user_id,$city_id) {
        return static::where('id', $id)->where('user_id', $user_id)->where('city_id', $city_id)->delete();
    }

    public static function foundAddress($user_id,$city_id,$region_id,$address) {
        $addresses  = static::where('user_id', $user_id)->where('city_id', $city_id)->where('region_id', $region_id)->where('address', $address)->first();
        if (isset($addresses)) {
            return $addresses->id;
        }  else {
            return 0;
        }
    }

    public static function foundAddressLat($user_id,$city_id,$region_id,$latitude,$longitude) {
        $addresses  = static::where('user_id', $user_id)->where('city_id', $city_id)->where('region_id', $region_id)->where('latitude', $latitude)->where('longitude', $longitude)->first();
        if (isset($addresses)) {
            return $addresses->id;
        }  else {
            return 0;
        }
    }

    public function setAsDefault()
    {
        $this->user->update([
            'address_id' => $this->id
        ]);
        return $this->refresh();
    }

    public function doesBelongToCurrentUser()
    {
        return $this->user->is(auth()->user());
    }



}
//return $this->belongsTo('\App\Models\User', 'foreign_key', 'other_key');
