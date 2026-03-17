<?php

use Illuminate\Support\Facades\Route;
use Modules\Shop\Http\Controllers\InstagramController;
use Modules\Shop\Http\Controllers\ProductCategoryController;
use Modules\Shop\Http\Controllers\ProductController;
use Modules\Shop\Http\Controllers\ProductReviewController;
use Modules\Shop\Http\Controllers\ShopSettingController;

Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    Route::resource('product', ProductController::class)->except(['show']);
    Route::resource('product-review', ProductReviewController::class)->except(['store']);
    Route::put('product-review/{product_review}/status', [ProductReviewController::class, 'updateStatus'])->name('product-review.updateStatus');
    Route::put('product-gallery/{id}', [ProductController::class, 'addProductGallery'])->name('product.gallery');
    Route::delete('product-gallery/{id}', [ProductController::class, 'removeProductGallery'])->name('product.gallery.delete');

    Route::resource('product-category', ProductCategoryController::class)->except(['show']);
    Route::put('product-category/{product_category}/status', [ProductCategoryController::class, 'updateStatus'])->name('product-category.updateStatus');

    Route::resource('instagram', InstagramController::class)->except(['show']);
});
