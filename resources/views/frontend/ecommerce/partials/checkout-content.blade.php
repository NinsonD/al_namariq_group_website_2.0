 @php
    $subtotal = $amounts['subtotal'];
    $tax = $amounts['tax'];
    $taxPercent = $amounts['taxPercent'];
    $total = $amounts['total'] + $tax;
@endphp
<!-- checkout place order -->
<div class="tp-checkout-place white-bg">
    <h3 class="tp-checkout-place-title">{{ __('frontend.your_order') }}</h3>

    <div class="tp-order-info-list">
        <ul>

            <!-- header -->
            <li class="tp-order-info-list-header">
                <h4>{{ __('frontend.product') }}</h4>
                <h4>{{ __('frontend.total') }}</h4>
            </li>

            @foreach ($cart['items'] as $item)
            <!-- item list -->
            <li class="tp-order-info-list-desc">
                <div class="d-flex align-items-center gap-3 ">
                    <div class="position-relative">
                        <img width="60" src="{{ asset($item->product->image) }}" alt="{{ $item->product->title }}">
                        <span class="qty">{{$item->qty}}</span>

                    </div>
                    <p>
                        {{ $item->product->title }}
                    </p>
                </div>
                <span>
                    @php
                        $productPrice = ($item->product->sale_price ?? $item->product->price) * $item->qty;
                    @endphp

                    {{ themeCurrency($productPrice) }}
                </span>
            </li>
            @endforeach

            <!-- subtotal -->
            <li class="tp-order-info-list-subtotal">
                <span>{{ __('frontend.subtotal') }}</span>
                <span>
                    {{ themeCurrency($subtotal) }}
                </span>
            </li>

            @if ($cart['cart']->coupon)
                @if ($amounts['subtotalDiscounted'])
                <li class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                    <span class="tp-cart-checkout-top-title">{{ __('frontend.coupon') }}</span>
                    <span class="tp-cart-checkout-top-price ss-cart-coupon">

                        <button class="text-danger fs-8 ss-remove-coupon-btn" data-page="checkout" type="button"> - {{ __('frontend.remove') }} </button>

                        @if ( $amounts['discountType'] === 'percentage')
                        <span class="ss-percent">({{ $amounts['discountRaw'] . '%' }})</span>
                        @endif

                        <span>
                            {{ themeCurrency($amounts['subtotalDiscounted']) }}
                        </span>

                    </span>
                </li>
                @endif
            @endif

            <!-- tax -->
            <li class="tp-order-info-list-subtotal">
                <span>{{ __('frontend.tax') }} <small>({{ $taxPercent .  '%' }})</small></span>
                <span>
                    {{ themeCurrency($tax) }}
                </span>
            </li>



            @if ($shippingMethods->isNotEmpty())
            <!-- shipping -->
            <li class="tp-order-info-list-shipping">
                <span>{{ __('frontend.shipping') }}</span>
                <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end text-end">

                    @foreach ($shippingMethods as $method)
                        @php
                            $data = validateShippingMethod($method, $amounts['subtotal']);
                        @endphp
                    <span>
                        <input
                            id="shipping-method-{{ $method->id }}"
                            type="radio"
                            name="shipping"
                            class="from-checkout"
                            data-id="{{ $method->id }}"
                            value="{{ $method->id }}"
                            @if (session()->get('shipping_method_id') === $method->id) checked @endif>
                        <label for="shipping-method-{{ $method->id }}">{{ $method->title }}: <span>{{ themeCurrency($method->fee) }}</span></label>
                            @if($data['eligible'] != true)
                            <div class="shipping-warning text-danger small mb-2">
                                {{ $data['message'] }}
                            </div>
                        @endif
                    </span>
                    @endforeach

                </div>
            </li>
            @endif

            @php
                $allPaymentMethods = getAllPaymentMethods();
            @endphp

            <li>
                <div class="tp-payment-method-wrapper">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-2">
                        @foreach ($allPaymentMethods as $method)
                        <div class="col text-center">
                            <label class="tp-payment-method-item" for="payment-method-{{ $method->id }}">


                                <input
                                    id="payment-method-{{ $method->id }}"
                                    type="radio"
                                    name="payment_method"
                                    class="from-checkout d-none"
                                    value="{{ $method->id }}"
                                    @if (session()->get('payment_method') === $method->key) checked @endif
                                    >
                                     <span class="payment-checkbox-icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.53845 10.1535L7.90384 12.0458C7.96736 12.0981 8.04175 12.1356 8.12159 12.1556C8.20142 12.1755 8.2847 12.1774 8.36537 12.1612C8.44682 12.1459 8.52401 12.1132 8.59171 12.0655C8.65941 12.0177 8.71601 11.9559 8.75768 11.8842L12.4615 5.53809" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

                                    </svg>
                                </span>
                                <img src="{{ asset($method->value['image']) }}" alt="{{ $method->key }}">
                            </label>
                            <small class="d-block mt-1">
                                {{ Str::replace('_', ' ', ucfirst($method->key)) }}
                            </small>
                        </div>
                        @endforeach
                    </div>
                </div>
            </li>

            <!-- total -->
            <li class="tp-order-info-list-total">
                <span>{{ __('frontend.total') }}</span>
                <span>
                    {{ themeCurrency($total) }}
                </span>
            </li>
        </ul>
    </div>

    <div class="tp-checkout-btn-wrapper">
        <button type="submit" class="tp-checkout-btn w-100">{{ __('frontend.place_order') }}</button>
    </div>
</div>
