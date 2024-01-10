<?php

namespace App\Models;

use DB;
use Laratrust\Models\LaratrustRole;
class Role extends LaratrustRole

{

    protected $fillable = [
        'name', 'display_name', 'description',
    ];
   public static function getRoleCount($role_id = 1) {
        return DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->where('role_user.role_id',$role_id)
        ->groupBy('role_user.role_id')
        ->count();
    }
}
