@extends('frontend.layouts.master')

@section('meta_title', __('frontend.checkout') . ' | ' . $settings->app_name)
@section('meta_description', $seo_setting['shop']['seo_description'])
@section('meta_keywords', $seo_setting['shop']['seo_keywords'])

@php extract(getSiteMenus()); @endphp

@section('header')
   @include('frontend.layouts.headers.header-shop', ['main_menu' => $main_menu])
@endsection

@section('content')
<!-- checkout area start -->
<section class="tp-checkout-area pb-120 pt-200">
    <form action="{{ route('user.checkout.place-order') }}" method="POST">
        @csrf
        @method('POST')
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="tp-checkout-bill-area">
                        <h3 class="tp-checkout-bill-title">{{ __('frontend.billing_details') }}</h3>
                        <div class="tp-checkout-bill-form">

                                <div class="tp-checkout-bill-inner">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="tp-checkout-input tp-select">
                                                <label for="billing_address">{{ __('frontend.select_billing_address') }}</label>
                                                <select name="billing_address" id="billing_address">
                                                    @foreach ($billing_address as $address)
                                                        <option value="{{ $address->id }}">{{ $address->title }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error field="billing_address" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="tp-checkout-option-wrapper">
                                                <div class="tp-checkout-option">
                                                    <input name="ship_to_diff_address" id="ship_to_diff_address" type="checkbox">
                                                    <label for="ship_to_diff_address">{{ __('frontend.ship_to_different_address') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="tp-checkout-shipping-address-area ss-shipping-form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="tp-checkout-input">
                                                            <label>{{ __('attribute.first_name') }}</label>
                                                            <input type="text" placeholder="{{ __('attribute.first_name') }}" name="first_name">
                                                            <x-input-error field="first_name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="tp-checkout-input">
                                                            <label>{{ __('attribute.last_name') }}</label>
                                                            <input type="text" placeholder="{{ __('attribute.last_name') }}" name="last_name">
                                                            <x-input-error field="last_name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="tp-checkout-input">
                                                            <label>{{ __('attribute.phone') }}</label>
                                                            <input type="text" placeholder="{{ __('attribute.phone') }}" name="phone">
                                                            <x-input-error field="phone" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="tp-checkout-input">
                                                            <label>{{ __('attribute.email') }}</label>
                                                            <input type="email" placeholder="{{ __('attribute.email') }}" name="email">
                                                            <x-input-error field="email" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="tp-checkout-input">
                                                            <label>{{ __('attribute.province') }}</label>
                                                            <input type="text" placeholder="{{ __('attribute.province') }}" name="province">
                                                            <x-input-error field="province" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="tp-checkout-input">
                                                            <label>{{ __('attribute.address') }}</label>
                                                            <input type="text" placeholder="{{ __('attribute.address') }}" name="address">
                                                            <x-input-error field="address" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="tp-checkout-input">
                                                            <label>{{ __('attribute.city') }}</label>
                                                            <input type="text" placeholder="{{ __('attribute.city') }}" name="city">
                                                            <x-input-error field="city" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="tp-checkout-input">
                                                            <label>{{ __('attribute.zip_code') }}</label>
                                                            <input type="text" placeholder="{{ __('attribute.zip_code') }}" name="zip_code">
                                                            <x-input-error field="zip_code" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="tp-checkout-input">
                                                            <label>{{ __('attribute.country') }}</label>
                                                            <input type="text" placeholder="{{ __('attribute.country') }}" name="country">
                                                            <x-input-error field="country" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="tp-checkout-input">
                                                <label>{{ __('attribute.order_note') }}</label>
                                                <textarea name="order_note"></textarea>
                                                <x-input-error field="order_note" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" id="checkout-content">
                    @include('frontend.ecommerce.partials.checkout-content', [
                            'cart' => $cart,
                            'amounts' => $amounts,
                            'shippingMethods' => $shippingMethods,
                        ])
                </div>
            </div>
        </div>
    </form>
</section>
<!-- checkout area end -->

@endsection

@section('footer')
    @include('frontend.layouts.footers.footer-shop', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection
