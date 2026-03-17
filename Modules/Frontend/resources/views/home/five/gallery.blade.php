@extends('core::layout.app')

@section('title', __('section.home_five_gallery_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_five_sections'), 'url' => route('admin.home_five.index')],
        ['label' => __('section.home_five_gallery_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_five.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_five.update_section', ['slug' => $section->slug, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-card :heading="__('section.home_five_gallery_section')" :route="route('admin.home_five.index')" btnType="back">
            <div class="row gy-6 mb-6">

                @for ($i = 1; $i <= 6; $i++)
                    <div class="col-md-4 {{ hideDivLang($code) }}">
                        <x-image-uploader
                            name="image_{{ $i }}"
                            :label="__('attribute.image_' . $i)"
                            :value="$section?->default_content?->{'image_' . $i} ?? ''"
                        />
                        <x-input-error field="image_{{ $i }}" />
                    </div>
                @endfor
            </div>

            <div class="row gy-5">

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="video_url" :value="__('attribute.video_url')" />
                    <x-text-input id="video_url" name="video_url" :value="$section?->default_content?->video_url ?? ''"/>
                    <x-input-error field="video_url" />
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
