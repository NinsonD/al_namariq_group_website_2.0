@php
    $user = auth()->user();
@endphp
<div class="tp-my-acount-wrap mb-30">
    <div class="d-sm-flex align-items-center justify-content-between flex-wrap gap-5">
        <h3 class="tp-my-acount-title mb-5 mb-sm-0">{{ __('frontend.personal_information') }}</h3>
        <a href="{{ route('user.profile') }}" class="ss-shop-btn ms-auto">{{ __('frontend.edit_info') }}</a>
    </div>

    <div class="tp-my-acount-content mt-20">
        <div class="tp-my-acount-item d-flex align-items-center flex-wrap mb-20">
            <span class="tp-my-acount-label">{{ __('frontend.name') }}</span>
            <span class="tp-my-acount-value">{{ $user->name }}</span>
        </div>
        <div class="tp-my-acount-item d-flex align-items-center flex-wrap mb-20">
            <span class="tp-my-acount-label">{{ __('frontend.email') }}</span>
            <div class="tp-my-acount-value">
                {{ $user->email }}
                @if ($user->email_verified_at)
                    <span class="text-success"> ({{ __('frontend.verified') }})</span>
                @else
                    <span class="text-danger"> ({{ __('frontend.not_verified') }})</span>
                    <form action="{{ route('user.user-verification.resend') }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('POST')
                        <button type="submit" class="text-primary ms-2 text-decoration-underline">
                            {{ __('frontend.send_verification_email') }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
        <div class="tp-my-acount-item d-flex align-items-center flex-wrap mb-20">
            <span class="tp-my-acount-label">{{ __('frontend.username') }}</span>
            <span class="tp-my-acount-value">{{ $user->username }}</span>
        </div>
        <div class="tp-my-acount-item d-flex align-items-center flex-wrap mb-20">
            <span class="tp-my-acount-label">{{ __('frontend.phone') }}</span>
            <span class="tp-my-acount-value">{{ $user->phone }}</span>
        </div>
        <div class="tp-my-acount-item d-flex align-items-center flex-wrap mb-20">
            <span class="tp-my-acount-label">{{ __('frontend.address') }}</span>
            <span class="tp-my-acount-value">{{ $user->address }}</span>
        </div>
        <div class="tp-my-acount-item d-flex align-items-center flex-wrap mb-20">
            <span class="tp-my-acount-label">{{ __('frontend.zip_code') }}</span>
            <span class="tp-my-acount-value">{{ $user->zip_code }}</span>
        </div>
    </div>
 </div>
