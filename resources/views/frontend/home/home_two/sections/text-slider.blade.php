@php
    $content_1 = $content?->slider_content_1 ? explode(',', $content?->slider_content_1) : [];
    $content_2 = $content?->slider_content_2 ? explode(',', $content?->slider_content_2) : [];
@endphp

@if (count($content_1) > 0 || count($content_2) > 0)


<!-- barnd area start -->
<div class="tp-brand-area it-brand-style pt-200">
    @if (count($content_1) > 0)
    <div class="tp-brand-wrapper z-index-1" data-bg-color="#FFC4C0">
        <div class="swiper-container tp-brand-active fix">
            <div class="swiper-wrapper slide-transtion">

                @foreach ($content_1 as $item)
                <div class="swiper-slide">
                    <div class="tp-brand-item">
                        <span class="tp-brand-title">{{ $item }}</span>
                        <span>
                            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.2821 0.446777C12.1387 6.37038 16.423 11.4762 22.2815 12.3636C16.3579 12.2203 11.2521 16.5045 10.3647 22.3631C10.5081 16.4394 6.22374 11.3336 0.365234 10.4462C6.28883 10.5896 11.3947 6.30528 12.2821 0.446777Z" fill="#21212D" />
                            </svg>
                        </span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
     @endif

    @if (count($content_2) > 0)
    <div class="tp-brand-wrapper tp-brand-style-2" data-bg-color="#DACBFF">
        <div class="swiper-container tp-brand-active fix" dir="rtl">
            <div class="swiper-wrapper slide-transtion">
                @foreach ($content_2 as $item)
                <div class="swiper-slide">
                    <div class="tp-brand-item">
                        <span class="tp-brand-title">
                            {{ $item }}
                        </span>
                        <span>
                            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.2821 0.446777C12.1387 6.37038 16.423 11.4762 22.2815 12.3636C16.3579 12.2203 11.2521 16.5045 10.3647 22.3631C10.5081 16.4394 6.22374 11.3336 0.365234 10.4462C6.28883 10.5896 11.3947 6.30528 12.2821 0.446777Z" fill="#21212D" />
                            </svg>
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
@endif
