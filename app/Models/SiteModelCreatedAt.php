<?php

namespace App\Models;



class SiteModelCreatedAt extends SiteModel {

    protected $dates = ['created_at'];
    public function __construct(array $attributes = [])
    {
            parent::__construct($attributes);

            $this->attributes['created_at'] = $this->freshTimestamp();
    }
}
