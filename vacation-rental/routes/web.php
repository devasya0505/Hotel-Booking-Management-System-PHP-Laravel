<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hotels\HotelsController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Test route - remove this later
Route::get('/test', function () {
    return 'Laravel is working!';
});

// If using Laravel 8 or above, make sure to install laravel/ui and run auth scaffolding:
// composer require laravel/ui
// php artisan ui vue --auth
// Or define authentication routes manually as needed.

// Auth::routes(); // Uncomment if using laravel/ui package

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

if (class_exists(\Illuminate\Support\Facades\Auth::class) && method_exists(Auth::class, 'routes')) {
    Auth::routes();
}

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//hotels
Route::get('hotels/rooms/{id}', [App\Http\Controllers\Hotels\HotelsController::class, 'rooms'])->name('hotel.rooms');

Route::get('hotels/rooms-details/{id}', [App\Http\Controllers\Hotels\HotelsController::class, 'roomsDetails'])->name('hotel.rooms.details');

Route::post('hotels/rooms-booking/{id}', [App\Http\Controllers\Hotels\HotelsController::class, 'roomsBooking'])->name('hotel.rooms.booking');

// // //pay
// Route::get('hotels/pay', [App\Http\Controllers\Hotels\HotelsController::class, 'payWithPayPal'])->name('hotel.pay');

// Route::get('hotels/success', [App\Http\Controllers\Hotels\HotelsController::class, 'success'])->name('hotel.success');


// No middleware needed - validation is in controller
Route::get('/hotels/pay', [HotelsController::class, 'payWithPayPal'])->name('hotel.pay');
Route::get('/hotels/success', [HotelsController::class, 'success'])->name('hotel.success');
