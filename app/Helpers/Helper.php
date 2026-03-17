<?php

use Carbon\Carbon;
use Modules\Frontend\Models\Contact;
use Modules\Frontend\Models\SitePage;
use Modules\Menu\Models\Menu;
use Modules\Social\Models\Social;
use Modules\Settings\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Modules\Settings\Models\SeoSetting;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\FooterSetting\Models\FooterSetting;


if (!function_exists('updateMultiEnv')) {
    /**
     * Update the .env file with the given key-value pairs.
     *
     * @param array $data
     * @return bool
     */
    function updateMultiEnv(array $data): bool
    {
        $envFile = base_path('.env');
        $envContent = File::get($envFile);

        foreach ($data as $key => $value) {
            // Trim spaces and wrap values with spaces in double quotes
            $value = trim($value);
            if (strpos($value, ' ') !== false) {
                $value = "\"$value\""; // Wrap in quotes if it contains spaces
            }

            // Regular expression to find the key
            $pattern = "/^$key=.*/m";

            // Check if the key exists in the .env file
            if (preg_match($pattern, $envContent)) {
                // Replace the line with the new value
                $envContent = preg_replace($pattern, "$key=$value", $envContent);
            } else {
                // If the key does not exist, add it to the end
                $envContent .= "\n$key=$value";
            }
        }

        if (File::put($envFile, $envContent)) {
            return true;
        }

        return false;
    }

}

if (!function_exists('getSetting')) {
    function getSetting() {
        static $settings = null;

        if ($settings === null) {
            $settings = Cache::rememberForever('setting', function () {
                return (object) Setting::pluck('value', 'key')->all();
            });
        }

        return $settings;
    }
}

// get all social links
if (!function_exists('getActiveSocialLinks')) {
    function getActiveSocialLinks() {
        static $socialLinks = null;

        if ($socialLinks === null) {
            $socialLinks = Cache::rememberForever('social_links', function () {
                return Social::active()->select('link', 'icon')->get();
            });
        }

        return $socialLinks;
    }
}


if (!function_exists('getSeoSetting')) {
    function getSeoSetting() {
        static $seoSettings = null;

        if ($seoSettings === null) {
            $seoSettings = Cache::rememberForever('seo_setting', function () {
                return (object) SeoSetting::all()
                    ->groupBy('page_name')
                    ->mapWithKeys(function ($group, $pageName) {
                        return [$pageName => $group->first()];
                    });
            });
        }

        return $seoSettings;
    }
}



if (!function_exists('pureText')) {
    function pureText($text) {
        // Replace text within curly brackets with a <b> tag
        $text = preg_replace_callback('/\{(.*?)\}/', function ($matches) {
            return '<b>' . htmlspecialchars($matches[1], ENT_QUOTES, 'UTF-8') . '</b>';
        }, $text);

        // Replace text within square brackets with a <span> tag
        $text = preg_replace_callback('/\[(.*?)\]/', function ($matches) {
            return '<span>' . htmlspecialchars($matches[1], ENT_QUOTES, 'UTF-8') . '</span>';
        }, $text);

        // Replace backslashes with line breaks
        $text = str_replace('\\', '<br>', $text);

        return $text;
    }
}


if (!function_exists('pureCopyrightText')) {
    function pureCopyrightText($text) {
        return preg_replace_callback('/\[(.*?)\]/', function ($matches) {
            $siteUrl = url('/');
            $label = $matches[1];
            return "<a href=\"{$siteUrl}\" target=\"_blank\">{$label}</a>";
        }, $text);
    }
}



if(!function_exists('getDefaultTheme')) {
    function getDefaultTheme() {
        return cache()->get('setting')->site_theme ??  'home_main';
    }
}

if(!function_exists('resetSiteMenuCache')) {
    function resetSiteMenuCache() {
        Cache::forget('main_menu');
        Cache::forget('footer_col_1');
        Cache::forget('footer_col_2');
    }
}


if (!function_exists('getSiteMenus')) {
    function getSiteMenus(): array
    {
        $menus = Menu::with('translations')
            ->whereIn('location', ['header', 'footer_col_1', 'footer_col_2', 'footer_col_3', 'footer_col_4'])
            ->get()
            ->keyBy('location');

        return [
            'main_menu' => $menus['header']?->menu_items ?? [],
            'footer_menu_one' => $menus['footer_col_1']?->menu_items ?? [],
            'footer_menu_two' => $menus['footer_col_2']?->menu_items ?? [],
            'footer_menu_three' => $menus['footer_col_3']?->menu_items ?? [],
            'footer_menu_four' => $menus['footer_col_4']?->menu_items ?? [],
        ];
    }
}


