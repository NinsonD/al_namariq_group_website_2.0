<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Http\Controllers\Home\HomeFiveController;
use Modules\Frontend\Http\Controllers\Home\HomeShopController;
use Modules\Frontend\Http\Controllers\Home\HomeSixController;
use Modules\Frontend\Http\Controllers\Home\HomeThreeController;
use Modules\Frontend\Http\Controllers\Home\HomeTwoController;
use Modules\Frontend\Http\Controllers\AboutPageController;
use Modules\Frontend\Http\Controllers\ContactPageController;
use Modules\Frontend\Http\Controllers\Home\HomeMainController;
use Modules\Frontend\Http\Controllers\ServicesPageController;
use Modules\Frontend\Http\Controllers\SliderController;


Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {

    // Home Main Section
    Route::group(["prefix"=> "home-main", "as" => "home_main."], function () {
        Route::get('/', [HomeMainController::class, 'index'])->name('index');
        Route::get('/section/{slug}', [HomeMainController::class, 'section'])->name('section');
        Route::put('/section/hero', [HomeMainController::class, 'updateHeroSection'])->name('update_hero_section');
        Route::put('/section/about', [HomeMainController::class, 'updateAboutSection'])->name('update_about_section');
        Route::put('/section/process', [HomeMainController::class, 'updateProcessSection'])->name('update_process_section');
        Route::put('/section/services', [HomeMainController::class, 'updateServicesSection'])->name('update_services_section');
        Route::put('/section/text-slider', [HomeMainController::class, 'updateTextSliderSection'])->name('update_text_slider_section');
        Route::put('/section/portfolio', [HomeMainController::class, 'updatePortfolioSection'])->name('update_portfolio_section');
        Route::put('/section/team', [HomeMainController::class, 'updateTeamSection'])->name('update_team_section');
        Route::put('/section/brand', [HomeMainController::class, 'updateBrandSection'])->name('update_brand_section');
        Route::put('/section/testimonial', [HomeMainController::class, 'updateTestimonialSection'])->name('update_testimonial_section');
        Route::put('/section/blog', [HomeMainController::class, 'updateBlogSection'])->name('update_blog_section');
    });

    // Home Two Section
    Route::group(["prefix"=> "home-two", "as" => "home_two."], function () {
        Route::get('/', [HomeTwoController::class, 'index'])->name('index');
        Route::get('/section/{slug}', [HomeTwoController::class, 'section'])->name('section');

        Route::put('/section/hero', [HomeTwoController::class, 'updateHeroSection'])->name('update_hero_section');
        Route::put('/section/step', [HomeTwoController::class, 'updateStepSection'])->name('update_step_section');
        Route::put('/section/brand', [HomeTwoController::class, 'updateBrandSection'])->name('update_brand_section');
        Route::put('/section/services', [HomeTwoController::class, 'updateServicesSection'])->name('update_services_section');
        Route::put('/section/about', [HomeTwoController::class, 'updateAboutSection'])->name('update_about_section');
        Route::put('/section/portfolio', [HomeTwoController::class, 'updatePortfolioSection'])->name('update_portfolio_section');
        Route::put('/section/text-slider', [HomeTwoController::class, 'updateTextSliderSection'])->name('update_text_slider_section');
        Route::put('/section/testimonial', [HomeTwoController::class, 'updateTestimonialSection'])->name('update_testimonial_section');
        Route::put('/section/app-brand', [HomeTwoController::class, 'updateAppBrandSection'])->name('update_app_brand_section');
        Route::put('/section/benefit', [HomeTwoController::class, 'updateBenefitSection'])->name('update_benefit_section');
        Route::put('/section/faq', [HomeTwoController::class, 'updateFaqSection'])->name('update_faq_section');
    });

    Route::group(["prefix"=> "home-three", "as" => "home_three."], function () {
        Route::get('/', [HomeThreeController::class, 'index'])->name('index');
        Route::get('/section/{slug}', [HomeThreeController::class, 'section'])->name('section');

        Route::put('/section/hero', [HomeThreeController::class, 'updateHeroSection'])->name('update_hero_section');
        Route::put('/section/brand', [HomeThreeController::class, 'updateBrandSection'])->name('update_brand_section');
        Route::put('/section/features', [HomeThreeController::class, 'updateFeaturesSection'])->name('update_features_section');
        Route::put('/section/how-it-works', [HomeThreeController::class, 'updateHowItWorksSection'])->name('update_how_it_works_section');
        Route::put('/section/app-review', [HomeThreeController::class, 'updateAppReviewSection'])->name('update_app_review_section');
        Route::put('/section/dashboard', [HomeThreeController::class, 'updateDashboardSection'])->name('update_dashboard_section');
        Route::put('/section/pricing', [HomeThreeController::class, 'updatePricingSection'])->name('update_pricing_section');
        Route::put('/section/testimonial', [HomeThreeController::class, 'updateTestimonialSection'])->name('update_testimonial_section');
        Route::put('/section/faq', [HomeThreeController::class, 'updateFaqSection'])->name('update_faq_section');
        Route::put('/section/app-download', [HomeThreeController::class, 'updateAppDownloadSection'])->name('update_app_download_section');
    });

    Route::group(["prefix"=> "home-shop", "as" => "home_shop."], function () {
        Route::get('/', [HomeShopController::class, 'index'])->name('index');
        Route::get('/section/{slug}', [HomeShopController::class, 'section'])->name('section');

        Route::put('/section/hero', [HomeShopController::class, 'updateHeroSection'])->name('update_hero_section');
        Route::put('/section/text-slider', [HomeShopController::class, 'updateTextSliderSection'])->name('update_text_slider_section');
        Route::put('/section/category', [HomeShopController::class, 'updateCategorySection'])->name('update_category_section');
        Route::put('/section/product-trending', [HomeShopController::class, 'updateProductTrendingSection'])->name('update_product_trending_section');
        Route::put('/section/about', [HomeShopController::class, 'updateAboutSection'])->name('update_about_section');
        Route::put('/section/products', [HomeShopController::class, 'updateProductsSection'])->name('update_products_section');
        Route::put('/section/showcase', [HomeShopController::class, 'updateShowcaseSection'])->name('update_showcase_section');
        Route::put('/section/newsletter', [HomeShopController::class, 'updateNewsletterSection'])->name('update_newsletter_section');
        Route::put('/section/reviews', [HomeShopController::class, 'updateReviewsSection'])->name('update_reviews_section');
        Route::put('/section/features', [HomeShopController::class, 'updateFeaturesSection'])->name('update_features_section');
        Route::put('/section/instagram', [HomeShopController::class, 'updateInstagramSection'])->name('update_instagram_section');
    });



    Route::group(["prefix"=> "pages-services", "as" => "services_page."], function () {
        Route::get('/', [ServicesPageController::class, 'index'])->name('index');
        Route::get('/section/{slug}', [ServicesPageController::class, 'section'])->name('section');
        Route::put('/section/hero', [ServicesPageController::class, 'updateHeroSection'])->name('update_hero_section');
        Route::put('/section/services', [ServicesPageController::class, 'updateServicesSection'])->name('update_services_section');
        Route::put('/section/text-slider', [ServicesPageController::class, 'updateTextSliderSection'])->name('update_text_slider_section');
        Route::put('/section/pricing', [ServicesPageController::class, 'updatePricingSection'])->name('update_pricing_section');
        Route::put('/section/process', [ServicesPageController::class, 'updateProcessSection'])->name('update_process_section');
        Route::put('/section/brand', [ServicesPageController::class, 'updateBrandSection'])->name('update_brand_section');
    });


    Route::group(["prefix"=> "pages-about", "as" => "about_page."], function () {
        Route::get('/', [AboutPageController::class, 'index'])->name('index');
        Route::get('/section/{slug}', [AboutPageController::class, 'section'])->name('section');
        Route::put('/section/hero', [AboutPageController::class, 'updateHeroSection'])->name('update_hero_section');
        Route::put('/section/about', [AboutPageController::class, 'updateAboutSection'])->name('update_about_section');
        Route::put('/section/services', [AboutPageController::class, 'updateServicesSection'])->name('update_services_section');
        Route::put('/section/step', [AboutPageController::class, 'updateStepSection'])->name('update_step_section');
        Route::put('/section/team', [AboutPageController::class, 'updateTeamSection'])->name('update_team_section');
    });

    Route::get('/site-pages/contact-page', [ContactPageController::class, 'index'])->name('contact-page');
    Route::put('/site-pages/contact-page-update/{key}', [ContactPageController::class, 'update'])->name('contact-page.update');

    Route::resource('slider', SliderController::class)->except(['show']);


    Route::group(["prefix"=> "home-five", "as" => "home_five."], function () {
        Route::get('/', [HomeFiveController::class, 'index'])->name('index');
        Route::get('/section/{slug}', [HomeFiveController::class, 'section'])->name('section');
        Route::put('/section/{slug}', [HomeFiveController::class, 'updateThemeSection'])->name('update_section');
    });


    Route::group(["prefix"=> "home-six", "as" => "home_six."], function () {
        Route::get('/', [HomeSixController::class, 'index'])->name('index');
        Route::get('/section/{slug}', [HomeSixController::class, 'section'])->name('section');
        Route::put('/section/{slug}', [HomeSixController::class, 'updateThemeSection'])->name('update_section');
    });
});
