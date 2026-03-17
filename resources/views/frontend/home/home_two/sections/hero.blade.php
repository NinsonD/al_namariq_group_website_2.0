<!-- hero area start -->
<div class="it-hero-area p-relative fix z-index-1">
    <div class="it-hero-shape-wrap">
        <span class="it-hero-shape-1">
            <svg width="1920" height="130" viewBox="0 0 1920 130" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M317.674 0.916147L-15.8393 82.1342C-21.2159 83.4435 -25 88.2597 -25 93.7935V117.029C-25 123.656 -19.6275 129.029 -13 129.029H1963C1969.63 129.029 1975 123.656 1975 117.029V43.9925C1975 36.2794 1967.83 30.5693 1960.31 32.2977L1682.73 96.1228C1676.4 97.5795 1670.06 93.7274 1668.43 87.4346L1648.28 9.56974C1646.63 3.21847 1640.19 -0.635465 1633.82 0.917341L1245.76 95.4533C1239.43 96.9954 1233.02 93.2046 1231.33 86.9132L1210.33 8.88425C1208.64 2.60589 1202.26 -1.18461 1195.93 0.335915L804.696 94.4413C798.331 95.9723 791.914 92.1194 790.273 85.7819L770.671 10.0717C769.027 3.72499 762.595 -0.128182 756.224 1.418L366.694 95.9521C360.323 97.4984 353.89 93.6446 352.247 87.2973L332.13 9.5688C330.487 3.2179 324.048 -0.636036 317.674 0.916147Z" fill="#0C5752" />
            </svg>
        </span>
        <img class="it-hero-shape-2" src="{{ asset($default_content?->bg_shape) }}" alt="{{ $content?->title }}">
    </div>
    <div class="container container-1630">
        <div class="row align-items-end">
            <div class="col-xl-6">
                <div class="it-hero-content it-hero-ptb">
                    <span class="it-hero-subtitle tp_fade_anim" data-delay=".3">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                    <h4 class="it-hero-title tp_fade_anim hero-title-shape" data-shape-1="{{ $default_content?->title_shape_1 }}" data-shape-2="{{ $default_content?->title_shape_2 }}" data-delay=".5">
                        {!! clean(pureText($content?->title)) !!}
                    </h4>
                    <div class="tp_fade_anim" data-delay=".7">
                        <p>{!! clean(pureText($content?->description)) !!}</p>
                    </div>
                    <div class="it-hero-btn-box d-flex align-items-center flex-wrap">

                        @if (!empty($content?->btn_text) && !empty($default_content?->btn_url))

                        <div class="tp_fade_anim" data-delay=".5" data-fade-from="top" data-ease="bounce">
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

                        @if (!empty($content?->btn_text_2) && !empty($default_content?->btn_url_2))
                        <div class="tp_fade_anim" data-delay=".7" data-fade-from="top" data-ease="bounce">
                            <a class="tp-btn-black-radius btn-blue-bg btn-border d-inline-flex align-items-center justify-content-between" href="{{ url($default_content?->btn_url_2 ?? '#') }}">
                                <span>
                                    <span class="text-1">{{ $content?->btn_text_2 }}</span>
                                    <span class="text-2">{{ $content?->btn_text_2 }}</span>
                                </span>
                                <i>
                                    <span>
                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 2.5C16 1.675 15.325 1 14.5 1H2.5C1.675 1 1 1.675 1 2.5M16 2.5V11.5C16 12.325 15.325 13 14.5 13H2.5C1.675 13 1 12.325 1 11.5V2.5M16 2.5L8.5 7.75L1 2.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 2.5C16 1.675 15.325 1 14.5 1H2.5C1.675 1 1 1.675 1 2.5M16 2.5V11.5C16 12.325 15.325 13 14.5 13H2.5C1.675 13 1 12.325 1 11.5V2.5M16 2.5L8.5 7.75L1 2.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </i>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="it-hero-thumb p-relative mb-35">
                    <div class="tp_fade_anim" data-delay=".5" data-fade-from="right">
                        <img data-speed=".9" src="{{ asset($default_content?->main_image) }}" alt="{{ $content?->title }}">
                    </div>
                    <img data-speed="1.1" class="inner-img tp_fade_anim" data-delay=".7" data-fade-from="top" src="{{ asset($default_content?->thumb_shape) }}" alt="{{ $content?->title }}">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero area end -->
