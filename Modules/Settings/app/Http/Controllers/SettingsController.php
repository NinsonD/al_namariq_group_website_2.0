<?php

namespace Modules\Settings\Http\Controllers;

use App\Enums\RedirectType;
use Illuminate\Http\Request;
use App\Traits\RedirectTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Modules\Settings\Models\Setting;
use Modules\Settings\Enums\AllTimeZoneEnum;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Settings\Http\Requests\TawkRequest;
use Modules\Settings\Traits\SettingsCacheTrait;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Settings\Http\Requests\CookieRequest;
use Modules\Settings\Http\Requests\GeneralRequest;
use Modules\Settings\Http\Requests\CopyrightRequest;
use Modules\Settings\Http\Requests\GoogleTagRequest;
use Modules\Settings\Http\Requests\LogoUpdateRequest;
use Modules\Settings\Http\Requests\MaintenanceRequest;
use Modules\Settings\Http\Requests\GoogleAnalyticRequest;
use Modules\Settings\Http\Requests\GoogleRecaptchaRequest;
use Modules\Settings\Http\Requests\BreadcrumbUpdateRequest;

class SettingsController extends Controller implements HasMiddleware
{
    use SettingsCacheTrait, RedirectTrait;

    public static function middleware(){
        return [
            new Middleware('permission:settings-show', ['index']),
            new Middleware('permission:settings-general_show', ['general_settings']),
            new Middleware('permission:settings-general_update', ['update_general_settings']),
            new Middleware('permission:settings-logo_update', ['update_logo_settings']),
            new Middleware('permission:settings-cookie_update', ['update_cookie_settings']),
            new Middleware('permission:settings-breadcrumb_update', ['update_breadcrumb_settings']),
            new Middleware('permission:settings-copyright_update', ['update_copyright_settings']),
            new Middleware('permission:settings-auto_approve_comments_update', ['approveCommentStatus']),

            new Middleware('permission:credentials_settings-show', ['credentials_settings']),
            new Middleware('permission:credentials_settings-google_recaptcha_update', ['update_google_recaptcha']),
            new Middleware('permission:credentials_settings-google_tag_manager_update', ['update_google_tag']),
            new Middleware('permission:credentials_settings-google_analytics_update', ['update_google_analytic']),
            new Middleware('permission:credentials_settings-tawk_chat_update', ['update_twak_chat']),
            new Middleware('permission:credentials_settings-search_engine_update', ['update_search_eng_index']),
            new Middleware('permission:settings-maintenance_settings_update', ['update_maintenance_settings']),
        ];
    }


    // General Settings
    public function general_settings()
    {
        $all_timezones = AllTimeZoneEnum::getAll();
        return view('settings::global.index', compact('all_timezones'));
    }

    // Update General Settings
    public function update_general_settings(GeneralRequest $request)
    {

        $data = $request->validated();

        foreach ($data as $key => $value) {
            updateSettings($key, $value);
        }

        if ($request->has('timezone')) {
            updateMultiEnv([
                'APP_TIMEZONE' => $request->timezone,
                'APP_NAME' => $request->app_name,
            ]);
        }

        Setting::where('key', 'preloader_status')->update(['value' => $request->has('preloader_status')]);
        Setting::where('key', 'backtotop_status')->update(['value' => $request->has('backtotop_status')]);
        Setting::where('key', 'magic_cursor_status')->update(['value' => $request->has('magic_cursor_status')]);


        $this->cacheSettings();

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.general_settings')]));
    }

    // Logo Settings
    public function update_logo_settings(LogoUpdateRequest $request)
    {
        $fields = ['logo', 'logo_white', 'logo_shop', 'favicon'];

        foreach ($fields as $field) {
            $setting = Setting::where('key', $field)->first();
            if ($setting && $request->hasFile($field)) {
                Setting::where('key', $field)->update([
                    'value' => updateMedia($request->file($field), $setting->value, 'website')
                ]);
            }
        }

        $this->cacheSettings();

        return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.general_setting');

    }

    // Cookie Settings
    public function update_cookie_settings(CookieRequest $request)
    {

        $settings = Setting::whereIn('key', [
            'cookie_status',
            'cookie_border',
            'cookie_corners',
            'cookie_background_color',
            'cookie_text_color',
            'cookie_border_color',
            'cookie_btn_bg_color',
            'cookie_btn_text_color',
            'cookie_link_text',
            'cookie_link',
            'cookie_btn_text',
            'cookie_message',
        ])->get();

        foreach ($settings as $setting) {

            if($setting->key === 'cookie_status') {
                $value = $request->has('cookie_status') ? 1 : 0;
            }else{
                $value = $request->{$setting->key};
            }

            Setting::where('key', $setting->key)->update(['value' => $value]);

        }

        $this->cacheSettings();

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.cookie_settings')]));
    }

