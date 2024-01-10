<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class Slider extends SiteModelSoftDelete {

    protected $table = 'sliders';
    protected $fillable = [
        'user_id','name','link','type','slider_type','video','image','icon','title','content','order_id','parent_id','product_id','store_id','active',
    ];

    protected $casts = [
        'name' => 'array',
        'title' => 'array',
        'content' => 'array'
    ];

    public function metas() {
        return $this->morphMany(Meta::Class, 'metaable');
    }

    public function actions() {
        return $this->morphMany(Action::Class, 'actionable');
    }

    public function product()
    {
        return $this->belongsTo(Product::Class)->withTrashed();
    }

    public function store()
    {
        return $this->belongsTo(User::Class,'store_id')->withTrashed();
    }

    public function insertSlider($name, $image,$type,$slider_type,$content = NULL,$active = 1,$order_id = 1)  {
        $this->name = $name;
        $this->type = $type;
        $this->slider_type = $slider_type;
        $this->image = $image;
        $this->content = $content;
        $this->active = $active;
        $this->order_id = $order_id;
        return $this->save();
    }

    public static function updateSlider($id, $name, $image,$slider_type,$content = NULL,$active = 1,$order_id = 1) {
        $slider = static::findOrFail($id);
        $slider->name = $name;
        $slider->image = $image;
        $slider->slider_type = $slider_type;
        $slider->content = $content;
        $slider->active = $active;
        $slider->order_id = $order_id;
        return $slider->save();
    }

}

