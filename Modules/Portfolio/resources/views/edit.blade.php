@extends('core::layout.app')

@section('title', __('admin.edit_portfolio'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.portfolio'), 'url' => route('admin.portfolio.index')],
        ['label' => __('admin.edit_portfolio')]
    ]
])
@endsection

@section('content')


@php
    $code = request()->get('code', 'en');
@endphp

<x-admin.language-nav route="admin.portfolio.edit" :params="['portfolio' => $portfolio->id, 'code' => $code]" />

<form action="{{ route('admin.portfolio.update', ['portfolio' => $portfolio->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-card :heading="__('admin.edit_portfolio')" :route="route('admin.portfolio.index')" btnType="back">


        <div class="mb-6 {{ hideDivLang($code) }}">
            <x-image-uploader name="image" :label="__('attribute.image')" :value="$portfolio->image" />
            <x-input-error field="image" />
        </div>
        <div class="mb-6">
            <x-input-label for="title" :value="__('attribute.title')" />
            <x-text-input id="title" name="title" :value="old('title', $portfolio->getTranslation($code)->title)"/>
            <x-input-error field="title" />
        </div>
        <div class="mb-6 {{ hideDivLang($code) }}">
            <x-input-label for="slug" :value="__('attribute.slug')" />
            <x-text-input id="slug" name="slug" :value="old('slug', $portfolio->slug)" />
            <x-input-error field="slug" />
        </div>
        <div class="mb-6">
            <x-input-label for="short_description" :value="__('attribute.short_description')" />
            <x-textarea name="short_description" id="short_description" rows="7" :value="old('short_description', $portfolio->getTranslation($code)->short_description)" />
            <x-input-error field="short_description" />
        </div>
        <div class="mb-6">
            <x-input-label for="description" :value="__('attribute.description')" />
            <textarea  id="description" name="description" rows="7" class="form-control tinymce">{{ $portfolio->getTranslation($code)->description }}</textarea>
            <x-input-error field="description" />
        </div>

        <div class="row gy-6">
            <div class="col-md-6 {{ hideDivLang($code) }}">
                <x-input-label for="client" :value="__('attribute.client')" />
                <x-text-input id="client" name="client" :value="old('client', $portfolio->client)" />
                <x-input-error field="client" />
            </div>
            <div class="col-md-6">
                <x-input-label for="service" :value="__('attribute.service')" />
                <x-text-input id="service" name="service" :value="old('service', $portfolio->getTranslation($code)->service)" />
                <x-input-error field="service" />
            </div>
            <div class="col-md-6 {{ hideDivLang($code) }}">
                <x-input-label for="year" :value="__('attribute.year')" />
                <x-text-input type="number" id="year" name="year" :value="old('year', $portfolio->year)" />
                <x-input-error field="year" />
            </div>
            <div class="col-md-6">
                <x-input-label for="duration" :value="__('attribute.duration')" />
                <x-text-input id="duration" name="duration" :value="old('duration', $portfolio->getTranslation($code)->duration)" />
                <x-input-error field="duration" />
            </div>
            <div class="col-md-6 {{ hideDivLang($code) }}">
                <x-input-label for="website" :value="__('attribute.website')" />
                <x-text-input id="website" name="website" :value="old('website', $portfolio->website)" />
                <x-input-error field="website" />
            </div>
             <div class="col-md-6  {{ hideDivLang($code) }}">
                <x-input-label for="website_url" :value="__('attribute.website_url')"  />
                <x-text-input id="website_url" name="website_url" :value="old('website_url', $portfolio->website_url)"/>
                <x-input-error field="website_url" />
            </div>
            @php
                $tags = is_array($portfolio->tags) && count($portfolio->tags) > 0 ? json_encode($portfolio->tags) : '';
            @endphp
            <div class="col-md-12 {{ hideDivLang($code) }}">
                <x-input-label for="tags" :value="__('attribute.tags')" />
                <x-text-input id="tags" name="tags" :value="old('tags', $tags)" />
                <div class="form-text">
                   {{ __('admin.seprate_tags_by_comma') }}
                </div>
                <x-input-error field="tags" />
            </div>
        </div>

        <div class="mb-6 mt-6">
            <x-input-label for="seo_title" :value="__('attribute.seo_title')"  />
            <x-text-input id="seo_title" name="seo_title" :value="$portfolio->getTranslation($code)->seo_title" />
            <x-input-error field="seo_title" />
        </div>
        <div class="mb-6">
            <x-input-label for="seo_description" :value="__('attribute.seo_description')" />
            <x-textarea name="seo_description" id="seo_description" rows="7" :value="$portfolio->getTranslation($code)->seo_description" />
            <x-input-error field="seo_description" />
        </div>

        <div class="mb-6 mt-6 {{ hideDivLang($code) }}">
            <x-input-switch name="status" :label="__('attribute.status')" :checked="$portfolio->status"/>
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
