<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Members;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\treeController;
use App\Http\Controllers\BlogController;

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

Route::get('list',[Members::class,'dbOperation']);

Auth::routes(['verify' => true] );

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth','verified'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::view('add','addmember');
Route::post('add',[MemberController::class, 'addData']);

Route::get('/blogs/{id}', [BlogController::class,'index']);

Route::post('/blogs/update/{id}', [BlogController::class,'update']);

Route::delete('/blogs/delete/{id}', [BlogController::class,'delete']);

Route::get('tree',[treeController::class,'index']);


