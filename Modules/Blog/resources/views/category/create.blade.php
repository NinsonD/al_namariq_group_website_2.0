@extends('core::layout.app')

@section('title', __('admin.add_new_category'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.category'), 'url' => route('admin.blog-category.index')],
        ['label' => __('admin.add_new_category')]
    ]
])
@endsection

@section('content')
<form action="{{ route('admin.blog-category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_new_category')" :route="route('admin.blog-category.index')" btnType="back">

        <div class="mb-4">
            <x-input-label for="title" :value="__('attribute.title')" />
            <x-text-input id="title" name="title" :value="old('title')"/>
            <x-input-error field="title" />
        </div>
        <div class="mb-4">
            <x-input-label for="slug" :value="__('attribute.slug')" />
            <x-text-input id="slug" name="slug" :value="old('slug')"/>
            <x-input-error field="slug" />
        </div>

        <x-slot name="footer">
            <x-admin.button-add />
        </x-slot>

    </x-card>
</form>
@endsection
