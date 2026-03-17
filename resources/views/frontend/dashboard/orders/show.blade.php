@extends('frontend.layouts.master')

@section('meta_title', __('frontend.orders'))

@php
    extract(getSiteMenus());
@endphp

@section('header')
    @if($settings->enable_shop)
        @include('frontend.layouts.headers.header-shop', ['main_menu' => $main_menu])
    @else
        @include('frontend.layouts.headers.header-inner', ['main_menu' => $main_menu])
    @endif
@endsection


@section('content')
    @php
        $user = auth()->user();
    @endphp
    <!-- my-acount-area-start -->
    <section class="tp-my-acount-area fix pt-110 pb-110 tp-sticky-placeholder">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="profile__tab-content">
                    <h3 class="profile__info-title mb-30">{{ __('frontend.order_details') }}</h3>
                        <div class="order-details">
                            <div class="row">
                                <div class="col-12">
                                    <div class="profile__ticket table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="packages">
                                                        {{ __('frontend.product_title') }}
                                                    </th>
                                                    <th class="p_date">
                                                        {{ __('frontend.quantity') }}
                                                    </th>
                                                    <th class="e_date">
                                                        {{ __('frontend.unit_price') }}
                                                    </th>
                                                    <th class="amount">
                                                        {{ __('frontend.total_amount') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->orderProducts as $product)
                                                <tr>
                                                    <td class="packages">
                                                        {{ $product->product_title }}
                                                    </td>
                                                    <td class="p_date">
                                                        {{ $product->qty }}
                                                    </td>
                                                    <td class="e_date">
                                                        {{ getCurrencyWithSymbol($product->price_default, $order->paid_currency) }}
                                                    </td>
                                                    <td class="amount">
                                                        {{ getCurrencyWithSymbol($product->price_default * $product->qty, $order->paid_currency) }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-30">
                                <div class="col-12 ">
                                    <div class="table-responsive">
                                        <table class="table table-no-border">
                                            <tbody>
                                                <tr>
                                                    <td class="w-50">
                                                        <div class="text-start ss-dashboard-order-payment">
                                                            <p><strong class="fw-medium">{{ __('frontend.payment') }}</strong>: {{ Str::replace('_', ' ', $order->payment->key) }}</p>
                                                            <p><strong class="fw-medium">{{ __('frontend.transaction_id') }}</strong>: {{ $order->transaction_id }}</p>
                                                        </div>
                                                    </td>
                                                    <td class="w-50">
                                                        <div class="text-end ss-dashboard-order-total">
                                                            <p>{{ __('frontend.subtotal') }} : <span>{{ getCurrencyWithSymbol($order->subtotal_default, $order->paid_currency) }}</span></p>
                                                            <p>{{ __('frontend.discount') }} : <span>(-) {{ getCurrencyWithSymbol($order->discount_default, $order->paid_currency) }} </span></p>
                                                            <p>{{ __('frontend.tax') }} : <span>{{ getCurrencyWithSymbol($order->tax_default, $order->paid_currency) }}</span></p>
                                                            <p>{{ __('frontend.shipping_charge') }} : <span>{{ getCurrencyWithSymbol($order->shipping_charge ?? 0, $order->paid_currency) }}</span></p>
                                                            <p>{{ __('frontend.gateway_charge') }} : <span>{{ getCurrencyWithSymbol($order->gateway_charge, $order->paid_currency) }}</span></p>
                                                            <p><b>{{ __('frontend.total') }}</b> : <span><b>{{ getCurrencyWithSymbol($order->amount_default, $order->paid_currency) }}</b></span></p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <a class="ss-shop-btn mt-3" href="{{ route('user.orders.invoice', ['id' => $order->id]) }}" target="_blank">
                            <i class="fa fa-print"></i> {{ __('frontend.print_and_download') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my-acount-area-end -->
@endsection


@section('footer')
    @if($settings->enable_shop)
        @include('frontend.layouts.footers.footer-shop',
        [
            'footer_menu_one' => $footer_menu_one,
            'footer_menu_two' => $footer_menu_two,
            'footer_menu_three' => $footer_menu_three,
            'footer_menu_four' => $footer_menu_four
        ])
    @else
        @include('frontend.layouts.footers.footer-inner', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
    @endif
@endsection

@push('js')
    <script>
        'use strict';

        $(function() {
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        });
    </script>
@endpush
