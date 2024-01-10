<?php

namespace App\Models;

trait FeatureTrait
{
    public function features() {
        return $this->morphToMany(Feature::class, 'featureable');
    }
}

