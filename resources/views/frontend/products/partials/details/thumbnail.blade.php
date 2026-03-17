@if (count($gallery) > 3)
<!-- add slider -->
<div class="tp-product-details-thumb-wrapper pe-lg-4">
    <div class="tp-product-details-slider swiper">
        <div class="swiper-wrapper">
            @foreach ($gallery as $item)
            <div class="swiper-slide">
                <div class="tp-product-details-slider-item">
                    <img src="{{ asset($item) }}" alt="{{ $alt }}">
                </div>
            </div>
            @endforeach
        </div>
        <button type="button" class="tp-product-details-swiper-button-prev tp-product-details-nav-btn prev">
            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.00073 6.99989L15 6.99989" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M6.64648 1.5L1.00011 6.99954L6.64648 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        </button>
        <button type="button" class="tp-product-details-swiper-button-next tp-product-details-nav-btn next">
            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.9993 6.99989L1 6.99989" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M9.35352 1.5L14.9999 6.99954L9.35352 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
    </div>
    <div class="tp-product-details-nav swiper">
        <div class="swiper-wrapper">
            @foreach ($gallery as $item)
            <div class="swiper-slide">
                <div class="tp-product-details-nav-item nav-links">
                    <img src="{{ asset($item) }}" alt="{{ $alt }}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@else
<div class="tp-product-details-thumb-wrapper tp-tab pe-lg-4">
    <div class="tab-content m-img mb-10" id="productDetailsNavContent2">
        @foreach ($gallery as $item)
            @php
                $active = $loop->first ? 'show active' : '';
            @endphp
            <div class="tab-pane fade {{ $active }}" id="nav-{{ $loop->index + 1 }}" role="tabpanel" aria-labelledby="nav-{{ $loop->index + 1 }}-tab" tabindex="0">
                <div class="tp-product-details-nav-main-thumb">
                    <img src="{{ asset($item) }}" alt="{{ $alt }}">
                </div>
            </div>
        @endforeach
    </div>
    <nav>
        <div class="nav nav-tab flex-md-column " id="productDetailsNavThumb2" role="tablist">

            @foreach ($gallery as $item)
                @php
                    $active = $loop->first ? 'active' : '';
                @endphp
                <button class="nav-links {{ $active }}" id="nav-{{ $loop->index + 1 }}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{ $loop->index + 1 }}" type="button" role="tab" aria-controls="nav-{{ $loop->index + 1 }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    <img src="{{ asset($item) }}" alt="{{ $alt }}">
                </button>
            @endforeach
        </div>
    </nav>
</div>
@endif
