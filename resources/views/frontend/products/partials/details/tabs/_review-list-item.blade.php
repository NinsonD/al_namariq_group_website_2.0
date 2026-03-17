<div class="tp-product-details-review-avater d-flex align-items-start">
    <div class="tp-product-details-review-avater-thumb">
        <img src="{{ asset($review->user->avatar) }}" alt="{{ $review->user->name }}">
    </div>
    <div class="tp-product-details-review-avater-content">
        <div class="tp-product-details-review-avater-rating d-flex align-items-center">


            @foreach (range(1, 5) as $i)
                <span><i class="fa-{{ $i > $review->rating ? 'regular' : 'solid' }} fa-star"></i></span>
            @endforeach

        </div>
        <h3 class="tp-product-details-review-avater-title">{{ $review->user->name }}</h3>
        <span class="tp-product-details-review-avater-meta">{{ pureDate($review->created_at) }}</span>

        <div class="tp-product-details-review-avater-comment">
            <p>{{ $review->comment }}</p>
        </div>
    </div>
</div>
