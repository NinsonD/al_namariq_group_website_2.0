<?php

namespace Modules\Frontend\Http\Controllers\Home;

use App\Helpers\SectionHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Frontend\Http\Requests\HomeShop\AboutSectionRequest;
use Modules\Frontend\Http\Requests\HomeShop\CategorySectionRequest;
use Modules\Frontend\Http\Requests\HomeShop\HeroSectionRequest;
use Modules\Frontend\Http\Requests\HomeShop\InstagramSectionRequest;
use Modules\Frontend\Http\Requests\HomeShop\NewsletterSectionRequest;
use Modules\Frontend\Http\Requests\HomeShop\ProductSectionRequest;
use Modules\Frontend\Http\Requests\HomeShop\ProductTrendingSectionRequest;
use Modules\Frontend\Http\Requests\HomeShop\ReviewSectionRequest;
use Modules\Frontend\Http\Requests\HomeShop\ShowcaseSectionRequest;
use Modules\Frontend\Http\Requests\HomeShop\TextSliderSectionRequest;
use Modules\Frontend\Http\Requests\HomeThree\FeaturesSectionRequest;
use Modules\Frontend\Models\SitePage;
use Modules\Frontend\Traits\UpdateSectionTrait;

class HomeShopController extends Controller
{
    use UpdateSectionTrait;

    public function index()
    {
        $page = SitePage::with('sections')->where('slug', 'home_shop')->first();

        if (!$page) {
            return abort(404);
        }

        return view('frontend::home.shop.index', compact('page'));
    }

    public function section(Request $request, $slug)
    {
        $section = SectionHelper::getTranslatedSection($request, $slug, 'home_shop');

        return view('frontend::home.shop.' . $slug, compact('section'));
    }

    public function updateHeroSection(HeroSectionRequest $request)
    {
        $defaultContent = ['sliders'];
        $images = [];
        $translatableContent = ['title'];

        return $this->handleSectionUpdate(
            $request,
            4,
            'hero',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateTextSliderSection(TextSliderSectionRequest $request)
    {

        $defaultContent = [];
        $images = [];
        $translatableContent = ['slider_content'];

        return $this->handleSectionUpdate(
            $request,
            4,
            'text-slider',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateCategorySection(CategorySectionRequest $request)
    {
        $defaultContent = ['categories', 'big_category'];
        $images = [];
        $translatableContent = [];


        return $this->handleSectionUpdate(
            $request,
            4,
            'category',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateProductTrendingSection(ProductTrendingSectionRequest $request)
    {
        $defaultContent = ['products'];
        $images = [];
        $translatableContent = [];


        return $this->handleSectionUpdate(
            $request,
            4,
            'product-trending',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateAboutSection(AboutSectionRequest $request)
    {
        $defaultContent = ['btn_url'];
        $images = ['image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6', 'shape'];
        $translatableContent = ['title', 'btn_text'];


        return $this->handleSectionUpdate(
            $request,
            4,
            'about',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateProductsSection(ProductSectionRequest $request)
    {
        $defaultContent = [];
        $images = ['image'];
        $translatableContent = [];


        return $this->handleSectionUpdate(
            $request,
            4,
            'products',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateShowcaseSection(ShowcaseSectionRequest $request)
    {
        $defaultContent = [];
        $images = ['image_1', 'image_2'];
        $translatableContent = [];


        return $this->handleSectionUpdate(
            $request,
            4,
            'showcase',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateNewsletterSection(NewsletterSectionRequest $request)
    {
        $defaultContent = [];
        $images = ['image_1', 'image_2', 'image_3', 'image_4'];
        $translatableContent = ['title', 'subtitle', 'description', 'btn_text'];


        return $this->handleSectionUpdate(
            $request,
            4,
            'newsletter',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateReviewsSection(ReviewSectionRequest $request)
    {
        $defaultContent = [];
        $images = [];
        $translatableContent = ['title'];


        return $this->handleSectionUpdate(
            $request,
            4,
            'reviews',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateFeaturesSection(FeaturesSectionRequest $request)
    {
        $defaultContent = [];
        $images = ['features_icon_1', 'features_icon_2', 'features_icon_3'];
        $translatableContent = ['features_title_1', 'features_description_1', 'features_title_2', 'features_description_2', 'features_title_3', 'features_description_3'];


        return $this->handleSectionUpdate(
            $request,
            4,
            'features',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

    public function updateInstagramSection(InstagramSectionRequest $request)
    {
        $defaultContent = [];
        $images = ['instagrams'];
        $translatableContent = ['title', 'subtitle'];


        return $this->handleSectionUpdate(
            $request,
            4,
            'instagram',
            $defaultContent,
            $images,
            $translatableContent
        );
    }

}
