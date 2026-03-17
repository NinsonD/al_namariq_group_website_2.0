<!-- newsletter area start -->
<div class="tp-shop-newsletter-area tp-shop-newsletter-ptb pt-120 pb-85">
    <div class="container-fluid">
        <div class="row align-items-end">
            <div class="col-xl-3">
                <div class="tp-shop-newsletter-thumb text-xl-start text-end">
                    <img data-speed="1.5" class="mb-70 img-left" src="{{ asset($default_content?->image_2) }}" alt="{{ $content?->title }}">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="tp-shop-newsletter-middle">
                    <div class="tp-shop-newsletter-thumb">
                        <img data-speed="1.3" src="{{ asset($default_content?->image_1) }}" alt="{{ $content?->title }}">
                    </div>
                    <div class="tp-shop-newsletter-content z-index-1 text-center">
                        <h4 class="tp-shop-section-title fs-100 mb-20">{!! clean(pureText($content?->title)) !!}</h4>
                        <span>{!! clean(pureText($content?->subtitle)) !!}</span>
                        <p>
                            {!! clean(pureText($content?->description)) !!}
                        </p>
                        <div class="tp-shop-newsletter-btn">
                            <button type="button" class="tp-checkout-btn btn-plr text-uppercase ss-newsletter-popup-btn">{{ $content?->btn_text }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="tp-shop-newsletter-thumb text-xl-start text-end">
                    <img data-speed="1.1" class="img-1" src="{{ asset($default_content?->image_3) }}" alt="{{ $content?->title }}">
                    <img data-speed="1.2" class="img-2" src="{{ asset($default_content?->image_4) }}" alt="{{ $content?->title }}">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- newsletter area end -->
