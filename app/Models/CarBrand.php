<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class CarBrand extends SiteModel
{

    protected $table = 'car_brands';
    protected $fillable = [
        'name', 'image','active','order_id'
    ];

    protected $casts = [
        'name' => 'array',
    ];
    public function carModels() {
        return $this->hasMany(CarModel::Class);
    }
}
