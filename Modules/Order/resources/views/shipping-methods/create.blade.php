@extends('core::layout.app')

@section('title', __('admin.add_shipping_method'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.shipping_methods'), 'url' => route('admin.shipping-methods.index')],
        ['label' => __('admin.add_shipping_method')]
    ]
])
@endsection

@section('content')
@can('shipping_method-create')
<form action="{{ route('admin.shipping-methods.store') }}" method="POST">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_shipping_method')" :route="route('admin.shipping-methods.index')" btnType="back">

        <div class="row gy-5">
            <div class="col-md-12">
                <x-input-label for="title" :value="__('attribute.name')" />
                <x-text-input id="title" name="title" :value="old('title')" />
                <x-input-error field="title" />
            </div>
            <div class="col-md-6">
                <x-input-label for="fee" :value="__('attribute.fee')" />
                <x-text-input type="number" id="fee" name="fee" :value="old('fee')" />
                <x-input-error field="fee" />
            </div>
            <div class="col-md-6">
                <x-input-label for="min_amount" :value="__('attribute.min_amount')" />
                <x-text-input type="number" id="min_amount" name="min_amount" :value="old('min_amount')" />
                <x-input-error field="min_amount" />
            </div>

            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center gap-10">
                    <div class="">
                        <x-input-switch name="set_as_default" :label="__('attribute.set_as_default')" />
                        <x-input-error field="set_as_default" />
                    </div>
                    <div class="">
                        <x-input-switch name="status" :label="__('attribute.status')" />
                        <x-input-error field="status" />
                    </div>
                    <div class="">
                        <x-input-switch name="set_as_free" :label="__('attribute.set_as_free')" />
                        <x-input-error field="set_as_free" />
                    </div>
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

