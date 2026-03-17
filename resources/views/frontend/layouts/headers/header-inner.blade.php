<div id="header-sticky" class="tp-header-area tp-header-inner-style tp-header-ptb tp-header-blur sticky-white-bg header-transparent mt-30 @@class">
    <div class="container container-1750">
        <div class="row align-items-center">
            <div class="col-xl-2 col-lg-6 col-6">
                <div class="tp-header-logo">
                    <a href="{{ url('/') }}">
                        <img width="120" class="logo-white" src="{{ asset($settings->logo) }}" alt="{{ $settings->app_name }}">
                        <img width="120" class="logo-black d-none" src="{{ asset($settings->logo) }}" alt="{{ $settings->app_name }}">
                    </a>
                </div>
            </div>
            <div class="col-xl-7 d-none d-xl-block">
                <div class="tp-header-box text-center">
                    <div class="tp-header-menu tp-header-dropdown dropdown-white-bg">
                        <nav class="tp-mobile-menu-active">
                            <ul>
                                @include('frontend.layouts.all-home-pages')
                                @include('frontend.layouts.menu-items', ['menu_data' => $main_menu])
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-6">
                <div class="tp-header-right text-end d-flex align-items-center justify-content-end gap-3">
                    <div class="tp-header-14-bar-wrap ml-20">
                        <button class="tp-header-8-bar tp-offcanvas-open-btn">
                            <span>
                                {{ __('frontend.menu') }}
                            </span>
                            <span>
                                <svg width="24" height="8" viewBox="0 0 24 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0H14V1.5H0V0Z" fill="currentcolor" />
                                    <path d="M0 6H24V7.5H0V6Z" fill="currentcolor" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
