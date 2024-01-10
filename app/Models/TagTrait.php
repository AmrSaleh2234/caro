<?php

namespace App\Models;

trait TagTrait
{
    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

