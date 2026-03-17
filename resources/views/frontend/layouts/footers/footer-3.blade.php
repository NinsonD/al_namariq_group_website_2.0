
<footer  data-bg-color="#F7F7FD">

    <!-- footer area start -->
    <div class="app-footer-area pt-100 pb-60 home-app-footer">
        <div class="container container-1230">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 mb-40">
                    <div class="dgm-footer-widget app-footer-col-1 z-index-1">
                        <div class="dgm-footer-logo mb-30">
                            <a href="{{ url('/') }}">
                                <img class="footer-logo-width" width="140" src="{{ asset($settings->logo) }}" alt="{{ $settings->app_name }}">
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
                    <div class="dgm-footer-widget app-footer-widget app-footer-col-2">
                        <h4 class="dgm-footer-widget-title">
                            {{ __('frontend.quick_links') }}
                        </h4>


                        <div class="dgm-footer-widget-menu">
                            <ul>
                                @include('frontend.layouts.footers._footer-list', ['menu_data' => $footer_menu_one])
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-xl-2 col-lg-2 col-md-3 mb-40">
                    <div class="dgm-footer-widget app-footer-widget app-footer-col-3">
                        <h4 class="dgm-footer-widget-title">
                            {{ __('frontend.need_help') }}
                        </h4>
                        <div class="app-footer-widget-info mb-20">
                            <div class="app-footer-widget-info-title">
                                {{ __('frontend.call_us_directly') }}
                            </div>
                            <a class="tp-line-black" href="tel:{{ $site_contact->phone }}">{{ $site_contact->phone }}</a>
                        </div>

                        <div class="app-footer-widget-info">
                            <div class="app-footer-widget-info-title">
                                {{ __('frontend.need_live_support') }}
                            </div>
                            <a class="tp-line-black" href="mailto:{{ $site_contact->email }}">{{ $site_contact->email }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-40">
                    <div class="dgm-footer-widget app-footer-widget app-footer-col-4 z-index-1">
                        <h4 class="dgm-footer-widget-title">{{ __('frontend.keep_in_touch') }}</h4>
                        <div class="dgm-footer-widget-paragraph color-style mb-25">
                            <p>{!! clean(pureText(__('frontend.newsletter_description'))) !!}</p>
                        </div>
                        <div class="dgm-footer-widget-input p-relative">
                           <form action="{{ route('newsletter-request') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input name="email" type="email" placeholder="{{ __('frontend.enter_your_email') }}">
                                <div class="input-button">
                                    <div class="animated-border-box radius-style-2">
                                        <button type="submit" class="tp-btn-gradient sm p-relative footer-subscribe-btn">
                                            {{ __('frontend.send') }}
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.4918 0.523919C17.0417 0.0609703 16.3754 -0.110257 15.7541 0.0709359L1.2672 4.28277C0.611729 4.46578 0.147138 4.98852 0.0219872 5.65169C-0.105865 6.32754 0.340718 7.18639 0.924156 7.54515L5.45391 10.3283C5.9185 10.6146 6.51815 10.543 6.9026 10.1552L12.0896 4.93597C12.3507 4.66328 12.7829 4.66328 13.044 4.93597C13.3051 5.1978 13.3051 5.62451 13.044 5.8963L7.84799 11.1156C7.46263 11.5033 7.3906 12.1049 7.67422 12.5733L10.442 17.1484C10.7661 17.6911 11.3243 18 11.9366 18C12.0086 18 12.0896 18 12.1617 17.99C12.8639 17.9003 13.4222 17.4193 13.6293 16.7398L17.924 2.27243C18.1131 1.65638 17.942 0.985961 17.4918 0.523919Z" fill="currentcolor" />
                                                <path opacity="0.4" d="M6.7091 15.5302C6.97201 15.7957 6.97201 16.226 6.7091 16.4915L5.47919 17.7281C5.34774 17.8613 5.17487 17.9274 5.002 17.9274C4.82913 17.9274 4.65626 17.8613 4.5248 17.7281C4.261 17.4627 4.261 17.0332 4.5248 16.7678L5.75381 15.5302C6.01761 15.2657 6.44529 15.2657 6.7091 15.5302ZM6.00348 12.0984C6.26639 12.3639 6.26639 12.7942 6.00348 13.0597L4.77358 14.2963C4.64212 14.4295 4.46925 14.4956 4.29638 14.4956C4.12351 14.4956 3.95064 14.4295 3.81919 14.2963C3.55538 14.0309 3.55538 13.6014 3.81919 13.336L5.04819 12.0984C5.312 11.8339 5.73967 11.8339 6.00348 12.0984ZM2.61701 11.0182C2.87992 11.2836 2.87992 11.714 2.61701 11.9794L1.38711 13.216C1.25566 13.3492 1.08279 13.4154 0.909915 13.4154C0.737044 13.4154 0.564173 13.3492 0.432719 13.216C0.168911 12.9506 0.168911 12.5212 0.432719 12.2557L1.66172 11.0182C1.92553 10.7536 2.35321 10.7536 2.61701 11.0182Z" fill="currentcolor" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer area end -->

    @if (!empty($settings->copyright_text))
    <!-- copyright area start -->
    <div class="tp-copyright-app-area tp-copyright-2-border app-copyright-border">
        <div class="container container-1430">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="app-copyright-text text-center z-index-1">
                        <p>
                            {!! clean(pureCopyrightText($settings->copyright_text)) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright area end -->
    @endif
</footer>
