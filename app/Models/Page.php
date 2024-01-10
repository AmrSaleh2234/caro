<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class Page extends SiteModelSoftDelete {

    protected $table = 'pages';
    protected $fillable = [
        'user_id','name','link','type','page_type','video','image','icon','title','content','store_id','product_id','order_id','parent_id','active',
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

    public function user()
    {
        return $this->belongsTo(User::Class)->withTrashed();
    }

    public function insertPage($name, $image,$type,$page_type,$content = NULL,$active = 1,$order_id = 1)  {
        $this->name = $name;
        $this->type = $type;
        $this->page_type = $page_type;
        $this->image = $image;
        $this->content = $content;
        $this->active = $active;
        $this->order_id = $order_id;
        return $this->save();
    }

    public static function updatePage($id, $name, $image,$page_type,$content = NULL,$active = 1,$order_id = 1) {
        $page = static::findOrFail($id);
        $page->name = $name;
        $page->image = $image;
        $page->page_type = $page_type;
        $page->content = $content;
        $page->active = $active;
        $page->order_id = $order_id;
        return $page->save();
    }

}

