<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/manager/dashboard', function () {
        return view('manager.dashboard');
    })->name('manager.dashboard');

    Route::get('/manager/kategori', function () {
        return view('manager.kategori');
    })->name('manager.kategori');

    Route::get('/manager/menu', function () {
        return view('manager.menu');
    })->name('manager.menu');

    Route::get('/manager/meja', function () {
        return view('manager.meja');
    })->name('manager.meja');

    Route::get('/manager/user', function () {
        return view('manager.user');
    })->name('manager.user');

    Route::get('/manager/transaksi', function () {
        return view('manager.transaksi');
    })->name('manager.transaksi');

    Route::get('/manager/laporan', function () {
        return view('manager.laporan');
    })->name('manager.laporan');

    Route::get('/manager/laporan/detail', function () {
        return view('manager.detail-laporan');
    })->name('manager.detail-laporan');

    Route::get('/kasir/dashboard', function () {
        return view('kasir.dashboard');
    })->name('kasir.dashboard');

    Route::get('/kasir', function () {
        return view('kasir.kasir');
    });

    Route::get('/kasir/status-meja', function () {
        return view('kasir.status-meja');
    });

});
