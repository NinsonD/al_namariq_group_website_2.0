<header>

        <!-- header area start -->
        <div class="tp-header-shop-area header-transparent pt-10">
            <div class="container-fluid">
                <div id="header-sticky" class="tp-header-shop-wrap tp-header-blur sticky-white-bg">
                    <div class="row align-items-center">
                        <div class="col-xxl-6 col-xl-7 d-none d-xl-block">
                            <div class="tp-header-shop-menu tp-header-dropdown dropdown-white-bg">
                                <nav class="tp-mobile-menu-active">
                                    <ul>
                                        @include('frontend.layouts.all-home-pages')
                                        @include('frontend.layouts.menu-items', ['menu_data' => $main_menu])
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-6 col-md-6 col-6">
                            <div class="tp-header-shop-logo text-xl-center">
                               <a href="{{ url('/') }}">
                                    <img width="120" src="{{ asset($settings->logo_shop) }}" alt="{{ $settings->app_name }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-3 col-lg-6 col-md-6 col-6">
                            <div class="tp-header-shop-right  d-flex align-items-center justify-content-end">
                                <div class="tp-header-shop-action">
                                    <ul>
                                        <li class="d-none d-md-inline-flex py-0">
                                            <div class="tp-header-shop-avatar-wrapper tp-header-shop-common-submenu-holder {{ auth()->check() ? 'logged-in' : '' }}">
                                                @auth
                                                    @php
                                                        $avatar = auth()->user()?->avatar && file_exists(public_path(auth()->user()?->avatar)) ? auth()->user()?->avatar : null;
                                                    @endphp
                                                    <a class="tp-header-shop-avatar" href="{{ auth()->user()->type === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">
                                                        @if ($avatar)
                                                            <img src="{{ asset($avatar) }}" alt="{{ auth()->user()->name }}">
                                                        @else
                                                            <span class="tp-user-avatar-placeholder">
                                                                {{ auth()->user()->initials }}
                                                            </span>
                                                        @endif
                                                    </a>

                                                    <ul class="tp-header-shop-common-submenu">
                                                        <li>
                                                            <a href="{{ route('user.dashboard') }}">{{ __('frontend.dashboard') }}</a>
                                                        </li>

                                                        @if (auth()->user()->type !== 'admin')
                                                        <li>
                                                            <a href="{{ route('user.wishlist.index') }}">{{ __('frontend.wishlist') }}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('cart.show') }}">{{ __('frontend.my_cart') }}</a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                @else
                                                    <a href="{{ route('user.login') }}">
                                                        {{ __('frontend.login') }}
                                                    </a>
                                                @endauth
                                            </div>

                                        </li>
                                        <li class="d-none d-sm-inline-flex py-0">
                                            <div class="tp-header-shop-search">
                                                <button class="tp-search-open-btn">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.3799 11.3197C12.087 11.0268 11.6121 11.0268 11.3192 11.3197C11.0263 11.6126 11.0263 12.0874 11.3192 12.3803L12.3799 11.3197ZM11.8495 11.85L11.3192 12.3803L14.4693 15.5304L14.9997 15L15.53 14.4697L12.3799 11.3197L11.8495 11.85ZM13.6005 7.30005H14.3505C14.3505 3.4064 11.1939 0.25 7.30023 0.25V1V1.75C10.3656 1.75 12.8505 4.23486 12.8505 7.30005H13.6005ZM7.30023 1V0.25C3.40652 0.25 0.25 3.4064 0.25 7.30005H1H1.75C1.75 4.23486 4.2349 1.75 7.30023 1.75V1ZM1 7.30005H0.25C0.25 11.1937 3.40652 14.3501 7.30023 14.3501V13.6001V12.8501C4.2349 12.8501 1.75 10.3652 1.75 7.30005H1ZM7.30023 13.6001V14.3501C11.1939 14.3501 14.3505 11.1937 14.3505 7.30005H13.6005H12.8505C12.8505 10.3652 10.3656 12.8501 7.30023 12.8501V13.6001Z" fill="currentcolor"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tp-header-shop-cart">
                                                <button class="cartmini-open-btn">
                                                    {{ __('frontend.cart') }}
                                                    <span class="ss-header-cart-count">0</span>
                                                </button>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tp-header-shop-lang d-none d-xl-block">
                                                <button id="header-lang-toggle">
                                                    <span>{{ getSiteLocale() }}</span>
                                                    <span>
                                                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 1L5 5L9 1" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </button>
                                                <form action="{{ route('set.language') }}" method="post" id="language-form">
                                                    @csrf
                                                    @method('POST')
                                                    <ul class="header-lang-submenu">
                                                        @foreach (getSiteLanguages() as $language)
                                                        <li>
                                                            <button type="button" class="tp-line-white text-white text-capitalize change-lang-btn">{{ $language->name }}</button>
                                                            <input type="hidden" name="language_code" value="{{ $language->code }}">
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </form>
                                            </div>

                                             <div class="tp-header-currency d-none d-xl-block">
                                                <button id="header-currency-toggle" class="tp-header-list-toggle-btn">
                                                    <span>{{ getSessionCurrency()['code'] }}</span>
                                                    <span>
                                                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 1L5 5L9 1" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </button>

                                                <form action="{{ route('set.currency') }}" method="post" id="currency-form">
                                                    @csrf
                                                    @method('POST')
                                                    <ul class="header-currency-submenu">
                                                        @foreach (getAllCurrencies() as $currency)
                                                        <li>
                                                            <button type="button" class="tp-line-white text-white text-capitalize change-currency-btn">{{ $currency->title }}</button>
                                                            <input type="hidden" name="currency_code" value="{{ $currency->code }}">
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </form>
                                            </div>

                                            <div class="tp-header-10-offcanvas d-xl-none">
                                                <div class="tp-header-bar">
                                                    <button class="tp-offcanvas-open-btn">
                                                        <i></i>
                                                        <i></i>
                                                        <i></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->

    </header>


@include('frontend.products.cartmini')
