<!-- header area start -->
<header>

<div class="tp-header-2-area z-index-3 mt-40">
    <div class="container container-1750">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="tp-header-logo">
                    <a href="{{ url('/') }}">
                        <img width="140" class="logo-white" src="{{ asset($settings->logo_white) }}" alt="{{ $settings->app_name }}">
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="tp-header-2-right d-flex justify-content-end">
                    <button class="tp-header-2-bar tp-offcanvas-open-btn d-flex align-items-center">
                        <span>
                            {{ __('frontend.menu') }}
                        </span>
                        <span>
                            <i></i>
                            <i></i>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@if(isset($main_menu) && count($main_menu) > 0)
<nav class="tp-mobile-menu-active d-none">
    <ul>
        @include('frontend.layouts.all-home-pages')
        @include('frontend.layouts.menu-items', ['menu_data' => $main_menu])
    </ul>
</nav>
@endif
</header>
<!-- header area end -->
