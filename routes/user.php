<?php

use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\UserReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PasswordController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\VerifyUserController;
use Modules\Order\Http\Controllers\RefundController;
use Modules\Shop\Http\Controllers\AddressController;
use Modules\Shop\Http\Controllers\CartController;
use Modules\Shop\Http\Controllers\CheckoutController;
use Modules\Shop\Http\Controllers\ProductReviewController;
use Modules\Shop\Http\Controllers\WishlistController;


Route::group(["prefix" => "user", "as" => "user." , "middleware" => ['userAuth', 'maintenance']], function () {
    Route::get("/dashboard", [DashboardController::class, 'index'])->name("dashboard");
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // password
    Route::get("/password", [PasswordController::class, "create"])->name("password");
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

    // profile
    Route::get('/profile', [ProfileController::class, 'create'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/user/verify/resend', [VerifyUserController::class, 'resendVerificationEmail'])->name('user-verification.resend');

    Route::middleware(['shop'])->group(function () {
        Route::get('/orders', [UserOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [UserOrderController::class, 'show'])->name('orders.show');
        Route::get('/orders/{id}/invoice', [UserOrderController::class, 'invoice'])->name('orders.invoice');
        Route::post('/refund-request', [RefundController::class, 'store'])->name('refund-request');

        // product reviews
        Route::get('/product-review', [UserReviewController::class, 'index'])->name('product-review.index');
        Route::get('/product-review/{id}', [UserReviewController::class, 'edit'])->name('product-review.edit');
        Route::post('/product-review', [ProductReviewController::class, 'store'])->name('product-review.store');
        Route::put('/product-review/{id}', [UserReviewController::class, 'update'])->name('product-review.update');

        // address
        Route::resource('address', AddressController::class)->names('address')->except(['show']);

        Route::group(["prefix" => "cart", "as" => "cart."], function () {
            Route::get('/', [CartController::class, 'show'])->name('show');
            Route::post('/add', [CartController::class, 'add'])->name('add');
            Route::get('/mini', [CartController::class, 'miniCart'])->name('mini');
            Route::delete('/remove/{item}', [CartController::class, 'remove'])->name('remove');
            Route::post('/update-qty', [CartController::class, 'updateQty'])->name('update-qty');
            Route::get('/count', [CartController::class, 'getCartCount'])->name('count');

            // cart page routes
            Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('apply-coupon');
            Route::post('/remove-coupon', [CartController::class, 'removeCoupon'])->name('remove-coupon');
            Route::post('/apply-shipping-method', [CartController::class, 'applyShippingMethod'])->name('applyShipping');
        });

        Route::group(["prefix" => "checkout", "as" => "checkout."], function () {
            Route::get('/', [CheckoutController::class, 'index'])->name('index');
            Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place-order');
            Route::get('/make-payment', [CheckoutController::class, 'makePayment'])->name('make-payment');
        });

        Route::resource('wishlist', WishlistController::class)->only(['index', 'store', 'destroy'])->names('wishlist');
    });
});

Route::group(["middleware" => ['userAuth', 'maintenance', 'shop']], function () {
    Route::post('pay-with-stripe', [CheckoutController::class, 'payWithStripe'])->name('pay-with-stripe');
    Route::get('pay-with-stripe', [CheckoutController::class, 'stripeSuccess'])->name('stripe-success');

    Route::get('pay-with-paypal', [CheckoutController::class, 'payWithPaypal'])->name('pay-with-paypal');
    Route::get('paypal-success', [CheckoutController::class, 'paypalSuccess'])->name('paypal-success');

    Route::post('pay-cod', [CheckoutController::class, 'payWithCod'])->name('pay-cod');

    Route::view('order-success', 'frontend.ecommerce.order.order_success')->name('order-success');
    Route::view('order-failed', 'frontend.ecommerce.order.order_failed')->name('order-failed');


    Route::get('payment-success', [CheckoutController::class, 'payment_success'])->name('payment-success');
    Route::get('payment-failed', [CheckoutController::class, 'payment_failed'])->name('payment-failed');
});


Route::group(["middleware" => ['maintenance', 'shop']], function () {
    Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
});

Route::get('/user/verify/{token}', [VerifyUserController::class, 'verify'])->name('user-verification');
