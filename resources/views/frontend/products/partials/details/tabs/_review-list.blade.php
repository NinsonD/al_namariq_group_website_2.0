<div id="reviews-container">
    <div class="review-loading">
        <div class="d-flex justify-content-center align-items-center w-100 h-100">
            <div class="spinner-border text-primary" role="status">
            </div>
        </div>
    </div>
    <div class="reviews-pagination dashboard-pagination">
        @if ($reviews->count() > 0)
            @foreach ($reviews as $review)
                @include('frontend.products.partials.details.tabs._review-list-item', ['review' => $review])
            @endforeach

            <div class="mt-4">
                {{ $reviews->links('components.frontend-pagination') }}
            </div>
        @else
            <p>
                {{ __('frontend.no_reviews_yet') }}
            </p>
        @endif
    </div>
</div>
