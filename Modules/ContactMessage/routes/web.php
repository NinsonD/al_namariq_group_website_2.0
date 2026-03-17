<?php

use Illuminate\Support\Facades\Route;
use Modules\ContactMessage\Http\Controllers\ContactMessageController;

Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    Route::resource('contact-message', ContactMessageController::class)->names('contact-message')->only(['index', 'show', 'destroy']);
    Route::post('/update-contact-receiver-mail', [ContactMessageController::class,'update_contact_receiver_mail'])->name('update-contact-receiver-mail');
});

Route::post('contact-message', [ContactMessageController::class, 'store'])->name('contact-message.store')->middleware('throttle:3,1');