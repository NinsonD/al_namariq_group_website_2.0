<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\BlogCategoryController;
use Modules\Blog\Http\Controllers\BlogCommentController;
use Modules\Blog\Http\Controllers\BlogController;
use Modules\Settings\Http\Controllers\SettingsController;


Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {
    Route::resource('blog', BlogController::class)->except(['show']);
    Route::put('blog/status/{id}', [BlogController::class, 'status'])->name('blog.status');
    
    
    Route::resource('blog-category', BlogCategoryController::class)->except(['show']);
    Route::put('blog-category/status/{id}', [BlogCategoryController::class, 'status'])->name('blog-category.status');
    
    Route::resource('blog-comment', BlogCommentController::class)->except(['create', 'edit', 'update']);
    Route::put('blog-comment/status/{id}', [BlogCommentController::class, 'status'])->name('blog-comment.status');
    Route::put('blog/comment/approve-status', [SettingsController::class, 'approveCommentStatus'])->name('blog.approve-status');
});