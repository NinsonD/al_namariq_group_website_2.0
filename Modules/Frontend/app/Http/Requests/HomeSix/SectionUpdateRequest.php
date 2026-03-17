<?php

namespace Modules\Frontend\Http\Requests\HomeSix;

use Illuminate\Foundation\Http\FormRequest;

use Modules\Frontend\Http\Requests\HomeSix\HeroSectionRequest;
use Modules\Frontend\Http\Requests\HomeSix\TextSliderSectionRequest;
use Modules\Frontend\Http\Requests\HomeSix\AboutSectionRequest;
use Modules\Frontend\Http\Requests\HomeSix\PortfolioSectionRequest;
use Modules\Frontend\Http\Requests\HomeSix\ServicesSectionRequest;
use Modules\Frontend\Http\Requests\HomeSix\BannerSectionRequest;
use Modules\Frontend\Http\Requests\HomeSix\FunFactSectionRequest;
use Modules\Frontend\Http\Requests\HomeSix\BrandSectionRequest;
use Modules\Frontend\Http\Requests\HomeSix\ProcessSectionRequest;
use Modules\Frontend\Http\Requests\HomeSix\TeamSectionRequest;

class SectionUpdateRequest extends FormRequest
{
    protected array $sections = [
        'hero' => [
            'request' => HeroSectionRequest::class,
        ],
        'text-slider' => [
            'request' => TextSliderSectionRequest::class,
        ],
        'about' => [
            'request' => AboutSectionRequest::class,
        ],
        'portfolio' => [
            'request' => PortfolioSectionRequest::class,
        ],
        'services' => [
            'request' => ServicesSectionRequest::class,
        ],
        'banner' => [
            'request' => BannerSectionRequest::class,
        ],
        'fun-fact' => [
            'request' => FunFactSectionRequest::class,
        ],
        'brand' => [
            'request' => BrandSectionRequest::class,
        ],
        'process' => [
            'request' => ProcessSectionRequest::class,
        ],
        'team' => [
            'request' => TeamSectionRequest::class,
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
