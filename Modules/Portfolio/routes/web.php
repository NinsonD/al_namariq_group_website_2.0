<?php

use Illuminate\Support\Facades\Route;
use Modules\Portfolio\Http\Controllers\PortfolioController;

Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    Route::resource('portfolio', PortfolioController::class)->except(['show']);
});