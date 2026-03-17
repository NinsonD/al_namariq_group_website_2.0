 <!-- product about area start -->
<div class="tp-shop-about-area tp-shop-about-ptb pt-100 pb-100">
    <div class="container container-1730">
        <div class="row">
            <div class="col-xl-3">
                <div class="tp-shop-about-thumb">
                    <div class="img-1">
                        <img data-speed="1.1" src="{{ asset($default_content?->image_2) }}" alt="{{ $content?->title }}">
                    </div>
                    <div class="img-2">
                        <img data-speed="1.2" src="{{ asset($default_content?->image_1) }}" alt="{{ $content?->title }}">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="tp-shop-about-middle">
                    <div class="tp-shop-about-circle-text text-center">
                        <img src="{{ asset($default_content?->shape) }}" alt="{{ $content?->title }}">
                    </div>
                    <div class="tp-shop-about-content text-center">
                        <p>
                            {!! clean(pureText($content?->title)) !!}
                        </p>
                        @if (!empty($content?->btn_text) && !empty($default_content?->btn_url))
                        <div class="tp-shop-about-btn tp_fade_anim" data-delay=".3" data-fade-from="top" data-ease="bounce">
                            <a class="tp-checkout-btn border-style" href="{{ url($default_content?->btn_url ?? '#') }}">
                                {!! clean(pureText($content?->btn_text)) !!}
                                <span>
                                    <svg width="21" height="10" viewBox="0 0 21 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.4243 5.42524C20.6586 5.19093 20.6586 4.81103 20.4243 4.57671L16.6059 0.758336C16.3716 0.524021 15.9917 0.524021 15.7574 0.758336C15.523 0.992651 15.523 1.37255 15.7574 1.60686L19.1515 5.00098L15.7574 8.39509C15.523 8.6294 15.523 9.0093 15.7574 9.24362C15.9917 9.47793 16.3716 9.47793 16.6059 9.24362L20.4243 5.42524ZM0 5.00098V5.60098H20V5.00098V4.40098H0V5.00098Z" fill="currentcolor" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="tp-shop-about-thumb">
                        <div class="img-3">
                            <img data-speed=".9" src="{{ asset($default_content?->image_3) }}" alt="{{ $content?->title }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="tp-shop-about-thumb text-end">
                    <div class="img-4 z-index-1">
                        <img data-speed="1.1" src="{{ asset($default_content?->image_4) }}" alt="{{ $content?->title }}">
                    </div>
                    <div class="img-5">
                        <img data-speed="1.2" src="{{ asset($default_content?->image_5) }}" alt="{{ $content?->title }}">
                    </div>
                    <div class="img-6">
                        <img data-speed="1.1" src="{{ asset($default_content?->image_6) }}" alt="{{ $content?->title }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product about area end -->
