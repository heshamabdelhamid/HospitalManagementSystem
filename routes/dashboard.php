<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\{
    DashboardController,
    Admin\AuthController,
};

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'login'])->name('login.page');
        Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard_admin', [DashboardController::class, 'index']);
    });
});
