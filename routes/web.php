<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Livewire\Band\Booking;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::get('/register',[AuthController::class, 'register']);
// Route::get('/logout', [AuthController::class, 'logout']);

// Route::get('/dashboard', [BandController::class, 'dashboard']);
// Route::get('/band', [BandController::class, 'index']);
// Route::get('/', function(){
//             return view('welcome');
//         });

// Route::get('/profile', [ProfileController::class, 'index']);
// Route::get('/settings', [ProfileController::class, 'setting']);

// // Route::get('/booking', BookingController::class)->name('booking.index');
// // Route::get('band/{id}/', [BookingController::class, 'index'])->name('booking');
// Route::get('band/{id}/', [BookingController::class, 'index'])->name('band.booking');
// Route::post('band/{id}/{band}/request', [BookingController::class, 'request'])->name('booking.index.request');
// // Route::get('band/{id}/{band}', [BookingController::class])->name('booking.index');
// // Route::group(['middleware'=>['auth']], function(){
// //     Route::get('/', function(){
// //         return view('welcome');
// //     });

// // });

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register',[AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ('auth')], function() {

    Route::get('/band', [BandController::class, 'index']);
    Route::get('/dashboard', [BandController::class, 'dashboard']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/settings', [ProfileController::class, 'setting']);

    Route::get('/band/{id}/booking/', Booking::class)->name('band.booking');
    Route::post('band/{id}/{band}/submitrequest', [Booking::class, 'submit'])->name('band.booking.submit');

    Route::get('/success', [BookingController::class, 'submit'])->name('band.success');
    // Route::get('/booking/{id}/review/', [BookingController::class, 'index'])->name('band.review');

    Route::get('/home', function () {
        return view('welcome');
    });


});

Route::get('/', function () {
    return view('index');
});

