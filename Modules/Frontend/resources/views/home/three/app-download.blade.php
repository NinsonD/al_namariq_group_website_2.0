@extends('core::layout.app')

@section('title', __('section.home_three_app_download_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_three_sections'), 'url' => route('admin.home_three.index')],
        ['label' => __('section.home_three_app_download_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_three.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_three.update_app_download_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_three_app_download_section')" :route="route('admin.home_three.index')" btnType="back">
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
                    <x-image-uploader name="btn_icon_1" :label="__('attribute.btn_icon_1')"  :value="$section?->default_content?->btn_icon_1 ?? ''" />
                    <x-input-error field="btn_icon_1" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="btn_icon_2" :label="__('attribute.btn_icon_2')"  :value="$section?->default_content?->btn_icon_2 ?? ''" />
                    <x-input-error field="btn_icon_2" />
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

                 <div class="col-md-6">
                    <x-input-label for="btn_text_1" :value="__('attribute.btn_text_1')" />
                    <x-text-input id="btn_text_1" name="btn_text_1" :value="$section?->getTranslation($code)?->content?->btn_text_1 ?? ''"/>
                    <x-input-error field="btn_text_1" />
                </div>
                <div class="col-md-6 {{ hideDivLang($code) }}">
                    <x-input-label for="btn_url_1" :value="__('attribute.btn_url_1')" />
                    <x-text-input id="btn_url_1" name="btn_url_1" :value="$section?->default_content?->btn_url_1 ?? ''"/>
                    <x-input-error field="btn_url_1" />
                </div>

                 <div class="col-md-6">
                    <x-input-label for="btn_text_2" :value="__('attribute.btn_text_2')" />
                    <x-text-input id="btn_text_2" name="btn_text_2" :value="$section?->getTranslation($code)?->content?->btn_text_2 ?? ''"/>
                    <x-input-error field="btn_text_2" />
                </div>
                <div class="col-md-6 {{ hideDivLang($code) }}">
                    <x-input-label for="btn_url_2" :value="__('attribute.btn_url_2')" />
                    <x-text-input id="btn_url_2" name="btn_url_2" :value="$section?->default_content?->btn_url_2 ?? ''"/>
                    <x-input-error field="btn_url_2" />
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
