<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckClient
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
        $user = NULL;
        if(auth('sanctum')->user()){
            $user = auth('sanctum')->user();
        }elseif(auth()->guard($guard)->check()){
            $user = auth($guard)->user();
        }
        else {
            return response()->json(['status' => 'unauthenticated', 'message' => __('Please login')], 401);
        }
        if(isset($user) &&  $user->is_client == 0){
            return response()->json(['status' => 'unauthenticated', 'message' => __('Please login')], 401);
        }
        return $next($request);
    }
}
