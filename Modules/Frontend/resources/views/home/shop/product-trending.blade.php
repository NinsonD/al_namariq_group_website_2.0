@extends('core::layout.app')

@section('title', __('section.home_shop_product_trending_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_shop_sections'), 'url' => route('admin.home_shop.index')],
        ['label' => __('section.home_shop_product_trending_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_shop.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_shop.update_product_trending_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_shop_product_trending_section')" :route="route('admin.home_shop.index')" btnType="back">
            <div class="row gy-5">

                @php
                    $products = \Modules\Shop\Models\Product::with('translations')->active()->get();
                    $selectedProducts = is_null($section?->default_content?->products) ? [] : json_decode($section?->default_content?->products);
                @endphp

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="products" :value="__('attribute.products')" />
                    <select class="form-control conca-select2" name="products[]" id="products" multiple>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ in_array($product->id, $selectedProducts) ? 'selected' : '' }}>{{ Str::limit($product->title, 30, '...') }}</option>
                        @endforeach
                    </select>
                    <x-input-error field="products" />
                </div>
            </div>

             <div class="row mt-6">
                <div class="col-12">
                    <x-input-switch name="status" :label="__('attribute.status')" :checked="$section?->status" />
                    <x-input-error field="status" />
                </div>
            </div>

            <x-slot name="footer">
                <x-admin.button-update />
            </x-slot>

        </x-card>
    </form>
</div>

@endsection
