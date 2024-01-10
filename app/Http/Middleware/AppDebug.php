<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;
use Barryvdh\Debugbar\Middleware\InjectDebugbar;

class AppDebug extends InjectDebugbar{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $app_debug = Setting::where('key', 'app_debug')->value('value');
        if ($app_debug != "yes") {
            $app_debug = "no";
        }
        if ($app_debug == "yes") {
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


// public function handle($request, Closure $next,$guard = null) {
//     $app_debug = Setting::where('key', 'app_debug')->value('value');
//     if ($app_debug != "yes") {
//         $app_debug = "no";
//     }
//     $setting = Setting::whereIn('key', $this->setting_debug)->pluck('value', 'key')->toArray();
//     $user_type_debug = explode(',', $setting['user_type_debug'] ?? '');
//     $user_id_debug = explode(',', $setting['user_id_debug'] ?? '');
//     $user_type = $user_id = $user = NULL;
//     if (Auth::guard($guard)->check()) {
//         $user = auth()->user();
//         $user_type = $user->type;
//         $user_id = $user->id;
//     }
//     if ($app_debug == "yes" || (isset($user) && in_array($user_type,$user_type_debug) && in_array($user_id,$user_id_debug))) {
//         \Debugbar::enable();
//         config()->set('debugbar.enabled', true);
//         config()->set('app.debug', true);
//         app()->register(\Barryvdh\Debugbar\ServiceProvider::class);
//     }else{
//         \Debugbar::disable();
//         config()->set('debugbar.enabled', false);
//         config()->set('app.debug', false);
//         app()->register(\Barryvdh\Debugbar\ServiceProvider::class);
//     }
//     return parent::handle($request, $next);
// }
