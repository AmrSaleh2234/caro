<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Illuminate\Support\Facades\Auth;

class SiteOpen {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {


        if (Auth::guard($guard)->check()) {
            $user = auth()->user();
            $site_open = DB::table('settings')->where('key', 'site_open')->value('value');
            if (!$user->isAbleTo(['access-all','sale-all', 'user-all', 'post-all','admin-panel']) && $site_open == "no") {
                return redirect()->route('close');
            }
        } else {
            $site_open = DB::table('settings')->where('key', 'site_open')->value('value');
            if ($site_open == "no") {
                return redirect()->route('close');
            }

        }
        return $next($request);
    }

}
