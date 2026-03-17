<!-- hero area start -->
<div class="app-hero-area app-hero-ptb p-relative include-bg z-index-1" data-background="{{ asset($default_content?->bg_image) }}">
    <div class="container container-1430">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="app-hero-wrap z-index-2 pb-65 pl-55">
                    <div class="app-hero-heading mb-40">
                        <span class="tp-section-subtitle border-bg tp_fade_anim" data-delay=".3">
                            {!! clean(pureText($content?->subtitle)) !!}
                        </span>
                        <h4 class="tp-section-title-phudu tp_fade_anim" data-delay=".5">
                            {!! clean(pureText($content?->title)) !!}
                        </h4>
                    </div>
                    <div class="app-hero-btn-box d-flex align-item-center">
                        <div class="app-hero-btn mr-35 tp_fade_anim" data-delay=".7" data-fade-from="top" data-ease="bounce">
                            <div class="animated-border-box border-icon">
                                <a class="tp-btn-gradient p-relative" href="{{ url($default_content?->btn_url ?? '#') }}">
                                    <span>
                                        <img width="16" src="{{ asset($default_content?->btn_icon) }}" alt="{{ $content?->btn_text }}">
                                    </span>
                                    {!! clean(pureText($content?->btn_text)) !!}
                                </a>
                            </div>
                        </div>
                        <div class="app-hero-btn-text tp_text_anim">
                            <p>
                                {!! clean(pureText($content?->description)) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="app-hero-round-shape">
                    <img src="{{ asset($default_content?->main_image_bg) }}" alt="{{ $content?->title }}">
                </div>
            </div>
        </div>
        <div class="app-hero-bottom-thumb-main z-index-1 tp_fade_anim" data-delay=".5">
            <img src="{{ asset($default_content?->main_image) }}" alt="{{ $content?->title }}">
            <img class="shape-1" src="{{ asset($default_content?->shape_3) }}" alt="{{ $content?->title }}">
            <img class="shape-2" data-speed="1.1" src="{{ asset($default_content?->shape_5) }}" alt="{{ $content?->title }}">
            <img class="shape-3" data-speed="1.1" src="{{ asset($default_content?->shape_1) }}" alt="{{ $content?->title }}">
            <img class="shape-4" src="{{ asset($default_content?->shape_4) }}" alt="{{ $content?->title }}">
            <img class="shape-5" data-speed=".8" src="{{ asset($default_content?->shape_2) }}" alt="{{ $content?->title }}">
        </div>
        <div class="app-hero-bottom-wrapper include-bg p-relative" data-background="{{ asset($default_content?->bg_image_2) }}">
            <div class="row">
                <div class="col-lg-6">
                    <div class="app-hero-bottom-wrap pt-100 pb-65 pl-60">
                        <div class="app-hero-bottom-icon mb-20">
                            <img src="{{ asset($default_content?->app_image) }}" alt="{{ $content?->title }}">
                        </div>
                        <div class="app-hero-bottom-content">
                            <span class="app-hero-bottom-subtitle">
                                {{ $content?->app_title }}
                            </span>
                            <div class="app-hero-bottom-rating z-index-1">
                                <div class="app-hero-bottom-rating-point">
                                    <span>
                                        {{ $default_content?->rating}}
                                    </span>
                                </div>
                                <div class="app-hero-bottom-rating-star">
                                    <div class="app-hero-bottom-rating-stars">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                                <path d="M7.36067 0.5L9.63512 5.10778L14.7213 5.85121L11.041 9.43586L11.9096 14.5L7.36067 12.1078L2.81178 14.5L3.68034 9.43586L0 5.85121L5.08623 5.10778L7.36067 0.5Z" fill="#FFD04F" />
                                            </svg></span>
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                                <path d="M7.36067 0.5L9.63512 5.10778L14.7213 5.85121L11.041 9.43586L11.9096 14.5L7.36067 12.1078L2.81178 14.5L3.68034 9.43586L0 5.85121L5.08623 5.10778L7.36067 0.5Z" fill="#FFD04F" />
                                            </svg></span>
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                                <path d="M7.36067 0.5L9.63512 5.10778L14.7213 5.85121L11.041 9.43586L11.9096 14.5L7.36067 12.1078L2.81178 14.5L3.68034 9.43586L0 5.85121L5.08623 5.10778L7.36067 0.5Z" fill="#FFD04F" />
                                            </svg></span>
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                                <path d="M7.36067 0.5L9.63512 5.10778L14.7213 5.85121L11.041 9.43586L11.9096 14.5L7.36067 12.1078L2.81178 14.5L3.68034 9.43586L0 5.85121L5.08623 5.10778L7.36067 0.5Z" fill="#FFD04F" />
                                            </svg></span>
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                                <path d="M7.36067 0.5L9.63512 5.10778L14.7213 5.85121L11.041 9.43586L11.9096 14.5L7.36067 12.1078L2.81178 14.5L3.68034 9.43586L0 5.85121L5.08623 5.10778L7.36067 0.5Z" fill="#FFD04F" />
                                            </svg></span>
                                    </div>
                                    <a href="{{ url($default_content?->btn_url_2 ?? '#') }}">{{ $content?->btn_text_2 }} <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                            <path d="M1 1L9 9M9 9V1M9 9H1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero area end -->
