<?php

use App\Http\Controllers\PengaturanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
    Route::put('/pengaturan/update', [PengaturanController::class, 'update'])->name('pengaturan.update');
});
