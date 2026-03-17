@php
    $content_1 = $content?->slider_content_1 ? explode(',', $content?->slider_content_1) : [];
    $content_2 = $content?->slider_content_2 ? explode(',', $content?->slider_content_2) : [];
@endphp

<!-- barnd area start -->
<div class="tp-brand-area pt-160 pb-200">
    @if (count($content_1) > 0)
    <div class="tp-brand-wrapper green-regular-bg z-index-1">
        <div class="swiper-container tp-brand-active fix">
            <div class="swiper-wrapper slide-transtion">
                @foreach ($content_1 as $item)
                <div class="swiper-slide">
                    <div class="tp-brand-item">
                        <span class="tp-brand-title">{{ $item }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if (count($content_2) > 0)
    <div class="tp-brand-wrapper tp-brand-style-2" data-bg-color="#fff">
        <div class="swiper-container tp-brand-active fix" dir="rtl">
            <div class="swiper-wrapper slide-transtion">
                @foreach ($content_2 as $item)
                <div class="swiper-slide">
                    <div class="tp-brand-item text-color">
                        <span class="tp-brand-title">
                            {{ $item }}
                        </span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    @endif
</div>
<!-- barnd area end -->
