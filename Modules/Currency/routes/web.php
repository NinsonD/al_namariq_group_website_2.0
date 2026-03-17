<?php

use Illuminate\Support\Facades\Route;
use Modules\Currency\Http\Controllers\CurrencyController;


Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    // Currency
    Route::resource('currencies', CurrencyController::class)->names('currency');
});
