<?php

namespace App\Models;

trait LogTrait
{
    public function logs()
    {
        return $this->morphMany(Log::Class, 'loggable');
    }
}

