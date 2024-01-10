<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::get('/privacy',function(){
//     return view('privacy');
// });
Route::get('privacy',[HomeController::class, 'privacy'])->name('privacy')->middleware('access.all.debug');
Route::get('/', function () {
    // return view('welcome');
})->name('home')->middleware('access.all.debug');
Route::get('/home', function () {
    // return redirect('');
})->middleware('access.all.debug');
Auth::routes([
    'verify' => false,
    //'register' => false,
    //'login' => false,
]);


