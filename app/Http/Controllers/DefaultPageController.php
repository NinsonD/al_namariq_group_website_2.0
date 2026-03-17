<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Faqs\Models\Faq;
use Modules\Page\Models\Page;
use Modules\Team\Models\Team;
use Modules\Pricing\Models\Pricing;
use Modules\Service\Models\Service;
use Modules\Frontend\Models\Contact;
use Modules\Frontend\Models\Section;
use Modules\Frontend\Models\SitePage;
use Modules\Portfolio\Models\Portfolio;
use Modules\Testimonial\Models\Testimonial;

class DefaultPageController extends Controller
{
    public function about()
    {
        $page = SitePage::where('slug', 'about')->with(['sections.translations'])->first();
        $sections = $page->sections->keyBy('slug');
        return view('frontend.pages.about.index', compact('page', 'sections'));
    }

    public function contact()
    {
        $contacts = Contact::all();
        return view('frontend.pages.contact', compact('contacts'));
    }

    public function services()
    {
        $services = Service::active()->paginate(9)->withQueryString();
        $page = SitePage::where('slug', 'services')->with(['sections.translations'])->first();
        $sections = $page->sections->keyBy('slug');

        $pricings = Pricing::active()->get();
        $yearly_pricing = $pricings->where('expiration', 'yearly');
        $monthly_pricing = $pricings->where('expiration', 'monthly');

        return view('frontend.pages.services.index', compact('services', 'sections', 'pricings', 'yearly_pricing', 'monthly_pricing'));
    }

    public function servicesDetails($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.services.details', compact('service'));
    }

    public function portfolios(Request $request)
    {
        $query = Portfolio::query();

        if ($request->has('tag') && $request->get('tag') != null) {
            $tag = $request->get('tag');
            $query->whereJsonContains('tags', ['value' => $tag]);
        }

        $portfolios = $query->latest()->paginate(9)->withQueryString();

        return view('frontend.pages.portfolio.index', compact('portfolios'));
    }

    public function portfoliosDetails($slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();
        $latestPortfolios = Portfolio::where('id', '!=', $portfolio->id)->latest()->take(3)->get();

        // Get both prev and next in a single query
        $siblings = Portfolio::where('id', '<', $portfolio->id)
            ->orWhere('id', '>', $portfolio->id)
            ->orderBy('id')
            ->get();

        $previous = $siblings->where('id', '<', $portfolio->id)->sortByDesc('id')->first();
        $next = $siblings->where('id', '>', $portfolio->id)->sortBy('id')->first();

        return view('frontend.pages.portfolio.details', compact('portfolio', 'previous', 'next', 'latestPortfolios'));

    }


    public function team()
    {
        $teams = Team::active()->paginate(8);
        $section = Section::where('slug', 'testimonial')->where('site_page_id', 1)->first() ?? null;

        return view('frontend.pages.team.index', compact('teams', 'section'));
    }

    public function teamDetails($username)
    {
        $team = Team::where('username', $username)->firstOrFail();
        return view('frontend.pages.team.details', compact('team'));
    }

    public function pricing()
    {
        $pricings = Pricing::with('translations')->active()->get();
        $yearly_pricing = $pricings->where('expiration', 'yearly');
        $monthly_pricing = $pricings->where('expiration', 'monthly');

        $testimonials = Testimonial::with('translations')
            ->active()
            ->latest()
            ->get();

        $faqs = Faq::with('translations')
            ->active()
            ->latest()
            ->get();

        return view('frontend.pages.pricing', compact('pricings', 'yearly_pricing', 'monthly_pricing', 'testimonials', 'faqs'));
    }

    public function faqs()
    {
        $faqs = Faq::with('translations')
            ->active()
            ->latest()
            ->get();

        return view('frontend.pages.faq', compact('faqs'));
    }

    public function privacyPolicy()
    {
        $page = Page::where('slug', 'privacy-policy')->first();

        if(!$page || $page->status == 0){
            abort(404);
        }

        return view('frontend.pages.custom-page', compact('page'));
    }
    public function termsAndConditions()
    {
        $page = Page::where('slug', 'terms-and-conditions')->first();

        if(!$page || $page->status == 0){
            abort(404);
        }

        return view('frontend.pages.custom-page', compact('page'));
    }

    public function termsOfService()
    {
        $page = Page::where('slug', 'terms-of-service')->first();

        if(!$page || $page->status == 0){
            abort(404);
        }
        return view('frontend.pages.custom-page', compact('page'));
    }
}
