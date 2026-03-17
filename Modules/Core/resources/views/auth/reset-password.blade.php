@extends('core::layout.guest')

@section('title', __('admin.reset_your_password'))

@section('content')
<div class="auth-main auth-bg-primary">
    <div class="container-xxl">
        <div class="auth-wrapper auth-basic p-5 min-vh-100 d-flex align-items-center justify-content-center">
            <div class="auth-card py-6">
                

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="card shadow-xl">
                        <div class="card-body py-9 px-md-12 px-6">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <div class="mb-7">
                                <div class="d-flex align-items-center justify-content-center mb-5">
                                    <x-logo />
                                </div>
                                <div class="text-center">
                                    <h4 class="mb-1 fw-semibold">{{ __('admin.reset_your_password') }}</h4>
                                    <p>
                                        {{ __('admin.reset_your_password_message') }}
                                    </p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('admin.email')" />
                                <x-text-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                                <x-input-error field="email" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="password" :value="__('admin.password')" />
                                <div class="input-group mb-3">
                                    <x-text-input id="password" type="password" name="password" required autocomplete="username" />
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

                            <div class="mb-3">
                                <x-input-label for="password_confirmation" :value="__('admin.confirm_password')" />
                                <div class="input-group mb-3">
                                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" required  autocomplete="username" />
                                    <span class="input-group-text password-toggle">
                                        <span class="close-eye password-eye">
                                            <x-icons.close-eye />
                                        </span>
                                        <span class="open-eye password-eye d-none">
                                            <x-icons.open-eye />
                                        </span>
                                    </span>
                                </div>
                                <x-input-error field="password_confirmation" />
                            </div>

                            <div class="mt-7">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-100 show-loading-btn">
                                        {{ __('admin.reset_password') }}
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
