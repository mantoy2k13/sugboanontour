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

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [CustomAuthController::class, 'dashboard']);     
    
    Route::get('files-upload', [MultiFileUploadController::class, 'index']);
        //add more Routes here
    Route::post('save-multiple-files', [MultiFileUploadController::class, 'store']);
    Route::get('cars', [CarsAjaxController::class, 'index']); 
    Route::post('cars-store', [CarsAjaxController::class, 'store']);
    Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
    Route::delete('cardelete/{id}', [CarsAjaxController::class, 'delete'])->name('cars.delete');
    
});

Route::get('findcars', [CarsAjaxController::class, 'findcars']); 
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');


    

Route::get('tourpackage/{id}', [MultiFileUploadController::class, 'tourpackage']);

Route::get('hotels', [HotelController::class, 'index']);

/*auth and login register*/

Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::post('booknow', [BookingController::class, 'store']);

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

// deleting tour packages
Route::delete('tours/{id}', [MultiFileUploadController::class, 'delete'])->name('tours.delete');
