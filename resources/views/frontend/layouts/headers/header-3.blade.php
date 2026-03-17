<header>

        <div class="tp-header-10-main header-transparent">

            <!-- header area start -->
            <div id="header-sticky" class="tp-header-10-area tp-header-blur sticky-white-bg tp-header-10-sticky">
                <div class="container container-1430">
                    <div class="tp-header-10-wrapper mt-30">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-4 col-md-6 col-5">
                                <div class="tp-header-10-logo">
                                    <a href="{{ url('/') }}">
                                        <img width="140" src="{{ asset($settings->logo) }}" alt="{{ $settings->app_name }}">
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
                                        <div class="tp-header-10-btn-box d-none d-sm-block">
                                            <div class="animated-border-box radius-style-2">
                                                <a class="tp-btn-gradient sm p-relative" href="{{ route('contact') }}">
                                                    {{ __('frontend.contact_us') }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="tp-header-10-offcanvas ml-20">
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
        </div>

    </header>
