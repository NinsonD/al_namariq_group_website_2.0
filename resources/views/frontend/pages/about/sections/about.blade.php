<!-- about area start -->
<div class="tp-about-area pt-140 pb-140 tp-bounce-trigger" data-bg-color="#F6F6F9">
    <div class="container">
        <div class="tp-about-box p-relative">
            <div class="tp-about-shape-1 tp-bounce d-none d-md-block">
                <img src="{{ asset($default_content?->shape) }}" alt="{{ $content?->title }}">
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <div class="tp-about-title-box">
                        <span class="tp-section-subtitle pre tp_fade_anim">
                            {!! clean(pureText($content?->subtitle)) !!}
                        </span>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="tp-about-wrap">
                        <div class="tp-about-text tp_fade_anim">
                            <p>
                                {!! clean(pureText($content?->title)) !!}
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-xl-5 col-lg-4 col-md-5">
                                <div class="tp-about-thumb">
                                    <img data-speed=".8" src="{{ asset($default_content?->image) }}" alt="{{ $content?->title }}">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-8 col-md-7">
                                <div class="tp-about-funcact-wrap">
                                    <div class="tp-about-avater-info">
                                        <img class="tp_fade_anim" data-delay=".3" data-fade-from="right" src="{{ asset($default_content?->people_image) }}" alt="{{ $content?->title }}">
                                        <div class="tp_text_anim">
                                            <p>
                                                {!! clean(pureText($content?->description)) !!}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="tp-about-funcact-item tp_fade_anim mb-30" data-delay=".3">
                                                <span><i data-purecounter-duration="1" data-purecounter-end="{{ $default_content?->counter_number_1 }}" class="purecounter">0</i>{{ $default_content?->counter_unit_1 }}</span>
                                                <p>
                                                    {!! clean(pureText($content?->counter_title_1)) !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="tp-about-funcact-item tp_fade_anim mb-30" data-delay=".5">
                                                <span><i data-purecounter-duration="1" data-purecounter-end="{{ $default_content?->counter_number_2 }}" class="purecounter">0</i>{{ $default_content?->counter_unit_2 }}</span>
                                                <p>
                                                    {!! clean(pureText($content?->counter_title_2)) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about area end -->
