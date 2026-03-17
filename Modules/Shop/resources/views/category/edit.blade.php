@extends('core::layout.app')

@section('title', __('admin.edit_product_category'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.product_categories'), 'url' => route('admin.product-category.index')],
        ['label' => __('admin.edit_product_category')]
    ]
])
@endsection

@section('content')

@php
    $code = request()->get('code', 'en');
@endphp
@can('product_category-edit')
<x-admin.language-nav route="admin.product-category.edit" :params="['product_category' => $category->id]" />

<form action="{{ route('admin.product-category.update', ['product_category' => $category->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-card :heading="__('admin.edit_product_category')" :route="route('admin.product-category.index')" btnType="back">

        <div class="row gy-5 mb-5">
            <div class="col-md-12 {{ hideDivLang($code) }}">
                <x-image-uploader name="image" :label="__('attribute.image')" :value="$category->image" />
                <x-input-error field="image" />
            </div>
            <div class="col-md-12">
                <x-input-label for="title" :value="__('attribute.title')" />
                <x-text-input id="title" name="title" :value="old('title', $category->getTranslation($code)?->title)"/>
                <x-input-error field="title" />
            </div>

            @if (!str_contains(hideDivLang($code), 'd-none'))
            <div class="col-md-12">
                <x-input-label for="slug" :value="__('attribute.slug')" />
                <x-text-input id="slug" name="slug" :value="old('slug', $category->slug)"/>
                <x-input-error field="slug" />
            </div>
            @endif
        </div>

        <div class="mb-4 {{ hideDivLang($code) }}">
            <x-input-switch name="status" :label="__('attribute.status')" :checked="$category->status" />
            <x-input-error field="status" />
        </div>

        <x-slot name="footer">
            <x-admin.button-update />
        </x-slot>

    </x-card>
</form>
@endcan
@endsection

