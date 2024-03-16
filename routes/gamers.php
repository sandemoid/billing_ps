<?php

use App\Http\Controllers\Gamers\PenggunaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gamers\GamersController;
use App\Http\Controllers\Gamers\TransaksiController;

Route::middleware(['auth', 'cekrole:3'])->group(function () {
    Route::get('/gamers', [GamersController::class, 'index'])->name('gamers');

    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.edit');
    Route::patch('/pengguna', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
});
