<?php

namespace Modules\Frontend\Http\Controllers\Home;

use App\Helpers\SectionHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Frontend\Http\Requests\HomeThree\AppDownloadSectionRequest;
use Modules\Frontend\Http\Requests\HomeThree\AppReviewSectionRequest;
use Modules\Frontend\Http\Requests\HomeThree\BrandSectionRequest;
use Modules\Frontend\Http\Requests\HomeThree\DashboardSectionRequest;
use Modules\Frontend\Http\Requests\HomeThree\FaqSectionRequest;
use Modules\Frontend\Http\Requests\HomeThree\FeaturesSectionRequest;
use Modules\Frontend\Http\Requests\HomeThree\HeroSectionRequest;
use Modules\Frontend\Http\Requests\HomeThree\HowItWorksSectionRequest;
use Modules\Frontend\Http\Requests\HomeThree\PricingSectionRequest;
use Modules\Frontend\Http\Requests\HomeThree\TestimonialSectionRequest;
use Modules\Frontend\Models\SitePage;
use Modules\Frontend\Traits\UpdateSectionTrait;

class HomeThreeController extends Controller
{
    use UpdateSectionTrait;

    public function index()
    {
        $page = SitePage::with('sections')->where('slug', 'home_three')->first();

        if (!$page) {
            return abort(404);
        }

        return view('frontend::home.three.index', compact('page'));
    }

    public function section(Request $request, $slug)
    {
        $section = SectionHelper::getTranslatedSection($request, $slug, 'home_three');

        return view('frontend::home.three.' . $slug, compact('section'));
    }

    public function updateHeroSection(HeroSectionRequest $request)
    {
        $defaultContent = ['btn_url', 'btn_url_2', 'rating'];
        $images = ['bg_image', 'bg_image_2', 'main_image', 'app_image', 'shape_1', 'shape_2', 'shape_3', 'shape_4', 'shape_5', 'btn_icon'];
        $translatableContent = ['title', 'subtitle', 'description', 'btn_text', 'btn_text_2', 'app_title'];

        return $this->handleSectionUpdate(
            $request,
            3,
            'hero',
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
            3,
            'brand',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateFeaturesSection(FeaturesSectionRequest $request)
    {
        $defaultContent = [];
        $images = ['icon_1', 'icon_2', 'icon_3'];
        $translatableContent = ['subtitle', 'title', 'description', 'feature_title_1', 'feature_description_1', 'feature_title_2', 'feature_description_2', 'feature_title_3', 'feature_description_3'];

        return $this->handleSectionUpdate(
            $request,
            3,
            'features',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateHowItWorksSection(HowItWorksSectionRequest $request)
    {
        $defaultContent = [];
        $images = ['bg_image', 'main_image', 'shape_1', 'shape_2', 'shape_3'];
        $translatableContent = ['title', 'subtitle', 'title_2', 'title_3'];

        return $this->handleSectionUpdate(
            $request,
            3,
            'how-it-works',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateAppReviewSection(AppReviewSectionRequest $request)
    {
        $defaultContent = [];
        $images = [
            'main_image',
            'image_2',
            'icon_1',
            'icon_2',
        ];
        $translatableContent = [
            'subtitle',
            'title',
            'title_2',
            'item_title_1',
            'item_subtitle_1',
            'item_title_2',
            'item_subtitle_2',
        ];

        return $this->handleSectionUpdate(
            $request,
            3,
            'app-review',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateDashboardSection(DashboardSectionRequest $request)
    {
        $defaultContent = ['btn_url', 'btn_url_2', 'btn_url_3'];
        $images = ['image_1', 'image_2', 'image_3', 'shape_1', 'shape_2', 'shape_3', 'shape_4', 'shape_5', 'shape_6', 'shape_7', 'shape_8', 'shape_9'];
        $translatableContent = [
            'subtitle_1',
            'title_1',
            'description_1',
            'btn_text',
            'subtitle_2',
            'title_2',
            'description_2',
            'btn_text_2',
            'subtitle_3',
            'title_3',
            'description_3',
            'btn_text_3',
        ];

        return $this->handleSectionUpdate(
            $request,
            3,
            'dashboard',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updatePricingSection(PricingSectionRequest $request)
    {
        $defaultContent = [];
        $images = ['bg_image'];
        $translatableContent = [
            'subtitle',
            'title',
            'description',
            'btn_text',
        ];

        return $this->handleSectionUpdate(
            $request,
            3,
            'pricing',
            $defaultContent,
            $images,
            $translatableContent
        );
    }


    public function updateTestimonialSection(TestimonialSectionRequest $request)
    {
        $defaultContent = [];
        $images = ['bg_shape', 'shape_1', 'shape_2', 'brand_image'];
        $translatableContent = ['subtitle', 'title', 'bg_rating', 'rating_text', 'rating_description'];

        return $this->handleSectionUpdate(
            $request,
            3,
            'testimonial',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateFaqSection(FaqSectionRequest $request)
    {
        $defaultContent = ['faqs'];
        $images = ['shape'];
        $translatableContent = ['subtitle', 'title'];

        return $this->handleSectionUpdate(
            $request,
            3,
            'faq',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateAppDownloadSection(AppDownloadSectionRequest $request)
    {
        $defaultContent = ['btn_url_1', 'btn_url_2'];
        $images = ['image_1', 'image_2', 'btn_icon_1', 'btn_icon_2'];
        $translatableContent = ['title', 'description', 'btn_text_1', 'btn_text_2'];

        return $this->handleSectionUpdate(
            $request,
            3,
            'app-download',
            $defaultContent,
            $images,
            $translatableContent
        );
    }
}
