@php
    $gallery = [];

    $thumbnail = $product->image && array_push($gallery, $product->image);
    $images = $product->gallery->pluck('image')->toArray() ?? [];
    $gallery = array_merge($gallery, $images);

    $reviewStats = $product->reviewStats();

    $totalReviews = $reviewStats['total_reviews'] ?? 0;
    $average = $totalReviews > 0 ? $reviewStats['average_rating'] : 0;
@endphp

<div class="row">
    <div class="col-lg-6">
        @include('frontend.products.partials.details.thumbnail', ['gallery' => $gallery, 'alt' => $product->title])
    </div> <!-- col end -->
    <div class="col-lg-6">
        <div class="tp-product-details-wrapper">
            <div class="tp-product-details-category">
                <span>
                    <a href="{{ route('products', ['category' => $product->category->id]) }}">{{ $product->category->title }}</a>
                </span>
            </div>
            <h3 class="tp-product-details-title">{{ $product->title }}</h3>

            <!-- inventory details -->
            <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                <div class="tp-product-details-stock mb-10">
                    @if ($product->qty < 10)
                        <span class="low-stock">
                            {{ __('frontend.low_stock') }}
                        </span>
                    @elseif ($product->qty > 0)
                        <span class="in-stock">{{ __('frontend.in_stock') }}</span>
                    @else
                        <span class="out-of-stock">{{ __('frontend.out_of_stock') }}</span>
                    @endif

                </div>
                <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                    <div class="tp-product-details-rating">

                        @for ($i = 1; $i <= 5; $i++)
                            <span>
                            @if ($average >= $i)

                                <i class="fa-solid fa-star"></i>
                            @elseif ($average >= ($i - 0.5))

                                <i class="fa-solid fa-star-half-stroke"></i>
                            @else

                                <i class="fa-regular fa-star"></i>
                            @endif
                            </span>
                        @endfor
                    </div>
                    <div class="tp-product-details-reviews">
                        <span>({{ $reviewStats['total_reviews'] }} {{ __('frontend.reviews') }})</span>
                    </div>
                </div>
            </div>
            <div class="tp-product-details-sort-desc">
                <p>
                    {{ $product->short_description }}
                </p>
            </div>

            @include('frontend.products.partials.details.product-attributes', ['sku' => $product->sku, 'category' => $product->category, 'tags' => $product->tags])
        </div>
    </div>
</div>
