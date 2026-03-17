<?php

use Illuminate\Support\Facades\Route;
use Modules\Installer\Http\Controllers\InstallerController;
use Modules\Installer\Http\Controllers\LicenseController;
use Modules\Installer\Http\Middleware\PurchaseVerifyMiddleware;

Route::prefix('installer')->withoutMiddleware(PurchaseVerifyMiddleware::class)->group(function(){

    Route::group(["as" => "installer."], function () {

        Route::get('/welcome', [InstallerController::class, 'welcome'])->name('welcome');
        Route::post('/verify', [LicenseController::class, 'verifyPurchaseCode'])->name('verify');

        Route::withoutMiddleware('demo')->group(function(){
            Route::get('/requirements', [InstallerController::class, 'requirements'])->name('requirements');

            Route::middleware('systemcheck')->group(function(){
                Route::get('/database', [InstallerController::class, 'database'])->name('database');
                Route::post('/database', [InstallerController::class, 'databaseSetup'])->name('database.post');

                Route::get('/account', [InstallerController::class, 'account'])->name('account');
                Route::post('/account', [InstallerController::class, 'accountSetup'])->name('account.post');

                Route::get('/configuration', [InstallerController::class, 'configuration'])->name('configuration');
                Route::post('/configuration', [InstallerController::class, 'configurationSetup'])->name('configuration.post');

                Route::get('/smtp', [InstallerController::class, 'smtp'])->name('smtp');
                Route::post('/smtp-skip', [InstallerController::class, 'smtpSkip'])->name('smtp.skip');
                Route::post('/smtp', [InstallerController::class, 'smtpSetup'])->name('smtp.post');

                Route::get('/complete', [InstallerController::class, 'complete'])->name('complete');
            });
        });
    });

});

Route::prefix('license')->withoutMiddleware(PurchaseVerifyMiddleware::class)->group(function(){
    Route::get('/active-license', [LicenseController::class, 'activeLicense'])->name('page-active-license');
    Route::post('/active-license', [LicenseController::class, 'activeLicensePost'])->name('page-active-license.post');
});

Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    Route::get('/license', [LicenseController::class,'license'])->name('license');
    Route::post('/deactive-license', [LicenseController::class,'deactivateLicense'])->name('deactivate-license');
});
