@php
    $content = $content?->slider_content ? explode(',', $content?->slider_content) : [];
@endphp

@if (count($content) > 0)
<!-- tp-text-area start -->
<div class="shop-text-slider-area shop-text-slider-style">
    <div class="shop-text-slider-wrap">
        <div class="swiper-container shop-text-slider-active">
            <div class="swiper-wrapper slide-transtion">
                @foreach ($content as $item)
                    <div class="swiper-slide">
                        <div class="shop-text-slider-item">
                            <span>{{ $item }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- tp-text-area end -->
@endif
