@extends('core::layout.app')

@section('title', __('section.home_main_hero_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_main_sections'), 'url' => route('admin.home_main.index')],
        ['label' => __('section.home_main_hero_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_main.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_main.update_hero_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_main_hero_section')" :route="route('admin.home_main.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="main_image" :label="__('attribute.main_image')"  :value="$section?->default_content?->main_image ?? ''" />
                    <x-input-error field="main_image" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="bg_image" :label="__('attribute.bg_image')"  :value="$section?->default_content?->bg_image ?? ''"/>
                    <x-input-error field="bg_image" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="say_hi_image" :label="__('attribute.say_hi_image')"  :value="$section?->default_content?->say_hi_image ?? ''"/>
                    <x-input-error field="say_hi_image" />
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
                <div class="col-md-4">
                    <x-input-label for="btn_text" :value="__('attribute.btn_text')" />
                    <x-text-input id="btn_text" name="btn_text" :value="$section?->getTranslation($code)?->content?->btn_text ?? ''"/>
                    <x-input-error field="btn_text" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-input-label for="btn_url" :value="__('attribute.btn_url')" />
                    <x-text-input id="btn_url" name="btn_url" :value="$section?->default_content?->btn_url ?? ''"/>
                    <x-input-error field="btn_url" />
                </div>
                <div class="col-md-4">
                    <x-input-label for="say_hi_title" :value="__('attribute.say_hi_title')" />
                    <x-text-input id="say_hi_title" name="say_hi_title" :value="$section?->getTranslation($code)?->content?->say_hi_title ?? ''"/>
                    <x-input-error field="say_hi_title" />
                </div>

                <div class="col-md-4">
                    <x-input-label for="counter_title_1" :value="__('attribute.counter_title_1')" />
                    <x-text-input id="counter_title_1" name="counter_title_1" :value="$section?->getTranslation($code)?->content?->counter_title_1 ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="counter_title_1" />
                </div>

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-input-label for="counter_number_1" :value="__('attribute.counter_number_1')" />
                    <x-text-input type="number" id="counter_number_1" name="counter_number_1" :value="$section?->default_content?->counter_number_1 ?? ''"/>
                    <x-input-error field="counter_number_1" />
                </div>

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-input-label for="counter_unit_1" :value="__('attribute.counter_unit_1')" />
                    <x-text-input id="counter_unit_1" name="counter_unit_1" :value="$section?->default_content?->counter_unit_1 ?? ''"/>
                    <x-input-error field="counter_unit_1" />
                </div>

                <div class="col-md-4">
                    <x-input-label for="counter_title_2" :value="__('attribute.counter_title_2')" />
                    <x-text-input id="counter_title_2" name="counter_title_2" :value="$section?->getTranslation($code)?->content?->counter_title_2 ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="counter_title_2" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-input-label for="counter_number_2" :value="__('attribute.counter_number_2')" />
                    <x-text-input type="number" id="counter_number_2" name="counter_number_2" :value="$section?->default_content?->counter_number_2 ?? ''"/>
                    <x-input-error field="counter_number_2" />
                </div>

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-input-label for="counter_unit_2" :value="__('attribute.counter_unit_2')" />
                    <x-text-input id="counter_unit_2" name="counter_unit_2" :value="$section?->default_content?->counter_unit_2 ?? ''"/>
                    <x-input-error field="counter_unit_2" />
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
