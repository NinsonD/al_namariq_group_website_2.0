@extends('frontend.layouts.master')

@section('meta_title', __('frontend.reviews') . ' | ' . $settings->app_name)

@php
    extract(getSiteMenus());
@endphp

@section('header')
    @if($settings->enable_shop)
        @include('frontend.layouts.headers.header-shop', ['main_menu' => $main_menu])
    @else
        @include('frontend.layouts.headers.header-inner', ['main_menu' => $main_menu])
    @endif
@endsection


@section('content')
    @php
        $user = auth()->user();
    @endphp
    <!-- my-acount-area-start -->
    <section class="tp-my-acount-area fix pt-110 pb-110 tp-sticky-placeholder">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="profile__tab-content">

                        <div class="d-flex align-items-center justify-content-between mb-20 gap-5">
                            <h3 class="profile__info-title mb-0">{{ __('frontend.edit_review') }}</h3>
                            <a href="{{ route('user.product-review.index') }}" class="ss-shop-btn ms-auto">{{ __('frontend.back') }}</a>
                        </div>

                        <div class="tp-product-details-review-form">
                            @if (!$review->status)
                                <div class="alert alert-info" role="alert">
                                    {{ __('frontend.your_review_has_been_submitted') }}
                                </div>
                            @endif

                            <form action="{{ route('user.product-review.update', $review->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="product_id" value="{{ $review->product_id }}">

                                <!-- Rating -->
                                <div class="tp-product-details-review-form-rating d-flex align-items-center">
                                    <p>{{ __('frontend.your_rating') }} :</p>
                                    <div class="tp-product-details-review-form-rating-icon d-flex align-items-center">
                                        <div class="tp-review-stars">
                                            @for ($i = 5; $i >= 1; $i--)
                                                <input
                                                    class="tp-review-input"
                                                    id="radio-{{ $i }}"
                                                    name="rating"
                                                    type="radio"
                                                    value="{{ $i }}"
                                                    @checked($review->rating == $i)
                                                />
                                                <label class="tp-review-star" for="radio-{{ $i }}"></label>
                                            @endfor
                                        </div>
                                    </div>
                                </div>

                                <!-- Comment -->
                                <div class="tp-product-details-review-input-wrapper">
                                    <div class="tp-product-details-review-input-box">
                                        <div class="tp-product-details-review-input-title">
                                            <label for="comment">{{ __('frontend.your_review') }}</label>
                                        </div>
                                        <div class="tp-product-details-review-input">
                                            <textarea id="comment" name="comment" placeholder="{{ __('frontend.write_your_review_here') }}">{{ $review->comment }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="tp-product-details-review-btn-wrapper">
                                    <button class="tp-product-details-review-btn" type="submit">
                                        {{ __('frontend.update') }}
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my-acount-area-end -->
@endsection


@section('footer')
    @if($settings->enable_shop)
        @include('frontend.layouts.footers.footer-shop',
        [
            'footer_menu_one' => $footer_menu_one,
            'footer_menu_two' => $footer_menu_two,
            'footer_menu_three' => $footer_menu_three,
            'footer_menu_four' => $footer_menu_four
        ])
    @else
        @include('frontend.layouts.footers.footer-inner', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
    @endif
@endsection
