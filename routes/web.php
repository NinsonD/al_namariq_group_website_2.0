<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\DefaultPageController;


Route::group(["middleware" => ['maintenance']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [DefaultPageController::class, 'about'])->name('about');
    Route::get('/team', [DefaultPageController::class, 'team'])->name('team');
    Route::get('/team/{username}', [DefaultPageController::class, 'teamDetails'])->name('team.details');
    Route::get('/contact', [DefaultPageController::class, 'contact'])->name('contact');

    Route::get('/services', [DefaultPageController::class, 'services'])->name('services');
    Route::get('/services/{slug}', [DefaultPageController::class, 'servicesDetails'])->name('services.details');

    Route::get('/portfolios', [DefaultPageController::class, 'portfolios'])->name('portfolios');
    Route::get('/portfolios/{slug}', [DefaultPageController::class, 'portfoliosDetails'])->name('portfolios.details');

    Route::get('/privacy-policy', [DefaultPageController::class, 'privacyPolicy'])->name('privacy-policy');
    Route::get('/terms-and-conditions', [DefaultPageController::class, 'termsAndConditions'])->name('terms-and-conditions');
    Route::get('/terms-of-service', [DefaultPageController::class, 'termsOfService'])->name('terms-of-service');

    Route::get('/pricing', [DefaultPageController::class, 'pricing'])->name('pricing');
    Route::get('/faqs', [DefaultPageController::class, 'faqs'])->name('faqs');
    Route::get('/page/{slug}', [HomeController::class, 'page'])->name('custom.page');



    // Group blog-related routes
    Route::prefix('blog')->name('blog.')->group(function () {

        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/{slug}', [BlogController::class, 'show'])->name('details');

        Route::resource('comment', BlogCommentController::class)->only(['store', 'update', 'destroy']);
    });

    Route::middleware(['shop'])->group(function () {
        // Products routes
        Route::get('/products', [ProductController::class, 'index'])->name('products');
        Route::get('/products/quick/{id}', [ProductController::class, 'quickView'])->name('products.quick-view');
        Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
    });

});



// Set homepage route
Route::get('/set-home/{slug}', function ($slug) {
    if(session()->has('demo_homepage')){
        session()->forget('demo_homepage');
    }

    session()->put('demo_homepage', $slug);
    return redirect()->route('home');
})->name('set-home');


// Set language route
Route::post('/set-language', function (Request $request) {
    $code = $request->language_code;
    setSiteLocale($code);
    return redirect()->back();
})->name('set.language');

// Set currency route
Route::post('/set-currency', function (Request $request) {
    $code = $request->currency_code;
    setSiteCurrency($code);
    return redirect()->back();
})->name('set.currency');


// Maintenance mode route
Route::get('/maintenance', fn()=> cache()->get('setting')?->maintenance_status == 0  ? redirect()->route('home') : view('frontend.pages.maintenance'))->name('maintenance');

require __DIR__ .'/auth.php';
require __DIR__ .'/user.php';
