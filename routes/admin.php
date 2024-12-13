<?php

use App\Http\Controllers\Settings\RolesController;
use App\Http\Controllers\Settings\PengaturanController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'cekrole:1,2'])->prefix('dashboard')->group(function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

    // User Routes
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    });

    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Settings Routes
    Route::prefix('pengaturan')->group(function () {
        Route::get('/', [PengaturanController::class, 'index'])->name('pengaturan.index');
        Route::put('/app', [PengaturanController::class, 'update_app'])->name('pengaturan.app');
        Route::put('/jadwal', [PengaturanController::class, 'update_jadwal'])->name('pengaturan.jadwal');
    });

    // Roles Routes
    Route::prefix('roles')->group(function () {
        Route::get('/', [RolesController::class, 'index'])->name('roles.index');
        Route::post('/store', [RolesController::class, 'store'])->name('roles.store');
        Route::put('/update/{id}', [RolesController::class, 'update'])->name('roles.update');
        Route::delete('/delete/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');
    });
});
