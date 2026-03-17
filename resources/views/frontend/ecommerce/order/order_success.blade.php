@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['shop']['seo_title'])
@section('meta_description', $seo_setting['shop']['seo_description'])
@section('meta_keywords', $seo_setting['shop']['seo_keywords'])

@php extract(getSiteMenus()); @endphp

@section('header')
   @include('frontend.layouts.headers.header-shop', ['main_menu' => $main_menu])
@endsection

@section('content')

<section class="tp-checkout-area pb-120 pt-200">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <img src="{{ asset($settings->order_success_image) }}" alt="{{ $settings->app_name }}">
                <h2>
                    {{ __('frontend.order_successful') }}
                </h2>
                <p>{{ __('frontend.order_successful_message') }}</p>
                <a href="{{ route('user.dashboard') }}" class="ss-shop-btn">{{ __('frontend.go_to_dashboard') }}</a>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
    @include('frontend.layouts.footers.footer-shop', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection
