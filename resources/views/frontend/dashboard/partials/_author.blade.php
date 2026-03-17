@php
    $user = auth()->user();
    $email = $user?->email;
    $user_avatar = !empty($user->avatar) && File::exists(public_path($user->avatar)) ? asset($user->avatar) : false;
@endphp

@if (auth()->user())


<div class="tp-my-acount-profile mb-25">
    <div class="user-avatar-main mb-20">
        @if(!empty($user_avatar))
        <div class="avatar avatar-md me-2">
            <img src="{{$user_avatar}}" class="rounded-circle" alt="{{$user->name}}">
        </div>
        @else
        <div class="user-avatar-initials">
            <div class="avatar-text">{{ substr($user->name, 0, 1) }}</div>
        </div>
        @endif
    </div>

        <h6 class="tp-my-acount-name">
            {{ $user->name }}
        </h6>
        <a class="tp-my-acount-email" href="mailto:{{$email}}">{{$email}}</a>
    </div>
@endif
