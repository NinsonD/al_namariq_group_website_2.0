@extends('core::layout.app')

@section('title', __('admin.page_builder'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.page_builder'), 'url' => route('admin.page.index')],
        ['label' => __('admin.page_builder')]
    ]
])
@endsection

@section('content')

@php
    $code = request()->get('code', 'en');
@endphp

<x-admin.language-nav route="admin.page.edit" :params="['page' => $page->id, 'code' => $code]" />

<form action="{{ route('admin.page.update', ['page' => $page->id, 'code' => $code]) }}" method="POST">
    @csrf
    @method('PUT')
    <x-card :heading="__('admin.edit_page')" :route="route('admin.page.index')" btnType="back">


        <div class="mb-4">
            <x-input-label for="title" :value="__('attribute.title')" />
            <x-text-input id="title" name="title" :value="old('title', $page->getTranslation($code)->title)" />
            <x-input-error field="title" />
        </div>

        @if (!in_array($page->slug, ['privacy-policy', 'terms-of-service', 'terms-and-conditions']))
            <div class="mb-4 {{ hideDivLang($code) }}">
                <x-input-label for="slug" :value="__('attribute.slug')" />
                <x-text-input id="slug" name="slug" :value="old('slug', $page->slug)" />
                <x-input-error field="slug" />
            </div>
        @endif

        <div class="mb-4">
            <x-input-label for="content" :value="__('attribute.content')" />
            <textarea id="content" name="content" rows="10" class="form-control tinymce">{{ $page->getTranslation($code)->content }}</textarea>
            <x-input-error field="content" />
        </div>
        <div class="mb-4 {{ hideDivLang($code) }}">
            <x-input-switch name="status" :label="__('attribute.status')" :checked="$page->status"/>
            <x-input-error field="status" />
        </div>

        <x-slot name="footer">
            <x-admin.button-update />
        </x-slot>

    </x-card>
</form>
@endsection

@push('js')
<script src="{{ asset('admin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
@endpush
