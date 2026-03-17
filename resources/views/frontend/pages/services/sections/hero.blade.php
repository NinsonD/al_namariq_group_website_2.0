<div class="tp-service-4-area tp-service-4-border p-relative">
    <div class="tp-career-shape-1">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
                <path d="M36.3761 0.5993C40.3065 8.98556 47.3237 34.898 32.8824 44.3691C25.3614 49.0997 9.4871 52.826 1.7513 31.3747C-1.16691 23.2826 5.38982 15.9009 20.5227 20.0332C29.2536 22.4173 50.3517 27.8744 60.9 44.2751C66.4672 52.9311 71.833 71.0287 69.4175 82.9721M69.4175 82.9721C70.1596 77.2054 74.079 66.0171 83.8204 67.3978M69.4175 82.9721C69.8033 79.1875 67.076 70.1737 53.0797 64.3958M49.1371 20.8349C52.611 22.1801 63.742 28.4916 67.9921 39.9344" stroke="#030303" stroke-width="1.5" />
            </svg>
        </span>
    </div>
    <div class="container container-1320">
        <div class="ar-about-us-4-hero-ptb">
            <div class="row">
                <div class="col-lg-7">
                    <div class="tp-service-hero-title-box tp_fade_anim z-index-1" data-delay=".3">
                        <h3 class="tp-service-4-title">
                                {!! clean(pureText($content?->title)) !!}
                        </h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="tp-service-4-text pt-150 tp_fade_anim z-index-1" data-delay=".5">
                        <p>    {!! clean(pureText($content?->description)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tp-service-4-banner-area p-relative">
    <div class="tp-service-4-bg-shape">
        <img src="{{ asset($default_content?->bg_image) }}" alt="{{ $content?->title }}">
    </div>
    <div class="container container-1320">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-service-4-banner-breadcrumb p-relative pb-25">
                    <span>
                        <a href="{{ route('home') }}">
                            {{ __('frontend.home') }}
                        </a>
                    </span>
                    <span>
                        {{ __('frontend.service_hero_breadcrumb') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="ar-banner-wrap ar-about-us-4">
        <img class="w-100" src="{{ asset($default_content?->image) }}" alt="{{ $content?->title }}" data-speed=".8">
    </div>
</div>
