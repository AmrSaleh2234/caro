<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class Service extends SiteModelSoftDelete {

    protected $table = 'services';
    protected $fillable = [
        'user_id','name','link','type','video','image','icon','title','content','order_id','parent_id','active',
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


}

