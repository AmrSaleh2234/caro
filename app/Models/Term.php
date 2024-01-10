<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Term extends Model {

    protected $table = 'terms';
    protected $fillable = [
        'user_id','name','type','order_id','active'
    ];

    public function user() {
        return $this->belongsTo(User::Class);
    }

    public function termable()
    {
        return $this->morphTo();
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'termable');
    }

    public function categories()
    {
        return $this->morphedByMany(Category::class, 'termable');
    }

    public function pages()
    {
        return $this->morphedByMany(Page::class, 'termable');
    }
}
