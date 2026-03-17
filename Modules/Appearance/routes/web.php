<?php

use Illuminate\Support\Facades\Route;
use Modules\Appearance\Http\Controllers\AppearanceController;


Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    
    // Appearance
    Route::group(["prefix" => "appearance", "as" => "appearance."], function () {
        Route::get('/', [AppearanceController::class, 'index'])->name('index');
        Route::put('update-theme', [AppearanceController::class, 'updateTheme'])->name('update-theme');
        Route::put('update-theme-show-all-homepage', [AppearanceController::class, 'updateShowAllHomePage'])->name('update-theme-show-all-homepage');

        Route::get('colors', [AppearanceController::class, 'colors'])->name('colors');
        Route::put('colors', [AppearanceController::class, 'updateColors'])->name('update-colors');
    });
});