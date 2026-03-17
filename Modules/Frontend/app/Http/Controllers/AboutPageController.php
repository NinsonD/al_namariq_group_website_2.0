<?php

namespace Modules\Frontend\Http\Controllers;

use App\Helpers\SectionHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Frontend\Http\Requests\Pages\About\AboutAboutRequest;
use Modules\Frontend\Http\Requests\Pages\About\AboutHeroRequest;
use Modules\Frontend\Http\Requests\Pages\About\AboutServicesRequest;
use Modules\Frontend\Http\Requests\Pages\About\AboutStepRequest;
use Modules\Frontend\Http\Requests\Pages\About\AboutTeamRequest;
use Modules\Frontend\Models\SitePage;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Frontend\Traits\UpdateSectionTrait;

class AboutPageController extends Controller implements HasMiddleware
{
    use UpdateSectionTrait;

    public static function middleware(): array
    {
        return [
            new Middleware('permission:frontend-about_page_show', ['index']),
            new Middleware('permission:frontend-about_page_update', ['update']),
        ];
    }

    public function index(Request $request)
    {
        $page = SitePage::with('sections')->where('slug', 'about')->first();


        if (!$page) {
            return abort(404);
        }

        return view('frontend::pages.about.index', compact('page'));
    }

    public function section(Request $request, $slug)
    {
        $section = SectionHelper::getTranslatedSection($request, $slug, 'about');

        return view('frontend::pages.about.' . $slug, compact('section'));
    }

    public function updateHeroSection(AboutHeroRequest $request)
    {

        $defaultContent = [''];
        $images = ['image'];
        $translatableContent = ['subtitle','title', 'description', 'slider_text'];

        return $this->handleSectionUpdate(
            $request,
            getPageIdBySlug('about'),
            'hero',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateAboutSection(AboutAboutRequest $request)
    {

        $defaultContent = ['counter_number_1', 'counter_number_2', 'counter_unit_1', 'counter_unit_2'];
        $images = ['image', 'shape', 'people_image'];
        $translatableContent = ['subtitle','title', 'description', 'counter_title_1', 'counter_title_2'];

        return $this->handleSectionUpdate(
            $request,
            getPageIdBySlug('about'),
            'about',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateServicesSection(AboutServicesRequest $request)
    {

        $defaultContent = ['services'];
        $images = [];
        $translatableContent = ['subtitle','title', 'description'];

        return $this->handleSectionUpdate(
            $request,
            getPageIdBySlug('about'),
            'services',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateStepSection(AboutStepRequest $request)
    {

        $defaultContent = [];
        $images = [];
        $translatableContent = ['subtitle','title', 'step_title_1', 'step_description_1', 'step_title_2', 'step_description_2', 'step_title_3', 'step_description_3', 'step_title_4', 'step_description_4'];

        return $this->handleSectionUpdate(
            $request,
            getPageIdBySlug('about'),
            'step',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateTeamSection(AboutTeamRequest $request)
    {

        $defaultContent = ['teams'];
        $images = [];
        $translatableContent = ['title'];

        return $this->handleSectionUpdate(
            $request,
            getPageIdBySlug('about'),
            'team',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

}
