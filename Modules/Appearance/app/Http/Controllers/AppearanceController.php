<?php

namespace Modules\Appearance\Http\Controllers;

use App\Enums\ThemeList;
use Illuminate\Http\Request;
use App\Traits\RedirectTrait;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Settings\Traits\SettingsCacheTrait;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Appearance\Http\Requests\ColorUpdateRequest;
use Modules\Appearance\Http\Requests\ThemeUpdateRequest;

class AppearanceController extends Controller implements HasMiddleware
{
    use RedirectTrait, SettingsCacheTrait;

    public static function middleware(){
        return [
            new Middleware('permission:appearance-theme-show', ['index']),
            new Middleware('permission:appearance-theme-update', ['updateTheme', ]),
            new Middleware('permission:appearance-show_all_homepage_update', ['updateShowAllHomePage', ]),
            new Middleware('permission:appearance-theme_colors_show', ['colors']),
            new Middleware('permission:appearance-theme_colors_update', ['updateColors']),
        ];
    }

    public function index()
    {
        $themes = ThemeList::themes();
        return view('appearance::index', compact('themes'));
    }

    public function updateTheme(ThemeUpdateRequest $request)
    {

        updateSettings('site_theme', $request->theme);

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.theme')]));

    }

    public function updateShowAllHomePage(Request $request)
    {
        $value = $request->has('show_all_homepage') ? 1 : 0;
        updateSettings('show_all_homepage', $value);

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.show_all_homepage')]));
    }

    public function colors()
    {
        return view('appearance::colors');
    }

    public function updateColors(ColorUpdateRequest $request)
    {

        updateSettings('primary_color', $request->site_primary_color);
        updateSettings('secondary_color', $request->site_secondary_color);
        updateSettings('third_color', $request->site_third_color);
        updateSettings('shop_theme_color', $request->shop_theme_color);

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.colors')]));
    }
}
