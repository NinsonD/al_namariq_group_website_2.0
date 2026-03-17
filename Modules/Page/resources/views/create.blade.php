@extends('core::layout.app')

@section('title', __('admin.add_new_page'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.page_builder'), 'url' => route('admin.page.index')],
        ['label' => __('admin.add_new_page')]
    ]
])
@endsection

@section('content')
<form action="{{ route('admin.page.store') }}" method="POST">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_new_page')" :route="route('admin.page.index')" btnType="back">


        <div class="mb-4">
            <x-input-label for="title" :value="__('attribute.title')" />
            <x-text-input id="title" name="title" :value="old('title')"/>
            <x-input-error field="title" />
        </div>
        <div class="mb-4">
            <x-input-label for="slug" :value="__('attribute.slug')" />
            <x-text-input id="slug" name="slug" :value="old('slug')" />
            <x-input-error field="slug" />
        </div>
        <div class="mb-4">
            <x-input-label for="content" :value="__('attribute.content')" />
            <textarea id="content" name="content" rows="10" class="form-control tinymce">{{ old('content') }}</textarea>
            <x-input-error field="content" />
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

@push('js')
<script src="{{ asset('admin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
@endpush
