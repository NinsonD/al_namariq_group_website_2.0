
<div class="container">
    @if ($cart && $cart['items']->isNotEmpty())

    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="tp-cart-list mb-25 mr-30 position-relative">
                <div class="ss-cart-loading d-flex justify-content-center align-items-center">
                    <div class="">
                        <i class="fa fa-spinner fa-spin"></i>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2" class="tp-cart-header-product" width="44%">
                                {{ __('frontend.product') }}
                            </th>
                            <th class="tp-cart-header-price">{{ __('frontend.price') }}</th>
                            <th class="tp-cart-header-quantity" width="20%">{{ __('frontend.quantity') }}</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody id="cart-items">
                        @foreach ($cart['items'] as $item)
                        <tr>
                            <!-- img -->
                            <td class="tp-cart-img" colspan="2">
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('products.show', ['slug' => $item->product->slug]) }}">
                                        <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->title }}">
                                    </a>
                                    <div class="tp-cart-title">
                                        <a href="{{ route('products.show', ['slug' => $item->product->slug]) }}">{{ $item->product->title }}</a>
                                    </div>
                                </div>
                            </td>
                            <!-- price -->
                            <td class="tp-cart-price">
                                <span>
                                    @if ($item->product->sale_price)
                                        <span class="old-price">{{ themeCurrency($item->product->price) }}</span>
                                        <span class="new-price">{{ themeCurrency($item->product->sale_price) }}</span>
                                    @else
                                        <span class="new-price">{{ themeCurrency($item->product->price) }}</span>

                                    @endif
                                </span>
                            </td>
                            <!-- quantity -->
                            <td class="tp-cart-quantity tp-product-details-quantity">
                                <div class="tp-product-quantity mt-10 mb-10">
                                    <span class="tp-cart-minus ss-cart-minus">
                                        <svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <input class="tp-cart-input ss-cart-input" type="text" value="{{ $item->qty }}" data-qty="{{ $item->product->qty }}" data-id="{{ $item->product->id }}">
                                    <span class="tp-cart-plus ss-cart-plus" data-id={{ $item->product->id }} data-qty="{{ $item->product->qty }}">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                                <span class="tp-cart-max-qty"></span>
                            </td>
                            <!-- action -->
                            <td class="tp-cart-action">
                                <button class="tp-cart-action-btn ss-cart-item-remove-btn" data-id="{{ $item->product->id }}">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor" />
                                    </svg>
                                    <span>
                                        {{ __('frontend.remove') }}
                                    </span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tp-cart-bottom">
                <div class="row align-items-end">
                    <div class="col-xl-6 col-md-8">
                        <div class="tp-cart-coupon">
                            <form action="#">
                                <div class="tp-cart-coupon-input-box">
                                    <label>{{ __('frontend.coupon_code') }}:</label>
                                    <div class="tp-cart-coupon-input d-flex align-items-center">
                                        <input type="text" placeholder="{{ __('frontend.enter_coupon_code') }}" id="coupon-code-input">
                                        <button type="submit" id="apply-coupon-btn">{{ __('frontend.apply') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="tp-cart-checkout-wrapper">
                <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                    <span class="tp-cart-checkout-top-title">{{ __('frontend.subtotal') }}</span>
                    <span class="tp-cart-checkout-top-price ss-cart-checkout-subtotal">
                        {{ themeCurrency($amounts['subtotal']) }}
                    </span>
                </div>

                @if ($amounts['subtotalDiscounted'])
                <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                    <span class="tp-cart-checkout-top-title">{{ __('frontend.coupon') }}</span>
                    <span class="tp-cart-checkout-top-price ss-cart-coupon">

                        <button class="text-danger fs-8 ss-remove-coupon-btn" type="button"> - {{ __('frontend.remove') }} </button>

                        @if ( $amounts['discountType'] === 'percentage')
                        <span class="ss-percent">({{ $amounts['discountRaw'] . '%' }})</span>
                        @endif

                        <span>
                            {{ themeCurrency($amounts['subtotalDiscounted']) }}
                        </span>


                    </span>
                </div>
                @endif

                @if ($shippingMethods->isNotEmpty())
                    <div class="tp-cart-checkout-shipping">
                        <h4 class="tp-cart-checkout-shipping-title">{{ __('frontend.shipping') }}</h4>
                        <div class="tp-cart-checkout-shipping-option-wrapper">

                            @foreach ($shippingMethods as $method)
                                @php
                                    $data = validateShippingMethod($method, $amounts['subtotal']);
                                @endphp

                                <div class="tp-cart-checkout-shipping-option">
                                    <input
                                    id="shipping-method-{{ $method->id }}"
                                    type="radio"
                                    name="shipping"
                                    data-id="{{ $method->id }}"
                                    @if (session()->get('shipping_method_id') === $method->id) checked @endif>

                                    <label for="shipping-method-{{ $method->id }}">
                                        {{ $method->title }}: <span>{{ themeCurrency($method->fee) }}</span>
                                    </label>

                                    @if($data['eligible'] != true)
                                        <div class="shipping-warning text-danger small mt-1">
                                            {{ $data['message'] }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif


                <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                    <span>{{ __('frontend.total') }}</span>
                    <span>
                        {{ themeCurrency($amounts['total']) }}
                    </span>
                </div>
                <div class="tp-cart-checkout-proceed">
                    <a href="{{ route('user.checkout.index') }}" class="tp-cart-checkout-btn w-100">{{ __('frontend.proceed_to_checkout') }}</a>
                </div>
            </div>
        </div>
    </div>

    @else
    <div class="row">
        <div class="col-12 text-center">
            <img src="{{ asset($settings->cart_empty_image) }}" alt="{{ $settings->app_name }}">
            <h4 class="mb-10">{{ __('frontend.your_cart_is_empty') }}</h4>
            <a class="ss-shop-btn" href="{{ route('products') }}">{{ __('frontend.shop_now') }}</a>
        </div>
    </div>
    @endif
</div>
