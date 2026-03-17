@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['login']['seo_title'])
@section('meta_description', $seo_setting['login']['seo_description'])
@section('meta_keywords', $seo_setting['login']['seo_keywords'])

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

<!-- login area start -->
<section class="tp-login-area pt-180 pb-140 p-relative z-index-1 fix">
    <div class="container container-1230">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="tp-login-wrapper">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="tp-login-top text-center mb-30">
                        <h3 class="tp-login-title">{{ __('frontend.forgot_password_heading') }}</h3>
                        <p>{{ __('frontend.forgot_password_description') }}</p>
                    </div>
                    <div class="tp-login-option">
                        <form method="POST" action="{{ route('user.password.email') }}">
                            @csrf
                            @method('POST')
                            <div class="tp-login-form-group mb-20">
                                <label for="email">{{ __('frontend.email') }} <span class="required">*</span> </label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('frontend.your_email') }}" required autofocus>
                                <x-input-error field="email" />
                            </div>
                            <button type="submit" class="tp-login-btn w-100">{{ __('frontend.send_reset_link') }}</button>
                        </form>
                        <div class="signin-account text-center mt-30 tp-login-top">
                           <p>{{ __('frontend.remember_password') }} <a href="{{ route('user.login') }}">{{__('frontend.back_to_login')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login area end -->


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
