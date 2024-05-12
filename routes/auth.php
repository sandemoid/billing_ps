<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('proses.register');

    Route::get('forgot-password', [PasswordResetController::class, 'index'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'index'])
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class, '@__invoke')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class . '@__invoke')
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', EmailVerificationNotificationController::class . '@__invoke')
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
});
