<footer>
<!-- footer area start -->
<div class="crp-footer-area it-footer-style crp-footer-bg p-relative pt-120 z-index-1">
    <div class="it-footer-shape">
        <img data-speed="1.1" src="{{ asset('admin/img/default/common/footer-shape-1.png') }}" alt="{{ $settings->app_name }}">
    </div>
    <div class="container container-1350">
        <div class="row">
            <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-5">
                <div class="crp-footer-widget crp-footer-col-1 mb-90 tp_fade_anim" data-delay=".3">
                    <div class="crp-footer-logo">
                        <a href="{{ url('/') }}">
                          <img width="120" class="footer-logo-width" src="{{ asset($settings->logo_white) }}" alt="{{ $settings->app_name }}">
                       </a>
                    </div>
                    <p>
                        {!! clean(pureText(__('frontend.footer_description_2'))) !!}
                    </p>
                    <div class="crp-footer-social">
                        @include('frontend.partials._social')
                    </div>
                </div>
            </div>
            @if (!empty($footer_menu_one) && is_array($footer_menu_one) && count($footer_menu_one) > 0)
            <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3">
                <div class="crp-footer-widget crp-footer-col-2 mb-90 tp_fade_anim" data-delay=".5">
                    <h4 class="crp-footer-widget-title">{{ __('frontend.company') }}</h4>

                    <div class="crp-footer-widget-menu">
                        <ul>
                            @include('frontend.layouts.footers._footer-list', ['menu_data' => $footer_menu_one])
                        </ul>
                    </div>

                </div>
            </div>
            @endif
            @if(!empty($footer_menu_two) && is_array($footer_menu_two) && count($footer_menu_two) > 0)
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                <div class="crp-footer-widget crp-footer-col-3 mb-90 tp_fade_anim" data-delay=".5">
                    <h4 class="crp-footer-widget-title">{{ __('frontend.it_services') }}</h4>

                    <div class="crp-footer-widget-menu">
                        <ul>
                            @include('frontend.layouts.footers._footer-list', ['menu_data' => $footer_menu_two])
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4">
                <div class="crp-footer-widget crp-footer-col-4 mb-90 tp_fade_anim" data-delay=".7">
                    <div class="crp-footer-widget-info mb-40">
                        <h4 class="crp-footer-widget-title">{{ __('frontend.location') }}</h4>
                        <a class="tp-line-white cream-2" href="{{ $site_contact->address_link }}" target="_blank">
                            {{ $site_contact->address }}
                        </a>
                    </div>
                    <div class="crp-footer-widget-info">
                        <h4 class="crp-footer-widget-title">{{ __('frontend.call_us_on') }}</h4>
                        <div class="crp-footer-widget-contact">
                            <a class="tp-line-white cream-2" href="mailto:{{ $site_contact->email }}">{{ $site_contact->email }}</a>
                        </div>
                        <div class="crp-footer-widget-contact">
                            <a class="tel tp-line-white cream-2 d-inline-block" href="tel:{{ $site_contact->phone }}">{{ $site_contact->phone }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="colx-l-12">
                <div class="crp-footer-big-text-wrap tp_fade_anim" data-delay=".3">
                    <a class="crp-footer-big-text text-center" href="{{ route('contact') }}">
                        <span>
                            <span class="text-1">{{ __('frontend.lets_discuss') }}</span>
                            <span class="text-2">{{ __('frontend.lets_discuss') }}</span>
                        </span>
                        <i>
                            <svg width="81" height="81" viewBox="0 0 81 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M77.4231 0.5H3.57692C1.87846 0.5 0.5 1.87846 0.5 3.57692C0.5 5.27538 1.87846 6.65385 3.57692 6.65385H69.9939L1.40154 75.2477C0.2 76.4492 0.2 78.3969 1.40154 79.5985C2.00308 80.2 2.78923 80.5 3.57692 80.5C4.36462 80.5 5.15231 80.2 5.75231 79.5985L74.3462 11.0046V77.4231C74.3462 79.1215 75.7246 80.5 77.4231 80.5C79.1215 80.5 80.5 79.1215 80.5 77.4231V3.57692C80.5 1.87846 79.1215 0.5 77.4231 0.5Z" fill="currentcolor" />
                            </svg>
                            <svg width="81" height="81" viewBox="0 0 81 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M77.4231 0.5H3.57692C1.87846 0.5 0.5 1.87846 0.5 3.57692C0.5 5.27538 1.87846 6.65385 3.57692 6.65385H69.9939L1.40154 75.2477C0.2 76.4492 0.2 78.3969 1.40154 79.5985C2.00308 80.2 2.78923 80.5 3.57692 80.5C4.36462 80.5 5.15231 80.2 5.75231 79.5985L74.3462 11.0046V77.4231C74.3462 79.1215 75.7246 80.5 77.4231 80.5C79.1215 80.5 80.5 79.1215 80.5 77.4231V3.57692C80.5 1.87846 79.1215 0.5 77.4231 0.5Z" fill="currentcolor" />
                            </svg>
                        </i>
                    </a>
                </div>
            </div>
        </div>
        @if (!empty($settings->copyright_text))
        <div class="row">
            <div class="col-xl-12">
                <div class="crp-copyright-text text-center pt-40 pb-50">
                    <p>
                        {!! clean(pureCopyrightText($settings->copyright_text)) !!}
                    </p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<!-- footer area end -->

</footer>
