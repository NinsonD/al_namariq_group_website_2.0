@extends('core::layout.app')

@section('title', __('admin.update_brand'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.brands'), 'url' => route('admin.brand.index')],
        ['label' => __('admin.update_brand')]
    ]
])
@endsection

@section('content')

@php
    $code = request()->get('code', 'en');
@endphp

<x-admin.language-nav route="admin.brand.edit" :params="['brand' => $brand->id]" />

<form action="{{ route('admin.brand.update', ['brand' => $brand->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-card :heading="__('admin.update_brand')" :route="route('admin.brand.index')" btnType="back">


        <div class="mb-4">
            <x-input-label for="title" :value="__('attribute.title')" />
            <x-text-input id="title" name="title" :value="old('title',  $brand->getTranslation($code)->title)"/>
            <x-input-error field="title" />
        </div>
        <div class="mb-4 {{ hideDivLang($code) }}">
            <x-input-label for="url" :value="__('attribute.url')" />
            <x-text-input id="url" name="url" :value="old('url', $brand->url)"/>
            <x-input-error field="url" />
        </div>
        <div class="mb-4 {{ hideDivLang($code) }}">
            <x-image-uploader name="image" :label="__('attribute.image')" :value="$brand->image"/>
            <x-input-error field="image" />
        </div>

        <div class="mb-4 {{ hideDivLang($code) }}">
            <x-input-switch name="status" :label="__('attribute.status')" :checked="$brand->status"/>
            <x-input-error field="status" />
        </div>

        <x-slot name="footer">
            <x-admin.button-update />
        </x-slot>

    </x-card>
</form>
@endsection
