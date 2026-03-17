<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;



// Guest routes
Route::group(["as" => "user.", "middleware" => ['maintenance']], function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.post');
    
    Route::get('forgot-password', [PasswordController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordController::class, 'store'])->name('password.email');
        

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.post');
});