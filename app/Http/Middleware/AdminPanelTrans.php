<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminPanelTrans {

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
            if (!$user->isAbleTo(['translations.index'])) {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }

}
