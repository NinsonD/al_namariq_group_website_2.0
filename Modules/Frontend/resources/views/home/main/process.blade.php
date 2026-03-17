@extends('core::layout.app')

@section('title', __('section.home_main_process_section'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_main_sections'), 'url' => route('admin.home_main.index')],
        ['label' => __('section.home_main_process_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_main.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_main.update_process_section', ['slug' => $section->slug, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_main_process_section')" :route="route('admin.home_main.index')" btnType="back">
            <div class="row gy-5 mb-5">

                <div class="col-md-12">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="title" />
                </div>
                <div class="{{ str_contains(hideDivLang($code),'d-none') ? 'col-md-12' : 'col-md-6' }}">
                    <x-input-label for="btn_text" :value="__('attribute.btn_text')" />
                    <x-text-input id="btn_text" name="btn_text" :value="$section?->getTranslation($code)?->content?->btn_text ?? ''"/>
                    <x-input-error field="btn_text" />
                </div>
                <div class="col-md-6 {{ hideDivLang($code) }}">
                    <x-input-label for="btn_url" :value="__('attribute.btn_url')" />
                    <x-text-input id="btn_url" name="btn_url" :value="$section?->default_content?->btn_url ?? ''"/>
                    <x-input-error field="btn_url" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-5">
                        <x-input-label for="process_title_1" :value="__('attribute.process_title_1')" />
                        <x-text-input id="process_title_1" name="process_title_1" :value="$section?->getTranslation($code)?->content?->process_title_1 ?? ''"/>
                        <x-input-msg />
                        <x-input-error field="process_title_1" />
                    </div>
                    <div class="mb-5">
                        <x-input-label for="process_description_1" :value="__('attribute.process_description_1')" />
                        <x-textarea id="process_description_1" rows="4" name="process_description_1" :value="$section?->getTranslation($code)?->content?->process_description_1 ?? ''" />
                        <x-input-error field="process_description_1" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-5">
                        <x-input-label for="process_title_2" :value="__('attribute.process_title_2')" />
                        <x-text-input id="process_title_2" name="process_title_2" :value="$section?->getTranslation($code)?->content?->process_title_2 ?? ''"/>
                        <x-input-msg />
                        <x-input-error field="process_title_2" />
                    </div>
                    <div class="mb-5">
                        <x-input-label for="process_description_2" :value="__('attribute.process_description_2')" />
                        <x-textarea id="process_description_2" rows="4" name="process_description_2" :value="$section?->getTranslation($code)?->content?->process_description_2 ?? ''" />
                        <x-input-error field="process_description_2" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-5">
                        <x-input-label for="process_title_3" :value="__('attribute.process_title_3')" />
                        <x-text-input id="process_title_3" name="process_title_3" :value="$section?->getTranslation($code)?->content?->process_title_3 ?? ''"/>
                        <x-input-msg />
                        <x-input-error field="process_title_3" />
                    </div>
                    <div class="mb-5">
                        <x-input-label for="process_description_3" :value="__('attribute.process_description_3')" />
                        <x-textarea id="process_description_3" rows="4" name="process_description_3" :value="$section?->getTranslation($code)?->content?->process_description_3 ?? ''" />
                        <x-input-error field="process_description_3" />
                    </div>
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
