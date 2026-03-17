@extends('core::layout.app')

@section('title', __('section.home_two_app_brand_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_two_sections'), 'url' => route('admin.home_two.index')],
        ['label' => __('section.home_two_app_brand_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_two.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_two.update_app_brand_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_two_app_brand_section')" :route="route('admin.home_two.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="image_1" :label="__('attribute.image_1')"  :value="$section?->default_content?->image_1 ?? ''" />
                    <x-input-error field="image_1" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="image_2" :label="__('attribute.image_2')"  :value="$section?->default_content?->image_2 ?? ''" />
                    <x-input-error field="image_2" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="image_3" :label="__('attribute.image_3')"  :value="$section?->default_content?->image_3 ?? ''" />
                    <x-input-error field="image_3" />
                </div>

                <div class="col-md-12">
                    <x-input-label for="title_1" :value="__('attribute.title_1')" />
                    <x-text-input id="title_1" name="title_1" :value="$section?->getTranslation($code)?->content?->title_1 ?? ''"/>
                    <x-input-msg/>
                    <x-input-error field="title_1" />
                </div>

                <div class="col-md-12">
                    <x-input-label for="title_2" :value="__('attribute.title_2')" />
                    <x-text-input id="title_2" name="title_2" :value="$section?->getTranslation($code)?->content?->title_2 ?? ''"/>
                    <x-input-msg/>
                    <x-input-error field="title_2" />
                </div>

                <div class="col-md-12">
                    <x-input-label for="title_3" :value="__('attribute.title_3')" />
                    <x-text-input id="title_3" name="title_3" :value="$section?->getTranslation($code)?->content?->title_3 ?? ''"/>
                    <x-input-msg/>
                    <x-input-error field="title_3" />
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