if(!function_exists('getMainMenu')) {
    function getMainMenu() {
        $menu = Menu::with(['translations' => function($query) {
            $query->where('locale', session('lang', getSiteLocale()));
        }])->where('location', 'header')->first()?->menu_items;

        return Cache::rememberForever('main_menu', fn() => $menu);
    }
}

if(!function_exists('getFooterMenuOne')){
    function getFooterMenuOne(){

        $menu = Menu::with(['translations' => function($query) {
            $query->where('locale', session('lang', getSiteLocale()));
        }])->where('location', 'footer_col_1')->first()?->menu_items;

        return is_array($menu) ? json_encode($menu) : json_decode($menu);
    }
}

if(!function_exists('getFooterMenuTwo')){
    function getFooterMenuTwo(){
        $menu = Menu::with(['translations' => function($query) {
            $query->where('locale', session('lang', getSiteLocale()));
        }])->where('location', 'footer_col_2')->first()?->menu_items;

        return is_array($menu) ? json_encode($menu) : json_decode($menu);
    }
}


if (!function_exists('isThisRoute')) {
    function isThisRoute(string | array $route, string $returnValue = ''): bool|string {
        if (is_array($route)) {
            foreach ($route as $value) {
                if (Route::is($value)) {
                    return is_null($returnValue) ? true : $returnValue;
                }
            }
            return false;
        }

        if (Route::is($route)) {
            return is_null($returnValue) ? true : $returnValue;
        }

        return false;
    }
}

if (!function_exists('updateSettings')) {
    function updateSettings(string $key, $value) {
        $setting = Setting::where('key', $key)->first();
        if ($setting) {
            $setting->value = $value;
            $setting->save();

        }else{
            return false;
        }

        cache()->forget('setting');
    }
}

if (!function_exists('copyFilesToStorage')) {
    function copyFilesToStorage($sourcePath, $targetPath = 'uploads', callable|null $logger = null): void
    {
        $defaultUploadDir = 'uploads';
        $finalTargetPath = public_path("{$defaultUploadDir}/{$targetPath}");

        // Ensure the target directory exists
        if (!file_exists($finalTargetPath)) {
            mkdir($finalTargetPath, 0777, true);
        }

        foreach (glob($sourcePath . '/*') as $file) {
            $sourceFile = $file;
            $targetFile = "{$finalTargetPath}/" . basename($file);

            if (file_exists($sourceFile)) {
                copy($sourceFile, $targetFile);
                if ($logger) {
                    $logger("info", "Seeded file: {$defaultUploadDir}/{$targetPath}/" . basename($file));
                }
            } else {
                if ($logger) {
                    $logger("error", "File not found: {$sourceFile}");
                }
            }
        }
    }
}


