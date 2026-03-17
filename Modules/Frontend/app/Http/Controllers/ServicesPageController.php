<?php

namespace Modules\Frontend\Http\Controllers;

use App\Helpers\SectionHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Frontend\Http\Requests\Pages\Services\ServicesBrandRequest;
use Modules\Frontend\Http\Requests\Pages\Services\ServicesHeroRequest;
use Modules\Frontend\Http\Requests\Pages\Services\ServicesPricingRequest;
use Modules\Frontend\Http\Requests\Pages\Services\ServicesProcessRequest;
use Modules\Frontend\Http\Requests\Pages\Services\ServicesServicesRequest;
use Modules\Frontend\Http\Requests\Pages\Services\ServicesTextSliderRequest;
use Modules\Frontend\Models\SitePage;
use Modules\Frontend\Traits\UpdateSectionTrait;

class ServicesPageController extends Controller
{
    use UpdateSectionTrait;


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = SitePage::with('sections')->where('slug', 'services')->first();

        if (!$page) {
            return abort(404);
        }

        return view('frontend::pages.services.index', compact('page'));
    }

    public function section(Request $request, $slug)
    {
        $section = SectionHelper::getTranslatedSection($request, $slug, 'services');

        return view('frontend::pages.services.sections.' . $slug, compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateHeroSection(ServicesHeroRequest $request)
    {

        $defaultContent = [''];
        $images = ['image', 'bg_image',];
        $translatableContent = ['title', 'description'];

        return $this->handleSectionUpdate(
            $request,
            getPageIdBySlug('services'),
            'hero',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateServicesSection(ServicesServicesRequest $request)
    {
        $defaultContent = [];
        $images = [];
        $translatableContent = ['subtitle', 'title'];

        return $this->handleSectionUpdate(
            $request,
            getPageIdBySlug('services'),
            'services',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateTextSliderSection(ServicesTextSliderRequest $request)
    {

        $defaultContent = [];
        $images = [];
        $translatableContent = ['slider_content_1', 'slider_content_2'];

        return $this->handleSectionUpdate(
            $request,
            getPageIdBySlug('services'),
            'text-slider',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updatePricingSection(ServicesPricingRequest $request)
    {
        $defaultContent = [];
        $images = ['bg_image'];
        $translatableContent = ['subtitle', 'title'];

        return $this->handleSectionUpdate(
            $request,
            getPageIdBySlug('services'),
            'pricing',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateProcessSection(ServicesProcessRequest $request)
    {

        $defaultContent = ['video_url'];
        $images = ['image'];
        $translatableContent = ['subtitle', 'title', 'description', 'process_title_1', 'process_title_2', 'process_title_3', 'process_title_4'];

        return $this->handleSectionUpdate(
            $request,
            getPageIdBySlug('services'),
            'process',
            $defaultContent,
            $images,
            $translatableContent
        );
    }
    public function updateBrandSection(ServicesBrandRequest $request)
    {
        $defaultContent = ['brands'];
        $images = [];
        $translatableContent = [];

        return $this->handleSectionUpdate(
            $request,
            getPageIdBySlug('services'),
            'brand',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

}
