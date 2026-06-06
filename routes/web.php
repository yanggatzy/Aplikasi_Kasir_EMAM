<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\PelangganController;

// ── PUBLIK: menu pelanggan (tanpa login) ──
Route::get('/menu',          [PelangganController::class, 'index']);
Route::get('/menu/data',     [PelangganController::class, 'getMenus']);
Route::get('/menu/terlaris', [PelangganController::class, 'getTerlaris']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    // ── MANAGER: halaman ──
    Route::get('/manager/dashboard', fn() => view('manager.dashboard'))->name('manager.dashboard');
    Route::get('/manager/laporan/detail', fn() => view('manager.detail-laporan'))->name('manager.detail-laporan');

    // ── MANAGER: kategori ──
    Route::get('/manager/kategori',              [ManagerController::class, 'indexKategori'])->name('manager.kategori');
    Route::post('/manager/kategori',             [ManagerController::class, 'storeKategori']);
    Route::put('/manager/kategori/{kategori}',   [ManagerController::class, 'updateKategori']);
    Route::delete('/manager/kategori/{kategori}',[ManagerController::class, 'destroyKategori']);
    Route::patch('/manager/kategori/{kategori}/toggle', [ManagerController::class, 'toggleKategori']);

    // ── MANAGER: menu ──
    Route::get('/manager/menu',          [ManagerController::class, 'indexMenu'])->name('manager.menu');
    Route::post('/manager/menu',         [ManagerController::class, 'storeMenu']);
    Route::post('/manager/menu/{menu}',  [ManagerController::class, 'updateMenu']);
    Route::delete('/manager/menu/{menu}',[ManagerController::class, 'destroyMenu']);
    Route::patch('/manager/menu/{menu}/toggle', [ManagerController::class, 'toggleMenu']);

    // ── MANAGER: meja ──
    Route::get('/manager/meja',          [ManagerController::class, 'indexMeja'])->name('manager.meja');
    Route::post('/manager/meja',         [ManagerController::class, 'storeMeja']);
    Route::put('/manager/meja/{meja}',   [ManagerController::class, 'updateMeja']);
    Route::delete('/manager/meja/{meja}',[ManagerController::class, 'destroyMeja']);

    // ── MANAGER: user ──
    Route::get('/manager/user',          [ManagerController::class, 'indexUser'])->name('manager.user');
    Route::post('/manager/user',         [ManagerController::class, 'storeUser']);
    Route::put('/manager/user/{user}',   [ManagerController::class, 'updateUser']);
    Route::delete('/manager/user/{user}',[ManagerController::class, 'destroyUser']);

    // ── MANAGER: transaksi & laporan ──
    Route::get('/manager/transaksi', [ManagerController::class, 'indexTransaksi'])->name('manager.transaksi');
    Route::get('/manager/laporan',   [ManagerController::class, 'indexLaporan'])->name('manager.laporan');

    // ── KASIR: halaman ──
    Route::get('/kasir/dashboard', fn() => view('kasir.dashboard'))->name('kasir.dashboard');
    Route::get('/kasir',           [KasirController::class, 'index']);

    // ── KASIR: API data ──
    Route::get('/kasir/menus',          [KasirController::class, 'getMenus']);
    Route::get('/kasir/mejas-tersedia', [KasirController::class, 'getMejas']);
    Route::post('/kasir/transaksi',     [KasirController::class, 'store']);

    // ── MEJA: halaman + API ──
    Route::get('/kasir/status-meja',           [MejaController::class, 'index']);
    Route::get('/kasir/mejas',                 [MejaController::class, 'getAll']);
    Route::patch('/kasir/meja/{meja}/status',  [MejaController::class, 'updateStatus']);

});
