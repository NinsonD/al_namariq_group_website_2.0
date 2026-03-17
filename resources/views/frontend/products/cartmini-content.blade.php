@php

$cart['items'] = auth()->check() && auth()->user()->type != 'admin' ? \Modules\Shop\Models\CartItem::getCartForUser() : collect([]);
$subtotal = $cart['items']->sum(fn($item) => ($item->product->sale_price ?? $item->product->price) * $item->qty);
$total = $subtotal;

@endphp


<div class="cartmini__wrapper d-flex justify-content-between flex-column">
    <div class="cartmini__top-wrapper">
        <div class="cartmini__top p-relative">
            <div class="cartmini__top-title">
                <h4>
                    {{ __('frontend.shopping_cart') }}
                </h4>
            </div>
            <div class="cartmini__close">
                <button type="button" class="cartmini__close-btn cartmini-close-btn"><i class="fal fa-times"></i></button>
            </div>
        </div>

        @if ($cart['items']->isEmpty())

        <div class="row">
            <div class="col-12">
                <div class="cartmini__empty text-center">
                    <img src="{{ asset($settings->cartmini_empty_image) }}" alt="{{ $settings->app_name }}">
                    <p>
                        {{ __('frontend.your_cart_is_empty') }}
                    </p>
                    <a href="{{ route('products') }}" class="ss-shop-btn">
                        {{ __('frontend.go_to_shop') }}
                    </a>
                </div>
            </div>
        </div>

        @else

        <div class="cartmini__widget">
            @foreach ($cart['items'] as $item)
            <div class="cartmini__widget-item">
                <div class="cartmini__thumb p-relative">
                    <a href="{{ route('products.show', ['slug' => $item->product->slug]) }}">
                        <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->title }}">
                    </a>
                    <span class="cartmini__quantity">{{ $item->qty }}</span>
                </div>
                <div class="cartmini__content">
                    <h5 class="cartmini__title">
                        <a href="{{ route('products.show', ['slug' => $item->product->slug]) }}">{{ $item->product->title }}</a>
                    </h5>
                    <div class="cartmini__price-wrapper">
                        <span class="cartmini__price">
                            @if ($item->product->sale_price)
                                <span class="old-price">{{ themeCurrency($item->product->price) }}</span>
                                <span class="new-price">{{ themeCurrency($item->product->sale_price) }}</span>
                            @else
                                <span class="new-price">{{ themeCurrency($item->product->price) }}</span>
                            @endif
                        </span>
                    </div>
                </div>

                {{-- use product id so session & db actions use same identifier --}}
                <button type="button" class="cartmini__del ss-remove-cartmini-item" data-id="{{ $item->product->id }}">
                    x
                </button>
            </div>
            @endforeach

        </div>

        @endif


    </div>

    @if ($cart['items']->isNotEmpty())
    <div class="cartmini__checkout">
        <div class="cartmini__checkout-title mb-30">
            <h4>{{ __('frontend.subtotal') }}:</h4>
            <span>
                {{ themeCurrency($subtotal) }}
            </span>
        </div>
        <div class="cartmini__checkout-btn">
            <a href="{{ route('cart.show') }}" class="tp-btn-white-border coffee-bg text-center mb-10 w-100">{{ __('frontend.view_cart') }}</a>
            <a href="{{ route('user.checkout.index') }}" class="tp-btn-white-border coffee-bg border-none text-center w-100">{{ __('frontend.checkout') }}</a>
        </div>
    </div>
    @endif
</div>


