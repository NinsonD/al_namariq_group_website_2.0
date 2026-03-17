@extends('frontend.layouts.master')

@php
    extract(getSiteMenus());
@endphp

@section('header')
   @include('frontend.layouts.headers.header-inner', ['main_menu' => $main_menu])
@endsection


@section('content')

<!-- hero area start -->
<div class="ar-hero-area p-relative">
    <div class="tp-career-shape-1">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
                <path d="M36.3761 0.5993C40.3065 8.98556 47.3237 34.898 32.8824 44.3691C25.3614 49.0997 9.4871 52.826 1.7513 31.3747C-1.16691 23.2826 5.38982 15.9009 20.5227 20.0332C29.2536 22.4173 50.3517 27.8744 60.9 44.2751C66.4672 52.9311 71.833 71.0287 69.4175 82.9721M69.4175 82.9721C70.1596 77.2054 74.079 66.0171 83.8204 67.3978M69.4175 82.9721C69.8033 79.1875 67.076 70.1737 53.0797 64.3958M49.1371 20.8349C52.611 22.1801 63.742 28.4916 67.9921 39.9344" stroke="#030303" stroke-width="1.5" />
            </svg>
        </span>
    </div>
    <div class="container container-1230">
        <div class="ar-about-us-4-hero-ptb pb-70">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="ar-hero-title-box tp_fade_anim" data-delay=".3">
                        <div class="ar-about-us-4-title-box d-flex align-items-center mb-15">
                            <span class="tp-section-subtitle pre tp_fade_anim">{{ __('frontend.team') }}</span>
                            <div class="ar-about-us-4-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                    <rect y="4" width="80" height="1" fill="#111013" />
                                    <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="tp-career-title fs-70">{{ __('frontend.team_details') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero area end -->

<!-- team details area start -->
<section class="tp-team-details-area tp-team-details-ptb pb-120">
    <div class="container container-1230">
        <div class="row">
            <div class="col-lg-5">
                <div class="tp-team-details-wrap">
                    <div class="tp-team-details-thumb mb-40">
                        <img src="{{ asset($team->image) }}" alt="{{ $team->name }}">
                    </div>

                </div>
            </div>
            <div class="col-lg-7">
                <div class="tp-team-details-wrapper">
                    <div class="tp-team-details-text">
                        <span class="tp-team-details-text-sub">{{ $team->designation }}</span>
                        <h4 class="tp-team-details-text-title">{{ $team->name }}</h4>
                        <div class="team-bio">
                            <p>{!! clean($team->bio) !!}</p>
                        </div>
                    </div>
                    <div class="tp-team-details-more mb-50">
                        <h4 class="tp-team-details-more-title">
                            {{ __('frontend.more_details') }}
                        </h4>
                        <ul>
                            <li><span>{{ __('frontend.location') }}:</span>{{ $team->location }}</li>
                            <li><span>{{ __('frontend.email') }}:</span>{{ $team->email }}</li>
                            <li><span>{{ __('frontend.age') }}:</span>{{ $team->age }}</li>
                            <li><span>{{ __('frontend.qualification') }}:</span>{{$team->qualification}}</li>
                            <li><span>{{ __('frontend.gender') }}:</span>{{ $team->gender }}</li>
                        </ul>
                    </div>
                    <div class="tp-team-details-info d-flex justify-content-between">
                        <div class="tp-team-details-info-contact">
                            <a href="tel:{{ $team->phone }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M2.43248 7.95965C1.76852 6.80251 1.44793 5.85764 1.25462 4.89985C0.968722 3.4833 1.62299 2.09956 2.70686 1.21663C3.16494 0.843468 3.69006 0.970963 3.96095 1.45668L4.57249 2.55324C5.05722 3.4224 5.29958 3.85698 5.25151 4.31771C5.20344 4.77845 4.87658 5.1537 4.22286 5.9042L2.43248 7.95965ZM2.43248 7.95965C3.7764 10.3018 5.88543 12.4109 8.23152 13.7557M8.23152 13.7557C9.38926 14.4193 10.3346 14.7397 11.2929 14.9329C12.7102 15.2187 14.0947 14.5647 14.978 13.4814C15.3514 13.0236 15.2238 12.4987 14.7379 12.228L13.6407 11.6168C12.7711 11.1323 12.3363 10.8901 11.8753 10.9381C11.4144 10.9862 11.0389 11.3128 10.288 11.9662L8.23152 13.7557Z" stroke="#FF5722" stroke-width="1.5" stroke-linejoin="round" />
                                </svg> {{ $team->phone }}</a>
                            <a href="mailto:{{ $team->email }}"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14" fill="none">
                                    <path d="M2.58672 1H14.593C15.4184 1 16.0938 1.675 16.0938 2.5V11.5C16.0938 12.325 15.4184 13 14.593 13H2.58672C1.76129 13 1.08594 12.325 1.08594 11.5V2.5C1.08594 1.675 1.76129 1 2.58672 1Z" stroke="#FF5722" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16.0938 2.5L8.58984 7.75L1.08594 2.5" stroke="#FF5722" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> {{ $team->email }}</a>
                        </div>
                        @if (is_array($team->social_links) && count($team->social_links) > 0)
                        <div class="tp-team-details-info-social">
                            <div class="tp-footer-widget-social">
                                <div class="team-details-social">
                                    @foreach ($team->social_links as $link)
                                    <a href="{{ $link['url'] ?? '#' }}"><i class="{{ $link['icon'] ?? 'icon' }}"></i></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- team details area end -->

@endsection


@section('footer')
    @include('frontend.layouts.footers.footer-inner', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection
