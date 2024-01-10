<?php

namespace App\Http\Middleware;

use Closure;
use Debugbar;
use App\Traits\AdminHelperTrait;
use Illuminate\Support\Facades\DB;
use Barryvdh\Debugbar\Middleware\InjectDebugbar;

class AccessAllDebug extends InjectDebugbar{

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
        $setting = DB::table('settings')->whereIn('key', $this->setting_debug)->pluck('value', 'key')->toArray();
        $user_type_debug = explode(',', $setting['user_type_debug'] ?? '');
        $user_id_debug = explode(',', $setting['user_id_debug'] ?? '');
        $user = auth()->user();
        if (isset($user) && in_array($user->type,$user_type_debug) && in_array($user->id,$user_id_debug)) {
            \Debugbar::enable();
            config()->set('debugbar.enabled', true);
            config()->set('app.debug', true);
            app()->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }else{
            \Debugbar::disable();
            config()->set('debugbar.enabled', false);
            config()->set('app.debug', false);
            app()->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
        return parent::handle($request, $next);
    }

}
