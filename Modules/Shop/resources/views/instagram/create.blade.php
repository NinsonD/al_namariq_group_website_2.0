@extends('core::layout.app')

@section('title', __('admin.add_instagram'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.instagram'), 'url' => route('admin.instagram.index')],
        ['label' => __('admin.add_instagram')]
    ]
])
@endsection

@section('content')
@can('instagram-create')
<form action="{{ route('admin.instagram.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_instagram')" :route="route('admin.instagram.index')" btnType="back">

        <div class="row gy-5 mb-5">
            <div class="col-md-12">
                <x-image-uploader name="image" :label="__('attribute.image')" />
                <x-input-error field="image" />
            </div>
            <div class="col-md-12">
                <x-input-label for="link" :value="__('attribute.link')" />
                <x-text-input id="link" name="link" :value="old('link')"/>
                <x-input-error field="link" />
            </div>
        </div>

        <div class="mb-4">
            <x-input-switch name="status" :label="__('attribute.status')" checked="true" />
            <x-input-error field="status" />
        </div>

        <x-slot name="footer">
            <x-admin.button-add />
        </x-slot>

    </x-card>
</form>
@endcan
@endsection

