<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'home']);
Route::get('/courts', [FrontendController::class, 'courts']);
Route::get('/contact', [FrontendController::class, 'contact']);

/*
|--------------------------------------------------------------------------
| CUSTOMER
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile',
        [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile',
        [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile',
        [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | BOOKING
    |--------------------------------------------------------------------------
    */

    Route::get('/booking/{court}',
        [BookingController::class, 'create']);

    Route::post('/booking/{court}',
        [BookingController::class, 'store']);

    Route::get('/booking/{court}/slots',
        [BookingController::class, 'slots']);

    Route::get('/payment-success',
        [BookingController::class, 'paymentSuccess']);

    /*
    |--------------------------------------------------------------------------
    | MY BOOKINGS
    |--------------------------------------------------------------------------
    */

    Route::get('/my-bookings',
        [BookingController::class, 'myBookings']);

    Route::get('/my-bookings/{booking}/download',
        [BookingController::class, 'downloadInvoice'])->name('my-bookings.download');

    Route::get('/my-bookings/{booking}',
        [BookingController::class, 'show'])->name('my-bookings.show');

});

/*
|--------------------------------------------------------------------------
| SUPER ADMIN 
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'super_admin'])->prefix('admin')->group(function () {

    Route::resource('/users', UserController::class);

});

/*
|--------------------------------------------------------------------------
| ADMIN 
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard',
        [AdminController::class, 'dashboard']);

    /*
    |--------------------------------------------------------------------------
    | COURTS
    |--------------------------------------------------------------------------
    */

    Route::resource('/courts',
        CourtController::class);

    /*
    |--------------------------------------------------------------------------
    | BOOKINGS
    |--------------------------------------------------------------------------
    */

    Route::get('/bookings',
        [BookingController::class, 'index']);

    Route::get('/bookings/{booking}/status/{status}',
        [BookingController::class, 'updateStatus']
    );

    Route::get(
        '/bookings/{booking}/detail',
        [BookingController::class, 'adminShow']
    );

    Route::get(
        '/bookings/{booking}/invoice',
        [BookingController::class, 'adminInvoice']
    );

    Route::get(
        '/bookings/{booking}/download',
        [BookingController::class, 'adminDownloadInvoice']
    );

    Route::delete('/bookings/{booking}',
        [BookingController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | CALENDAR
    |--------------------------------------------------------------------------
    */

    Route::get('/calendar',
        [BookingController::class, 'calendar']);

    Route::get('/calendar/events',
        [BookingController::class, 'events']);

});


require __DIR__.'/auth.php';