if (!function_exists('core_paginate')) {
    function core_paginate($items, $perPage = 20, $pageName = 'page')
    {
        // Get current page from the request, default to 1
        $currentPage = request()->input($pageName, 1);

        // Slice the items array for the current page
        $currentItems = array_slice($items, ($currentPage - 1) * $perPage, $perPage);

        // Create a LengthAwarePaginator instance
        return new LengthAwarePaginator(
            $currentItems,
            count($items),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }
}


if(!function_exists('isDemoMode')){
    function isDemoMode():bool{
        return strtolower(config('app.app_mode')) == 'demo' ? true : false;
    }

}

if (!function_exists('activeRoute')) {
    function activeRoute(string|array $routes,  array $params = [], string $activeClass = ' menu-current active'): bool|string {
        $matched = false;

        foreach ((array) $routes as $route) {
            if (Route::is($route)) {

                if (!empty($params)) {
                    $routeParams = request()->route()?->parameters();

                    $paramMatched = collect($params)->every(function ($value, $key) use ($routeParams) {
                        return isset($routeParams[$key]) && $routeParams[$key] == $value;
                    });

                    if ($paramMatched) {
                        $matched = true;
                        break;
                    }
                } else {
                    $matched = true;
                    break;
                }
            }
        }

        return $matched ? ($activeClass ?? true) : false;
    }
}

if (!function_exists('getSettingStatus')) {
    function getSettingStatus($key)
    {
        if (!is_null($key)) {
            if (Cache::has('setting')) {
                return checkCachedSetting($key);
            } else {
                return checkDatabaseSetting($key);
            }
        }

        return false;
    }
}

if (!function_exists('checkCachedSetting')) {
    function checkCachedSetting($key)
    {
        $setting = Cache::get('setting');

        if (is_object($setting) && isset($setting->$key)) {
            return $setting->$key == 1;
        }

        return false;
    }
}

if (!function_exists('checkDatabaseSetting')) {
    function checkDatabaseSetting($key)
    {
        try {
            return Setting::where('key', $key)->first()?->value == 1;
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return false;
        }
    }
}


if (!function_exists('getPageIdBySlug')) {
    function getPageIdBySlug($slug)
    {
        $page = SitePage::where('slug', $slug)->first();
        return $page ? $page->id : null;
    }
}


if (!function_exists('getSiteContact')) {
    function getSiteContact()
    {
        $contact = Contact::default()->get();
        return $contact ? $contact : null;
    }
}




if (!function_exists('dateFormats')) {
    function dateFormats()
    {
        return [
            // ISO / Standard
            'Y-m-d'       => 'YYYY-MM-DD (' . Carbon::now()->format('Y-m-d') . ')',
            'Y/m/d'       => 'YYYY/MM/DD (' . Carbon::now()->format('Y/m/d') . ')',
            'Ymd'         => 'YYYYMMDD (' . Carbon::now()->format('Ymd') . ')',

            // DMY variations
            'd/m/Y'       => 'DD/MM/YYYY (' . Carbon::now()->format('d/m/Y') . ')',
            'd-m-Y'       => 'DD-MM-YYYY (' . Carbon::now()->format('d-m-Y') . ')',
            'd.m.Y'       => 'DD.MM.YYYY (' . Carbon::now()->format('d.m.Y') . ')',
            'd M, Y'      => 'Day Month, Year (' . Carbon::now()->format('d M, Y') . ')',
            'jS F Y'      => 'Day Ordinal Full Month Year (' . Carbon::now()->format('jS F Y') . ')',

            // MDY variations
            'm/d/Y'       => 'MM/DD/YYYY (' . Carbon::now()->format('m/d/Y') . ')',
            'm-d-Y'       => 'MM-DD-YYYY (' . Carbon::now()->format('m-d-Y') . ')',
            'M d, Y'      => 'Month Day, Year (' . Carbon::now()->format('M d, Y') . ')',
            'F j, Y'      => 'Full Month Name, Day, Year (' . Carbon::now()->format('F j, Y') . ')',

            // With Day Names
            'D, M d Y'    => 'Day, Month Day Year (' . Carbon::now()->format('D, M d Y') . ')',
            'l, F j, Y'   => 'Weekday, Full Month Day, Year (' . Carbon::now()->format('l, F j, Y') . ')',

            // Time included
            'Y-m-d H:i'   => 'YYYY-MM-DD HH:MM (' . Carbon::now()->format('Y-m-d H:i') . ')',
            'Y-m-d H:i:s' => 'YYYY-MM-DD HH:MM:SS (' . Carbon::now()->format('Y-m-d H:i:s') . ')',
            'd/m/Y H:i'   => 'DD/MM/YYYY HH:MM (' . Carbon::now()->format('d/m/Y H:i') . ')',
            'm-d-Y h:i A' => 'MM-DD-YYYY HH:MM AM/PM (' . Carbon::now()->format('m-d-Y h:i A') . ')',

            // Compact / technical
            'His'         => 'HHMMSS (' . Carbon::now()->format('His') . ')',
            'Y-m-d\TH:i:s' => 'ISO8601 (e.g. ' . Carbon::now()->format('Y-m-d\TH:i:s') . ')',
            'U'           => 'Unix Timestamp (' . Carbon::now()->format('U') . ')',
        ];
    }
}

if (!function_exists('pureDate')) {
    function pureDate($dateString){
         static $dateFormat = null;

        if ($dateFormat === null) {
            $dateFormat = cache()->get('setting')->date_format ?? 'M d, Y';
        }
        return Carbon::parse($dateString)->format($dateFormat);
    }
}


if (! function_exists('readingTime')) {
    /**
     * Estimate reading time for given text
     *
     * @param string $text
     * @param int $wpm Words per minute (default: 200)
     * @return string
     */
    function readingTime(string $text, int $wpm = 200): string
    {
        $plainText = trim(strip_tags($text));
        $wordCount = str_word_count($plainText);

        $minutes = ceil($wordCount / $wpm);

        if ($minutes < 60) {
            return "{$minutes} " . __('frontend.min_read');
        }

        $hours = floor($minutes / 60);
        $remainingMinutes = $minutes % 60;

        if ($hours < 24) {
            return $remainingMinutes > 0
                ? "{$hours} " . __('frontend.hr') . " {$remainingMinutes} " . __('frontend.min_read')
                : "{$hours} " . __('frontend.hr') . " " . __('frontend.read');
        }

        $days = floor($hours / 24);
        $remainingHours = $hours % 24;

        return $remainingHours > 0
            ? "{$days} " . __('frontend.day') . " {$remainingHours} " . __('frontend.hr') . " " . __('frontend.read')
            : "{$days} " . __('frontend.day') . " " . __('frontend.read');
    }
}
