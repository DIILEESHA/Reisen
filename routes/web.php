<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppointmentController;

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

Route::get('/', function () {
    return view('pages.Home');
});

Route::get('/about-us', function () {
    return view('pages.about');
});
Route::get('/contact-us', function () {
    return view('pages.contact');
});
Route::get('/gallery', function () {
    return view('pages.gallery');
});
Route::get('/service', function () {
    return view('pages.service');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/book-an-appointment', function () {
        return view('pages.appointment');
    });
});

Route::get('/login', function () {
    return view('pages.login');
});Route::get('/signup', function () {
    return view('pages.signup');
});


Route::post('/book-an-appointment', [AppointmentController::class, 'store'])->name('appointments.store');

// login form get controller
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// signup form get controller
Route::get('/signup', [AuthController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);