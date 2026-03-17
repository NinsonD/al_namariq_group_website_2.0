@extends('frontend.layouts.master')

@section('meta_title', __('frontend.reset_password') . ' | ' . $settings->app_name)

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
    <!-- my-acount-area-start -->
    <section class="tp-my-acount-area fix pt-110 pb-110 tp-sticky-placeholder">
        <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.dashboard.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="tp-my-acount-wrap profile__tab-content mb-30">
                    <h4 class="mb-40 profile__info-title">
                        {{ __('frontend.change_password') }}
                    </h4>
                    <div class="profile__password">
                        <form action="{{route('user.password.update')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xxl-12">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="current_pass">{{ __('frontend.old_password') }} <span class="required">*</span></label>
                                        </div>
                                        <div class="tp-contact-input">
                                            <input id="current_pass" name="current_password" type="password" value="{{old('current_password')}}" >
                                             <x-input-error field="current_password" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="password">{{ __('frontend.password') }} <span class="required">*</span></label>
                                        </div>
                                        <div class="tp-profile-input">
                                            <input id="password" name="password" type="password" value="{{old('password')}}" >
                                            <x-input-error field="password" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="password_confirmation">{{ __('frontend.confirm_password') }} <span class="required">*</span></label>
                                        </div>
                                        <div class="tp-profile-input">
                                            <input id="password_confirmation" name="password_confirmation" type="password" value="{{old('password_confirmation')}}" >
                                            <x-input-error field="password_confirmation" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div class="profile__btn">
                                        <button type="submit" class="tp-btn-cart sm">{{ __('frontend.update') }}</button>
                                    </div>
                                </div>
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
