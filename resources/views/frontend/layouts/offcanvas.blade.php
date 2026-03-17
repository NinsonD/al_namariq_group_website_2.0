<div class="tp-offcanvas-area">
    <div class="tp-offcanvas-wrapper ">
        <div class="tp-offcanvas-top d-flex align-items-center justify-content-between">
            <div class="tp-offcanvas-logo">
                <a href="{{ route('home') }}">
                    <img width="120" src="{{ asset($settings->logo) }}" alt="{{ $settings->app_name }}">
                    </a>
            </div>
            <div class="tp-offcanvas-close">
                <button class="tp-offcanvas-close-btn">
                    <svg width="37" height="38" viewBox="0 0 37 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.19141 9.80762L27.5762 28.1924" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.19141 28.1924L27.5762 9.80761" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="tp-offcanvas-main">
            <div class="tp-offcanvas-menu ">
                <nav></nav>
            </div>

            <div class="ss-offcanvas-account mb-50">
                @auth
                    <h3 class="tp-offcanvas-title sm">{{ __('frontend.my_account') }}</h3>
                    <ul>
                        @if (auth()->user()->type !== 'admin')
                        <li>
                            <a href="{{ route('user.dashboard') }}">
                                <span>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.5993 16.9998L6.39879 14.1927C6.29099 12.6836 7.48627 11.3999 8.9993 11.3999C10.5123 11.3999 11.7076 12.6836 11.5998 14.1927L11.3993 16.9998" stroke="currentColor" stroke-width="1.5" />
                                        <path d="M1.28111 9.97061C0.998697 8.13287 0.857489 7.214 1.20493 6.39941C1.55238 5.58481 2.32322 5.02748 3.86491 3.9128L5.01679 3.07996C6.93463 1.69332 7.89355 1 9 1C10.1064 1 11.0654 1.69332 12.9832 3.07996L14.1351 3.9128C15.6768 5.02748 16.4476 5.58481 16.7951 6.39941C17.1425 7.214 17.0013 8.13287 16.7189 9.97061L16.4781 11.5377C16.0777 14.1429 15.8775 15.4455 14.9432 16.2226C14.0089 16.9997 12.6429 16.9997 9.91105 16.9997H8.08895C5.35707 16.9997 3.99113 16.9997 3.0568 16.2226C2.12247 15.4455 1.9223 14.1429 1.52194 11.5377L1.28111 9.97061Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                {{ __('frontend.dashboard') }}
                            </a>
                        </li>

                        @if($settings->enable_shop)
                        <li>
                            <a href="{{ route('user.wishlist.index') }}">
                                <span>
                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.97 1.77323C12.8247 0.493845 10.9523 1.00942 9.82748 1.83068C9.36628 2.16741 9.13568 2.33578 9 2.33578C8.86432 2.33578 8.63372 2.16741 8.17252 1.83068C7.04769 1.00942 5.17527 0.493845 3.02995 1.77323C0.214455 3.45228 -0.422624 8.99155 6.07162 13.6648C7.30857 14.5549 7.92705 15 9 15C10.073 15 10.6914 14.5549 11.9284 13.6648C18.4226 8.99155 17.7855 3.45228 14.97 1.77323Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                                {{ __('frontend.wishlist') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cart.show') }}">
                                <span>
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.6316 12.7895H11.748C15.527 12.7895 16.1017 10.4155 16.7988 6.95297C16.9998 5.95427 17.1003 5.45492 16.8586 5.12224C16.6168 4.78955 16.1534 4.78955 15.2266 4.78955H3.94739" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M5.63158 12.7894L3.42419 2.27572C3.23675 1.52597 2.5631 1 1.79027 1H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M6.37265 12.7896H6.02618C4.8781 12.7896 3.94739 13.759 3.94739 14.955C3.94739 15.1543 4.10251 15.3159 4.29385 15.3159H13.6316" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <ellipse cx="7.73685" cy="16.5791" rx="1.26316" ry="1.26315" stroke="currentColor" stroke-width="1.5" />
                                    <ellipse cx="13.6316" cy="16.5791" rx="1.26316" ry="1.26315" stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                </span>
                                {{ __('frontend.my_cart') }}
                            </a>
                        </li>
                        @endif

                        <li>
                            <form action="{{route('user.logout')}}" method="POST" class="d-block">
                                @csrf
                                @method('POST')
                                <button type="submit" class="w-100 text-start frontend-logout-btn">
                                    <span>
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.3846 12.5385V14.8462C11.3846 15.1522 11.2631 15.4457 11.0467 15.662C10.8303 15.8784 10.5368 16 10.2308 16H2.15385C1.84783 16 1.55434 15.8784 1.33795 15.662C1.12157 15.4457 1 15.1522 1 14.8462V2.15385C1 1.84783 1.12157 1.55434 1.33795 1.33795C1.55434 1.12157 1.84783 1 2.15385 1H10.2308C10.5368 1 10.8303 1.12157 11.0467 1.33795C11.2631 1.55434 11.3846 1.84783 11.3846 2.15385V4.46154" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M7.9231 8.5H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.6923 6.19238L16 8.50008L13.6923 10.8078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    {{__('frontend.logout')}}
                                </button>
                            </form>
                        </li>

                        @else
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <span>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.5993 16.9998L6.39879 14.1927C6.29099 12.6836 7.48627 11.3999 8.9993 11.3999C10.5123 11.3999 11.7076 12.6836 11.5998 14.1927L11.3993 16.9998" stroke="currentColor" stroke-width="1.5" />
                                        <path d="M1.28111 9.97061C0.998697 8.13287 0.857489 7.214 1.20493 6.39941C1.55238 5.58481 2.32322 5.02748 3.86491 3.9128L5.01679 3.07996C6.93463 1.69332 7.89355 1 9 1C10.1064 1 11.0654 1.69332 12.9832 3.07996L14.1351 3.9128C15.6768 5.02748 16.4476 5.58481 16.7951 6.39941C17.1425 7.214 17.0013 8.13287 16.7189 9.97061L16.4781 11.5377C16.0777 14.1429 15.8775 15.4455 14.9432 16.2226C14.0089 16.9997 12.6429 16.9997 9.91105 16.9997H8.08895C5.35707 16.9997 3.99113 16.9997 3.0568 16.2226C2.12247 15.4455 1.9223 14.1429 1.52194 11.5377L1.28111 9.97061Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                {{ __('frontend.dashboard') }}
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="logout-form d-inline-block w-100">
                                @csrf
                                @method('POST')
                                <button type="submit" class="w-100 text-start frontend-logout-btn">
                                    <span>
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.3846 12.5385V14.8462C11.3846 15.1522 11.2631 15.4457 11.0467 15.662C10.8303 15.8784 10.5368 16 10.2308 16H2.15385C1.84783 16 1.55434 15.8784 1.33795 15.662C1.12157 15.4457 1 15.1522 1 14.8462V2.15385C1 1.84783 1.12157 1.55434 1.33795 1.33795C1.55434 1.12157 1.84783 1 2.15385 1H10.2308C10.5368 1 10.8303 1.12157 11.0467 1.33795C11.2631 1.55434 11.3846 1.84783 11.3846 2.15385V4.46154" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M7.9231 8.5H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.6923 6.19238L16 8.50008L13.6923 10.8078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    {{__('frontend.logout')}}
                                </button>
                            </form>
                        </li>
                        @endif
                    </ul>
                @else
                <a href="{{ route('user.login') }}" class="ss-shop-btn">
                    <i class="fa-regular fa-user"></i>
                    <span>{{ __('frontend.login') }}</span>
                </a>
                @endauth
            </div>

            <div class="ss-offcanvas-actions mb-50">

                @if (!empty(getSiteLanguages()))
                <!-- change language -->
                <div class="ss-offcanvas-language mb-20">
                    <form action="{{ route('set.language') }}" method="post" id="sidebar-language-form">
                        @csrf
                        @method('POST')
                        <label for="language" class="form-label">{{ __('frontend.change_language') }}:</label>
                        <select name="language_code" id="sidebar-language" class="form-select">
                            @foreach (getSiteLanguages() as $language)
                            <option value="{{ $language->code }}" {{ getSiteLocale() == $language->code ? 'selected' : '' }}>{{ $language->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                @endif

                @if (!empty(getAllCurrencies()))
                <!-- change language -->
                <div class="ss-offcanvas-language mb-20">
                    <form action="{{ route('set.currency') }}" method="post" id="sidebar-currency-form">
                        @csrf
                        @method('POST')

                        <label for="currency" class="form-label">{{ __('frontend.change_currency') }}:</label>
                        <select name="currency_code" id="sidebar-currency" class="form-select">
                            @foreach (getAllCurrencies() as $currency)
                            <option value="{{ $currency->code }}" {{ getSessionCurrency()['code'] == $currency->code ? 'selected' : '' }}>{{ $currency->title }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                @endif

                @if ($settings?->enable_shop)
                <label for="search" class="form-label">{{ __('frontend.search_label') }}</label>
                <div class="ss-offcanvas-search position-relative">
                    <form action="{{ route('products') }}" method="GET">
                        <input type="text" class="search-input" placeholder="{{ __('frontend.search') }}" name="search">
                        <button class="tp-search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                <path d="M18.0508 18.05L23.0009 23" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M20.8004 10.9C20.8004 5.43237 16.3679 1 10.9002 1C5.43246 1 1 5.43237 1 10.9C1 16.3676 5.43246 20.7999 10.9002 20.7999C16.3679 20.7999 20.8004 16.3676 20.8004 10.9Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>
                </div>
                @endif

            </div>

            <div class="tp-offcanvas-contact">
                <h3 class="tp-offcanvas-title sm">{{ __('frontend.information') }}</h3>
                <ul>
                    <li><a href="tel:{{ $site_contact->phone }}">{{ $site_contact->phone }}</a></li>
                    <li><a href="mailto:{{ $site_contact->email }}">{{ $site_contact->email }}</a></li>
                    <li><a href="{{ $site_contact->address_link }}">{{ $site_contact->address }}</a></li>
                </ul>
            </div>

            @if (!$social_links->isEmpty())
            <div class="tp-offcanvas-social">
                <h3 class="tp-offcanvas-title sm">{{ __('frontend.follow_us') }}</h3>
                <ul>
                    @foreach ($social_links as $link)
                    <li>
                            <a href="{{ url($link->link ?? '#') }}" target="_blank">
                            <i class="{{ $link->icon }}"></i>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
<div class="body-overlay"></div>
