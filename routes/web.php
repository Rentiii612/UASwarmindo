<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE CUSTOMER
|--------------------------------------------------------------------------
*/

Route::get('/', [CustomerController::class, 'landing'])
    ->name('customer.landing');

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'process'])->name('login.process');

/*
|--------------------------------------------------------------------------
| ROUTE SETELAH LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // =========================
    // DASHBOARD
    // =========================

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // =========================
    // LOGOUT
    // =========================

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // =========================
    // ADMIN
    // =========================

    Route::middleware('admin')->group(function () {

        Route::resource('menu', MenuController::class)
            ->except(['show']);

        Route::resource('kategori', KategoriController::class)
            ->except(['show']);

        Route::get('/report', [ReportController::class, 'index'])
            ->name('report.index');

        // =========================
        // CUSTOMER
        // =========================

        Route::get('/customer', [CustomerController::class, 'index'])
            ->name('customer.index');

        Route::get('/customer/menu/{menu}', [CustomerController::class, 'show'])
            ->name('customer.menu.show');

        Route::post('/customer/cart/{menu}', [CustomerController::class, 'addToCart'])
            ->name('customer.cart.add');

        Route::get('/customer/cart', [CustomerController::class, 'cart'])
            ->name('customer.cart');

        Route::put('/customer/cart/{id}', [CustomerController::class, 'updateCart'])
            ->name('customer.cart.update');

        Route::delete('/customer/cart/{id}', [CustomerController::class, 'removeFromCart'])
            ->name('customer.cart.remove');

        Route::get('/customer/checkout', [CustomerController::class, 'checkout'])
            ->name('customer.checkout');

        Route::post('/customer/checkout', [CustomerController::class, 'processCheckout'])
            ->name('customer.processCheckout');

        Route::get('/customer/tracking', [CustomerController::class, 'tracking'])
            ->name('customer.tracking');

        Route::get('/customer/tracking/{order}', [CustomerController::class, 'trackingDetail'])
            ->name('customer.tracking.detail');

        Route::get('/customer/payment/cash/{order}', [CustomerController::class, 'paymentCash'])
            ->name('customer.payment.cash');

        Route::get('/customer/payment/qris/{order}', [CustomerController::class, 'paymentQris'])
            ->name('customer.payment.qris');

        Route::get('/customer/scan-qr', [CustomerController::class, 'scanQr'])
            ->name('customer.scan.qr');

        Route::get('/customer/landing', [CustomerController::class, 'landing'])
            ->name('customer.landing');

        // =========================
        // KASIR
        // =========================

        Route::prefix('kasir')->group(function () {

            Route::get('/dashboard', [KasirController::class, 'dashboard'])
                ->name('kasir.dashboard');

            Route::get('/orders', [KasirController::class, 'orders'])
                ->name('kasir.orders');

            Route::get('/payment/{id}', [PaymentController::class, 'index'])
                ->name('kasir.payment');

            Route::post('/payment/{id}', [PaymentController::class, 'store'])
                ->name('kasir.payment.store');

            Route::get('/history', [KasirController::class, 'history'])
                ->name('kasir.history');
        });

    });

});