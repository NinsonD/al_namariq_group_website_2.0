@extends('core::layout.guest')

@section('title', __('admin.admin_login'))

@section('content')
<div class="auth-main auth-bg-primary">
    <div class="container-xxl">
        <div class="auth-wrapper auth-basic p-5 min-vh-100 d-flex align-items-center justify-content-center">
            <div class="auth-card py-6">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @method('POST')
                    <div class="card shadow-xl">
                        <div class="card-body py-9 px-md-12 px-6">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <div class="mb-7">
                                <div class="d-flex align-items-center justify-content-center mb-5">
                                    <x-logo />
                                </div>
                                <div class="text-center">
                                    <h4 class="mb-1 fw-semibold">{{ __('admin.admin_login') }}</h4>

                                </div>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('admin.email')" />
                                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error field="email" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="password" :value="__('admin.password')" />
                                <div class="input-group mb-3">
                                    <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                                    <span class="input-group-text password-toggle">
                                        <span class="close-eye password-eye">
                                            <x-icons.close-eye />
                                        </span>
                                        <span class="open-eye password-eye d-none">
                                            <x-icons.open-eye />
                                        </span>
                                    </span>
                                </div>
                                <x-input-error field="password" />
                            </div>

                            <div class="mb-5">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                        <label class="form-check-label" for="remember_me">{{ __('admin.remember_me') }}</label>
                                    </div>

                                    @if (Route::has('password.request'))
                                    <p class="m-0">
                                        <a href="{{ route('password.request')}}" class="text-hover-underline">{{ __('admin.forgot_password')}}</a>
                                    </p>
                                    @endif
                                </div>
                            </div>
                            <div class="">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-100 show-loading-btn">
                                        {{ __('admin.login') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
