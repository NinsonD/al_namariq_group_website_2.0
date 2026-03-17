@extends('frontend.layouts.master')

@section('meta_title', __('frontend.edit_address') . ' | ' . $settings->app_name)

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

<!-- profile area start -->
<section class="profile__area pt-200 pb-120">
    <div class="container">
        <div class="profile__inner p-relative">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="tp-my-acount-wrap profile__tab-content mb-30">
                        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-4">
                            <h3 class="profile__info-title mb-0">
                                {{ __('frontend.edit_address') }}
                            </h3>
                            <div class="profile__ticket-btn">
                                <a href="{{ route('user.address.index') }}" class="ss-shop-btn cancel-btn">
                                    <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 6L17 5.99976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6 1L1.70711 5.29289C1.37377 5.62623 1.20711 5.79289 1.20711 6C1.20711 6.20711 1.37377 6.37377 1.70711 6.70711L6 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    {{ __('frontend.back') }}
                                </a>
                            </div>
                        </div>

                        <form action="{{route('user.address.store')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="title">{{ __('attribute.title') }} </label>
                                        </div>
                                        <div class="tp-profile-input">
                                            <input id="title" name="title" type="text" value="{{old('title', $address->title)}}" >
                                            <x-input-error field="title" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="first_name">{{ __('attribute.first_name') }} </label>
                                        </div>
                                        <div class="tp-profile-input">
                                            <input id="first_name" name="first_name" type="text" value="{{old('first_name', $address->first_name)}}" >
                                            <x-input-error field="first_name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="last_name">{{ __('attribute.last_name') }} </label>
                                        </div>
                                        <div class="tp-profile-input">
                                            <input id="last_name" name="last_name" type="text" value="{{old('last_name', $address->last_name)}}" >
                                            <x-input-error field="last_name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="email">{{ __('attribute.email') }} </label>
                                        </div>
                                        <div class="tp-profile-input">
                                            <input id="email" name="email" type="email" value="{{old('email', $address->email)}}" >
                                            <x-input-error field="email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="phone">{{ __('attribute.phone') }} </label>
                                        </div>
                                        <div class="tp-profile-input">
                                            <input id="phone" name="phone" type="text" value="{{old('phone', $address->phone)}}" >
                                            <x-input-error field="phone" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="province">{{ __('attribute.province') }} </label>
                                        </div>
                                        <div class="tp-profile-input">
                                            <input id="province" name="province" type="text" value="{{old('province', $address->province)}}" >
                                            <x-input-error field="province" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="city">{{ __('attribute.city') }} </label>
                                        </div>
                                        <div class="tp-profile-input">
                                            <input id="city" name="city" type="text" value="{{old('city', $address->city)}}" >
                                            <x-input-error field="city" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="address">{{ __('attribute.address') }} </label>
                                        </div>
                                        <div class="tp-profile-input">
                                            <input id="address" name="address" type="text" value="{{old('address', $address->address)}}" >
                                            <x-input-error field="address" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="zip_code">{{ __('attribute.zip_code') }} </label>
                                        </div>
                                        <div class="tp-profile-input">
                                            <input id="zip_code" name="zip_code" type="text" value="{{old('zip_code', $address->zip_code)}}" >
                                            <x-input-error field="zip_code" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="country">{{ __('attribute.country') }} </label>
                                        </div>
                                        <div class="tp-profile-input">
                                            <input id="country" name="country" type="text" value="{{old('country', $address->country)}}" >
                                            <x-input-error field="country" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
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
<!-- profile area end -->


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
