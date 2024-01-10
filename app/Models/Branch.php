<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use DB;

class Branch extends SiteModelSoftDelete {

    protected $table = 'branches';
    protected $fillable = [
        'user_id','name','content','image','order_id','region_id','city_id','country_id','address','latitude','longitude','polygon','active','type','phone','whatsapp'
    ];

    protected $casts = [
        'name' => 'array',
        'address' => 'array',
        'content' => 'array'
    ];
    public function country() {
        return $this->belongsTo(Country::Class);
    }

    public function city() {
        return $this->belongsTo(City::Class);
    }

    public function branch() {
        return $this->belongsTo(Branch::Class);
    }

    public function region() {
        return $this->belongsTo(Region::Class);
    }

    public function orders() {
        return $this->hasMany(Order::Class);
    }

    public function groups() {
        return $this->belongsToMany(Group::Class)->where('type','branches');
    }

    public function insertBranch($name,$content,$region_id,$city_id,$image,$type,$address,$latitude,$longitude,$active) {
        $this->name         = $name;
        $this->content      = $content;
        $this->region_id    = $region_id;
        $this->city_id      = $city_id;
        $this->image        = $image;
        $this->type         = $type;
        $this->address      = $address;
        $this->latitude     = $latitude;
        $this->longitude    = $longitude;
        $this->active       = $active;
        return $this->save();
    }

    public static function updateBranch($id,$name,$content,$region_id,$city_id,$image,$type,$address,$latitude,$longitude,$active) {
        $branches  = static::findOrFail($id);
        if(isset($branches)){
        $branches->name        = $name;
        $branches->content     = $content;
        $branches->region_id   = $region_id;
        $branches->city_id     = $city_id;
        $branches->address     = $address;
        $branches->image       = $image;
        $branches->type        = $type;
        $branches->latitude    = $latitude;
        $branches->longitude   = $longitude;
        $branches->active      = $active;
        return $branches->save();
        }
    }

    public static function deleteBranchCity($id,$city_id) {
        return static::where('id', $id)->where('city_id', $city_id)->delete();
    }

}
