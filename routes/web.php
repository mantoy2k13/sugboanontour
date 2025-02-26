<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MultiFileUploadController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CarsAjaxController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GoogleAuthController;

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
    $homepage = 'homepage';
    return view('welcome', compact('homepage'));
});
// Auth::routes();

Route::get('files-upload', [MultiFileUploadController::class, 'index']);


Route::get('tourpackage/{id}', [MultiFileUploadController::class, 'tourpackage']);
Route::post('save-multiple-files', [MultiFileUploadController::class, 'store']);
Route::get('hotels', [HotelController::class, 'index']);

/*auth and login register*/
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::post('booknow', [BookingController::class, 'store']);
Route::resource('cars', CarsAjaxController::class);
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);