<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PointController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdditionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FavoriteController;
use App\Http\Controllers\Auth\LoginAdminController;
use App\Http\Controllers\Admin\AjaxStatusController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderRejectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// $admin_url = DB::table('settings')->where('key', 'admin_url')->value('value');
// if ($admin_url == '' || $admin_url == null) {
$admin_url = 'admin';
// }

Route::group([
    'middleware' => ['locale.admin', 'access.all.debug'],
    // 'namespace' => 'Auth',
], function () use ($admin_url) {
    // Auth Admin
    Route::get($admin_url . '/login',[LoginAdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post($admin_url . '/login',[LoginAdminController::class, 'login'])->name('admin.login.save')->middleware("throttle:5,1");
    Route::post($admin_url . '/logout',[LoginAdminController::class, 'logout'])->name('admin.logout');
});

// $languages = ["en", "ar"];
Route::group([
    'prefix' => $admin_url,
    'as' => 'admin.',
    // 'namespace' => 'Admin',
   'middleware' => ['admin', 'site.open','locale.admin','auto-check-permission', 'access.all.debug']
], function () {
    //Setting
    Route::group([
        'prefix' => 'settings',
        'as' => 'settings.',
        'middleware' => ['access.all']
    ], function () {
        Route::get('',[SettingController::class, 'setting'])->name('index');
        Route::post('',[SettingController::class, 'settingStore'])->name('store');
        // Route::get('social',[SettingController::class, 'social'])->name('social');
        // Route::post('social',[SettingController::class, 'socialStore'])->name('social.store');
        // Route::get('about',[SettingController::class, 'about'])->name('about');
        // Route::post('about',[SettingController::class, 'aboutStore'])->name('about.store');
    });
    //Unauthorized && 404
    Route::get('404',[AdminController::class, 'pageError'])->name('404');
    Route::get('unauthorized',[AdminController::class, 'pageUnauthorized'])->name('unauthorized');
    Route::get('',[SettingController::class, 'homeAdmin'])->name('index');
    Route::get('statistics',[SettingController::class, 'statistics'])->name('statistics');

    Route::get('users/trash',[UserController::class, 'trash'])->name('users.trash');
    Route::delete('users/{id}/restore',[UserController::class, 'restore'])->name('users.restore');
    // Route::delete('users/{id}/delete',[UserController::class, 'delete'])->name('users.delete');

    Route::get('categories/trash',[CategoryController::class, 'trash'])->name('categories.trash');
    Route::delete('categories/{id}/restore',[CategoryController::class, 'restore'])->name('categories.restore');
    // Route::delete('categories/{id}/delete',[CategoryController::class, 'delete'])->name('categories.delete');

    Route::get('products/trash',[ProductController::class, 'trash'])->name('products.trash');
    Route::delete('products/{id}/restore',[ProductController::class, 'restore'])->name('products.restore');
    // Route::delete('products/{id}/delete',[ProductController::class, 'delete'])->name('products.delete');

    Route::post('regions/status',[AjaxStatusController::class, 'regionStatus'])->name('regions.status');
    Route::post('cities/status',[AjaxStatusController::class, 'cityStatus'])->name('cities.status');
    Route::post('branches/status',[AjaxStatusController::class, 'branchStatus'])->name('branches.status');
    Route::post('groups/status',[AjaxStatusController::class, 'groupStatus'])->name('groups.status');

    Route::resource('branches',BranchController::class, ['except' => ['destroy']]);
    Route::resource('groups',GroupController::class, ['except' => ['destroy']]);
    Route::resource('cities',CityController::class, ['except' => ['destroy']]);
    Route::resource('regions',RegionController::class, ['except' => ['destroy']]);

    Route::resource('roles',RoleController::class, ['except' => ['destroy', 'show']]);

    Route::get('users/{id}/edit',[UserController::class, 'edit'])->name('users.edit');
    Route::patch('users/{id}/update',[UserController::class, 'update'])->name('users.update');
    Route::get('users/type/{type}',[UserController::class, 'type'])->name('users.type');
    Route::get('users/social/{type}',[UserController::class, 'social'])->name('users.social.type');
    Route::get('users/device/{type}',[UserController::class, 'device'])->name('users.device.type');
    Route::post('users/status',[AjaxStatusController::class, 'userStatus'])->name('users.status');
    Route::resource('users',UserController::class, ['except' => ['edit', 'update']]);

    Route::post('contacts/read',[AjaxStatusController::class, 'contactRead'])->name('contacts.read');
    Route::post('contacts/status',[AjaxStatusController::class, 'contactStatus'])->name('contacts.status');
    Route::resource('contacts',ContactController::class, ['except' => ['create','store', 'destroy']]);

    Route::post('payments/status',[AjaxStatusController::class, 'paymentStatus'])->name('payments.status');
    Route::resource('payments',PaymentController::class, ['except' => ['destroy']]);

    Route::post('coupons/status',[AjaxStatusController::class, 'couponStatus'])->name('coupons.status');
    Route::post('coupons/finish',[AjaxStatusController::class, 'couponFinish'])->name('coupons.finish');
    Route::post('reviews/status',[AjaxStatusController::class, 'reviewStatus'])->name('reviews.status');

    Route::resource('coupons',CouponController::class, ['except' => ['destroy']]);
    Route::resource('reviews',ReviewController::class, ['except' => ['create','store']]);
    Route::resource('favorites',FavoriteController::class, ['only' => ['index']]);

    Route::post('orders/type/{type}',[OrderController::class, 'type'])->name('orders.type');
    Route::post('orders/cancel/{id}',[OrderController::class, 'orderCancel'])->name('orders.cancel');
    Route::get('orders/print/{id}',[OrderController::class, 'print'])->name('orders.print');
    Route::post('orders/status',[AjaxStatusController::class, 'orderStatus'])->name('orders.status');
    Route::post('order_rejects/status',[AjaxStatusController::class, 'orderRejectStatus'])->name('order_rejects.status');

    Route::resource('order_rejects',OrderRejectController::class);
    Route::resource('orders',OrderController::class, ['only' => ['index', 'show','edit', 'update']]);
    Route::resource('wallets',WalletController::class, ['only' => ['index', 'create', 'store']]);
    Route::resource('points',PointController::class, ['only' => ['index', 'create', 'store']]);
    Route::resource('addresses',AddressController::class);

    Route::get('notifications/delete',[NotificationController::class, 'delete'])->name('notifications.delete');
    Route::resource('notifications',NotificationController::class, ['only' => ['index', 'create','store']]);

    Route::post('additions/status',[AjaxStatusController::class, 'additionStatus'])->name('additions.status');
    Route::post('categories/status',[AjaxStatusController::class, 'categoryStatus'])->name('categories.status');
    Route::post('sizes/status',[AjaxStatusController::class, 'sizeStatus'])->name('sizes.status');
    Route::post('units/status',[AjaxStatusController::class, 'unitStatus'])->name('units.status');
    Route::post('brands/status',[AjaxStatusController::class, 'brandStatus'])->name('brands.status');
    Route::post('pages/status',[AjaxStatusController::class, 'pageStatus'])->name('pages.status');
    Route::post('products/status',[AjaxStatusController::class, 'productStatus'])->name('products.status');
    Route::post('products/code',[AjaxStatusController::class, 'productCode'])->name('products.code');
    Route::post('products/max',[AjaxStatusController::class, 'productMax'])->name('products.max');
    Route::post('products/filter',[AjaxStatusController::class, 'productFilter'])->name('products.filter');
    Route::post('products/feature',[AjaxStatusController::class, 'productFeature'])->name('products.feature');
    Route::post('products/price',[AjaxStatusController::class, 'productPrice'])->name('products.price');
    Route::post('products/offer',[AjaxStatusController::class, 'productOffer'])->name('products.offer');
    Route::post('products/sale',[AjaxStatusController::class, 'productSale'])->name('products.sale');

    Route::resource('additions',AdditionController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('sizes',SizeController::class);
    Route::resource('units',UnitController::class);
    Route::resource('brands',BrandController::class);
    Route::resource('pages',PageController::class);
    Route::resource('products',ProductController::class);
});

Route::group([
    'prefix' => $admin_url,
    'as' => 'admin.',
    'middleware' => ['admin', 'site.open', 'locale.admin', 'access.all.debug', 'access.all.dev'],
], function () {
    Route::get('key/generate',[AdminController::class, 'getKeyGenerate'])->name('key.generate');
    Route::get('optimize',[AdminController::class, 'getOptimize'])->name('optimize');
    Route::get('optimize/clear',[AdminController::class, 'getOptimizeClear'])->name('optimize.clear');
});
