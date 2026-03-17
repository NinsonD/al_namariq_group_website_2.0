@extends('frontend.layouts.master')

@section('meta_title', __('frontend.wishlist') . ' | ' . $settings->app_name)
@section('meta_description', $seo_setting['shop']['seo_description'])
@section('meta_keywords', $seo_setting['shop']['seo_keywords'])

@php extract(getSiteMenus()); @endphp

@section('header')
   @include('frontend.layouts.headers.header-shop', ['main_menu' => $main_menu])
@endsection

@section('content')


<!-- cart area start -->
<div class="tp-cart-area pb-120 pt-200">
    <div class="container">
        <div class="row justify-content-center" id="wishlist-data">
            @include('frontend.ecommerce.partials.wishlist-content', ['products' => $products])
        </div>
    </div>
</div>
<!-- cart area end -->

@endsection

@section('footer')
    @include('frontend.layouts.footers.footer-shop', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection


