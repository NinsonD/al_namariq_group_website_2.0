<footer>

<!-- footer area start -->
<div class="tp-footer-area agntix-footer-shop tp-footer-shop-style pt-60 pb-30 shop-footer-bg">
    <div class="container-fluid p-0">
        <div class="tp-footer-shop-top">
            <div class="row gx-0">
                <div class="col-lg-3 col-6">
                    <div class="tp-footer-shop-widget tp-footer-shop-col-1">
                        <h4 class="tp-footer-shop-widget-title">{{ __('frontend.quick_links') }}</h4>

                        @if (!empty($footer_menu_one) && is_array($footer_menu_one) && count($footer_menu_one) > 0)
                            <ul>
                                @include('frontend.layouts.footers._footer-list', ['menu_data' => $footer_menu_one, 'class' => 'tp-line-white'])
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="tp-footer-shop-widget tp-footer-shop-col-1">
                        <h4 class="tp-footer-shop-widget-title">{{ __('frontend.useful_links') }}</h4>
                        @if (!empty($footer_menu_two) && is_array($footer_menu_two) && count($footer_menu_two) > 0)
                            <ul>
                                @include('frontend.layouts.footers._footer-list', ['menu_data' => $footer_menu_two, 'class' => 'tp-line-white'])
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="tp-footer-shop-widget tp-footer-shop-col-1">
                        <h4 class="tp-footer-shop-widget-title">{{ __('frontend.collections') }}</h4>
                        @if (!empty($footer_menu_three) && is_array($footer_menu_three) && count($footer_menu_three) > 0)
                            <ul>
                                @include('frontend.layouts.footers._footer-list', ['menu_data' => $footer_menu_three, 'class' => 'tp-line-white'])
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="tp-footer-shop-widget tp-footer-shop-col-1">
                        <h4 class="tp-footer-shop-widget-title">
                            {{ __('frontend.help') }}
                        </h4>
                        @if (!empty($footer_menu_four) && is_array($footer_menu_four) && count($footer_menu_four) > 0)
                            <ul>
                                @include('frontend.layouts.footers._footer-list', ['menu_data' => $footer_menu_four, 'class' => 'tp-line-white'])
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="tp-footer-shop-big-text">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="tp-hero-shop-title tp-char-animation">
                        {{ __('frontend.agntixcom') }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="tp-footer-shop-copyright pt-20">
            <div class="row">
                <div class="col-lg-6">
                    <div class="tp-footer-shop-copyright-text pl-100">
                        <p>{!! clean(pureCopyrightText($settings->copyright_text)) !!}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tp-footer-shop-copyright-text text-lg-end pr-100">
                        <p>
                            {{ __('frontend.making_shopping_simple') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer area end -->

</footer>