    public function update_breadcrumb_settings(BreadcrumbUpdateRequest $request)
    {

        $breadcrumbs = ['breadcrumb_image', 'breadcrumb_image_services', 'breadcrumb_image_team'];

        foreach ($breadcrumbs as $breadcrumb) {
            $setting = Setting::where('key', $breadcrumb)->first();
            if ($setting && $request->hasFile($breadcrumb)) {
                Setting::where('key', $breadcrumb)->update([
                    'value' => updateMedia($request->file($breadcrumb), $setting->value, 'website')
                ]);
            }
        }

        $this->cacheSettings();

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.breadcrumb_settings')]));
    }

    public function update_copyright_settings(CopyrightRequest $request)
    {

        Setting::where('key', 'copyright_text')->update(['value' => $request->copyright_text]);

        $this->cacheSettings();

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.copyright_settings')]));

    }


    public function credentials_settings()
    {
        return view('settings::credentials');
    }

    public function update_google_recaptcha(GoogleRecaptchaRequest $request)
    {

        Setting::where('key', 'recaptcha_site_key')->update(['value' => $request->recaptcha_site_key]);
        Setting::where('key', 'recaptcha_secret_key')->update(['value' => $request->recaptcha_secret_key]);
        Setting::where('key', 'recaptcha_status')->update(['value' => $request->has('recaptcha_status') ? 1 : 0]);

        $this->cacheSettings();

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.google_recaptcha_settings')]));
    }

    public function update_google_tag(GoogleTagRequest $request)
    {
        Setting::where('key', 'google_tagmanager_id')->update(['value' => $request->google_tagmanager_id]);
        Setting::where('key', 'google_tagmanager_status')->update(['value' => $request->has('google_tagmanager_status') ? 1 : 0]);

        $this->cacheSettings();
        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.google_tag_settings')]));
    }

    public function update_google_analytic(GoogleAnalyticRequest $request)
    {
        Setting::where('key', 'google_analytic_id')->update(['value' => $request->google_analytic_id]);
        Setting::where('key', 'google_analytic_status')->update(['value' => $request->has('google_analytic_status') ? 1 : 0]);

        $this->cacheSettings();
        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.google_analytic_settings')]));
    }

    public function update_twak_chat(TawkRequest $request)
    {
        Setting::where('key', 'tawk_property_id')->update(['value' => $request->tawk_property_id]);
        Setting::where('key', 'tawk_widget_id')->update(['value' => $request->tawk_widget_id]);
        Setting::where('key', 'tawk_status')->update(['value' => $request->has('tawk_status') ? 1 : 0]);

        $this->cacheSettings();

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.tawk_settings')]));

    }

    public function update_search_eng_index(Request $request)
    {
        Setting::where('key', 'search_engine_indexing')->update(['value' => $request->has('search_engine_indexing') ? 1 : 0]);
        $this->cacheSettings();

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.search_engine_settings')]));

    }

    public function approveCommentStatus(Request $request)
    {
        Setting::where('key', 'comments_auto_approved')->update(['value' => $request->has('comments_auto_approved') ? 1 : 0]);
        $this->cacheSettings();

        $notification = __('notification.status_updated', ['field' => __('admin.comments_auto_approve')]);

        return response()->json([
            'success' => true,
            'message' => $notification,
        ]);
    }

    public function update_maintenance_settings(MaintenanceRequest $request)
    {

        $settings = cache()->get('setting');

        if($request->hasFile('maintenance_image')) {
            $image = updateMedia($request->file('maintenance_image'), $settings->maintenance_image, 'website');
            Setting::where('key', 'maintenance_image')->update(['value' => $image]);
        }

        Setting::where('key', 'maintenance_status')->update(['value' => $request->has('maintenance_status') ? 1 : 0]);
        Setting::where('key', 'maintenance_title')->update(['value' => $request->maintenance_title]);
        Setting::where('key', 'maintenance_description')->update(['value' => $request->maintenance_description]);
        $this->cacheSettings();

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.maintenance_mode')]));
    }
}
