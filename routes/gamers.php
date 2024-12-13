<?php

use App\Http\Controllers\Gamers\PenggunaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gamers\GamersController;
use App\Http\Controllers\Gamers\TransaksiController;

Route::middleware(['auth', 'cekrole:3'])->group(function () {
    Route::get('/gamers', [GamersController::class, 'index'])->name('gamers');

    Route::prefix('pengguna')->group(function () {
        Route::get('/', [PenggunaController::class, 'index'])->name('pengguna.index');
        Route::patch('/', [PenggunaController::class, 'update'])->name('pengguna.update');
        Route::delete('/', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
    });

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
});
