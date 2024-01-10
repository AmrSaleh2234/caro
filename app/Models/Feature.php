<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Feature extends Model {

    protected $table = 'features';
    protected $fillable = [
        'user_id','name','type','order_id','active'
    ];

    public function user() {
        return $this->belongsTo(User::Class);
    }

    public function featureable()
    {
        return $this->morphTo();
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'featureable');
    }

    public function categories()
    {
        return $this->morphedByMany(Category::class, 'featureable');
    }

    public function pages()
    {
        return $this->morphedByMany(Page::class, 'featureable');
    }
}
