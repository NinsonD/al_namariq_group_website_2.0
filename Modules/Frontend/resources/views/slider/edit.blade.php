@extends('core::layout.app')

@section('title', __('admin.edit_slider'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.slider'), 'url' => route('admin.slider.index')],
        ['label' => __('admin.edit_slider')]
    ]
])
@endsection

@section('content')


@php
    $code = request()->get('code', 'en');
@endphp

<x-admin.language-nav route="admin.slider.edit" :params="['slider' => $slider->id, 'code' => $code]" />

<form action="{{ route('admin.slider.update', ['slider' => $slider->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-card :heading="__('admin.edit_slider')" :route="route('admin.slider.index')" btnType="back">


        <div class="row gy-6 mb-6">
            <div class="col-md-4">
                <x-image-uploader name="image" :label="__('attribute.image')" :value="$slider->image" />
                <x-input-error field="image" />
            </div>
            <div class="col-md-4">
                <x-image-uploader name="nav_image" :label="__('attribute.nav_image')" :value="$slider->nav_image" />
                <x-input-error field="nav_image" />
            </div>
        </div>
        <div class="row gy-6  mb-6">
            <div class="col-md-6">
                <x-input-label for="title" :value="__('attribute.title')" />
                <x-text-input id="title" name="title" :value="old('title', $slider->getTranslation($code)->title)" />
                <x-input-error field="title" />
            </div>
            <div class="col-md-6">
                <x-input-label for="subtitle" :value="__('attribute.subtitle')" />
                <x-text-input id="subtitle" name="subtitle" :value="old('subtitle', $slider->getTranslation($code)->subtitle)" />
                <x-input-error field="subtitle" />
            </div>
            <div class="col-md-6">
                <x-input-label for="btn_text" :value="__('attribute.btn_text')" />
                <x-text-input id="btn_text" name="btn_text" :value="old('btn_text', $slider->getTranslation($code)->btn_text)" />
                <x-input-error field="btn_text" />
            </div>
            <div class="col-md-6">
                <x-input-label for="btn_link" :value="__('attribute.btn_link')" />
                <x-text-input id="btn_link" name="btn_link" :value="old('btn_link', $slider->btn_link)" />
                <x-input-error field="btn_link" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <x-input-switch name="status" :label="__('attribute.status')" :checked="$slider->status"/>
                <x-input-error field="status" />
            </div>
        </div>

        <x-slot name="footer">
            <x-admin.button-update />
        </x-slot>

    </x-card>
</form>
@endsection
