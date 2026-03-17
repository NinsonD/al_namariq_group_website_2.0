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

            <!-- price -->
            <div class="tp-product-details-price-wrapper mb-20">
                @if ($product->sale_price)
                <span class="tp-product-details-price old-price">{{ themeCurrency($product->price) }}</span>
                <span class="tp-product-details-price new-price">{{ themeCurrency($product->sale_price) }}</span>
                @else
                <span class="tp-product-details-price">{{ themeCurrency($product->price) }}</span>
                @endif
            </div>


            <!-- actions -->
            <div class="tp-product-details-action-wrapper">
                <h3 class="tp-product-details-action-title">{{ __('frontend.quantity') }}</h3>
                <div class="tp-product-details-action-item-wrapper d-flex align-items-center gap-3 mb-3">
                    <div class="tp-product-details-quantity">
                        <div class="tp-product-quantity">
                            <span class="tp-cart-minus ss-pro-details-minus">
                                <svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <input class="tp-cart-input ss-pro-details-input" type="text" value="1">
                            <span class="tp-cart-plus ss-pro-details-plus">
                                <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tp-product-details-add-to-cart w-100">
                        <button class="tp-product-details-add-to-cart-btn w-100 ss-pro-details-addToCart" data-id="{{ $product->id }}">{{ __('frontend.add_to_cart') }}</button>
                    </div>
                    <div class="tp-product-details-add-to-wishlist flex-grow-1">
                        <button class="tp-product-details-add-to-wishlist-btn ss-add-to-wishlist-btn {{ $product->isWishlisted() ? 'added' : '' }}" data-id="{{ $product->id }}" type="button">
                            <span class="default-heart">
                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.01003 14.3608L2.21586 8.20671C-1.47662 4.51423 3.95133 -2.57534 9.01003 3.16031C14.0687 -2.57534 19.4721 4.53884 15.8042 8.20671L9.01003 14.3608Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="added-heart">
                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.01003 14.3608L2.21586 8.20671C-1.47662 4.51423 3.95133 -2.57534 9.01003 3.16031C14.0687 -2.57534 19.4721 4.53884 15.8042 8.20671L9.01003 14.3608Z" fill="red" stroke="red" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            @include('frontend.products.partials.details.product-attributes', ['sku' => $product->sku, 'category' => $product->category, 'tags' => $product->tags])
        </div>
    </div>
</div>
