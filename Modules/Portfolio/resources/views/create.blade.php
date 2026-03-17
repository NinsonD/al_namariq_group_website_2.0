@extends('core::layout.app')

@section('title', __('admin.add_portfolio'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.portfolio'), 'url' => route('admin.portfolio.index')],
        ['label' => __('admin.add_portfolio')]
    ]
])
@endsection

@section('content')
<form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_portfolio')" :route="route('admin.portfolio.index')" btnType="back">

        <div class="mb-6">
            <x-image-uploader name="image" :label="__('attribute.image')" />
            <x-input-error field="image" />
        </div>
        <div class="mb-6">
            <x-input-label for="title" :value="__('attribute.title')" />
            <x-text-input id="title" name="title" :value="old('title')" />
            <x-input-error field="title" />
        </div>
        <div class="mb-6">
            <x-input-label for="slug" :value="__('attribute.slug')" />
            <x-text-input id="slug" name="slug" :value="old('slug')" />
            <x-input-error field="slug" />
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

        <div class="row gy-6">
            <div class="col-md-6">
                <x-input-label for="client" :value="__('attribute.client')" />
                <x-text-input id="client" name="client" :value="old('client')" />
                <x-input-error field="client" />
            </div>
            <div class="col-md-6">
                <x-input-label for="service" :value="__('attribute.service')" />
                <x-text-input id="service" name="service" :value="old('service')" />
                <x-input-error field="service" />
            </div>
            <div class="col-md-6">
                <x-input-label for="year" :value="__('attribute.year')" />
                <x-text-input type="number" id="year" name="year" :value="old('year')" />
                <x-input-error field="year" />
            </div>
            <div class="col-md-6">
                <x-input-label for="duration" :value="__('attribute.duration')" />
                <x-text-input id="duration" name="duration" :value="old('duration')" />
                <x-input-error field="duration" />
            </div>
            <div class="col-md-6">
                <x-input-label for="website" :value="__('attribute.website')" />
                <x-text-input id="website" name="website" :value="old('website')" />
                <x-input-error field="website" />
            </div>
            <div class="col-md-6">
                <x-input-label for="website_url" :value="__('attribute.website_url')" />
                <x-text-input id="website_url" name="website_url" :value="old('website_url')" />
                <x-input-error field="website_url" />
            </div>
            <div class="col-md-12">
                <x-input-label for="tags" :value="__('attribute.tags')" />
                <x-text-input id="tags" name="tags" :value="old('tags')" />
                <div class="form-text">
                    {{ __('admin.seprate_tags_by_comma') }}
                </div>
                <x-input-error field="tags" />
            </div>
        </div>

        <div class="mb-6 mt-6">
            <x-input-label for="seo_title" :value="__('attribute.seo_title')" />
            <x-text-input id="seo_title" name="seo_title" :value="old('seo_title')" />
            <x-input-error field="seo_title" />
        </div>
        <div class="mb-6">
            <x-input-label for="seo_description" :value="__('attribute.seo_description')" />
            <x-textarea name="seo_description" id="seo_description" rows="7" :value="old('seo_description')" />
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
