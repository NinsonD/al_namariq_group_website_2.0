<footer class="pb-20">

    <div class="dgm-footer-bg p-relative">

        <!-- footer area start -->
        <div class="dgm-footer-area black-bg-5 pt-100 pb-60">
            <div class="container container-1430">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-40">
                        <div class="dgm-footer-widget dgm-footer-col-1 z-index-1 tp_fade_anim" data-delay=".3">
                            <div class="dgm-footer-logo mb-30">
                                <a href="{{ url('/') }}">
                                    <img width="120" src="{{ asset($settings->logo_white) }}" alt="{{ $settings->app_name }}">
                                </a>
                            </div>
                            <div class="dgm-footer-widget-paragraph mb-35">
                                <p>
                                    {{ __('frontend.footer_description') }}
                                </p>
                            </div>
                            <div class="dgm-footer-widget-social">
                                @include('frontend.partials._social')
                            </div>
                        </div>
                    </div>
                     @if (!empty($footer_menu_one) && is_array($footer_menu_one) && count($footer_menu_one) > 0)
                    <div class="col-xl-2 col-lg-2  col-md-3 mb-40">
                        <div class="dgm-footer-widget dgm-footer-col-2 tp_fade_anim" data-delay=".4">
                            <h4 class="dgm-footer-widget-title">{{ __('frontend.services') }}</h4>
                            <div class="dgm-footer-widget-menu">
                                <ul>
                                    @include('frontend.layouts.footers._footer-list', ['menu_data' => $footer_menu_one])
                                </ul>
                            </div>

                        </div>
                    </div>
                    @endif

                    @if (!empty($footer_menu_two) && is_array($footer_menu_two) && count($footer_menu_two) > 0)
                    <div class="col-xl-2 col-lg-2 col-md-3 mb-40">
                        <div class="dgm-footer-widget dgm-footer-col-3 tp_fade_anim" data-delay=".5">
                            <h4 class="dgm-footer-widget-title">{{ __('frontend.company') }}</h4>


                            <div class="dgm-footer-widget-menu">
                                <ul>
                                    @include('frontend.layouts.footers._footer-list', ['menu_data' => $footer_menu_two])
                                </ul>
                            </div>

                        </div>
                    </div>
                    @endif
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-40">
                        <div class="dgm-footer-widget dgm-footer-col-4 z-index-1 tp_fade_anim" data-delay=".6">
                            <h4 class="dgm-footer-widget-title">{{ __('frontend.newsletter') }}</h4>
                            <div class="dgm-footer-widget-paragraph color-style mb-35">
                                <p>{!! clean(pureText(__('frontend.newsletter_description'))) !!}</p>
                            </div>
                            <div class="dgm-footer-widget-input p-relative">
                                <form action="{{ route('newsletter-request') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <input name="email" type="email" placeholder="{{ __('frontend.enter_your_email') }}">
                                    <span class="input-icon">
                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 2.5C16 1.675 15.325 1 14.5 1H2.5C1.675 1 1 1.675 1 2.5M16 2.5V11.5C16 12.325 15.325 13 14.5 13H2.5C1.675 13 1 12.325 1 11.5V2.5M16 2.5L8.5 7.74998L1 2.5" stroke="#A1A4AA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <button class="input-button footer-subscribe-btn" type="submit">
                                        <span>
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.4918 0.523919C17.0417 0.0609703 16.3754 -0.110257 15.7541 0.0709359L1.2672 4.28277C0.611729 4.46578 0.147138 4.98852 0.0219872 5.65169C-0.105865 6.32754 0.340718 7.18639 0.924156 7.54515L5.45391 10.3283C5.9185 10.6146 6.51815 10.543 6.9026 10.1552L12.0896 4.93597C12.3507 4.66328 12.7829 4.66328 13.044 4.93597C13.3051 5.1978 13.3051 5.62451 13.044 5.8963L7.84799 11.1156C7.46263 11.5033 7.3906 12.1049 7.67422 12.5733L10.442 17.1484C10.7661 17.6911 11.3243 18 11.9366 18C12.0086 18 12.0896 18 12.1617 17.99C12.8639 17.9003 13.4222 17.4193 13.6293 16.7398L17.924 2.27243C18.1131 1.65638 17.942 0.985961 17.4918 0.523919Z" fill="currentcolor" />
                                                <path opacity="0.4" d="M6.7091 15.5302C6.97201 15.7957 6.97201 16.226 6.7091 16.4915L5.47919 17.7281C5.34774 17.8613 5.17487 17.9274 5.002 17.9274C4.82913 17.9274 4.65626 17.8613 4.5248 17.7281C4.261 17.4627 4.261 17.0332 4.5248 16.7678L5.75381 15.5302C6.01761 15.2657 6.44529 15.2657 6.7091 15.5302ZM6.00348 12.0984C6.26639 12.3639 6.26639 12.7942 6.00348 13.0597L4.77358 14.2963C4.64212 14.4295 4.46925 14.4956 4.29638 14.4956C4.12351 14.4956 3.95064 14.4295 3.81919 14.2963C3.55538 14.0309 3.55538 13.6014 3.81919 13.336L5.04819 12.0984C5.312 11.8339 5.73967 11.8339 6.00348 12.0984ZM2.61701 11.0182C2.87992 11.2836 2.87992 11.714 2.61701 11.9794L1.38711 13.216C1.25566 13.3492 1.08279 13.4154 0.909915 13.4154C0.737044 13.4154 0.564173 13.3492 0.432719 13.216C0.168911 12.9506 0.168911 12.5212 0.432719 12.2557L1.66172 11.0182C1.92553 10.7536 2.35321 10.7536 2.61701 11.0182Z" fill="currentcolor" />
                                            </svg>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer area end -->

        <!-- copyright area start -->
        <div class="tp-copyright-2-area tp-copyright-2-border black-bg-5">
            <div class="container container-1430">
                <div class="row align-items-center gy-4">
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <div class="tp-copyright-2-left text-center text-md-start z-index-1">
                            <p>{!! clean(pureCopyrightText($settings->copyright_text)) !!}</p>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-12">
                        <div class="d-flex align-items-center flex-wrap gap-4">
                            <div class="tp-copyright-2-middle">
                                <a href="tel:{{ $site_contact->phone }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <path d="M16.976 14.064C16.976 14.352 16.912 14.648 16.776 14.936C16.64 15.224 16.464 15.496 16.232 15.752C15.84 16.184 15.408 16.496 14.92 16.696C14.44 16.896 13.92 17 13.36 17C12.544 17 11.672 16.808 10.752 16.416C9.832 16.024 8.912 15.496 8 14.832C7.08 14.16 6.208 13.416 5.376 12.592C4.552 11.76 3.808 10.888 3.144 9.976C2.488 9.064 1.96 8.152 1.576 7.248C1.192 6.336 1 5.464 1 4.632C1 4.088 1.096 3.568 1.288 3.088C1.48 2.6 1.784 2.152 2.208 1.752C2.72 1.248 3.28 1 3.872 1C4.096 1 4.32 1.048 4.52 1.144C4.728 1.24 4.912 1.384 5.056 1.592L6.912 4.208C7.056 4.408 7.16 4.592 7.232 4.768C7.304 4.936 7.344 5.104 7.344 5.256C7.344 5.448 7.288 5.64 7.176 5.824C7.072 6.008 6.92 6.2 6.728 6.392L6.12 7.024C6.032 7.112 5.992 7.216 5.992 7.344C5.992 7.408 6 7.464 6.016 7.528C6.04 7.592 6.064 7.64 6.08 7.688C6.224 7.952 6.472 8.296 6.824 8.712C7.184 9.128 7.568 9.552 7.984 9.976C8.416 10.4 8.832 10.792 9.256 11.152C9.672 11.504 10.016 11.744 10.288 11.888C10.328 11.904 10.376 11.928 10.432 11.952C10.496 11.976 10.56 11.984 10.632 11.984C10.768 11.984 10.872 11.936 10.96 11.848L11.568 11.248C11.768 11.048 11.96 10.896 12.144 10.8C12.328 10.688 12.512 10.632 12.712 10.632C12.864 10.632 13.024 10.664 13.2 10.736C13.376 10.808 13.56 10.912 13.76 11.048L16.408 12.928C16.616 13.072 16.76 13.24 16.848 13.44C16.928 13.64 16.976 13.84 16.976 14.064Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"/>
                                        <path opacity="0.4" d="M14.1999 6.5998C14.1999 6.1198 13.8239 5.3838 13.2639 4.7838C12.7519 4.2318 12.0719 3.7998 11.3999 3.7998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.4" d="M16.9999 6.6C16.9999 3.504 14.4959 1 11.3999 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                    {{ $site_contact->phone }}
                                </a>
                            </div>
                            <div class="tp-copyright-2-middle">
                                <a href="mailto:{{ $site_contact->email }}">
                                    <span>
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13 14.6H5C2.6 14.6 1 13.4 1 10.6V5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6Z" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13 5.40039L10.496 7.40039C9.672 8.05639 8.32 8.05639 7.496 7.40039L5 5.40039" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    {{ $site_contact->email }}
                                </a>
                            </div>
                            <div class="tp-copyright-2-middle">
                                <a href="mailto:{{ $site_contact->address_link }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21" viewBox="0 0 18 21" fill="none">
                                        <path opacity="0.4" d="M9.00014 11.6048C10.5988 11.6048 11.8948 10.3088 11.8948 8.7101C11.8948 7.11142 10.5988 5.81543 9.00014 5.81543C7.40146 5.81543 6.10547 7.11142 6.10547 8.7101C6.10547 10.3088 7.40146 11.6048 9.00014 11.6048Z" stroke="currentColor" stroke-width="1.5"/>
                                        <path d="M1.22547 7.02129C3.05319 -1.01328 14.9566 -1.004 16.775 7.03057C17.842 11.7437 14.9102 15.7331 12.3403 18.201C10.4754 20.0009 7.52509 20.0009 5.65098 18.201C3.0903 15.7331 0.158522 11.7344 1.22547 7.02129Z" stroke="currentColor" stroke-width="1.5"/>
                                        </svg>
                                    </span>
                                    {{ $site_contact->address }}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- copyright area end -->

    </div>

</footer>
