<?php

use Illuminate\Support\Facades\Cache;
use Modules\Language\Models\Language;


if (!function_exists('getSiteLanguages')) {
    function getSiteLanguages() {
        static $languages = null;

        if ($languages === null) {
            $languages = Cache::rememberForever('site_languages', function () {
                return Language::select('code', 'name', 'direction', 'is_default', 'status')
                    ->where('status', true)
                    ->get();
            });
        }

        return $languages;
    }
}


if (!function_exists('resetLanguagesCache')) {
    function resetLanguagesCache(): void {
        Cache::forget('site_languages');
    }
}


if (!function_exists('getSiteLocale')) {

    function getSiteLocale(): string {

        if (session()->has('lang')) {
            return session('lang');
        }else{
            $default_lang = getSiteLanguages()->where('is_default', true)->first();
            session()->put('lang', $default_lang?->code ?? config('app.locale'));
            session()->put('dir', $default_lang?->direction ?? 'ltr');
            return session('lang');
        }
    }
}

if (!function_exists('getDefaultLocale')) {

    function getDefaultLocale(): string {
        $default_lang = getSiteLanguages()->where('is_default', true)->first();
        return $default_lang?->code ?? config('app.locale');
    }
}

if (!function_exists('setSiteLocale')) {
    function setSiteLocale(string $code): bool {
        if (!isLanguageAvailable($code)) {
            return false;
        }

        resetSiteMenuCache();
        resetLanguageSession();

        $language = Language::where('code', $code)->first();
        if ($language) {
            session()->put('lang', $language->code);
            session()->put('dir', $language->direction);
            return true;
        }

        session()->put('lang', config('app.locale'));
        session()->put('dir', 'ltr');

        return false;
    }
}

if (!function_exists('resetLanguageSession')) {
    function resetLanguageSession(): void {
        session()->forget('lang');
        session()->forget('dir');

    }
}


if (!function_exists('isLanguageAvailable')) {
    function isLanguageAvailable(string $code): bool {
        return Language::where('code', $code)->exists();
    }
}

if(!function_exists('getSiteDir')) {
    function getSiteDir(): string {
        return session('dir', 'ltr');
    }
}

if (!function_exists('hideDivLang')) {
    function hideDivLang(string $code = 'en'): string {
        return $code === 'en' ? ' ' : ' d-none has-multi-lang';
    }
}
