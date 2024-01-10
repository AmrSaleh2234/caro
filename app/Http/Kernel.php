<?php

namespace App\Http;

use App\Http\Middleware\Cors;
use App\Http\Middleware\Locale;
use App\Http\Middleware\AppDebug;
use App\Http\Middleware\SiteOpen;
use App\Http\Middleware\AccessAll;
use App\Http\Middleware\AdminPanel;
use App\Http\Middleware\CheckClient;
use App\Http\Middleware\LocaleAdmin;
use App\Http\Middleware\AccessAllDev;
use App\Http\Middleware\CheckDelivery;
use App\Http\Middleware\HttpsProtocol;
use App\Http\Middleware\AccessAllDebug;
use App\Http\Middleware\AdminPanelTrans;
use App\Http\Middleware\CheckLastActive;
use App\Http\Middleware\ForceJsonResponse;
use App\Http\Middleware\AutoCheckPermission;
use App\Http\Middleware\CheckLastActiveAdmin;
use App\Http\Middleware\CheckNotClient;
use App\Http\Middleware\CheckStore;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        HttpsProtocol::class,

    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'role' => \Laratrust\Middleware\LaratrustRole::class,
        'permission' => \Laratrust\Middleware\LaratrustPermission::class,
        'ability' => \Laratrust\Middleware\LaratrustAbility::class,
        'access.all' => AccessAll::class,
        'access.all.dev' => AccessAllDev::class,
        'access.all.debug' => AccessAllDebug::class,
        'app.debug' => AppDebug::class,
        'admin' => AdminPanel::class,
        'admin.trans' => AdminPanelTrans::class,
        'check.client' => CheckClient::class,
        'check.not.client' => CheckNotClient::class,
        'check.store' => CheckStore::class,
        'check.delivery' => CheckDelivery::class,
        'check.lastactive' => CheckLastActive::class,
        'check.lastactive.admin' => CheckLastActiveAdmin::class,
        'locale' => Locale::class,
        'locale.admin' => LocaleAdmin::class,
        'site.open' => SiteOpen::class,
        'auto-check-permission' => AutoCheckPermission::class,
        'cors' => Cors::class,
        'json.response' => ForceJsonResponse::class,
    ];
}
