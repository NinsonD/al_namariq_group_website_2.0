<!-- number -->
<div class="tp-product-details-review-number d-inline-block mb-50">
    <h3 class="tp-product-details-review-number-title">
        {{ __('frontend.customer_reviews') }}
    </h3>
    <div class="tp-product-details-review-summery d-flex align-items-center">
        <div class="tp-product-details-review-summery-value">
            <span>
                {{ $reviewStats['average_rating'] ?? '0.0' }}
            </span>
        </div>
        <div class="tp-product-details-review-summery-rating d-flex align-items-center">
            @for ($i = 1; $i <= 5; $i++)
                <span>
                @if ($reviewStats['average_rating'] >= $i)
                    {{-- Full star --}}
                    <i class="fa-solid fa-star"></i>
                @elseif ($reviewStats['average_rating'] >= ($i - 0.5))
                    {{-- Half star --}}
                    <i class="fa-solid fa-star-half-stroke"></i>
                @else
                    {{-- Empty star --}}
                    <i class="fa-regular fa-star"></i>
                @endif
                </span>
            @endfor
            <p>({{ $reviewStats['total_reviews'] ?? 0 }} {{ __('frontend.reviews') }})</p>


        </div>
    </div>
    <div class="tp-product-details-review-rating-list">
        <div class="tp-product-details-review-rating-list">
            @foreach ($reviewStats['ratings'] as $stars => $data)

                <div class="tp-product-details-review-rating-item d-flex align-items-center">
                    <span>{{ $stars }} {{ __('frontend.star') }}</span>
                    <div class="tp-product-details-review-rating-bar">
                        <span class="tp-product-details-review-rating-bar-inner" data-width="{{ $data['percent'] }}%" style="width: {{ $data['percent'] }}%"></span>
                    </div>
                    <div class="tp-product-details-review-rating-percent">
                        <span>{{ $data['percent'] }}%</span>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
