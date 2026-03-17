<!-- hero area start -->
<div class="ar-hero-area p-relative">
    <div class="container container-1230">
        <div class="ar-about-us-4-hero-ptb">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="ar-hero-title-box tp_fade_anim" data-delay=".3">
                        <h3 class="ar-about-us-4-title insert-breadcrumb-shape">
                            {!! clean(pureText($content?->title)) !!}
                        </h3>
                        <div class="ar-about-us-4-title-box d-flex justify-content-end">
                            <span class="tp-section-subtitle pre">
                                {!! clean(pureText($content?->subtitle)) !!}
                            </span>
                            <div class="ar-about-us-4-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                    <rect y="4" width="80" height="1" fill="#111013" />
                                    <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <p>
                                {!! clean(pureText($content?->description)) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero area end -->

@php
    $texts = !empty($content?->slider_text) && is_string($content->slider_text) ? explode(',', $content->slider_text) : [];
@endphp


@if (is_array($texts) && count($texts) > 0)
<!-- about us 4 area start -->
<section class="ar-about-us-4-text-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ar-about-us-4-text-warp title-black-color">
                    <div class="swiper-container tp-brand-active">
                        <div class="swiper-wrapper slide-transtion">
                            @foreach ($texts as $text)
                                <div class="swiper-slide">
                                    <h2 class="ar-about-us-4-text-title">
                                        {{ $text }}
                                    </h2>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about us 4 area end -->
@endif


<!-- banner area start -->
<div class="ar-banner-area">
    <div class="ar-banner-wrap ar-about-us-4">
        <img class="w-100" src="{{ asset($default_content?->image) }}" alt="{{ $content?->subtitle }}" data-speed=".8">
    </div>
</div>
<!-- banner area end -->
