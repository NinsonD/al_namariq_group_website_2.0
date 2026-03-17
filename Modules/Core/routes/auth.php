<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\Admin\ProfileController;
use Modules\Core\Http\Controllers\Admin\Auth\PasswordController;
use Modules\Core\Http\Controllers\Admin\Auth\NewPasswordController;
use Modules\Core\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use Modules\Core\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

// Guest routes
Route::group(['prefix' => 'admin'], function(){

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');

});

// Authenticated routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'checkAdmin']], function(){

    // password reset
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
