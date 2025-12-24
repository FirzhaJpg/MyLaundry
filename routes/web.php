<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('/profile', 'profile')->name('profile');

    Route::middleware('role:admin')->group(function () {
        Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
        Route::post('/calendar', [CalendarController::class, 'store']);
        Route::patch('/calendar/{schedule}/status', [CalendarController::class, 'updateStatus'])->name('calendar.update-status');

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/orders', [OrderController::class, 'adminIndex'])->name('orders.index');
            Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
            Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
            Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
        });
    });

    Route::middleware('role:user')->group(function () {
        Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.my');
        Route::get('/order-history', [OrderController::class, 'history'])->name('orders.history');
    });
});
