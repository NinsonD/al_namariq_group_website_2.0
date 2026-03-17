@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['home']['seo_title'])
@section('meta_description', $seo_setting['home']['seo_description'])
@section('meta_keywords', $seo_setting['home']['seo_keywords'])

@section('header')
   @include('frontend.layouts.headers.header-shop', ['main_menu' => $main_menu])
@endsection

@section('content')

    <div class="" data-bg-color="#F4F0EA">

        @php
            $slugs = [
                'hero', 'text-slider', 'category', 'product-trending', 'about',
                'products', 'showcase', 'newsletter', 'reviews', 'features', 'instagram'
            ];

            $allProductIds = [];

            // collect product ids from product-trending section
            $productTrendingSection = $sections['product-trending'] ?? null;
            if ($productTrendingSection?->status) {
                $products = $productTrendingSection->default_content?->products;
                $products = is_null($products) ? [] : json_decode($products, true);
                $allProductIds = array_merge($allProductIds, $products);
            }

            // collect product ids from products section
            $productsSection = $sections['products'] ?? null;
            if ($productsSection?->status) {
                $products = $productsSection->default_content?->products;
                $products = is_null($products) ? [] : json_decode($products, true);
                $allProductIds = array_merge($allProductIds, $products);
            }

            if (!empty($allProductIds)) {
                $query = \Modules\Shop\Models\Product::with([
                    'translations',
                    'category',
                    'category.translations',
                    'reviews'
                ])->active()->whereIn('id', $allProductIds);

                if (auth()->check() && auth()->user()->type !== 'admin') {
                    $query->withExists([
                        'wishlists as is_wishlisted' => fn($q) => $q->where('user_id', auth()->id())
                    ]);
                } else {
                    $query->select('products.*')->selectRaw('0 as is_wishlisted');
                }

                $allProducts = $query->get()->keyBy('id');
            } else {
                $allProducts = collect();
            }
        @endphp

        @foreach ($slugs as $slug)
            @php $section = $sections[$slug] ?? null; @endphp

            @if ($section?->status)

                @if ($section->slug == 'product-trending')
                    @php
                        $productIds = $section->default_content?->products;
                        $productIds = is_null($productIds) ? [] : json_decode($productIds, true);
                        $products = $allProducts->only($productIds);
                    @endphp

                    @includeIf('frontend.home.home_shop.sections.' . $slug, [
                        'default_content' => $section->default_content ?? null,
                        'content' => $section?->content ?? null,
                        'products' => $products,
                    ])

                @elseif ($section->slug == 'products')
                    @php
                        $productIds = $section->default_content?->products;
                        $productIds = is_null($productIds) ? [] : json_decode($productIds, true);
                        $products = $allProducts->only($productIds);
                    @endphp

                    @includeIf('frontend.home.home_shop.sections.' . $slug, [
                        'default_content' => $section->default_content ?? null,
                        'content' => $section?->content ?? null,
                        'products' => $products,
                    ])
                @else
                    @includeIf('frontend.home.home_shop.sections.' . $slug, [
                        'default_content' => $section->default_content ?? null,
                        'content' => $section?->content ?? null,
                    ])
                @endif

            @endif
        @endforeach
    </div>

@endsection

@section('modals')
<!-- subscribe-popup -->
    <div class="subscribe-popup">
        <!-- modal area start -->
        <div class="tp-shop-popup-wrap">
            <div class="tp-shop-popup-content text-center">
                <div class="close">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.0491 7.94653L7.94672 14.0489" stroke="#000001" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7.94672 7.94653L14.0491 14.0489" stroke="#000001" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M10.9979 20.3528C16.1645 20.3528 20.3529 16.1644 20.3529 10.9978C20.3529 5.8312 16.1645 1.64282 10.9979 1.64282C5.83126 1.64282 1.64288 5.8312 1.64288 10.9978C1.64288 16.1644 5.83126 20.3528 10.9979 20.3528Z" stroke="#000001" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="tp-shop-popup-logo">
                    <img src="{{ asset($settings?->logo_shop) }}" alt="{{ $settings?->app_name }}">
                </div>
                <div class="tp-shop-popup-text">
                    <h4>{{ __('frontend.save_15_percent') }}</h4>
                    <p>{{ __('frontend.on_todays_order') }}</p>
                    <span>{{ __('frontend.sign_up_below_for_discount_code') }}</span>
                </div>
                <form action="{{ route('newsletter-request') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="tp-shop-popup-inputbox">
                        <input type="email" name="email" placeholder="{{ __('frontend.enter_your_email') }}">
                        <button class="tp-btn-black-square w-100 ss-shop-newsletter-btn" type="submit">{{ __('frontend.subscribe') }}</button>
                        <div class="tp-shop-popup-response"></div>
                    </div>
                </form>
            </div>
        </div>
        <!-- modal area end -->
    </div>
    <!-- subscribe-popup -->
@endsection

@section('footer')
    @include('frontend.layouts.footers.footer-shop', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two, 'footer_menu_three' => $footer_menu_three, 'footer_menu_four' => $footer_menu_four])
@endsection

@push('js')
    <script>
        'use strict';

        $(function() {

            $('.ss-newsletter-popup-btn').on('click', function(e) {
                e.preventDefault();
                $('.subscribe-popup').addClass('show');
            });

            // Handle form submission
            $('.ss-shop-newsletter-btn').on('click', function(e) {
                e.preventDefault();
                var userEmail = $(this).parent().find('input[name="email"]').val();
                var errorDiv = $('.tp-shop-popup-response');
                var button = $(this);
                var btnText = $(this).text();

                // Clear previous error messages
                errorDiv.text('').removeClass('error success');

                // Submit the form via AJAX
                $.ajax({
                    url: "{{ route('newsletter-request') }}",
                    method: 'POST',
                    data: {
                        email: userEmail,
                    },
                    beforeSend: function () {
                        button.html(" {{ __('frontend.submitting') }} ").attr('disabled', true);
                    },
                    success: function(response) {
                        if(response.success) {
                            errorDiv.text(response.message || '').addClass('success');
                        } else {
                            errorDiv.text(response.message || "{{ __('notification.something_went_wrong') }}").addClass('error');
                        }
                    },
                    error: function(xhr) {
                        // Handle error response
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorDiv.text(xhr.responseJSON.message).addClass('error');
                        } else {
                            errorDiv.text("{{ __('frontend.something_went_wrong') }}").addClass('error');
                        }
                    },
                    complete: function() {
                        button.text(btnText).prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endpush
