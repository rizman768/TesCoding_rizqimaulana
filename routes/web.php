<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TiketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('tiket.Dashboard');
});

// Auth Routes
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('userlogin', [AuthController::class, 'login']);

// Tiket Routes
    Route::get('dashboard', [TiketController::class, 'dashboard']);
    Route::get('tiket', [TiketController::class, 'tiket']);
    Route::post('pendaftaran', [TiketController::class, 'pendaftaran']);
    Route::get('admin', [TiketController::class, 'admin']);
    Route::get('check-in', [TiketController::class, 'check_in']);
    Route::get('laporan', [TiketController::class, 'laporan']);

    Route::get('edit-tiket/{id}', [TiketController::class, 'edit_tiket']);
    Route::post('updatetiket', [TiketController::class, 'update_tiket']);
    Route::post('deletetiket/{id}', [TiketController::class, 'delete']);
    Route::get('cari', [TiketController::class, 'search']);
    Route::post('cekin', [TiketController::class, 'cekin']);