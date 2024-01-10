<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function unauthenticated($request, AuthenticationException $exception){
        if($request->expectsJson()){
            return response()->json(['status' => 'unauthenticated','message' => __('Please login')], 401);
        }
        return redirect()->guest('login');
    }

    public function unauthorized($request, AuthorizationException $exception){
        if($request->expectsJson()){
            return response()->json(['status' => 'unauthorized','message' => __("You don't have permission to do this")], 401);
        }
        return redirect()->guest('login');
    }
}
