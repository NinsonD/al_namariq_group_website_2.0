@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['pricing']['seo_title'])
@section('meta_description', $seo_setting['pricing']['seo_description'])
@section('meta_keywords', $seo_setting['pricing']['seo_keywords'])


@php
    extract(getSiteMenus());
@endphp

@section('header')
   @include('frontend.layouts.headers.header-inner', ['main_menu' => $main_menu])
@endsection


@section('content')

<!-- hero area start -->
<div class="ar-hero-area p-relative">
    <div class="tp-career-shape-1">
        <span><svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
                <path d="M36.3761 0.5993C40.3065 8.98556 47.3237 34.898 32.8824 44.3691C25.3614 49.0997 9.4871 52.826 1.7513 31.3747C-1.16691 23.2826 5.38982 15.9009 20.5227 20.0332C29.2536 22.4173 50.3517 27.8744 60.9 44.2751C66.4672 52.9311 71.833 71.0287 69.4175 82.9721M69.4175 82.9721C70.1596 77.2054 74.079 66.0171 83.8204 67.3978M69.4175 82.9721C69.8033 79.1875 67.076 70.1737 53.0797 64.3958M49.1371 20.8349C52.611 22.1801 63.742 28.4916 67.9921 39.9344" stroke="#030303" stroke-width="1.5" />
            </svg></span>
    </div>
    <div class="container container-1230">
        <div class="ar-about-us-4-hero-ptb">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="ar-hero-title-box tp_fade_anim" data-delay=".3">
                        <div class="ar-about-us-4-title-box d-flex align-items-center mb-20">
                            <span class="tp-section-subtitle pre tp_fade_anim">
                                {{ __('frontend.pricing') }}
                            </span>
                            <div class="ar-about-us-4-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                    <rect y="4" width="80" height="1" fill="#111013" />
                                    <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="tp-career-title pb-30 insert-breadcrumb-shape">
                            {!! clean(pureText(__('frontend.pricing_title'))) !!}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <div class="tp-faq-text tp_fade_anim">
                        <p>
                            {!! clean(pureText(__('frontend.pricing_breadcrumb_description'))) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero area end -->

<!-- price area start -->
<div class="app-price-area p-relative pb-130">
    <div class="container container-1230">
        @if ($monthly_pricing->isNotEmpty() && $yearly_pricing->isNotEmpty())
        <div class="row align-items-end">
            <div class="col-lg-12">
                <div class="app-price-tab-wrap mb-30 tp_fade_anim" data-delay=".7">
                    <div class="ai-price-tab tp-marker-tab d-inline-flex justify-content-center p-relative">
                        <ul class="nav nav-tab" id="myTab" role="tablist">
                            <li class="nav-items" role="presentation">
                                <button class="nav-links active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                    {{ __('frontend.pricing_monthly') }}
                                </button>
                            </li>
                            <li class="nav-items" role="presentation">
                                <button class="nav-links" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                                    {{ __('frontend.pricing_yearly') }}
                                </button>
                            </li>
                        </ul>
                        <span id="lineMarker"></span>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if ($monthly_pricing->isNotEmpty() && $yearly_pricing->isNotEmpty())
        <div class="tab-content" id="myTabContent">

            @if ($monthly_pricing->isNotEmpty())
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="app-price-box app-price-inner-style">
                    <div class="row">
                        @foreach ($monthly_pricing as $pricing)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            @include('frontend.pages.partials.price-card', ['pricing' => $pricing])
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            @if ($yearly_pricing->isNotEmpty())
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="app-price-box app-price-inner-style">
                    <div class="row">
                         @foreach ($yearly_pricing as $pricing)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            @include('frontend.pages.partials.price-card', ['pricing' => $pricing])
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>

        @else
            @if ($pricings->isNotEmpty())
            <div class="app-price-box app-price-inner-style">
                <div class="row">
                    @foreach ($pricings as $pricing)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        @include('frontend.pages.partials.price-card', ['pricing' => $pricing])
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        @endif
    </div>
</div>
<!-- price area end -->

<!-- testimonial area start -->
<div class="app-testimonial-area app-testimonial-ptb p-relative pb-140">
    <div class="container container-1230">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="app-testimonial-warp mb-55">
                    <div class="app-testimonial-heading text-center p-relative mb-40">
                        <span class="tp-section-subtitle border-bg bg-color tp_fade_anim" data-delay=".3">
                            {{ __('frontend.testimonial') }}
                        </span>
                        <h3 class="tp-section-title-phudu ff-inter mb-20 tp_fade_anim" data-delay=".5">
                            {!! clean(pureText(__('frontend.testimonial_title'))) !!}
                        </h3>
                        <div class="app-testimonial-big-text">
                            <h3>
                                {{ $testimonials->count() > 0 ? $testimonials->avg('rating') : '0' }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($testimonials->isNotEmpty())
    <div class="container container-1680">
        <div class="row">
            <div class="col-lg-12">
                <div class="app-testimonial-wrapper">
                    <div class="app-testimonial-slider d-flex">
                        @foreach ($testimonials as $testimonial)
                        <div class="app-testimonial-item">
                            <div class="app-testimonial-item-icon-box d-flex align-items-center mb-20">
                                <div class="app-testimonial-item-icon">
                                    <span>
                                        <img src="{{ $testimonial->image }}" alt="{{ $testimonial->name }}">
                                    </span>
                                </div>
                                <div class="app-testimonial-item-icon-content">
                                    <h4 class="app-testimonial-item-icon-title">{{ $testimonial->name }}</h4>
                                    <p>{{ $testimonial->designation }}</p>
                                </div>
                            </div>
                            <div class="app-testimonial-item-content">
                                <p>
                                    {!! clean(pureText($testimonial->comment)) !!}
                                </p>
                                <div class="app-testimonial-item-star">
                                    @php
                                        $rating = $testimonial->rating ?? 0;
                                        $maxStars = 5;
                                    @endphp

                                    @foreach (range(1, $maxStars) as $i)
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                                <path d="M7.21451 0.878193C7.30431 0.6018 7.69534 0.6018 7.78514 0.878193L9.34084 5.66614C9.381 5.78975 9.49619 5.87343 9.62616 5.87343L14.6605 5.87343C14.9511 5.87343 15.0719 6.24532 14.8368 6.41614L10.764 9.37525C10.6588 9.45164 10.6148 9.58706 10.655 9.71066L12.2107 14.4986C12.3005 14.775 11.9841 15.0048 11.749 14.834L7.67616 11.8749C7.57101 11.7985 7.42864 11.7985 7.32349 11.8749L3.25062 14.834C3.01551 15.0048 2.69916 14.775 2.78897 14.4986L4.34467 9.71066C4.38483 9.58706 4.34083 9.45164 4.23568 9.37525L0.162814 6.41614C-0.0723004 6.24532 0.0485323 5.87343 0.339149 5.87343L5.37349 5.87343C5.50346 5.87343 5.61865 5.78975 5.65881 5.66614L7.21451 0.878193Z" fill="{{ $i <= $rating ? '#FFAF1B' : '#d9d5d5' }}" />
                                            </svg>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<!-- testimonial area end -->

@if ($faqs->isNotEmpty())
<!-- faq area start -->
<div class="app-faq-area p-relative pb-120">
    <div class="container container-1230">
        <div class="row">
            <div class="col-lg-4">
                <div class="app-faq-heading p-relative mb-40">
                    <span class="tp-section-subtitle border-bg bg-color tp_fade_anim" data-delay=".3">
                        {{ __('frontend.faq') }}
                    </span>
                    <h3 class="tp-section-title-phudu ff-inter mb-20 tp_fade_anim" data-delay=".5">
                        {!! clean(pureText(__('frontend.got_any_questions'))) !!}
                    </h3>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="app-faq-wrap pl-70">
                    <div class="ai-faq-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            @foreach ($faqs as $faq)
                                @php
                                    $show = $loop->first ? 'show' : '';
                                @endphp
                            <div class="accordion-items">
                                <h2 class="accordion-header" id="heading-{{ $loop->index }}">
                                    <button class="accordion-buttons {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="true" aria-controls="collapse-{{ $loop->index }}">
                                       {{ $faq->question }}
                                        <span class="accordion-icon"></span>
                                    </button>
                                </h2>
                                <div id="collapse-{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading-{{ $loop->index }}" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <p>
                                            {{ $faq->answer }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- faq area end -->
@endif

@endsection


@section('footer')
    @include('frontend.layouts.footers.footer-inner', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection

@push('js')
<script>
    if(('.insert-breadcrumb-shape').length){
        const shapeURL = "{{ asset('admin/img/default/common/breadcrumb-title-shape.png') }}"
        const shapeHTML = `<img src="${shapeURL}" alt="{{ $seo_setting['portfolio']['seo_title'] }}">`;
        $('.insert-breadcrumb-shape').each(function () {
            let $wrapper = $('<div>').html($(this).html());

            $wrapper.find('span').each(function () {
                $(this).replaceWith(shapeHTML);
            });

            $(this).html($wrapper.html());
        });
    }
</script>
@endpush
