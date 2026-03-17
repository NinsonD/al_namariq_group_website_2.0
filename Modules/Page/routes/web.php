<?php

use Illuminate\Support\Facades\Route;
use Modules\Page\Http\Controllers\PageController;

Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    Route::resource('page', PageController::class)->except(['show']);

    Route::put('/page/{id}/status', [PageController::class, 'updatePageStatus'])->name('page.update-status');
});
