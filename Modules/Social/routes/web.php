<?php

use Illuminate\Support\Facades\Route;
use Modules\Social\Http\Controllers\SocialController;

Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    Route::resource('social', SocialController::class)->except(['show']);
});