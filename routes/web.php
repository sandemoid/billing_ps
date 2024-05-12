<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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
    Route::get('/', [AuthController::class, 'index'])->name('index');
});

Route::middleware(['auth', 'cekrole:1,2,3'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/gamers.php';
require __DIR__ . '/admin.php';
