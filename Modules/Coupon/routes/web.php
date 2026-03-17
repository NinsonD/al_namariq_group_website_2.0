<?php

use Illuminate\Support\Facades\Route;
use Modules\Coupon\Http\Controllers\CouponController;


Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    // Coupons
    Route::resource('coupons', CouponController::class)->except(['show']);
    Route::get('coupons/history', [CouponController::class, 'history'])->name('coupons-history');
    Route::delete('coupons/history/{coupon}', [CouponController::class, 'destroyHistory'])->name('coupon_history.destroy');
});
