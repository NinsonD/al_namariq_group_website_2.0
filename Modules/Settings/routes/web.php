<?php

use Illuminate\Support\Facades\Route;
use Modules\Installer\Http\Controllers\InstallerController;
use Modules\Settings\Http\Controllers\EmailTemplateController;
use Modules\Settings\Http\Controllers\RoleController;
use Modules\Settings\Http\Controllers\AdminController;
use Modules\Settings\Http\Controllers\SettingsController;
use Modules\Settings\Http\Controllers\SeoSettingController;
use Modules\Settings\Http\Controllers\ShopSettingController;
use Modules\Settings\Http\Controllers\SitemapController;

Route::group(["prefix"=> "admin", "as" => "admin.", "middleware" => ['auth', 'checkAdmin']], function () {

    // general settings
    Route::get('/general-setting', [SettingsController::class,'general_settings'])->name('general_setting');
    Route::post('/update-general-setting', [SettingsController::class,'update_general_settings'])->name('update.general_setting');
    Route::post('/update-logo-settings', [SettingsController::class,'update_logo_settings'])->name('update.logo_setting');
    Route::post('/update-cookie-consent', [SettingsController::class,'update_cookie_settings'])->name('update.cookie_consent');
    Route::post('/update-breadcrumb-image', [SettingsController::class,'update_breadcrumb_settings'])->name('update.breadcrumb_image');
    Route::post('/update-copyright-text', [SettingsController::class,'update_copyright_settings'])->name('update.copyright_text');
    Route::post('/update-maintenance-mode', [SettingsController::class,'update_maintenance_settings'])->name('update.maintenance_mode');
    Route::post('/search-eng-index', [SettingsController::class,'update_search_eng_index'])->name('update.search_eng_index');

    // mail configuration
    Route::get('/mail-configuration', [EmailTemplateController::class,'mail_settings'])->name('mail_configuration');
    Route::put('/mail-configuration/send-mail-queue', [EmailTemplateController::class,'update_mail_queue_status'])->name('mail_queue_status');
    Route::post('/update-mail-configuration', [EmailTemplateController::class,'update_mail_settings'])->name('update.mail_configuration');
    Route::get('/update-mail-template/{id}', [EmailTemplateController::class,'get_mail_template'])->name('get.mail_template');
    Route::put('/update-mail-template/{id}', [EmailTemplateController::class,'update_mail_template'])->name('update.mail_template');

    // credentials
    Route::get('/credentials-settings', [SettingsController::class,'credentials_settings'])->name('credentials_settings');
    Route::post('/update-google-recaptcha', [SettingsController::class,'update_google_recaptcha'])->name('update.google_recaptcha');
    Route::post('/update-google-tag', [SettingsController::class,'update_google_tag'])->name('update.google_tag');
    Route::post('/update-google-analytic', [SettingsController::class,'update_google_analytic'])->name('update.google_analytic');
    Route::post('/update-tawk-chat', [SettingsController::class,'update_twak_chat'])->name('update.twak_chat');

    // roles and permissions
    Route::resource('roles', RoleController::class)->except(['show']);
    Route::resource('manage-admin', AdminController::class)->except(['show']);

    // seo settings
    Route::resource('seo-settings', SeoSettingController::class)->only(['index', 'update']);

    // sitemap
    Route::resource('sitemap', SitemapController::class)->only(['index', 'store']);

    // shop settings
    Route::get('/shop-settings', [ShopSettingController::class, 'index'])->name('shop-settings.index');
    Route::put('/shop-settings', [ShopSettingController::class, 'update'])->name('shop-settings.update');

});
