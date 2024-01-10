<?php

namespace App\Models;

trait TermTrait
{
    public function terms() {
        return $this->morphToMany(Term::class, 'termable');
    }
}

