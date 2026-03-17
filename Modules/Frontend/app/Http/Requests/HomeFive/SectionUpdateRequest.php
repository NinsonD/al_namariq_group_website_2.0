<?php

namespace Modules\Frontend\Http\Requests\HomeFive;

use Illuminate\Foundation\Http\FormRequest;

use Modules\Frontend\Http\Requests\HomeFive\BannerSectionRequest;
use Modules\Frontend\Http\Requests\HomeFive\FunFactSectionRequest;
use Modules\Frontend\Http\Requests\HomeFive\GallerySectionRequest;
use Modules\Frontend\Http\Requests\HomeFive\HeroSectionRequest;
use Modules\Frontend\Http\Requests\HomeFive\AboutSectionRequest;
use Modules\Frontend\Http\Requests\HomeFive\PortfolioSectionRequest;
use Modules\Frontend\Http\Requests\HomeFive\ProcessSectionRequest;
use Modules\Frontend\Http\Requests\HomeFive\ServicesSectionRequest;
use Modules\Frontend\Http\Requests\HomeFive\TestimonialSectionRequest;
use Modules\Frontend\Http\Requests\HomeFive\TextSliderSectionRequest;

class SectionUpdateRequest extends FormRequest
{

    protected array $sections = [
        'hero' => [
            'request' => HeroSectionRequest::class,
        ],
        'about' => [
            'request' => AboutSectionRequest::class,
        ],
        'banner' => [
            'request' => BannerSectionRequest::class,
        ],
        'text-slider' => [
            'request' => TextSliderSectionRequest::class,
        ],
        'services' => [
            'request' => ServicesSectionRequest::class,
        ],
        'gallery' => [
            'request' => GallerySectionRequest::class,
        ],
        'portfolio' => [
            'request' => PortfolioSectionRequest::class,
        ],
        'fun-fact' => [
            'request' => FunFactSectionRequest::class,
        ],
        'process' => [
            'request' => ProcessSectionRequest::class,
        ],
        'testimonial' => [
            'request' => TestimonialSectionRequest::class,
        ],
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // get the slug from the route
        $slug = $this->route('slug');

        if (!$slug || !isset($this->sections[$slug])) {
            return [];
        }

        $requestClass = $this->sections[$slug]['request'];

        $formRequest = app($requestClass);

        return $formRequest->rules();
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
