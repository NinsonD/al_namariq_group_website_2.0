 <!-- header area start -->
    <div id="header-sticky" class="tp-header-area tp-header-ptb tp-header-blur sticky-white-bg header-transparent tp-header-border">
        <div class="container container-1750">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-6 col-6">
                    <div class="tp-header-logo">
                        <a href="{{ url('/') }}">
                            <img width="120" class="logo-white" src="{{ asset($settings->logo_white) }}" alt="{{ $settings->app_name }}">
                            <img width="120" class="logo-black d-none" src="{{ asset($settings->logo) }}" alt="{{ $settings->app_name }}">
                        </a>
                    </div>
                </div>
                <div class="col-xl-7 d-none d-xl-block">
                    <div class="tp-header-box text-center">
                        @if(isset($main_menu) && count($main_menu) > 0)
                        <div class="tp-header-menu tp-header-dropdown dropdown-white-bg">
                            <nav class="tp-mobile-menu-active">
                                <ul>
                                    @include('frontend.layouts.all-home-pages')
                                    @include('frontend.layouts.menu-items', ['menu_data' => $main_menu])
                                </ul>
                            </nav>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-6">
                    <div class="tp-header-right d-flex align-items-center justify-content-end">
                        <div class="tp-header-btn-box ml-25 d-none d-md-flex">
                            <a href="{{ route('contact') }}" class="tp-btn-black btn-red-bg">
                                <span class="tp-btn-black-filter-blur">
                                    <svg width="0" height="0">
                                        <defs>
                                            <filter id="buttonFilter">
                                                <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur"></feGaussianBlur>
                                                <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9"></feColorMatrix>
                                                <feComposite in="SourceGraphic" in2="buttonFilter" operator="atop"></feComposite>
                                                <feBlend in="SourceGraphic" in2="buttonFilter"></feBlend>
                                            </filter>
                                        </defs>
                                    </svg>
                                </span>
                                <span class="tp-btn-black-filter d-inline-flex align-items-center" style="filter: url(#buttonFilter)">
                                    <span class="tp-btn-black-text">{{ __('frontend.contact_us') }}</span>
                                    <span class="tp-btn-black-circle">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L9 1M9 1H1M9 1V9" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div class="tp-header-bar ml-20">
                            <button class="tp-offcanvas-open-btn">
                                <i></i>
                                <i></i>
                                <i></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header area end -->
