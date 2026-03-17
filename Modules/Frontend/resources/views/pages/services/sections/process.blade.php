@extends('core::layout.app')

@section('title', __('section.services_page_process_section'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.services_page_sections'), 'url' => route('admin.services_page.index')],
        ['label' => __('section.services_page_process_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.services_page.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.services_page.update_process_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.services_page_process_section')" :route="route('admin.services_page.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="image" :label="__('attribute.image')"  :value="$section?->default_content?->image ?? ''"/>
                    <x-input-error field="image" />
                </div>

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="video_url" :value="__('attribute.video_url')" />
                    <x-text-input id="video_url" name="video_url" :value="$section?->default_content?->video_url ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="video_url" />
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
                    <x-input-msg :text="__('admin.text_shape_insert')" />
                    <x-input-error field="title" />
                </div>
                <div class="col-md-12">
                    <x-input-label for="description" :value="__('attribute.description')" />
                    <x-textarea id="description" rows="4" name="description" :value="$section?->getTranslation($code)?->content?->description ?? ''" />
                    <x-input-error field="description" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="process_title_1" :value="__('attribute.process_title_1')" />
                    <x-text-input id="process_title_1" name="process_title_1" :value="$section?->getTranslation($code)?->content?->process_title_1 ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="process_title_1" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="process_title_2" :value="__('attribute.process_title_2')" />
                    <x-text-input id="process_title_2" name="process_title_2" :value="$section?->getTranslation($code)?->content?->process_title_2 ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="process_title_2" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="process_title_3" :value="__('attribute.process_title_3')" />
                    <x-text-input id="process_title_3" name="process_title_3" :value="$section?->getTranslation($code)?->content?->process_title_3 ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="process_title_3" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="process_title_4" :value="__('attribute.process_title_4')" />
                    <x-text-input id="process_title_4" name="process_title_4" :value="$section?->getTranslation($code)?->content?->process_title_4 ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="process_title_4" />
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

@push('js')
<script src="{{ asset('admin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
@endpush
