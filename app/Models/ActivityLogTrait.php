<?php

namespace App\Models;

trait ActivityLogTrait
{
    public function activityLogs()
    {
        return $this->morphMany(ActivityLog::Class, 'activityLoggable');
    }
}

