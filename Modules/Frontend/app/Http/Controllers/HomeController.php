<?php

namespace Modules\Frontend\Http\Controllers;


use App\Http\Controllers\Controller;
use Modules\Frontend\Models\SitePage;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Frontend\Traits\UpdateSectionTrait;
use Illuminate\Routing\Controllers\HasMiddleware;

class HomeController extends Controller implements HasMiddleware
{
    use UpdateSectionTrait;

    public static function middleware(): array
    {
        return [
            new Middleware('permission:frontend-home_page_show', ['index']),
        ];
    }

    public function index($slug)
    {
        $page = SitePage::with('sections')->where('slug', $slug)->first();

        if (!$page) {
            return abort(404);
        }

        return view('frontend::home.index', compact('page'));
    }


}
