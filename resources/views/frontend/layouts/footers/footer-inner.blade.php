
@php
    $footer_white = $whiteStyle ?? false;
@endphp

<footer>

<!-- footer area start -->
<div class="tp-footer-area {{ $footer_white ? '' : 'tp-footer-style-6' }} pt-120 pb-35" data-bg-color="{{ $footer_white ? '' : '#1B1B1D' }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="tp-footer-widget tp-footer-col-1 pb-40 tp_fade_anim" data-delay=".3">
                    <h4 class="tp-footer-widget-title">{!! clean(pureText(__('frontend.helping_startups_scale_and_grow'))) !!}</h4>
                    <div class="tp-footer-widget-social">
                        @include('frontend.partials._social')
                    </div>
                </div>
            </div>
            @if (!empty($footer_menu_one) && count($footer_menu_one) > 0)
            <div class="col-xl-5 col-lg-4 col-md-6">
                <div class="tp-footer-widget tp-footer-col-2 pb-40 tp_fade_anim" data-delay=".5">
                    <h4 class="tp-footer-widget-title-sm pre mb-25">{{ __('frontend.quick_links') }}</h4>
                    <div class="tp-footer-widget-menu">
                        <ul>
                            @include('frontend.layouts.footers._footer-list', ['menu_data' => $footer_menu_one])
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="tp-footer-widget tp-footer-col-3 pb-40 mb-30 tp_fade_anim" data-delay=".7">
                    <h4 class="tp-footer-widget-title-sm pre mb-20">{{ __('frontend.contact') }}</h4>
                    <div class="tp-footer-widget-info">
                        <a href="mailto:{{ $site_contact->email }}">{{ $site_contact->email }}</a>
                        <a href="tel:{{ $site_contact->phone }}">{{ $site_contact->phone }}</a>
                    </div>
                    <div class="tp-footer-widget-info">
                        <a href="{{ $site_contact->address_link }}" target="_blank">{{ $site_contact->address }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tp-copyright-area {{ $footer_white ? '' : 'tp-copyright-style-6' }}" data-bg-color="{{ $footer_white ? '' : '#1B1B1D' }}">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-copyright-content text-center text-md-start tp_fade_anim" data-delay=".3" data-fade-from="bottom" data-ease="bounce" data-on-scroll="3">
                    <h2 class="tp-copyright-big-text">
                        {{ __('frontend.footer_brand_text') }}
                    </h2>
                </div>
            </div>
        </div>

        @if (!empty($settings->copyright_text))
        <div class="tp-copyright-bottom">
            <div class="row">
                <div class="col-md-6">
                    <div class="tp-copyright-left text-center text-md-start">
                        <span>{!! clean(pureCopyrightText($settings->copyright_text)) !!}</span>
                    </div>
                </div>

            </div>
        </div>
        @endif
    </div>
</div>
<!-- footer area end -->

</footer>
