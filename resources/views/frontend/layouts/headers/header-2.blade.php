
 <!-- header area start -->
        <div id="header-sticky" class="tp-header-10-area tp-header-11-style tp-header-blur sticky-white-bg header-transparent">
            <div class="container container-1630">
                <div class="tp-header-10-wrapper mt-30">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-4 col-md-6 col-5">
                            <div class="tp-header-10-logo">
                                <a href="{{ url('/') }}">
                                    <img width="120" src="{{ asset($settings->logo) }}" alt="{{ $settings->app_name }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-8 col-md-6 col-7">
                            <div class="tp-header-10-box d-flex align-items-center justify-content-end justify-content-xl-between">
                                @if(isset($main_menu) && count($main_menu) > 0)
                                <div class="tp-header-menu tp-header-10-menu tp-header-dropdown dropdown-white-bg d-none d-xl-block">
                                    <nav class="tp-mobile-menu-active">
                                         <ul>
                                            @include('frontend.layouts.all-home-pages')
                                            @include('frontend.layouts.menu-items', ['menu_data' => $main_menu])
                                        </ul>
                                    </nav>
                                </div>
                                 @endif
                                <div class="tp-header-10-right d-flex align-items-center">

                                    <div class="tp-header-11-btn-box d-none d-md-block ml-20">
                                        <a class="tp-btn-black-radius d-flex align-items-center justify-content-between" href="{{ route('contact') }}">
                                            <span>
                                                <span class="text-1">{{ __('frontend.start_a_project') }}</span>
                                                <span class="text-2">{{ __('frontend.start_a_project') }}</span>
                                            </span>
                                            <i>
                                                <span>
                                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 9L9 1M9 1H1M9 1V9" stroke="#21212D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 9L9 1M9 1H1M9 1V9" stroke="#21212D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </i>
                                        </a>
                                    </div>
                                    <div class="tp-header-10-offcanvas ml-15">
                                        <div class="tp-header-bar">
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
                </div>
            </div>
        </div>
        <!-- header area end -->
