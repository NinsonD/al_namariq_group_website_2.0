@php
    $existingReview = $product->reviews()->where('user_id', auth()->id())->first();
    $isUpdate = !empty($existingReview);
    $action   = $isUpdate
        ? route('user.product-review.update', $existingReview->id)
        : route('user.product-review.store');
    $method   = $isUpdate ? 'PUT' : 'POST';
@endphp

<div class="tp-product-details-review-form">
    <h3 class="tp-product-details-review-form-title">
        {{ $isUpdate ? __('frontend.update_your_review') : __('frontend.review_this_product') }}
    </h3>

    @if ($isUpdate && !$existingReview->status)
        <div class="alert alert-info" role="alert">
            {{ __('frontend.your_review_has_been_submitted') }}
        </div>
    @endif

    <form action="{{ $action }}" method="POST">
        @csrf
        @method($method)

        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <!-- Rating -->
        <div class="tp-product-details-review-form-rating d-flex align-items-center">
            <p>{{ __('frontend.your_rating') }}:</p>
            <div class="tp-product-details-review-form-rating-icon d-flex align-items-center">
                <div class="tp-review-stars">
                    @for ($i = 5; $i >= 1; $i--)
                        <input
                            class="tp-review-input"
                            id="radio-{{ $i }}"
                            name="rating"
                            type="radio"
                            value="{{ $i }}"
                            @checked(($isUpdate && $existingReview->rating == $i) || (!$isUpdate && $i == 4))
                        />
                        <label class="tp-review-star" for="radio-{{ $i }}"></label>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Comment -->
        <div class="tp-product-details-review-input-wrapper">
            <div class="tp-product-details-review-input-box">
                <div class="tp-product-details-review-input-title">
                    <label for="comment">{{ __('frontend.your_review') }}</label>
                </div>
                <div class="tp-product-details-review-input">
                    <textarea id="comment" name="comment" placeholder="{{ __('frontend.write_your_review_here') }}">{{ $isUpdate ? $existingReview->comment : '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Button -->
        <div class="tp-product-details-review-btn-wrapper">
            <button class="tp-product-details-review-btn" type="submit">
                {{ $isUpdate ? __('frontend.update') : __('frontend.submit') }}
            </button>
        </div>
    </form>
</div>
