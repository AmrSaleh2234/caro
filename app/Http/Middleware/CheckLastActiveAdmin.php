<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckLastActiveAdmin
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
        if(auth()->guard($guard)->check()){
            $user = auth($guard)->user();
            $user->last_active = Carbon::now();
            $user->save();
        }
        else {
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
