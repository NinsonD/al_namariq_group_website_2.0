<!-- hero area start -->
<div class="tp-hero-2-wrapper">
    <div class="tp-hero-2-area include-bg pt-180 pb-160" data-background="{{ asset($default_content?->bg_image) }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-hero-2-content text-center mb-25">
                        <span class="tp-hero-2-subtitle tp_fade_anim" data-delay=".3">{!! clean(pureText($content?->subtitle)) !!}</span>
                        <h1 class="tp-hero-2-title tp_fade_anim" data-delay=".5">{!! clean(pureText($content?->title)) !!}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="tp-hero-2-avater-box d-flex align-items-center justify-content-center justify-content-md-start tp_fade_anim" data-delay=".7" data-on-scroll="3">
                        <div class="tp-hero-2-avater">
                            <img src="{{ asset($default_content?->people_image) }}" alt="{{ $content?->people_title }}">
                        </div>
                        <div class="tp-hero-2-avater-content">
                            <h4>{!! clean(pureText($content?->people_number)) !!}</h4>
                            <span>{!! clean(pureText($content?->people_title)) !!}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tp-hero-2-btn-box tp-light-bg-btn text-center text-md-end tp_fade_anim" data-delay=".7" data-on-scroll="3">
                        <a class="tp-btn-border" href="{{ url($default_content?->btn_url ?? '#') }}">
                            {{ $content?->btn_text }}
                            <span>
                                <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 9.99999H15.2222M8.11121 1.11108L17.0001 9.99997L8.11121 18.8889" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tp-hero-2-img-wrap d-none d-md-block">
        <div class="container container-1230">
            <div class="tp-hero-2-img-box mb-150">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-heo-2-img tp-hero-2-img-1">
                            <img src="{{ asset($default_content?->image_1) }}" alt="{{ $content?->title }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tp-heo-2-img tp-hero-2-img-2 text-end">
                            <img src="{{ asset($default_content?->image_2) }}" alt="{{ $content?->title }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tp-heo-2-img tp-hero-2-img-3 text-end">
                            <img src="{{ asset($default_content?->image_3) }}" alt="{{ $content?->title }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tp-hero-2-img-box mb-150">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-heo-2-img tp-hero-2-img-1">
                            <img src="{{ asset($default_content?->image_4) }}" alt="{{ $content?->title }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tp-heo-2-img tp-hero-2-img-2 text-end">
                            <img src="{{ asset($default_content?->image_5) }}" alt="{{ $content?->title }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tp-heo-2-img tp-hero-2-img-3 text-end">
                            <img src="{{ asset($default_content?->image_6) }}" alt="{{ $content?->title }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tp-hero-2-img-box last-item">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-heo-2-img tp-hero-2-img-1">
                            <img src="{{ asset($default_content?->image_7) }}" alt="{{ $content?->title }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tp-heo-2-img tp-hero-2-img-2 text-end">
                            <img src="{{ asset($default_content?->image_8) }}" alt="{{ $content?->title }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero area end -->
