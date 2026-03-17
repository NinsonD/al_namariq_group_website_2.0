@extends('core::layout.app')

@section('title', __('admin.add_new_coupon'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.coupons'), 'url' => route('admin.coupons.index')],
        ['label' => __('admin.add_new_coupon')]
    ]
])
@endsection

@section('content')
@can('coupon-create')
<form action="{{ route('admin.coupons.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_new_coupon')" :route="route('admin.coupons.index')" btnType="back" >

        <div class="row gy-5 mb-5">
            <div class="col-md-12">
                <x-image-uploader name="image" :label="__('attribute.image')" />
                <x-input-error field="image" />
            </div>
            <div class="col-md-6">

                <div class="">
                    <x-input-label for="coupon_code" :value="__('attribute.coupon_code')" />
                    -
                    <button type="button" class="generate-coupon-code-btn text-success">({{ __('admin.generate_coupon_code') }})</button>
                </div>

                <x-text-input id="coupon_code" name="coupon_code" :value="old('coupon_code')"/>
                <x-input-error field="coupon_code" />
            </div>
            <div class="col-md-6">
                <x-input-label for="min_price" :value="__('attribute.min_price')" />
                <x-text-input type="number" id="min_price" name="min_price" :value="old('min_price')"/>
                <x-input-error field="min_price" />
            </div>
            <div class="col-md-6">
                <x-input-label for="discount" :value="__('attribute.discount')" />
                <x-text-input type="number" id="discount" name="discount" :value="old('discount')"/>
                <x-input-error field="discount" />
            </div>
            <div class="col-md-6">
                <x-input-label for="discount_type" :value="__('attribute.discount_type')" />
                <select id="discount_type" name="discount_type" class="form-select">
                    <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>{{ __('admin.percentage') }}</option>
                    <option value="amount" {{ old('discount_type') == 'amount' ? 'selected' : '' }}>{{ __('admin.amount') }}</option>
                </select>
                <x-input-error field="discount_type" />
            </div>
            <div class="col-md-4">
                <x-input-label for="per_user_limit" :value="__('attribute.per_user_limit')" />
                <x-text-input id="per_user_limit" name="per_user_limit" :value="old('per_user_limit')"/>
                <x-input-error field="per_user_limit" />
            </div>
            <div class="col-md-4">
                <x-input-label for="start_date" :value="__('attribute.start_date')" />
                <x-text-input id="start_date" name="start_date" :value="old('start_date')"/>
                <x-input-error field="start_date" />
            </div>
            <div class="col-md-4">
                <x-input-label for="end_date" :value="__('attribute.end_date')" />
                <x-text-input id="end_date" name="end_date" :value="old('end_date')"/>
                <x-input-error field="end_date" />
            </div>
        </div>


        <div class="row">
            <div class="col-sm-4">
                <div class="mb-4">
                    <x-input-switch name="status" :label="__('attribute.status')" checked="true"/>
                    <x-input-error field="status" />
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <x-admin.button-add />
        </x-slot>

    </x-card>
</form>
@endcan
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endpush

@push('js')
<script src="{{ asset('admin/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script>
    flatpickr("#start_date", {
        enableTime: false,
        dateFormat: "Y-m-d",
        defaultDate: "{{ old('start_date', now()->format('Y-m-d')) }}"
    });
    flatpickr("#end_date", {
        enableTime: false,
        dateFormat: "Y-m-d",
        defaultDate: "{{ old('end_date', now()->addDays(30)->format('Y-m-d')) }}"
    });

    $('.generate-coupon-code-btn').on('click', function() {
        // generate a random coupon code
        const couponCode = Math.random().toString(36).substring(2, 10);
        $('#coupon_code').val(couponCode.toUpperCase());
        toastr.success('{{ __('admin.coupon_code_generated') }}');
    });
</script>
@endpush
