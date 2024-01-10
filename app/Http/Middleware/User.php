<?php

namespace App\Http\Middleware;

use Closure;

class User {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $user = auth()->user();
        if (!$user->isAbleTo(['user','user-all','access-all'])) {
            return redirect()->route('admin.unauthorized');
        }
        return $next($request);
    }

}
