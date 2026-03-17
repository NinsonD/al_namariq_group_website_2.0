@extends('core::layout.app')

@section('title', __('section.home_five_about_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_five_sections'), 'url' => route('admin.home_five.index')],
        ['label' => __('section.home_five_about_section')]
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

        <x-card :heading="__('section.home_five_about_section')" :route="route('admin.home_five.index')" btnType="back">

            <div class="row gy-5">
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="main_image" :label="__('attribute.main_image')"  :value="$section?->default_content?->main_image ?? ''" />
                    <x-input-error field="main_image" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="people_image" :label="__('attribute.people_image')"  :value="$section?->default_content?->people_image ?? ''" />
                    <x-input-error field="people_image" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="shape" :label="__('attribute.shape')"  :value="$section?->default_content?->shape ?? ''" />
                    <x-input-error field="shape" />
                </div>
            </div>
            <div class="row gy-5 mb-6">
                <div class="col-md-6">
                    <x-input-label for="subtitle" :value="__('attribute.subtitle')" />
                    <x-text-input id="subtitle" name="subtitle" :value="$section?->getTranslation($code)?->content?->subtitle ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="subtitle" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="title" />
                </div>
                <div class="col-md-12">
                    <x-input-label for="description" :value="__('attribute.description')" />
                    <x-textarea id="description" rows="4" name="description" :value="$section?->getTranslation($code)?->content?->description ?? ''" />
                    <x-input-error field="description" />
                </div>
                <div class="{{ str_contains(hideDivLang($code), ' d-none') ? 'col-md-6' : 'col-md-4' }}">
                    <x-input-label for="counter_title_1" :value="__('attribute.counter_title_1')" />
                    <x-text-input id="counter_title_1" name="counter_title_1" :value="$section?->getTranslation($code)?->content?->counter_title_1 ?? ''"/>
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
                <div class="{{ str_contains(hideDivLang($code), ' d-none') ? 'col-md-6' : 'col-md-4' }}">
                    <x-input-label for="counter_title_2" :value="__('attribute.counter_title_2')" />
                    <x-text-input id="counter_title_2" name="counter_title_2" :value="$section?->getTranslation($code)?->content?->counter_title_2 ?? ''"/>
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

            <div class="row gy-5">
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
