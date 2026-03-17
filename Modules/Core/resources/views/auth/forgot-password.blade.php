@extends('core::layout.guest')

@section('title', __('admin.forgot_password'))

@section('content')
<div class="auth-main auth-bg-primary">
    <div class="container-xxl">
        <div class="auth-wrapper auth-basic p-5 min-vh-100 d-flex align-items-center justify-content-center">
            <div class="auth-card py-6">
                <div class="card shadow-xl">
                    <div class="card-body py-9 px-5 px-md-12">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-7">
                                <div class="d-flex align-items-center justify-content-center mb-5">
                                    <img width="120" src="{{ asset($settings->logo) }}" alt="{{ $settings->app_name }}">
                                </div>
                                <div class="text-center">
                                    <h4 class="mb-1 fw-semibold">{{ __('admin.forgot_password') }}</h4>
                                    <p>{{ __('admin.forgot_password_message') }}</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <x-input-label for="loginEmail" :value="__('attribute.email')" />
                                <x-text-input id="loginEmail" type="email" name="email" :value="old('email')" required autofocus />
                                <x-input-error field="email" />
                            </div>

                            
                            <div>
                                <div class="text-center mb-4">
                                    <button type="submit" class="btn btn-primary w-100 show-loading-btn">
                                        {{ __('admin.send_reset_link') }}
                                    </button>
                                </div>
                                <p class="text-center">
                                    <a href="{{ route('login') }}" class="text-primary text-decoration-none text-hover-underline">
                                        <svg class="me-2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 6H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6 11L1 6L6 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ __('admin.back_to_login') }}
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection