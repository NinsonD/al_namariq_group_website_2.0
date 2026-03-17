@extends('core::layout.app')

@section('title', __('section.home_three_pricing_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_three_sections'), 'url' => route('admin.home_three.index')],
        ['label' => __('section.home_three_pricing_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_three.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_three.update_pricing_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_three_pricing_section')" :route="route('admin.home_three.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="bg_image" :label="__('attribute.bg_image')"  :value="$section?->default_content?->bg_image ?? ''" />
                    <x-input-error field="bg_image" />
                </div>


                <div class="col-md-12">
                    <x-input-label for="subtitle" :value="__('attribute.subtitle')" />
                    <x-text-input id="subtitle" name="subtitle" :value="$section?->getTranslation($code)?->content?->subtitle ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="subtitle" />
                </div>

                <div class="col-md-12">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="title" />
                </div>
                <div class="col-md-12">
                    <x-input-label for="description" :value="__('attribute.description')" />
                    <x-textarea id="description" name="description" :value="$section?->getTranslation($code)?->content?->description ?? ''" rows="7"/>
                    <x-input-msg />
                    <x-input-error field="description" />
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
