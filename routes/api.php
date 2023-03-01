<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\InterestController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VerifyEmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->prefix('/auth')->group(function () {
    Route::post('login',            'login')->name('login');
    Route::post('forgot-password',  'forgot')->name('password.forgot');
    Route::post('reset-password',   'reset')->name('password.reset');
});

Route::post('register', [RegisterController::class, 'store'])->name('register');

Route::middleware('auth')->group(function () {
    Route::put('users',      [UserController::class, 'update'])->name('users.update');
    Route::post('interests', [InterestController::class, 'store'])->name('interests.store');

    Route::post('email/verify', VerifyEmailController::class)->name('verification.resend');
});
