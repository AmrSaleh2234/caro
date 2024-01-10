<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\AdminHelperTrait;
class AccessAllDev {

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
        if (isset($user) && in_array($user->type,$this->access_all_type) && in_array($user->id,$this->access_all_id) && $user->isAbleTo($this->access_all_perms)) {
        }else{
            return redirect()->route('admin.unauthorized');
        }
        return $next($request);
    }

}
