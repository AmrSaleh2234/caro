<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\AdminHelperTrait;

class AccessAll {

    use AdminHelperTrait;
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
        if (!in_array($user->type,$this->access_all_type_sub) || !$user->isAbleTo($this->access_all_perms)) {
            return redirect()->route('admin.unauthorized');
        }
        return $next($request);
    }

}
