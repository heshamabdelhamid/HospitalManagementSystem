<?php

use App\Http\Controllers\Dashboard\{
    DashboardController,
    Admin\AuthController
};

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login.page');
    Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
});

Route::middleware('admin')->group(function () {
    Route::get('index', [DashboardController::class, 'index'])->name('index');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
