<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;

class AutoCheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route = $request->route()->getName();
        $route_admin = str_replace('admin.','',$route);
        $permission = Permission::whereRaw("FIND_IN_SET('$route_admin',name)")->first();
        if($permission)
        {
            if(!auth('web')->user()->isAbleTo($permission->name))
            {
                return redirect()->route('admin.unauthorized');
            }
        }
        return $next($request);
    }
}
