<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Sekarang halaman utama akan menampilkan Dashboard
Route::get('/', [DashboardController::class, 'index']);
