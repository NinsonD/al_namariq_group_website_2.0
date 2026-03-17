@if ($products->count())
<div class="col-xl-9 col-lg-8">
    <div class="tp-cart-list mb-25 position-relative">
        <div class="ss-cart-loading d-flex justify-content-center align-items-center"></div>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2" class="tp-cart-header-product">{{ __('frontend.product') }}</th>
                    <th width="30%" class="tp-cart-header-price">{{ __('frontend.price') }}</th>
                    <th width="25%" class="tp-cart-header-quantity">{{ __('frontend.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <!-- img -->
                    <td class="tp-cart-img" colspan="2">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('products.show', ['slug' => $product->slug]) }}">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                            </a>
                            <div class="tp-cart-title">
                                <a href="{{ route('products.show', ['slug' => $product->slug]) }}">{{ $product->title }}</a>
                            </div>
                        </div>
                    </td>
                    <!-- price -->
                    <td class="tp-cart-price">
                        <span>
                            @if ($product->sale_price)
                                <span class="old-price">{{ themeCurrency($product->price) }}</span>
                                <span class="new-price">{{ themeCurrency($product->sale_price) }}</span>
                            @else
                                <span class="new-price">{{ themeCurrency($product->price) }}</span>

                            @endif
                        </span>
                    </td>
                    <!-- action -->
                    <td class="tp-cart-action">
                        <button class="ss-shop-btn ss-add-to-cart-btn mr-15" data-id="{{ $product->id }}">{{ __('frontend.add_to_cart') }} </button>
                        <button class="tp-cart-action-btn ss-wishlist-item-remove-btn" data-id="{{ $product->id }}">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor" />
                            </svg>
                            <span>{{ __('frontend.remove') }}</span>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
    <div class="tp-cart-bottom">
        <div class="row">
            <div class="col-xl-12">
                <div class="profile__btn">
                    <a href="{{ route('cart.show') }}" class="tp-btn-cart sm">{{ __('frontend.go_to_cart') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    <div class="col-xl-9 col-lg-8">
        <div class="tp-cart-list mb-25" id="wishlist-data">
            <div class="text-center">
                <img src="{{ asset($settings->cart_empty_image) }}" alt="{{ $settings->app_name }}">
                <h4 class="mb-10">{{ __('frontend.your_wishlist_is_empty') }}</h4>
                <a class="ss-shop-btn" href="{{ route('products') }}">{{ __('frontend.shop_now') }}</a>
            </div>
        </div>
    </div>
@endif
