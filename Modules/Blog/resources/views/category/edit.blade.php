@extends('core::layout.app')

@section('title', __('admin.update_category'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.category'), 'url' => route('admin.blog-category.index')],
        ['label' => __('admin.update_category')]
    ]
])
@endsection

@section('content')

@php
    $code = request()->get('code', 'en');
@endphp

<x-admin.language-nav route="admin.blog-category.edit" :params="['blog_category' => $category->id]" />

<form action="{{ route('admin.blog-category.update', ['blog_category' => $category->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-card :heading="__('admin.update_category')" :route="route('admin.blog-category.index')" btnType="back">

        <div class="mb-4">
            <x-input-label for="title" :value="__('attribute.title')" />
            <x-text-input id="title" name="title" :value="old('title', $category->getTranslation($code)->title)"/>
            <x-input-error field="title" />
        </div>

        <div class="mb-4 {{ hideDivLang($code) }}">
            <x-input-label for="slug" :value="__('attribute.slug')"  />
            <x-text-input id="slug" name="slug" :value="old('slug', $category->slug)"/>
            <x-input-error field="slug" />
        </div>

        <x-slot name="footer">
            <x-admin.button-update />
        </x-slot>

    </x-card>
</form>
@endsection
