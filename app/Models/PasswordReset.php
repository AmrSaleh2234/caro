<?php

namespace App\Models;



class PasswordReset extends SiteModel
{
    protected $table = 'password_resets';
    protected $fillable = [
        'email', 'token'
    ];
}
