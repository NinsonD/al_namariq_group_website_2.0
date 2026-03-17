@extends('core::layout.app')

@section('title', __('admin.add_new_brand'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.brands'), 'url' => route('admin.brand.index')],
        ['label' => __('admin.add_new_brand')]
    ]
])
@endsection

@section('content')
<form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_new_brand')" :route="route('admin.brand.index')" btnType="back">

        <div class="mb-4">
            <x-input-label for="title" :value="__('attribute.title')" />
            <x-text-input id="title" name="title" :value="old('title')"/>
            <x-input-error field="title" />
        </div>
        <div class="mb-4">
            <x-input-label for="url" :value="__('attribute.url')" />
            <x-text-input id="url" name="url" :value="old('url')"/>
            <x-input-error field="url" />
        </div>
        <div class="mb-4">
            <x-image-uploader name="image" :label="__('attribute.image')" />
            <x-input-error field="image" />
        </div>

        <div class="mb-4">
            <x-input-switch name="status" :label="__('attribute.status')" :checked="true"/>
            <x-input-error field="status" />
        </div>

        <x-slot name="footer">
            <x-admin.button-add />
        </x-slot>

    </x-card>
</form>
@endsection
