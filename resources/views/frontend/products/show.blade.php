@extends('frontend.layouts.master')


@section('meta_title', $product?->title . ' || ' . $settings->app_name)
@section('meta_description', $product?->seo_description)

@push('custom_meta')
    <meta property="og:title" content="{{ $product?->seo_title }}" />
    <meta property="og:description" content="{{ $product?->seo_description }}" />
    <meta property="og:image" content="{{ asset($product?->image) }}" />
    <meta property="og:URL" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
@endpush


@php
    extract(getSiteMenus());

    $reviewStats = $product->reviewStats();
    $isPurchased = auth()->check() ? $product->isPurchasedByUser(auth()->user()->id) : false;
@endphp

@section('header')
   @include('frontend.layouts.headers.header-shop', ['main_menu' => $main_menu])
@endsection


@section('content')


@include('frontend.products.partials.details.breadcrumb', ['title' => $product->title, 'category' => $product->category])

<!-- product details area start -->
<section class="tp-product-details-area">
    <div class="tp-product-details-top pb-115">
        <div class="container container-1230">
            @include('frontend.products.partials.details.details-content', ['product' => $product])
        </div>
    </div>
    <div class="tp-product-details-bottom pb-140">
        <div class="container container-1230">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-product-details-tab-nav tp-tab">
                        <nav>
                            <div class="nav nav-tabs justify-content-center p-relative tp-product-tab" id="navPresentationTab" role="tablist">
                                <button class="nav-link" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="true">{{ __('frontend.description') }}</button>
                                <button class="nav-link active" id="nav-addInfo-tab" data-bs-toggle="tab" data-bs-target="#nav-addInfo" type="button" role="tab" aria-controls="nav-addInfo" aria-selected="false">{{ __('frontend.additional_information') }}</button>
                                <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">{{ __('frontend.reviews') }} ({{ $reviewStats['total_reviews'] ?? 0 }})</button>
                                <span id="productTabMarker" class="tp-product-details-tab-line"></span>
                            </div>
                        </nav>
                        <div class="tab-content" id="navPresentationTabContent">
                            <div class="tab-pane fade" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab" tabindex="0">
                                <div class="tp-product-details-desc-wrapper pt-50">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">
                                            <div class="tp-product-details-desc-item">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        @include('frontend.products.partials.details.tabs.description', ['description' => $product->description])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="nav-addInfo" role="tabpanel" aria-labelledby="nav-addInfo-tab" tabindex="0">
                                <div class="tp-product-details-additional-info ">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">
                                            @include('frontend.products.partials.details.tabs.additional-info', ['information' => $product->additional_information])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab" tabindex="0">
                                @include('frontend.products.partials.details.tabs.reviews', ['product' => $product, 'reviews' => $reviews, 'isPurchased' => $isPurchased ?? false, 'reviewStats' => $reviewStats])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product details area end -->

@include('frontend.products.partials.related-products', ['relatedProducts' => $relatedProducts])

@endsection


@section('footer')
    @include('frontend.layouts.footers.footer-shop', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection
