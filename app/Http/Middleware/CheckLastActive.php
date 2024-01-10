<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckLastActive
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(auth('sanctum')->user()){
            $user = auth('sanctum')->user();
            $user->last_active = Carbon::now();
            $user->save();
        }elseif(auth()->guard($guard)->check()){
            $user = auth($guard)->user();
            $user->last_active = Carbon::now();
            $user->save();
        }
        return $next($request);
    }
}
