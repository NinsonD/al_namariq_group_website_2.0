<!-- app header start -->
<div class="app-header bg-card py-2 px-4 px-md-6 d-flex align-items-center">
    <div class="row align-items-center w-100 gx-0">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-4 col-3">
            <div class="app-header-left d-flex align-items-center">
                <button type="button" class="app-header-bar-btn app-sidebar-open-btn me-4 d-none d-xl-inline-block">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button type="button" class="app-header-bar-btn app-sidebar-mobile-open d-xl-none me-4">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div class="app-header-search position-relative d-none d-md-block">
                    <div class="form-control-icon ">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M15 15L11.6167 11.6166" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <input type="text" class="" id="searchBox" placeholder="{{ __('admin.enter_keywords') }}">
                    </div>

                    <div class="app-header-search-list position-absolute top-100 start-0 w-100 bg-white shadow-sm rounded-3 overflow-auto z-1" id="searchResult">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-8 col-9">


            <ul class="navbar-nav flex-row align-items-center justify-content-end">

                <!-- search button -->
                <li class="header-nav-item header-language me-2 d-md-none">
                    <a class="header-nav-link" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 15L11.6167 11.6166" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-2">
                        <div class="app-header-search position-relative">

                            <input type="text" class="app-header-search-input" id="searchBox2" placeholder="{{ __('admin.enter_keywords') }}">
                            <button type="submit" class="app-header-search-btn">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15 15L11.6167 11.6166" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>

                            <div class="app-header-search-list position-absolute top-100 start-0 w-100 bg-white shadow-sm rounded-3 overflow-auto z-1" id="searchResult2">

                            </div>
                        </div>
                    </ul>
                </li>
                <!-- search button -->

                <li class="header-nav-item me-2">
                    <form action="{{ route('set.language') }}" method="POST" id="setLanguageForm">
                        @csrf
                        <select class="form-select" name="language_code">
                            @foreach (getSiteLanguages() as $language)
                                <option value="{{ $language->code }}" @if (getSiteLocale() == $language->code) selected @endif>
                                    {{ $language->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </li>


                <li class="header-nav-item me-2">
                    <form action="{{ route('set.currency') }}" method="POST" id="setCurrencyForm">
                        @csrf
                        @method('POST')
                        <select class="form-select" name="currency_code">
                            @foreach (getAllCurrencies() as $currency)
                            <option value="{{ $currency->code }}" @if (getSessionCurrency()['code'] == $currency->code) selected @endif>{{ $currency->title }}</option>
                            @endforeach
                        </select>

                    </form>
                </li>

                <li class="header-nav-item me-2">
                    <form action="{{ route('admin.clear-cache') }}" method="POST" id="clearCacheForm">
                        @csrf
                        @method('POST')

                        <button type="submit" class="btn btn-sm btn-label-primary  gap-2">

                            <svg class="m-0" width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.5385 12.3334L18.3077 11.625M18.3077 11.625L19 14.4584M18.3077 11.625C17.6927 13.4081 16.5756 14.9649 15.0972 16.0994C13.6187 17.2339 11.8452 17.8952 9.99998 18C8.29429 18.0003 6.62985 17.4634 5.23273 16.4623C3.83561 15.4612 2.77353 14.0443 2.19075 12.4042M4.46154 6.66687L1.69231 7.3752M1.69231 7.3752L1 4.54186M1.69231 7.3752C2.85538 4.11686 6.4277 1 10 1C11.714 1.00493 13.3846 1.55216 14.7826 2.56666C16.1807 3.58117 17.2379 5.01329 17.8092 6.66668" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <span class=" d-none d-sm-inline-block">
                                {{ __('admin.clear_cache') }}
                            </span>
                        </button>
                    </form>
                </li>

                <li class="header-nav-item me-2">
                    <a href="{{url('/')}}" target="_blank" class="btn btn-sm btn-label-primary gap-2">

                        <svg class="m-0" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 10C19 14.9706 14.9706 19 10 19M19 10C19 5.02944 14.9706 1 10 1M19 10H1M10 19C5.02944 19 1 14.9706 1 10M10 19C12.0792 16.4431 13.2915 13.2912 13.4615 10C13.2915 6.70878 12.0792 3.5569 10 1M10 19C7.92075 16.4431 6.7085 13.2912 6.53847 10C6.7085 6.70878 7.92075 3.5569 10 1M1 10C1 5.02944 5.02944 1 10 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class=" d-none d-sm-inline-block">
                            {{ __('admin.view_website') }}
                        </span>
                    </a>
                </li>

                <!-- User Options -->
                <li class="header-nav-item header-user me-2">
                    <a class="header-nav-link has-avater header-nav-link-toggle" href="javascript:void(0);" data-bs-toggle="dropdown">
                        @if (auth()->user()?->avatar && file_exists(public_path(auth()->user()?->avatar)))
                            <img src="{{ asset(auth()->user()?->avatar) }}" alt="{{ auth()->user()?->name }}">
                        @else
                            <div class="avatar">
                                <span class="avatar-text rounded-circle bg-label-primary">{{ strtoupper(substr(auth()->user()?->name, 0, 1)) }}</span>
                            </div>
                        @endif

                        <div class="header-nav-link-toggle-icon">
                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.5 1L5 4.5L1.5 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('admin.profile') }}
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                                @csrf
                                @method('POST')
                                <button class="dropdown-item logout-btn" type="button">
                                    {{ __('admin.logout') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                <!-- User Options -->

            </ul>
        </div>
    </div>
</div>
<!-- app header end -->
