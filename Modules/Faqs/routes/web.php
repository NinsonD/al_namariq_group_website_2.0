<?php

use Illuminate\Support\Facades\Route;
use Modules\Faqs\Http\Controllers\FaqsController;

Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    // Faqs
    Route::resource('faqs', FaqsController::class);
});