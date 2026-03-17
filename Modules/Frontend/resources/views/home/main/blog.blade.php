@extends('core::layout.app')

@section('title', __('section.home_main_blog_section'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_main_sections'), 'url' => route('admin.home_main.index')],
        ['label' => __('section.home_main_blog_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_main.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_main.update_blog_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_main_blog_section')" :route="route('admin.home_main.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-6">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-msg :text="__('admin.text_shape_insert')" />
                    <x-input-error field="title" />
                </div>

                <div class="col-md-6">
                    <x-input-label for="btn_text" :value="__('attribute.btn_text')" />
                    <x-text-input id="btn_text" name="btn_text" :value="$section?->getTranslation($code)?->content?->btn_text ?? ''"/>
                    <x-input-error field="btn_text" />
                </div>
                @php
                    $blogs = \Modules\Blog\Models\Blog::active()->get();
                    $selectedblogs = is_null($section?->default_content?->blogs) ? [] : json_decode($section?->default_content?->blogs);

                @endphp

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="blogs" :value="__('attribute.blogs')" />
                    <select class="form-control conca-select2" name="blogs[]" id="blogs" multiple>
                        @foreach ($blogs as $blog)
                            <option value="{{ $blog->id }}" {{ in_array($blog->id, $selectedblogs) ? 'selected' : '' }}>{{ Str::limit($blog->title, 30, '...') }}</option>
                        @endforeach
                    </select>
                    <x-input-error field="blogs" />
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
