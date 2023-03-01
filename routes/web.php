<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
    Route::view('/login',                   'auth.login')->name('login');
    Route::view('/register',                'auth.register')->name('register');
    Route::view('/reset-password/{token}',  'auth.reset')->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/login');

    Route::get('/home',         [HomeController::class, 'index'])->name('home');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

    Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)->name('verification.verify');
    Route::get('/logout',                   LogoutController::class)->name('logout');
});
