@extends('core::layout.app')

@section('title', __('admin.add_service'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.services'), 'url' => route('admin.service.index')],
        ['label' => __('admin.add_service')]
    ]
])
@endsection

@section('content')
<form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_service')" :route="route('admin.service.index')" btnType="back">

        <div class="row">
            <div class="col-md-6">
                <div class="mb-6">
                    <x-image-uploader name="image" :label="__('attribute.image')" />
                    <x-input-error field="image" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-6">
                    <x-image-uploader name="icon" :label="__('attribute.icon')" />
                    <x-input-error field="icon" />
                </div>
            </div>
        </div>

        <div class="mb-6">
            <x-input-label for="title" :value="__('attribute.title')" />
            <x-text-input id="title" name="title" />
            <x-input-error field="title" />
        </div>
        <div class="mb-6">
            <x-input-label for="slug" :value="__('attribute.slug')" />
            <x-text-input id="slug" name="slug" />
            <x-input-error field="slug" />
        </div>
        <div class="mb-6">
            <x-input-label for="category" :value="__('attribute.category')" />
            <x-text-input id="category" name="category" />
            <x-input-error field="category" />
        </div>
        <div class="mb-6">
            <x-input-label for="short_description" :value="__('attribute.short_description')" />
            <x-textarea name="short_description" id="short_description" rows="7" :value="old('short_description')" />
            <x-input-error field="short_description" />
        </div>
        <div class="mb-6">
            <x-input-label for="description" :value="__('attribute.description')" />
            <textarea  id="description" name="description" rows="7" class="form-control tinymce">{{ old('content') }}</textarea>
            <x-input-error field="description" />
        </div>

        <div class="mb-6">
            <x-input-label for="tags" :value="__('attribute.tags')" />
            <x-text-input id="tags" name="tags" :value="old('tags')" />
            <div class="form-text">
                {{ __('admin.seprate_tags_by_comma') }}
            </div>
            <x-input-error field="tags" />
        </div>

        <div class="mb-6">
            <x-input-label for="seo_title" :value="__('attribute.seo_title')" />
            <x-text-input id="seo_title" name="seo_title" />
            <x-input-error field="seo_title" />
        </div>
        <div class="mb-6">
            <x-input-label for="seo_description" :value="__('attribute.seo_description')" />
            <x-textarea name="seo_description" id="seo_description" rows="7" />
            <x-input-error field="seo_description" />
        </div>

        <div class="mb-6 mt-6">
            <x-input-switch name="status" :label="__('attribute.status')" />
            <x-input-error field="status" />
        </div>

        <x-slot name="footer">
            <x-admin.button-add />
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
