<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('editprofile/{id}',[CustomAuthController::class, 'edit'])->name('editprofile');
    Route::post('editprofiles/{id}',[CustomAuthController::class, 'editProfile'])->name('editprofiles');
    Route::post('editpassword',[UserController::class, 'updateEditPassword'])->name('editpassword');
    Route::delete('deleteprofile/{id}',[UserController::class, 'deleteProfile'])->name('deleteprofile');
});

Route::middleware(['auth','is_admin'])->group(function (){
    Route::get('userslist',[AdminController::class, 'userList'])->name('userslist');
    Route::get('showprofile/{id}',[AdminController::class, 'showAdminProfile'])->name('showprofile');
    Route::get('admindashboard/{id}',[AdminController::class, 'adminDashboard'])->name('admindashboard');
});

//Custom Controller
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::post('signout', [CustomAuthController::class, 'signOut'])->name('signout');

//User Controller
Route::get('forgot-passwords', [UserController::class, 'forgotPassword'])->name('forgot-password');
Route::get('forgot-password/{token}', [UserController::class, 'forgotPasswordValidate']);
Route::post('forgot-passwords', [UserController::class, 'resetPassword'])->name('forgot-password');
Route::put('reset-password', [UserController::class, 'updatePassword'])->name('reset-password');

//check is_admin
Route::get('admin', [CustomAuthController::class, 'adminHome'])->name('admin')->middleware('is_admin');


