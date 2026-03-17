<footer>
    <!-- footer area start -->
    <div class="des-footer-wrap pb-15">
        <div class="container-fluid">
            <div class="des-footer-area des-footer-bg text-center include-bg" data-background="{{ asset('admin/img/default/home-six/h6-footer-bg.jpg') }}">
                <div class="des-footer-top d-flex align-items-center justify-content-between">
                    <span>{{ __('frontend.creative_design_agency') }}</span>
                    <div class="des-footer-logo">
                        <a href="{{ url('/') }}">
                            <img width="140" src="{{ asset($settings->logo_white) }}" alt="{{ $settings->app_name }}">
                        </a>
                    </div>
                    <span>{{ __('frontend.based_in_london') }}</span>
                </div>
                <div class="des-footer-middle">
                    <span>{{ __('frontend.footer_description_3') }}</span>
                    <h3 class="des-footer-title">
                        <a class="text-scale-anim" href="{{ route('contact') }}">{{ __('frontend.contact_us') }}</a>
                    </h3>
                </div>
                <div class="des-footer-bottom d-flex align-items-center justify-content-between">
                    <span>{{ __('frontend.powered_by') }}</span>
                    <div class="des-footer-bottom-social text-center">
                        @include('frontend.partials._social')
                    </div>
                    <span>{!! clean(pureCopyrightText($settings->copyright_text)) !!}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- footer area end -->

</footer>
