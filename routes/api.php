<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PasswordResetController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('google/login', 'Auth\AuthController@googleLogin');
// Route::get('token/{provider}/login', 'Auth\AuthController@tokenLogin');
Route::group([
    'middleware' => ['locale', 'cors', 'json.response'],
    'as' => 'api.',
    // 'namespace' => 'Api',
], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');

    // Route::get('register', [AuthController::class, 'registerShow'])->name('register.show');
    Route::group([
        'prefix' => 'register',
        'as' => 'register.',
    ], function () {
        Route::post('', [AuthController::class, 'register'])->name('store');
        Route::post('check', [AuthController::class, 'checkUser'])->name('check');
        Route::get('country', [AuthController::class, 'country'])->name('country');
        Route::post('city', [AuthController::class, 'city'])->name('city');
    });

    // Route::group([
    //     'prefix' => 'sms',
    //     'as' => 'sms.',
    // ], function () {
    //     Route::post('send', [AuthController::class, 'smsSend'])->name('send');
    //     Route::post('code', [AuthController::class, 'smsCode'])->name('code');
    // });

    Route::group([
        'prefix' => 'password',
        'as' => 'password.',
    ], function () {
        Route::get('find/{token}', [PasswordResetController::class, 'find'])->name('find');
        Route::post('create', [PasswordResetController::class, 'create'])->name('create');
        Route::post('reset', [PasswordResetController::class, 'reset'])->name('reset');
    });
    Route::group([
        'middleware' => ['check.lastactive'],
    ], function () {
        Route::get('search', [ApiController::class, 'search'])->name('search');
        Route::get('home', [ApiController::class, 'home'])->name('home');

        Route::apiResource('branches', BranchController::class, ['only' => ['index', 'show']]);
        Route::apiResource('coupons', CouponController::class, ['only' => ['index', 'show', 'store']]);
        Route::apiResource('payments', PaymentController::class, ['only' => ['index', 'show']]);
        Route::apiResource('contacts', ContactController::class, ['except' => ['destroy', 'update']]);
        Route::apiResource('categories', CategoryController::class, ['only' => ['index', 'show']]);
        Route::apiResource('products', ProductController::class, ['only' => ['index', 'show']]);
        Route::apiResource('pages', PageController::class, ['only' => ['index', 'show']]);

        Route::group(['middleware' => 'auth:sanctum'], function () {
            Route::group([
                'prefix' => 'profile/change',
                'as' => 'profile.change.',
            ], function () {
                Route::post('branch', [ProfileController::class, 'changeBranch'])->name('branch');
                Route::post('address', [ProfileController::class, 'changeAddress'])->name('address');
                Route::post('image', [ProfileController::class, 'changeImage'])->name('image');
                Route::post('password', [ProfileController::class, 'changePassword'])->name('password');
                Route::post('lang', [ProfileController::class, 'changeLang'])->name('lang');
                Route::post('available', [ProfileController::class, 'changeAvailable'])->name('available');
                Route::post('location', [ProfileController::class, 'changeLocation'])->name('location');
            });
            Route::get('home/delivery', [ApiController::class, 'homeDelivery'])->name('home.delivery')->middleware('check.delivery');
            Route::get('home/store', [ApiController::class, 'homeStore'])->name('home.store')->middleware('check.store');

            Route::post('logout', [AuthController::class, 'logout'])->name('logout.token');
            Route::post('profile/delete', [ProfileController::class, 'delete'])->name('profile.deleteAccount');
            Route::apiResource('profile', ProfileController::class, ['except' => ['store']]);

            Route::apiResource('polishes', \App\Http\Controllers\Api\PolishesController::class, ['only' => ['index']]);
            Route::apiResource('services', \App\Http\Controllers\Api\ServicesController::class, ['only' => ['index']]);
            Route::apiResource('car-model', \App\Http\Controllers\Api\CarModelController::class, ['only' => ['index']]);
            Route::group(['prefix'=>'products','as'=>'products.'],function (){
               Route::get('get-by-service/{service}/{polish}/{carModel}',[ProductController::class,'getByService']) ->name('getByService');
            });

            Route::apiResource('orders', OrderController::class, ['except' => ['destroy', 'store']]);
            Route::apiResource('notifications', NotificationController::class, ['except' => ['store']]);
            Route::group(['middleware' => 'check.client'], function () {
                Route::apiResource('reviews', ReviewController::class, ['except' => ['destroy']]);
                Route::apiResource('favorites', FavoriteController::class);
                Route::apiResource('carts', CartController::class);
                Route::apiResource('addresses', AddressController::class);
            });
        });
    });
});
