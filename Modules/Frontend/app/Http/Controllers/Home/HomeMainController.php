<?php

namespace Modules\Frontend\Http\Controllers\Home;

use App\Helpers\SectionHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Frontend\Http\Requests\HomeMain\AboutSectionRequest;
use Modules\Frontend\Http\Requests\HomeMain\BlogSectionRequest;
use Modules\Frontend\Http\Requests\HomeMain\BrandSectionRequest;
use Modules\Frontend\Http\Requests\HomeMain\HeroSectionRequest;
use Modules\Frontend\Http\Requests\HomeMain\PortfolioSectionRequest;
use Modules\Frontend\Http\Requests\HomeMain\ProcessSectionRequest;
use Modules\Frontend\Http\Requests\HomeMain\ServicesSectionRequest;
use Modules\Frontend\Http\Requests\HomeMain\TeamSectionRequest;
use Modules\Frontend\Http\Requests\HomeMain\TestimonialSectionRequest;
use Modules\Frontend\Http\Requests\HomeMain\TextSliderSectionRequest;
use Modules\Frontend\Models\SitePage;
use Modules\Frontend\Traits\UpdateSectionTrait;

class HomeMainController extends Controller
{
    use UpdateSectionTrait;

    public function index()
    {
        $page = SitePage::with('sections')->where('slug', 'home_main')->first();


        if (!$page) {
            return abort(404);
        }

        return view('frontend::home.main.index', compact('page'));
    }

    public function section(Request $request, $slug)
    {

        $section = SectionHelper::getTranslatedSection($request, $slug, 'home_main');

        return view('frontend::home.main.' . $slug, compact('section'));
    }

    public function updateHeroSection(HeroSectionRequest $request)
    {
        $defaultContent = ['btn_url', 'counter_number_1', 'counter_number_2', 'counter_unit_1', 'counter_unit_2'];
        $images = ['main_image', 'bg_image', 'say_hi_image'];
        $translatableContent = ['title', 'subtitle', 'btn_text', 'counter_title_1', 'counter_title_2', 'say_hi_title'];

        return $this->handleSectionUpdate(
            $request,
            1,
            'hero',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateAboutSection(AboutSectionRequest $request)
    {

        $defaultContent = ['btn_url'];
        $images = ['image', 'image_2'];
        $translatableContent = ['title', 'subtitle', 'btn_text', 'description'];

        return $this->handleSectionUpdate(
            $request,
            1,
            'about',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateProcessSection(ProcessSectionRequest $request)
    {

        $defaultContent = ['btn_url'];
        $images = [];
        $translatableContent = ['title', 'btn_text', 'process_title_1', 'process_title_2', 'process_title_3', 'process_description_1', 'process_description_2', 'process_description_3'];

        return $this->handleSectionUpdate(
            $request,
            1,
            'process',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateServicesSection(ServicesSectionRequest $request)
    {

        $defaultContent = ['services'];
        $images = ['services_item_bg'];
        $translatableContent = ['title', 'subtitle'];

        return $this->handleSectionUpdate(
            $request,
            1,
            'services',
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
            1,
            'text-slider',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updatePortfolioSection(PortfolioSectionRequest $request)
    {
        $defaultContent = ['portfolios'];
        $images = [];
        $translatableContent = ['title', 'description'];


        return $this->handleSectionUpdate(
            $request,
            1,
            'portfolio',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateTeamSection(TeamSectionRequest $request)
    {
        $defaultContent = ['teams'];
        $images = [];
        $translatableContent = ['title', 'subtitle', 'btn_text'];

        return $this->handleSectionUpdate(
            $request,
            1,
            'team',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateBrandSection(BrandSectionRequest $request)
    {

        $defaultContent = ['brands'];
        $images = [];
        $translatableContent = [];

        return $this->handleSectionUpdate(
            $request,
            1,
            'brand',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateTestimonialSection(TestimonialSectionRequest $request)
    {

        $defaultContent = ['testimonials', 'video_url'];
        $images = ['video_thumbnail', 'bg_shape'];
        $translatableContent = ['subtitle', 'title'];

        return $this->handleSectionUpdate(
            $request,
            1,
            'testimonial',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateBlogSection(BlogSectionRequest $request)
    {

        $defaultContent = ['blogs'];
        $images = [];
        $translatableContent = ['title', 'btn_text'];

        return $this->handleSectionUpdate(
            $request,
            1,
            'blog',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

}
