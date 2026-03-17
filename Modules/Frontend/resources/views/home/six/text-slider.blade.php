@extends('core::layout.app')

@section('title', __('section.home_six_text_slider_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_six_sections'), 'url' => route('admin.home_six.index')],
        ['label' => __('section.home_six_text_slider_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_six.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_six.update_section', ['slug' => $section->slug, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-card :heading="__('section.home_six_text_slider_section')" :route="route('admin.home_six.index')" btnType="back">

            <div class="row gy-5">

                <div class="col-md-12">
                    <x-input-label for="slider_content_1" :value="__('attribute.slider_content_1')" />
                    <x-textarea id="slider_content_1" rows="4" name="slider_content_1" :value="$section?->getTranslation($code)?->content?->slider_content_1 ?? ''" />
                    <x-input-error field="slider_content_1" />
                </div>
                <div class="col-md-12">
                    <x-input-label for="slider_content_2" :value="__('attribute.slider_content_2')" />
                    <x-textarea id="slider_content_2" rows="4" name="slider_content_2" :value="$section?->getTranslation($code)?->content?->slider_content_2 ?? ''" />
                    <x-input-error field="slider_content_2" />
                </div>

                <div class="row mt-6">
                    <div class="col-12">
                        <x-input-switch name="status" :label="__('attribute.status')" :checked="$section?->status" />
                        <x-input-error field="status" />
                    </div>
                </div>
            </div>

            <x-slot name="footer">
                <x-admin.button-update />
            </x-slot>

        </x-card>
    </form>
</div>

@endsection
