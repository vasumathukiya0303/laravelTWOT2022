<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sanctumUserController;
use App\Http\Controllers\GoogleController;
use Laravel\Socialite\Facades\Socialite;

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

Route::post("login",[sanctumUserController::class,'index']);

Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
//    Route::get('logout',[GoogleController::class,'logoutWithGoogle'])->name('logout');
});

Route::view('gview','login');
