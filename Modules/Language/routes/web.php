<?php

use Illuminate\Support\Facades\Route;
use Modules\Language\Http\Controllers\LanguageController;


Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    Route::resource('languages', LanguageController::class)->except(['show']);

    // update lagnuage status
    Route::put('languages/{language}/status', [LanguageController::class, 'updateStatus'])->name('languages.updateStatus');
});