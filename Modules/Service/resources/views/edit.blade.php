@extends('core::layout.app')

@section('title', __('admin.edit_service'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.services'), 'url' => route('admin.service.index')],
        ['label' => __('admin.edit_service')]
    ]
])
@endsection

@section('content')

@php
    $code = request()->get('code', 'en');
@endphp

<x-admin.language-nav route="admin.service.edit" :params="['service' => $service->id, 'code' => $code]" />


<form action="{{ route('admin.service.update', ['service' => $service->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-card :heading="__('admin.edit_service')" :route="route('admin.service.index')" btnType="back">

        <div class="row  {{ hideDivLang($code) }}">
            <div class="col-md-6">
                <div class="mb-6">
                    <x-image-uploader name="image" :label="__('attribute.image')" :value="$service->image" />
                    <x-input-error field="image" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-6">
                    <x-image-uploader name="icon" :label="__('attribute.icon')" :value="$service->icon" />
                    <x-input-error field="icon" />
                </div>
            </div>
        </div>

        <div class="mb-6">
            <x-input-label for="title" :value="__('attribute.title')" />
            <x-text-input id="title" name="title" :value="old('title', $service->getTranslation($code)->title)" />
            <x-input-error field="title" />
        </div>
        <div class="mb-6  {{ hideDivLang($code) }}">
            <x-input-label for="slug" :value="__('attribute.slug')" />
            <x-text-input id="slug" name="slug" :value="old('slug', $service->slug)" />
            <x-input-error field="slug" />
        </div>
        <div class="mb-6">
            <x-input-label for="category" :value="__('attribute.category')" />
            <x-text-input id="category" name="category" :value="old('category', $service->getTranslation($code)->category)"/>
            <x-input-error field="category" />
        </div>
        <div class="mb-6">
            <x-input-label for="short_description" :value="__('attribute.short_description')" />
            <x-textarea name="short_description" id="short_description" rows="7" :value="old('short_description', $service->getTranslation($code)->short_description)" />
            <x-input-error field="short_description" />
        </div>
        <div class="mb-6">
            <x-input-label for="description" :value="__('attribute.description')" />
            <textarea  id="description" name="description" rows="7" class="form-control tinymce">{{ $service->getTranslation($code)->description }}</textarea>
            <x-input-error field="description" />
        </div>

        @php
            $tags = is_array($service->tags) && count($service->tags) > 0 ? json_encode($service->tags) : '';
        @endphp
        <div class="mb-6 {{ hideDivLang($code) }}">
            <x-input-label for="tags" :value="__('attribute.tags')" />
            <x-text-input id="tags" name="tags" :value="old('tags', $tags)" />
            <div class="form-text">
                {{ __('admin.seprate_tags_by_comma') }}
            </div>
            <x-input-error field="tags" />
        </div>

        <div class="mb-6">
            <x-input-label for="seo_title" :value="__('attribute.seo_title')" />
            <x-text-input id="seo_title" name="seo_title" :value="old('seo_title', $service->getTranslation($code)->seo_title)" />
            <x-input-error field="seo_title" />
        </div>
        <div class="mb-6">
            <x-input-label for="seo_description" :value="__('attribute.seo_description')" />
            <x-textarea name="seo_description" id="seo_description" rows="7" :value="$service->getTranslation($code)->seo_description" />
            <x-input-error field="seo_description" />
        </div>

        <div class="mb-6 mt-6 {{ hideDivLang($code) }}">
            <x-input-switch name="status" :label="__('attribute.status')" :checked="$service->status" />
            <x-input-error field="status" />
        </div>

        <x-slot name="footer">
            <x-admin.button-update />
        </x-slot>

    </x-card>
</form>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/tagify/tagify.css') }}">
    <style>
        .img-thumbnail {
            width: 300px;
            height: 300px;
            object-fit: cover;
        }
    </style>
@endpush

@push('js')
<script src="{{ asset('admin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/tagify/tagify.js') }}"></script>

<script>
    'use strict';
    $(function(){
        const tagifyBasicEl = document.querySelector('#tags');
        const TagifyBasic = new Tagify(tagifyBasicEl);
    })
</script>
@endpush
