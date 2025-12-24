<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MultiFileUploadController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CarsAjaxController;
use App\Http\Controllers\BookingVehicle;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\DB;
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

    $title = 'cebucarbnb';
    

    return view('welcome', compact('title'));
});

// Auth::routes();

Route::middleware(['auth'])->group(function () {


    Route::get('files-upload', [MultiFileUploadController::class, 'index']);
    //add more Routes here
    Route::post('save-multiple-files', [MultiFileUploadController::class, 'store']);
    Route::get('cars', [CarsAjaxController::class, 'index']);
    Route::get('cars/edit/{id}', [CarsAjaxController::class, 'edit']);
    Route::post('cars-store', [CarsAjaxController::class, 'store']);

    Route::post('car/update/{id}', [CarsAjaxController::class, 'update']);
    Route::post('car/updateall', [CarsAjaxController::class, 'updateall']);
    Route::delete('cardelete/{id}', [CarsAjaxController::class, 'delete'])->name('cars.delete');
    /*dashboard admin page */
    Route::get('bookinglist', [BookingVehicle::class, 'bookinglist']);
    Route::get('mybooking', [BookingVehicle::class, 'mybooking']);
    Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
    // scammer sa listahan
    Route::get('scammerlists',[MultiFileUploadController::class, 'scammerlists']);
});

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');

Route::get('findcars', [CarsAjaxController::class, 'findcars']);
Route::get('vehicle/{id}', [BookingVehicle::class, 'getvehicle']);
Route::post('bookingstore', [BookingVehicle::class, 'store']);
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('getinfo', [BookingController::class, 'getallinfo']);
Route::get('aboutus', [CustomAuthController::class, 'aboutus']);
Route::get('getallinfos', [BookingController::class, 'getallinfos']);

Route::get('tourpackage/{id}', [MultiFileUploadController::class, 'tourpackage']);

Route::get('cebutour', [HotelController::class, 'index']);
Route::get('contact', [BookingVehicle::class, 'contact']);
Route::post('addcontact', [BookingVehicle::class, 'addcontacts']);
/*auth and login register*/

Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::post('booknow', [BookingController::class, 'store']);
Route::get('srchlocation', [CarsAjaxController::class, 'srchlocation']);

/*Accomodations pages*/
Route::get('hotel/oslob', [HotelController::class, 'accomodation']);
Route::get('hotel/moalboal', [HotelController::class, 'moalboal']);
Route::get('hotel/santafe', [HotelController::class, 'santafe']);
/*end accomodations*/
// deleting tour packages
Route::delete('tours/{id}', [MultiFileUploadController::class, 'delete'])->name('tours.delete');
/*movies*/
// deleting contacts tours
Route::delete('usersdelete/{id}', [BookingController::class, 'delete']);

// for scammer page bad renters
Route::get('scammer', [MultiFileUploadController::class, 'scammer']);
Route::post('storescammer', [MultiFileUploadController::class, 'storescammer']);
Route::get('searchvehicle',[CarsAjaxController::class, 'searchvehicle']);