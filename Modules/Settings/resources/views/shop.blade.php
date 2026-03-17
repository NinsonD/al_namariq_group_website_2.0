@extends('core::layout.app')

@section('title', __('admin.shop_settings'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.shop_settings')]
    ]
])
@endsection

@section('content')

<form action="{{ route('admin.shop-settings.update') }}" method="POST">
    @csrf
    @method('PUT')

    <x-card :heading="__('admin.shop_settings')">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <x-image-uploader name="cart_empty_image" :label="__('attribute.cart_empty_image')" :value="$settings->cart_empty_image" />
                <x-input-error field="cart_empty_image" />
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <x-image-uploader name="cartmini_empty_image" :label="__('attribute.cartmini_empty_image')" :value="$settings->cartmini_empty_image" />
                <x-input-error field="cartmini_empty_image" />
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <x-image-uploader name="order_success_image" :label="__('attribute.order_success_image')" :value="$settings->order_success_image" />
                <x-input-error field="order_success_image" />
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <x-image-uploader name="order_failed_image" :label="__('attribute.order_failed_image')" :value="$settings->order_failed_image" />
                <x-input-error field="order_failed_image" />
            </div>
        </div>
        <div class="row mb-6">
            <div class="col-md-4">
                <x-input-label for="tax" :value="__('attribute.tax')" />
                <x-text-input id="tax" name="tax" :value="$settings->tax ?? ''" />
                <x-input-error field="tax" />
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <x-input-switch name="reviews_auto_approved" :label="__('attribute.reviews_auto_approved')" :checked="$settings->reviews_auto_approved" />
                <x-input-error field="reviews_auto_approved" />
            </div>
            <div class="col-md-4">
                <x-input-switch name="enable_shop" :label="__('attribute.enable_shop')" :checked="$settings->enable_shop" />
                <x-input-error field="enable_shop" />
            </div>
        </div>

        <x-slot name="footer">
            <x-admin.button-update />
        </x-slot>
    </x-card>
</form>

@endsection
