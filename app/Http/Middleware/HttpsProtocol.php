<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Middleware;

use Closure,
    DB;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
        $ssl_certificate = DB::table('settings')->where('key', 'ssl_certificate')->value('value');
        if ($ssl_certificate != "yes") {
            $ssl_certificate = "no";
        }
        if (!$request->secure() && $ssl_certificate == 'yes') {
                return redirect()->secure($request->getRequestUri());
            }

            return $next($request);
    }
}

