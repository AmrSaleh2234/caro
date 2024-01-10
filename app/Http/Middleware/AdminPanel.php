<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Traits\AdminHelperTrait;

class AdminPanel {

    use AdminHelperTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {

        if (Auth::guard($guard)->check()) {
            $user = auth($guard)->user();
            if (!$user->isAbleTo($this->admin_perms_models)) {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('admin.login');
        }


        // if (!Auth::guard($guard)->check()) {
        //     return redirect()->route('admin.login');
        // }
        return $next($request);
    }

}
