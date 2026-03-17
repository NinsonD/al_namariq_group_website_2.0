<?php

namespace App\Providers;

use App\Enums\ThemeList;
use Modules\Frontend\Models\Contact;
use App\Traits\GlobalInfoTrait;
use Modules\Social\Models\Social;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Modules\Settings\Models\SeoSetting;
use Illuminate\Support\Facades\App;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    use GlobalInfoTrait;
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        try {

            if(Schema::hasTable('settings')){
                $settings = getSetting();
            } else {
                $settings = (object) [
                    'timezone' => config('app.timezone'),
                    'site_theme' => ThemeList::MAIN->value,
                    'maintenance_status' => 0,
                ];
            }


            $social_links = Schema::hasTable('socials') ? Cache::rememberForever('social_links', fn () => Social::active()->select('link', 'icon')->get()) : (object) [];
            $seo_setting = Schema::hasTable('seo_settings') ? Cache::rememberForever('seo_setting', fn() => (object) SeoSetting::all()->groupBy('page_name')->mapWithKeys(function($group, $pageName){
                return [$pageName => $group->first()];
            })) : (object) [];
            $site_contact = Schema::hasTable('contacts') ? Cache::rememberForever('site_contact', fn() => (object) Contact::default()->first()?->value ?? []) : (object) [];

            $this->set_mail_config();

        } catch (\Throwable $th) {
            info($th);
            $settings = (object) [
                'timezone' => config('app.timezone'),
                'site_theme' => ThemeList::MAIN->value,
                'maintenance_status' => 0,
            ];

            $social_links = (object) [];
            $seo_setting = (object) [];
            $site_contact = (object) [];
        }

        View::composer('*', function ($view) use ($settings, $social_links, $seo_setting, $site_contact) {

            $view->with([
                'settings' => $settings,
                'social_links' => $social_links,
                'seo_setting' => $seo_setting,
                'site_contact' => $site_contact,
            ]);
        });

        if (!defined('SITE_DEFAULT_HOME')) {
            define('SITE_DEFAULT_HOME', $settings->site_theme ?? ThemeList::MAIN->value);
        }

    }

    protected function registerBladeDirectives()
    {
        Blade::directive('theme', function ($themes) {
            return "<?php if(in_array(SITE_DEFAULT_HOME, {$themes})): ?>";
        });

        Blade::directive('endtheme', function () {
            return '<?php endif; ?>';
        });
    }
}
