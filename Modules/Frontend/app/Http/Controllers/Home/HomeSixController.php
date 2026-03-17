<?php

namespace Modules\Frontend\Http\Controllers\Home;

use App\Enums\ThemeList;
use App\Helpers\SectionHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Frontend\Http\Requests\HomeSix\SectionUpdateRequest;
use Modules\Frontend\Models\SitePage;
use Modules\Frontend\Traits\UpdateSectionTrait;

class HomeSixController extends Controller
{
    use UpdateSectionTrait;

    protected string $pageSlug = ThemeList::SIX->value;


    protected array $sections = [
        'hero' => [
            'defaultContent' => ['btn_url'],
            'images' => ['bg_image', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6', 'image_7'],
            'translatableContent' => ['subtitle', 'title', 'btn_text', 'people_title', 'people_number'],
        ],
        'text-slider' => [
            'defaultContent' => [],
            'images' => [],
            'translatableContent' => ['slider_content_1', 'slider_content_2'],
        ],
        'about' => [
            'defaultContent' => ['btn_url'],
            'images' => [],
            'translatableContent' => ['description', 'btn_text'],
        ],
        'portfolio' => [
            'defaultContent' => ['portfolios'],
            'images' => [],
            'translatableContent' => [],
        ],
        'services' => [
            'defaultContent' => ['service_url_1', 'service_url_2', 'service_url_3', 'service_url_4'],
            'images' => ['service_image_1', 'service_image_2', 'service_image_3', 'service_image_4'],
            'translatableContent' => ['title', 'description', 'info_text', 'service_title_1', 'service_title_2', 'service_title_3', 'service_title_4'],
        ],
        'banner' => [
            'defaultContent' => [],
            'images' => ['main_image'],
            'translatableContent' => [],
        ],
        'fun-fact' => [
            'defaultContent' => ['fact_number_1', 'fact_number_2', 'fact_number_3', 'fact_unit_1', 'fact_unit_2', 'fact_unit_3'],
            'images' => [],
            'translatableContent' => ['subtitle', 'title', 'description', 'fact_subtitle_1', 'fact_title_1', 'fact_subtitle_2', 'fact_title_2', 'fact_subtitle_3', 'fact_title_3'],
        ],
        'brand' => [
            'defaultContent' => ['brands_top', 'brands_bottom'],
            'images' => [],
            'translatableContent' => ['title'],
        ],
        'team' => [
            'defaultContent' => ['teams'],
            'images' => [],
            'translatableContent' => ['title'],
        ],
    ];

    public function index(Request $request)
    {
        $page = SitePage::with('sections')->where('slug', $this->pageSlug)->first();

        if (!$page) {
            return abort(404);
        }

        return view('frontend::home.six.index', compact('page'));
    }

    public function section(Request $request, $slug)
    {
        $section = SectionHelper::getTranslatedSection($request, $slug, $this->pageSlug);

        return view('frontend::home.six.' . $slug, compact('section'));
    }

    public function updateThemeSection(SectionUpdateRequest $request, $slug)
    {
        if (!isset($this->sections[$slug])) {
            abort(404);
        }

        $pageId = getPageIdBySlug($this->pageSlug);
        $config = $this->sections[$slug];

        return $this->handleSectionUpdate(
            $request,
            $pageId,
            $slug,
            $config['defaultContent'],
            $config['images'],
            $config['translatableContent']
        );
    }
}
