<?php

namespace Modules\Settings\Http\Controllers;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Modules\Blog\Models\Blog;
use Modules\Page\Models\Page;
use Modules\Service\Models\Service;
use App\Http\Controllers\Controller;
use Modules\Portfolio\Models\Portfolio;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class SitemapController extends Controller implements HasMiddleware
{

    public static function middleware(){
        return [
            new Middleware('permission:sitemap-show', ['index']),
            new Middleware('permission:sitemap-create', ['store']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('settings::sitemap');
    }

    /**
     * Update the specified resource in storage.
     */
    public function store() 
    {
        $sitemap = Sitemap::create();

        $pages = [
            '/', 
            '/about', 
            '/contact', 
            '/blog', 
            '/blog/{slug}', 
            '/services', 
            '/services/{slug}',
            '/portfolios', 
            '/portfolios/{slug}', 
            '/team', 
            '/team/{username}', 
            '/faqs', 
            'pricing',
            '/privacy-policy', 
            '/terms-of-service'
        ];

        foreach ($pages as $page) {
            $sitemap->add(Url::create($page)->setLastModificationDate(now())->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS));
        }

        $customPages = Page::active()->get();
        foreach ($customPages as $page) {
            $sitemap->add(Url::create("/page/{$page->slug}")->setLastModificationDate($page?->updated_at ?? now())->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS));
        }

        $blogs = Blog::select('slug')->latest()->whereHas('category', function($query) {
            $query->active();
        })->active()->take(100)->get();

        foreach ($blogs as $blog) {
            $sitemap->add(Url::create("/blog/{$blog->slug}")->setLastModificationDate($blog?->updated_at ?? now())->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS));
        }

        $services = Service::select("slug")->latest()->active()->take(100)->get();
        foreach ($services as $service) {
            $sitemap->add(Url::create("/services/{$service->slug}")->setLastModificationDate($service?->updated_at ?? now())->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS));
        }

        $portfolios = Portfolio::select('slug')->latest()->active()->take(10)->get();
        foreach ($portfolios as $portfolio) {
            $sitemap->add(Url::create("/portfolios/{$portfolio->slug}")->setLastModificationDate($portfolio?->updated_at ?? now())->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
        return redirect()->back()->with('success', __('notification.site_map_generated'));
    }
}
