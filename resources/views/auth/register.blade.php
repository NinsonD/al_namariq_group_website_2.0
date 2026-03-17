@extends('frontend.layouts.master')

@section('meta_title', __('frontend.register_now'))
@section('meta_description', $seo_setting['register']['seo_description'])
@section('meta_keywords', $seo_setting['register']['seo_keywords'])

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
                    <div class="tp-login-top text-center mb-30">
                        <h3 class="tp-login-title">{{ __('frontend.register_now') }}</h3>
                        <p>{{ __('frontend.already_have_an_account')}}
                            <span>
                                <a href="{{ route('user.login') }}">{{ __('frontend.sign_in') }}</a>
                            </span>
                        </p>
                    </div>
                    <div class="tp-login-option">
                        <form method="POST" action="{{ route('user.register.post') }}">
                            @csrf
                            @method('POST')
                            <div class="tp-login-input-wrapper">
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input-title">
                                        <label for="name">{{ __('frontend.name') }} <span class="required">*</span> </label>
                                    </div>
                                    <div class="tp-login-input">
                                        <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('frontend.full_name') }}" required autofocus>
                                        <x-input-error field="name" />
                                    </div>
                                </div>
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input-title">
                                        <label for="email">{{ __('frontend.email') }} <span class="required">*</span> </label>
                                    </div>
                                    <div class="tp-login-input">
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('frontend.your_email') }}" required autofocus>
                                        <x-input-error field="email" />
                                    </div>
                                </div>
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input-title">
                                        <label for="username">{{ __('frontend.username') }} <span class="required">*</span> </label>
                                    </div>
                                    <div class="tp-login-input">
                                        <input id="username" type="text" name="username" value="{{ old('username') }}" placeholder="{{ __('frontend.username') }}" required autofocus>
                                        <x-input-error field="username" />
                                    </div>
                                </div>
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input-title">
                                        <label for="password">{{ __('frontend.password') }} <span class="required">*</span> </label>
                                    </div>
                                    <div class="tp-login-input p-relative">
                                        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="{{ __('frontend.password') }}" >
                                        <div class="tp-login-input-eye password-show-toggle">
                                            <span class="open-eye open-eye-icon">
                                                <x-icons.open-eye />
                                            </span>
                                            <span class="open-close close-eye-icon">
                                                <x-icons.close-eye />
                                            </span>
                                        </div>
                                        <x-input-error field="password" />
                                    </div>
                                </div>
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input-title">
                                        <label for="password_confirmation">{{ __('frontend.confirm_password') }} <span class="required">*</span> </label>
                                    </div>
                                    <div class="tp-login-input p-relative">
                                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="current-password_confirmation"  placeholder="{{ __('frontend.confirm_password') }}">
                                        <div class="tp-login-input-eye password-show-toggle">
                                            <span class="open-eye open-eye-icon">
                                                <x-icons.open-eye />
                                            </span>
                                            <span class="open-close close-eye-icon">
                                                <x-icons.close-eye />
                                            </span>
                                        </div>
                                        <x-input-error field="password_confirmation" />
                                    </div>
                                </div>
                            </div>
                            <div class="tp-login-bottom mt-30">
                                <button type="submit" class="tp-login-btn w-100">{{ __('frontend.sign_up') }}</button>
                            </div>
                        </form>
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
