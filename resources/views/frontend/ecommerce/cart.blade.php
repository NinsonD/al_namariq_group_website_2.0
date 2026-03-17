@extends('frontend.layouts.master')

@section('meta_title', __('frontend.cart') . ' | ' . $settings->app_name)
@section('meta_description', $seo_setting['shop']['seo_description'])
@section('meta_keywords', $seo_setting['shop']['seo_keywords'])

@php extract(getSiteMenus()); @endphp

@section('header')
   @include('frontend.layouts.headers.header-shop', ['main_menu' => $main_menu])
@endsection

@section('content')

<!-- cart area start -->
<section class="tp-cart-area pb-120 pt-200" id="cart-area">
    @include('frontend.ecommerce.partials.cart-content', [
        'cart' => $cart,
        'amounts' => $amounts,
        'shippingMethods' => $shippingMethods,
    ])
</section>
<!-- cart area end -->


@endsection

@section('footer')
    @include('frontend.layouts.footers.footer-shop', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection

