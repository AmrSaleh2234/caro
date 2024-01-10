<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model{

    protected $table = 'tags';
    protected $fillable = [
        'user_id','name','type','order_id','active'
    ];

    public function user() {
        return $this->belongsTo(User::Class);
    }

    public function taggable()
    {
        return $this->morphTo();
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'taggable');
    }

    public function categories()
    {
        return $this->morphedByMany(Category::class, 'taggable');
    }

    public function pages()
    {
        return $this->morphedByMany(Page::class, 'taggable');
    }

}
