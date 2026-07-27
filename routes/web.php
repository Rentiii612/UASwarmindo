<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return redirect('/login');
});

// =========================
// LOGIN
// =========================

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'process'])
    ->name('login.process');


// =========================
// ROUTE YANG MEMBUTUHKAN LOGIN
// =========================

Route::middleware('auth')->group(function () {

    // =========================
    // DASHBOARD ADMIN
    // =========================

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    // =========================
    // LOGOUT
    // =========================

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');


// =========================
// MENU
// =========================

Route::get('/menu', [MenuController::class, 'index'])
    ->name('menu.index');

Route::get('/menu/create', [MenuController::class, 'create'])
    ->name('menu.create');

Route::post('/menu', [MenuController::class, 'store'])
    ->name('menu.store');

Route::get('/menu/{menu}/edit', [MenuController::class, 'edit'])
    ->name('menu.edit');

Route::put('/menu/{menu}', [MenuController::class, 'update'])
    ->name('menu.update');

Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])
    ->name('menu.destroy');


// =========================
// KATEGORI
// =========================

Route::get('/kategori', [KategoriController::class, 'index'])
    ->name('kategori.index');

Route::get('/kategori/create', [KategoriController::class, 'create'])
    ->name('kategori.create');

Route::post('/kategori', [KategoriController::class, 'store'])
    ->name('kategori.store');

Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])
    ->name('kategori.edit');

Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])
    ->name('kategori.update');

Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])
    ->name('kategori.destroy');

    // =========================
    // KASIR
    // =========================

    Route::prefix('kasir')->group(function () {

        // Dashboard Kasir
        Route::get('/dashboard', [KasirController::class, 'dashboard'])
            ->name('kasir.dashboard');

        // Daftar Pesanan
        Route::get('/orders', [KasirController::class, 'orders'])
            ->name('kasir.orders');

        // Halaman Pembayaran
        Route::get('/payment/{id}', [PaymentController::class, 'index'])
            ->name('kasir.payment');

        // Proses Pembayaran
        Route::post('/payment/{id}', [PaymentController::class, 'store'])
            ->name('kasir.payment.store');

        // Riwayat Transaksi
        Route::get('/history', [KasirController::class, 'history'])
            ->name('kasir.history');

    });

});
