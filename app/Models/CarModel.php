<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class CarModel extends SiteModel
{

    protected $table = 'car_models';
    protected $fillable = [
        'car_brand_id', 'name','active','order_id'
    ];

    protected $casts = [
        'name' => 'array',
    ];

    public function carBrand() {
        return $this->belongsTo(CarBrand::Class);
    }


}
