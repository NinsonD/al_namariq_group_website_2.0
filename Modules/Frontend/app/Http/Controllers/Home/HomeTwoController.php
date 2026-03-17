<?php

namespace Modules\Frontend\Http\Controllers\Home;

use App\Helpers\SectionHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Frontend\Http\Requests\HomeTwo\AboutSectionRequest;
use Modules\Frontend\Http\Requests\HomeTwo\AppBrandSectionRequest;
use Modules\Frontend\Http\Requests\HomeTwo\BenefitSectionRequest;
use Modules\Frontend\Http\Requests\HomeTwo\BrandSectionRequest;
use Modules\Frontend\Http\Requests\HomeTwo\FaqSectionRequest;
use Modules\Frontend\Http\Requests\HomeTwo\HeroSectionRequest;
use Modules\Frontend\Http\Requests\HomeTwo\PortfolioSectionRequest;
use Modules\Frontend\Http\Requests\HomeTwo\ServicesSectionRequest;
use Modules\Frontend\Http\Requests\HomeTwo\StepSectionRequest;
use Modules\Frontend\Http\Requests\HomeTwo\TestimonialSectionRequest;
use Modules\Frontend\Http\Requests\HomeTwo\TextSliderSectionRequest;
use Modules\Frontend\Models\SitePage;
use Modules\Frontend\Traits\UpdateSectionTrait;

class HomeTwoController extends Controller
{
    use UpdateSectionTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = SitePage::with('sections')->where('slug', 'home_two')->first();

        if (!$page) {
            return abort(404);
        }

        return view('frontend::home.two.index', compact('page'));
    }

    public function section(Request $request, $slug)
    {
        $section = SectionHelper::getTranslatedSection($request, $slug, 'home_two');

        return view('frontend::home.two.' . $slug, compact('section'));
    }

    public function updateHeroSection(HeroSectionRequest $request)
    {
        $defaultContent = ['btn_url', 'btn_url_2',];
        $images = ['main_image', 'thumb_shape', 'bg_shape', 'title_shape_1', 'title_shape_2'];
        $translatableContent = ['title', 'subtitle', 'description', 'btn_text', 'btn_text_2'];

        return $this->handleSectionUpdate(
            $request,
            2,
            'hero',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateStepSection(StepSectionRequest $request)
    {
        $defaultContent = [];
        $images = ['main_image', 'thumb_shape_1', 'thumb_shape_2', 'bg_shape_1', 'bg_shape_2'];
        $translatableContent = ['title', 'subtitle', 'description', 'step_subtitle_1', 'step_title_1', 'step_description_1', 'step_subtitle_2', 'step_title_2', 'step_description_2', 'step_subtitle_3', 'step_title_3', 'step_description_3', 'step_subtitle_4', 'step_title_4', 'step_description_4'];

        return $this->handleSectionUpdate(
            $request,
            2,
            'step',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateBrandSection(BrandSectionRequest $request)
    {
        $defaultContent = ['brands'];
        $images = [];
        $translatableContent = ['title'];

        return $this->handleSectionUpdate(
            $request,
            2,
            'brand',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateServicesSection(ServicesSectionRequest $request)
    {
        $defaultContent = ['services'];
        $images = ['bg_image', 'shape'];
        $translatableContent = ['title', 'subtitle', 'box_title', 'btn_text'];

        return $this->handleSectionUpdate(
            $request,
            2,
            'services',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateAboutSection(AboutSectionRequest $request)
    {
        $defaultContent = ['counter_number_1', 'counter_unit_1', 'counter_number_2', 'counter_unit_2', 'btn_url'];
        $images = ['image_1', 'image_2', 'image_3', 'bg_shape_1', 'bg_shape_2'];
        $translatableContent = ['title', 'subtitle', 'description', 'btn_text', 'counter_title_1', 'counter_title_2'];

        return $this->handleSectionUpdate(
            $request,
            2,
            'about',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updatePortfolioSection(PortfolioSectionRequest $request)
    {
        $defaultContent = ['portfolios'];
        $images = [];
        $translatableContent = ['title', 'subtitle'];

        return $this->handleSectionUpdate(
            $request,
            2,
            'portfolio',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateTextSliderSection(TextSliderSectionRequest $request)
    {
        $defaultContent = [];
        $images = [];
        $translatableContent = ['slider_content_1', 'slider_content_2'];

        return $this->handleSectionUpdate(
            $request,
            2,
            'text-slider',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateTestimonialSection(TestimonialSectionRequest $request)
    {
        $defaultContent = ['testimonials'];
        $images = [];
        $translatableContent = ['title', 'subtitle'];

        return $this->handleSectionUpdate(
            $request,
            2,
            'testimonial',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateAppBrandSection(AppBrandSectionRequest $request)
    {
        $defaultContent = [];
        $images = ['image_1', 'image_2', 'image_3'];
        $translatableContent = ['title_1', 'title_2', 'title_3'];

        return $this->handleSectionUpdate(
            $request,
            2,
            'app-brand',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateBenefitSection(BenefitSectionRequest $request)
    {
        $defaultContent = [];
        $images = ['icon_1', 'icon_2', 'icon_3'];
        $translatableContent = ['subtitle', 'title', 'benefit_title_1', 'benefit_title_2', 'benefit_title_3', 'benefit_description_1', 'benefit_description_2', 'benefit_description_3'];

        return $this->handleSectionUpdate(
            $request,
            2,
            'benefit',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateFaqSection(FaqSectionRequest $request)
    {
        $defaultContent = ['faqs'];
        $images = ['image', 'shape'];
        $translatableContent = ['title', 'subtitle'];

        return $this->handleSectionUpdate(
            $request,
            2,
            'faq',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

}
