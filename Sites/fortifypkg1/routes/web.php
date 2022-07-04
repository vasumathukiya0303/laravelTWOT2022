<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('home', 'home')->name('home');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('home', 'home')->name('home');

    Route::view('profile','profile')->name('profile');
});

Route::get('helper', function(){
    $imageName = 'example.png';
    $fullpath = productImagePath($imageName);

    dd($fullpath);
});

Route::get('helper2', function(){
    $newDateFormat = changeDateFormate(date('Y-m-d'),'m/d/Y');

    dd($newDateFormat);
});
