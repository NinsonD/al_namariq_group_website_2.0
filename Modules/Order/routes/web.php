<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\OrderController;
use Modules\Order\Http\Controllers\ShippingMethodController;


Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    Route::resource('orders', OrderController::class)->only(['index', 'edit', 'update', 'destroy']);
    Route::put('orders/{id}/status', [OrderController::class, 'status'])->name('orders.status-update');
    Route::put('orders/{id}/payment', [OrderController::class, 'paymentStatus'])->name('orders.payment-status');
    Route::resource('shipping-methods', ShippingMethodController::class)->except(['show']);
});
