<?php

namespace Modules\Frontend\Http\Controllers\Home;

use App\Enums\ThemeList;
use App\Helpers\SectionHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Frontend\Http\Requests\HomeFive\SectionUpdateRequest;
use Modules\Frontend\Models\SitePage;
use Modules\Frontend\Traits\UpdateSectionTrait;

class HomeFiveController extends Controller
{
    use UpdateSectionTrait;

    protected string $pageSlug = ThemeList::FIVE->value;

    protected array $sections = [
        'hero' => [
            'defaultContent' => ['btn_url', 'quote_btn_url'],
            'images' => ['title_image', 'bg_image', 'quote_image'],
            'translatableContent' => ['title', 'description', 'quote', 'quote_author', 'quote_btn_text'],
        ],
        'about' => [
            'defaultContent' => ['counter_number_1', 'counter_number_2', 'counter_unit_1', 'counter_unit_2'],
            'images' => ['main_image', 'people_image', 'shape'],
            'translatableContent' => ['subtitle', 'title', 'description', 'counter_title_1', 'counter_title_2'],
        ],
        'banner' => [
            'defaultContent' => [''],
            'images' => ['main_image'],
            'translatableContent' => [],
        ],
        'text-slider' => [
            'defaultContent' => [],
            'images' => [],
            'translatableContent' => ['slider_content'],
        ],
        'services' => [
            'defaultContent' => ['services'],
            'images' => [],
            'translatableContent' => ['subtitle'],
        ],
        'gallery' => [
            'defaultContent' => ['video_url'],
            'images' => ['image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6'],
            'translatableContent' => [],
        ],
        'portfolio' => [
            'defaultContent' => ['portfolios', 'btn_url'],
            'images' => [],
            'translatableContent' => ['btn_text', 'subtitle', 'view_demo'],
        ],
        'fun-fact' => [
            'defaultContent' => ['fact_number_1', 'fact_number_2'],
            'images' => ['fact_icon_1', 'fact_icon_2', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6', 'image_7', 'image_8', 'image_9', 'image_10', 'image_11', 'image_12', 'image_13', 'image_14', 'image_15'],
            'translatableContent' => ['fact_subtitle_1', 'fact_title_1', 'fact_subtitle_2', 'fact_title_2', 'fact_subtitle_3', 'fact_title_3', 'fact_text'],
        ],
        'process' => [
            'defaultContent' => ['process_number_1', 'process_number_2', 'process_number_3', 'process_number_4'],
            'images' => [],
            'translatableContent' => ['title', 'subtitle', 'process_title_1', 'process_title_2', 'process_title_3', 'process_title_4', 'process_description_1', 'process_description_2', 'process_description_3', 'process_description_4'],
        ],
        'testimonial' => [
            'defaultContent' => ['testimonials'],
            'images' => ['bg_image', 'bg_shape', 'image_1', 'image_2', 'image_3', 'review_image'],
            'translatableContent' => ['title'],
        ],
    ];


    public function index(Request $request)
    {
        $page = SitePage::with('sections')->where('slug', $this->pageSlug)->first();

        if (!$page) {
            return abort(404);
        }

        return view('frontend::home.five.index', compact('page'));
    }

    public function section(Request $request, $slug)
    {
        $section = SectionHelper::getTranslatedSection($request, $slug, $this->pageSlug);

        return view('frontend::home.five.' . $slug, compact('section'));
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
