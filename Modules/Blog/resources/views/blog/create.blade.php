@extends('core::layout.app')

@section('title', __('admin.add_new_blog'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.blog'), 'url' => route('admin.blog.index')],
        ['label' => __('admin.add_new_blog')]
    ]
])
@endsection

@section('content')
<form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_new_blog')" :route="route('admin.blog.index')" btnType="back">

        <div class="mb-4">
            <x-image-uploader name="image" :label="__('attribute.image')" />
            <x-input-error field="image" />
            <x-input-msg :text="__('admin.blog_image_size_recommendation')" />
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="mb-4">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="old('title')"/>
                    <x-input-error field="title" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4">
                    <x-input-label for="slug" :value="__('attribute.slug')" />
                    <x-text-input id="slug" name="slug" :value="old('slug')"/>
                    <x-input-error field="slug" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4">
                    <x-input-label for="blog_category_id" :value="__('attribute.category')" />
                    <select name="blog_category_id" id="blog_category_id" class="form-select conca-select2">
                        @if ($categories->isEmpty())
                            <option value="">{{ __('admin.no_category_available') }}</option>
                        @else
                            <option value="">{{ __('admin.select_category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    <x-input-error field="blog_category_id" />
                </div>
            </div>
        </div>

        <div class="mb-6">
            <x-input-label for="short_description" :value="__('attribute.short_description')" />
            <x-textarea name="short_description" id="short_description" rows="7" :value="old('short_description')" />
            <x-input-error field="short_description" />
        </div>

        <div class="mb-6">
            <x-input-label for="description" :value="__('attribute.description')" />
            <textarea  id="description" name="description" rows="7" class="form-control tinymce">{{ old('description') }}</textarea>
            <x-input-error field="description" />
        </div>
        <div class="mb-6">
            <x-input-label for="tags" :value="__('attribute.tags')" />
            <input id="tags" class="form-control" name="tags" />
            <x-input-error field="tags" />
        </div>

        <div class="mb-4">
            <x-input-label for="seo_title" :value="__('attribute.seo_title')" />
            <x-text-input id="seo_title" name="seo_title" :value="old('seo_title')"/>
            <x-input-error field="seo_title" />
        </div>

        <div class="mb-6">
            <x-input-label for="seo_description" :value="__('attribute.seo_description')" />
            <x-textarea name="seo_description" id="seo_description" rows="7" :value="old('seo_description')" />
            <x-input-error field="seo_description" />
        </div>

        <div class="row row-cols-md-3 row-cols-1 ">
            <div class="col">
                <div class="mb-6">
                    <x-input-switch name="status" :label="__('attribute.status')" />
                    <x-input-error field="status" />
                </div>
            </div>
            <div class="col">
                <div class="mb-6">
                    <x-input-switch name="show_homepage" :label="__('attribute.show_homepage')" />
                    <x-input-error field="show_homepage" />
                </div>
            </div>
            <div class="col">
                <div class="mb-6">
                    <x-input-switch name="is_popular" :label="__('attribute.mark_as_popular')" />
                    <x-input-error field="is_popular" />
                </div>
            </div>
        </div>


        <x-slot name="footer">
            <x-admin.button-add />
        </x-slot>

    </x-card>
</form>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/tagify/tagify.css') }}" />
@endpush

@push('js')
<script src="{{ asset('admin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/tagify/tagify.js') }}"></script>
<script>
    'use strict';

    $(function(){
        if($('#tags').length){
            const tags =  new Tagify(document.querySelector('#tags'));
        }
    })

</script>
@endpush
