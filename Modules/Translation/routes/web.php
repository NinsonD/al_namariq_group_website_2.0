<?php

use Illuminate\Support\Facades\Route;
use Modules\Translation\Http\Controllers\TranslationController;

Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
   // translation files
   Route::group(['prefix' => 'languages', 'as' => 'languages.'], function(){
      Route::get('/translations/{code}', [TranslationController::class, 'index'])->name('translations.index');
      Route::get('/translations/{lang}/{file}', [TranslationController::class, 'show'])->name('translations.show');
      Route::post('/translations/{lang}/{file}', [TranslationController::class, 'update'])->name('translations.update');
   });
   
});