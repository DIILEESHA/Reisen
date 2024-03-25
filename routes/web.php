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

Route::get('/update-form', function () {
    return view('pages.edit');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/book-an-appointment', function () {
        return view('pages.appointment');
    });
});




// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [AppointmentController::class, 'showAllAppointments'])->name('admin.dashboard');
// });


Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/signup', function () {
    return view('pages.signup');
});
Route::get('/user-appointments', function () {
    return view('pages.showappointments');
});
// dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/dashboard', [AppointmentController::class, 'showAppointment'])->name('dashboard');
Route::post('/book-an-appointment', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/user-appointments', [AppointmentController::class, 'showAppointments'])->name('user.appointments');
Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
Route::get('/appointments/{id}/edit-your-appointment', [AppointmentController::class, 'showEditForm'])->name('appointments.edit');
Route::put('/appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');


// login form get controller
// Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// signup form get controller
Route::get('/signup', [AuthController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);