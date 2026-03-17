<?php
use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\Admin\DashboardController;
use Modules\Core\Http\Controllers\SystemUpdateController;
use Modules\Core\Http\Controllers\UserController;


Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User
    Route::resource('user', UserController::class)->except(['create', 'show']);
    Route::get('/user/send-bulk-email', [UserController::class, 'sendBulkEmailCreate'])->name('user.send-bulk-email');
    Route::post('/user/send-bulk-email', [UserController::class, 'sendBulkEmailStore'])->name('user.send-bulk-email.store');
    Route::put('/user/{id}/password-update', [UserController::class, 'updatePassword'])->name('user.password-update');


    Route::get('/system-update', [SystemUpdateController::class, 'index'])->name('system-update');
    Route::post('/system-update/chunk', [SystemUpdateController::class, 'uploadChunk'])->name('system-update-chunk');
    Route::post('/system-update/complete', [SystemUpdateController::class, 'apply'])->name('system-update-complete');

    // clear cache
    Route::post('/clear-cache', function() {
        \Artisan::call('optimize:clear');
        return redirect()->back()->with('success', __('notification.cache_cleared'));
    })->name('clear-cache');
});
