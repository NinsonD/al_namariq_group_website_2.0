<?php

namespace App\Http\Controllers;

use Modules\Frontend\Models\SitePage;
use Modules\Page\Models\Page;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function index()
    {
        $theme_name = Session::has('demo_homepage') ? Session::get('demo_homepage') : getDefaultTheme();

        $page = SitePage::where('slug', $theme_name)->with(['sections.translations'])->first();

        if(!$page || $page->status == 0) {
            abort(404);
        }

        $sections = $page?->sections->keyBy('slug');

        extract(getSiteMenus());

        return view('frontend.home.' . $theme_name . '.index', compact(
            'page', 'sections', 'main_menu', 'footer_menu_one', 'footer_menu_two', 'footer_menu_three', 'footer_menu_four'
        ));

    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if(!$page || $page->status == 0) {
            abort(404);
        }

        return view('frontend.pages.custom-page', compact('page'));
    }
}
