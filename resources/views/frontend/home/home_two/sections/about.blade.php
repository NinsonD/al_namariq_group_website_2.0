<!-- about area start -->
<div class="it-about-area it-about-ptb pt-140 pb-90 p-relative">
    <div class="it-about-shape-wrap">
        <img data-speed="1.1" class="it-about-shape-1 d-none d-xxl-block" src="{{ asset($default_content?->bg_shape_1) }}" alt="{{ $content?->title }}">
        <img data-speed=".9" class="it-about-shape-2" src="{{ asset($default_content?->bg_shape_2) }}" alt="{{ $content?->title }}">
    </div>
    <div class="container container-1230">
        <div class="row">
            <div class="col-xl-4">
                <div class="it-about-title-box z-index-2">
                    <span class="tp-section-subtitle-platform platform-text-black mb-20 tp-split-text tp-split-right">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                    <h4 class="tp-section-title-platform platform-text-black fs-84 mb-30 tp-split-text tp-split-right">
                        {!! clean(pureText($content?->title)) !!}
                    </h4>
                    <div class="tp_text_anim">
                        <p>
                            {!! clean(pureText($content?->description)) !!}
                        </p>
                    </div>

                    @if (!empty($content?->btn_text) && !empty($default_content?->btn_url))
                    <div class="tp_fade_anim" data-fade-from="top" data-ease="bounce">
                        <a class="tp-btn-black-radius btn-blue-bg  d-inline-flex align-items-center justify-content-between mr-15" href="{{ url($default_content?->btn_url ?? '#') }}">
                            <span>
                                <span class="text-1">{{ $content?->btn_text }}</span>
                                <span class="text-2">{{ $content?->btn_text }}</span>
                            </span>
                            <i>
                                <span>
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 11L11 1M11 1H1M11 1V11" stroke="#21212D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 11L11 1M11 1H1M11 1V11" stroke="#21212D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </i>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="it-about-thumb">
                            <div class="p-relative">
                                <div class="it-about-thumb-inner mb-50">
                                    <img class="img-1" data-speed=".9" src="{{ asset($default_content?->image_1) }}" alt="{{ $content?->title }}">
                                </div>
                                <div class="it-about-info-wrap">
                                    <div class="it-about-info-item d-inline-flex align-items-center" data-parallax='{"x": 50, "smoothness": 30}'>
                                        <i><span>{{ $default_content?->counter_number_1 }}</span>{{ $default_content?->counter_unit_1 }}</i>
                                        <p>
                                            {!! clean(pureText($content?->counter_title_1)) !!}
                                        </p>
                                    </div>
                                    <div class="it-about-info-item d-inline-flex align-items-center" data-bg-color="#DACBFF" data-parallax='{"x": -50, "smoothness": 30}'>
                                        <i><span>{{ $default_content?->counter_number_2 }}</span>{{ $default_content?->counter_unit_2 }}</i>
                                        <p>
                                            {!! clean(pureText($content?->counter_title_2)) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <img class="img-2 mb-100" src="{{ asset($default_content?->image_2) }}" alt="{{ $content?->title }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="it-about-thumb">
                            <img class="img-3" data-speed="1.1" src="{{ asset($default_content?->image_3) }}" alt="{{ $content?->title }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about area end -->
