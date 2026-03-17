<div class="tp-product-details-review-wrapper pt-60">
    <div class="row">
        <div class="col-lg-6">
            <div class="tp-product-details-review-statics">
                @include('frontend.products.partials.details.tabs._review-stats', ['reviewStats' => $reviewStats])

                <!-- reviews -->
                <div class="tp-product-details-review-list pr-110">
                    <h3 class="tp-product-details-review-title">
                        {{ __('frontend.rating_and_review') }}
                    </h3>

                    @include('frontend.products.partials.details.tabs._review-list', ['reviews' => $reviews])
                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-lg-6">
            <div class="tp-product-details-review-form-wrapper pl-70">
                @if ($isPurchased)
                    @include('frontend.products.partials.details.tabs._review-form', ['product' => $product])
                @else
                    <div class="alert alert-info">
                        {{ __('frontend.you_need_to_purchase_before_review') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
