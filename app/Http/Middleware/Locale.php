<?php

namespace App\Http\Middleware;

use Closure,
    DB;
use Illuminate\Support\Facades\Auth;

class Locale {

    /**
     * The availables languages.
     *
     * @array $languages
     */
    protected $languages = ['ar','en'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {

        if(auth('sanctum')->user()){
            $user = auth('sanctum')->user();
            app()->setLocale($user->locale);
        }elseif(auth()->guard($guard)->check()){
            $user = auth($guard)->user();
            app()->setLocale($user->locale);
        }else{
            $site_language = DB::table('settings')->where('key', 'site_language')->value('value');
            $language = ( in_array( $site_language, $this->languages) ) ? $site_language : "ar";
            app()->setLocale($language);
        }
        return $next($request);
    }

}
