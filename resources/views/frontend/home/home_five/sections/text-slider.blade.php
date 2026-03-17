@php
    $content = $content?->slider_content ? explode(',', $content?->slider_content) : [];
@endphp

@if (count($content) > 0)
<!-- text slider area start -->
<div class="tp-text-slide-area">
    <div class="tp-text-slide-wrapper red-bg-2">
        <div class="swiper-container tp-text-slide-active">
            <div class="swiper-wrapper slide-transtion">
                  @foreach ($content as $item)
                <div class="swiper-slide">
                    <div class="tp-text-slide-item">
                        <span class="tp-text-slide-title">{{ $item }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- text slider area end -->
@endif
