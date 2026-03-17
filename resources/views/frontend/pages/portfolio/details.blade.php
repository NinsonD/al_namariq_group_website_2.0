@extends('frontend.layouts.master')

@section('meta_title', $portfolio?->seo_title . ' || ' . $settings->app_name)
@section('meta_description', $portfolio?->seo_description)

@push('custom_meta')
    <meta property="og:title" content="{{ $portfolio?->seo_title }}" />
    <meta property="og:description" content="{{ $portfolio?->seo_description }}" />
    <meta property="og:image" content="{{ asset($portfolio?->image) }}" />
    <meta property="og:URL" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
@endpush

@php
    extract(getSiteMenus());
@endphp

@section('header')
   @include('frontend.layouts.headers.header-inner', ['main_menu' => $main_menu])
@endsection

@section('content')

<!-- portfolio details area start -->
<div class="tp-portfolio-details-1-area pt-110 pb-140">
    <div class="container container-1830">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-portfolio-details-1-banner">
                    <img data-speed=".8" src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->title }}">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- portfolio details area end -->


<!-- portfolio details area start -->
<div class="tp-portfolio-details-1-ptb pb-80">
    <div class="container container-1430">
        <div class="row">
            <div class="col-lg-6">
                <div class="tp-portfolio-details-1-heading">
                    <span class="tp-portfolio-details-1-sub tp_fade_anim" data-delay=".3">{{ $portfolio->service }}</span>
                    <h3 class="tp-portfolio-details-1-title tp_fade_anim" data-delay=".5">
                        {{ $portfolio->title }}
                    </h3>
                    <div class="tp-portfolio-details-1-btn tp_fade_anim" data-delay=".7">
                        <a class="tp-portfolio-details-btn" href="{{ url($portfolio->website_url) }}" target="_blank">
                            {{ __('frontend.visit_site') }}
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                    <path d="M1 9L9 1M9 1H1M9 1V9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tp-portfolio-details-1-content">
                    <p>
                        {{ $portfolio->short_description }}
                    </p>
                    <div class="tp-portfolio-details-1-list">
                        <ul>
                            <li><span>{{ __('frontend.client') }} :</span> {{ $portfolio->client }}</li>
                            <li><span>{{ __('frontend.duration') }} :</span> {{ $portfolio->duration }}</li>
                            <li><span>{{ __('frontend.year') }} :</span> {{ $portfolio->year }}</li>

                            @php
                                $tags = is_array($portfolio->tags) && count($portfolio->tags) > 0 ? collect($portfolio->tags)->pluck('value')->toArray() : [];
                            @endphp
                                @if (is_array($tags) && count($tags) > 0)
                            <li><span>{{ __('frontend.tags') }} :</span>
                                @foreach ($tags as $tag)
                                    <a href="{{ route('portfolios', ['tag' => $tag]) }}">{{ $tag }}</a>
                                    @if (!$loop->last) , @endif
                                @endforeach
                            </li>
                            @endif

                            @if ($portfolio->website_url)
                                <li><span>{{ __('frontend.website') }} :</span>
                                    <a target="_blank" href="{{ url($portfolio->website_url ?? '#') }}">
                                        {{ $portfolio->website }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- portfolio details area end -->

 <!-- benefits area start -->
<div class="tp-benefits-ptb pb-100">
    <div class="container container-1230">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-benefits-heading tp_fade_anim" data-delay=".3">
                    {!! clean(pureText($portfolio?->description)) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- benefits area end -->

@endsection


@section('footer')
    @include('frontend.layouts.footers.footer-inner', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection
