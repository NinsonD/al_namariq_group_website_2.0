<!-- cta area start -->
<div class="app-cta-area z-index-1">
    <div class="container container-1430">
        <div class="app-cta-wrap">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="app-cta-wrapper pt-90 pb-90">
                        <div class="app-cta-heading mb-30">
                            <h3 class="tp-section-title-phudu fs-70 mb-20 tp_fade_anim" data-delay=".3">
                                {!! clean(pureText($content?->title)) !!}
                            </h3>
                            <div class="tp_fade_anim" data-delay=".5">
                                <p>
                                    {!! clean(pureText($content?->description)) !!}
                                </p>
                            </div>
                        </div>
                        <div class="app-cta-store-box d-flex align-items-center tp_fade_anim" data-delay=".3" data-fade-from="top" data-ease="bounce">
                            <a href="{{ url($default_content?->btn_url_1 ?? '#') }}" class="app-cta-store mr-15">
                                <div class="app-cta-store-icon">
                                    <span><img width="28" src="{{ asset($default_content?->btn_icon_1) }}" alt="{{ $content?->title }}"></span>
                                </div>
                                <div class="app-cta-store-content">
                                    <p>{{ __('frontend.download_on_the') }}</p>
                                    <span>{{ $content?->btn_text_1 }}</span>
                                </div>
                            </a>
                            <a href="{{ url($default_content?->btn_url_2 ?? '#') }}" class="app-cta-store">
                                <div class="app-cta-store-icon">
                                    <span><img width="28" src="{{ asset($default_content?->btn_icon_2) }}" alt="{{ $content?->title }}"></span>
                                </div>
                                <div class="app-cta-store-content">
                                    <p>{{ __('frontend.download_on_the') }}</p>
                                    <span>{{ $content?->btn_text_2 }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="app-cta-thumb-wrap">
                        <div class="app-cta-thumb p-relative">
                            <div class="tp_fade_anim z-index-1" data-fade-from="left" data-delay=".3">
                                <img class="app-cta-thumb-1" src="{{ asset($default_content?->image_1) }}" alt="{{ $content?->title }}">
                            </div>
                            <div class="tp_fade_anim" data-fade-from="right" data-delay=".1">
                                <img class="app-cta-thumb-2" src="{{ asset($default_content?->image_2) }}" alt="{{ $content?->title }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cta area end -->
