@extends('frontend.layouts.master')

@section('meta_title', __('frontend.profile') . ' | ' . $settings->app_name)

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
                <div class="profile__tab-content mb-30 position-relative z-index-1">
                    <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @php
                            $avatar = $user->avatar ? asset($user->avatar) : null;
                        @endphp
                        <div class="account-avatar-bg"></div>
                        <div class="account-avatar-wrapper mb-40 d-flex align-items-center flex-wrap gap-3">
                            <div class="account-avatar">
                                @if ($user->avatar && file_exists(public_path($user->avatar)))
                                    <img src="{{ $avatar }}" alt="{{ $user->name }}">
                                @else
                                    <span class="avatar-text rounded-circle bg-label-primary">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                @endif
                            </div>

                            <div class="account-avatar-action d-flex align-items-center flex-wrap gap-3">
                                <label for="avatar" class="account-avatar-edit-btn" data-default="{{ $avatar }}">
                                    <input type="file" id="avatar" name="avatar" accept="image/*" class="d-none">
                                    {{ __('frontend.upload_new_avatar') }}
                                </label>
                                <button type="button" class="account-avatar-reset-btn d-none">
                                    {{ __('frontend.reset') }}
                                </button>
                            </div>

                        </div>

                        <div class="checkbox-form tp-my-acount-form profile__password">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="name">{{ __('frontend.name') }} </label>
                                        </div>
                                        <div class="tp-contact-input">
                                            <input id="name" name="name" type="text" value="{{old('name', $user->name)}}" >
                                            <x-input-error field="name" />
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="email">{{ __('frontend.email') }} </label>
                                        </div>
                                        <div class="tp-contact-input">
                                            <input name="email" type="email" value="{{old('email', $user->email)}}" >
                                            <x-input-error field="email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label>{{ __('frontend.username') }} </label>
                                        </div>
                                        <div class="tp-contact-input">
                                           <input name="username" type="text" value="{{old('username', $user->username)}}" disabled>
                                            <x-input-error field="username" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label>{{ __('frontend.designation') }} </label>
                                        </div>
                                        <div class="tp-contact-input">
                                            <input name="designation" type="text" value="{{old('designation', $user->designation)}}" >
                                            <x-input-error field="designation" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label>{{ __('frontend.phone') }} </label>
                                        </div>
                                        <div class="tp-contact-input">
                                            <input name="phone" type="tel" value="{{old('phone', $user->phone)}}" >
                                            <x-input-error field="phone" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box tp-select">
                                        <div class="tp-profile-input-title">
                                            <label for="status">{{ __('frontend.status') }} </label>
                                        </div>
                                        <select class="active-class-select" name="status" id="status">
                                            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>{{ __('frontend.active') }}</option>
                                            <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>{{ __('frontend.inactive') }}</option>
                                        </select>
                                        <x-input-error field="status" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label>{{ __('frontend.address') }} </label>
                                        </div>
                                        <div class="tp-contact-input">
                                            <input name="address" type="text" value="{{old('address', $user->address)}}" >
                                            <x-input-error field="address" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label>{{ __('frontend.zip_code') }} </label>
                                        </div>
                                        <div class="tp-contact-input">
                                            <input name="zip_code" type="text" value="{{old('zip_code', $user->zip_code)}}" >
                                            <x-input-error field="zip_code" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="tp-profile-input-box">
                                        <div class="tp-profile-input-title">
                                            <label for="bio">{{ __('frontend.bio') }} </label>
                                        </div>
                                        <div class="tp-contact-input profile__input">
                                             <textarea name="bio" id="bio">{{ old('bio', $user->bio) }}</textarea>
                                            <x-input-error field="bio" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="profile__btn">
                                        <button type="submit" class="tp-btn-cart sm">{{ __('frontend.update') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

@push('js')
    <script>
        'use strict';

        $(function() {
            // Avatar upload
            $('#avatar').on('change', function() {

                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('.account-avatar img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }

                $('.account-avatar-reset-btn').removeClass('d-none');
                $('.account-avatar-edit-btn').addClass('d-none');
            });

            $('.account-avatar-reset-btn').on('click', function() {
                const defaultSrc = $(this).siblings('.account-avatar-edit-btn').data('default');
                $('.account-avatar img').attr('src', defaultSrc);
                $('#avatar').val(null);
                $(this).addClass('d-none');
                $('.account-avatar-edit-btn').removeClass('d-none');
            });
        });


    </script>
@endpush
