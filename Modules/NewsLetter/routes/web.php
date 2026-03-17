<?php

use Illuminate\Support\Facades\Route;
use Modules\NewsLetter\Http\Controllers\NewsLetterController;
use Modules\NewsLetter\Http\Controllers\Admin\NewsLetterController as AdminNewsLetterController;

Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    Route::resource('newsletter', AdminNewsLetterController::class)->only(['index', 'destroy']);
    Route::post('/newsletter/delete-unverified', [AdminNewsLetterController::class, 'delete_unverified'])->name('newsletter.delete_unverified');
    Route::get('/newsletter/send-mail-to-subscribers', [AdminNewsLetterController::class, 'send_bulk_mail'])->name('newsletter.send_bulk_mail');
    Route::post('/newsletter/send-mail-to-subscribers', [AdminNewsLetterController::class, 'send_mail_to_subscribers'])->name('newsletter.send_mail_to_subscribers');
});

Route::post('newsletter-request', [NewsLetterController::class, 'newsletter_request'])->name('newsletter-request');
Route::get('newsletter-verification/{token}', [NewsLetterController::class, 'newsletter_verification'])->name('newsletter-verification');