<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MyPageController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'user'], function() {
    // guest → 認証済みのユーザーを指す
    Route::group(['middleware' => 'guest'], function() {
        Route::get('/signup', [UserController::class, 'getSignup'])->name('user.signup');
        Route::post('/signup', [UserController::class, 'postSignup'])->name('user.signup');
        Route::get('/signin', [UserController::class, 'getSignin'])->name('user.signin');
        Route::post('/signin', [UserController::class, 'postSignin'])->name('user.signin');
        Route::get('/logout', [UserController::class, 'getLogout'])->name('user.logout');
    });

    // 直リンクされてもページ表示させないようにmiddlewareで制限
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/profile', [UserController::class, 'getProfile'])->name('user.profile');
        Route::get('/logout', [UserController::class, 'getLogout'])->name('user.logout');
    });

    Route::get('user/twitter', [AuthController::class, 'redirectToProvider'])->name('user.twitter');

    Route::get('user/twitter/callback', [AuthController::class, 'handleProviderCallback']);

});
