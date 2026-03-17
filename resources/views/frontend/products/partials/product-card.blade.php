
@php
    $reviewStats = $product->reviewStats();
    $average = $reviewStats['total_reviews'] > 0 ? $reviewStats['average_rating'] : 0;

@endphp
<div class="tp-product-item mb-30">
    <div class="tp-product-item-thumb">

       <div class="tp-product-item-badge-wrapper z-index-1">
           @if ($product->isOnSale())
               <span class="tp-product-item-badge on-sale">
                     {{ __('frontend.sale') }}
               </span>
           @endif
           @if ($product->isNew())
               <span class="tp-product-item-badge new">{{ __('frontend.new') }}</span>
           @endif
       </div>

       <a href="{{ route('products.show', $product->slug) }}">
           <img class="w-100" src="{{ asset($product->image) }}" alt="{{ $product->title }}">
        </a>
        <div class="tp-product-quick-view-wrapper d-flex flex-column justify-content-center align-items-center gap-2">
            <!-- product quick view -->
            <button class="tp-quick-view-btn ss-quick-view-btn" data-id="{{ $product->id }}"  data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99948 5.06828C7.80247 5.06828 6.82956 6.04044 6.82956 7.23542C6.82956 8.42951 7.80247 9.40077 8.99948 9.40077C10.1965 9.40077 11.1703 8.42951 11.1703 7.23542C11.1703 6.04044 10.1965 5.06828 8.99948 5.06828ZM8.99942 10.7482C7.0581 10.7482 5.47949 9.17221 5.47949 7.23508C5.47949 5.29705 7.0581 3.72021 8.99942 3.72021C10.9407 3.72021 12.5202 5.29705 12.5202 7.23508C12.5202 9.17221 10.9407 10.7482 8.99942 10.7482Z" fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.41273 7.2346C3.08674 10.9265 5.90646 13.1215 8.99978 13.1224C12.0931 13.1215 14.9128 10.9265 16.5868 7.2346C14.9128 3.54363 12.0931 1.34863 8.99978 1.34773C5.90736 1.34863 3.08674 3.54363 1.41273 7.2346ZM9.00164 14.4703H8.99804H8.99714C5.27471 14.4676 1.93209 11.8629 0.0546754 7.50073C-0.0182251 7.33091 -0.0182251 7.13864 0.0546754 6.96883C1.93209 2.60759 5.27561 0.00288103 8.99714 0.000185582C8.99894 -0.000712902 8.99894 -0.000712902 8.99984 0.000185582C9.00164 -0.000712902 9.00164 -0.000712902 9.00254 0.000185582C12.725 0.00288103 16.0676 2.60759 17.945 6.96883C18.0188 7.13864 18.0188 7.33091 17.945 7.50073C16.0685 11.8629 12.725 14.4676 9.00254 14.4703H9.00164Z" fill="currentColor"></path>
                </svg>
            </button>

            <!-- product wishlist -->
            <button class="tp-quick-view-btn ss-add-to-wishlist-btn {{ $product->is_wishlisted ? 'added' : '' }}" data-id="{{ $product->id }}" type="button">
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
        <div class="tp-product-item-btn">
            <button class="tp-action-btn ss-add-to-cart-btn" data-id="{{ $product->id }}" type="button">
                {{ __('frontend.add_to_cart') }}
            </button>
        </div>
    </div>
    <div class="tp-product-item-content">
        <h4 class="tp-product-item-title">
            <a class="tp-line-black" href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a>
        </h4>
        <div class="tp-product-item-ratings">
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
        <span class="tp-product-item-price">
            @if ($product->isOnSale())
                <span class="tp-product-item-price-new">
                    {{ themeCurrency($product->sale_price) }}
                </span>
                <span class="tp-product-item-price-old">
                    {{ themeCurrency($product->price) }}
                </span>
            @else
                <span class="tp-product-item-price-new">
                    {{ themeCurrency($product->price) }}
                </span>
            @endif
        </span>
    </div>
</div>
