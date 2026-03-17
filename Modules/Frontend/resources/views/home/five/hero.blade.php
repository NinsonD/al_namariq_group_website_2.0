@extends('core::layout.app')

@section('title', __('section.home_five_hero_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_five_sections'), 'url' => route('admin.home_five.index')],
        ['label' => __('section.home_five_hero_section')]
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

        <x-card :heading="__('section.home_five_hero_section')" :route="route('admin.home_five.index')" btnType="back">
            <div class="row">
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="title_image" :label="__('attribute.title_image')"  :value="$section?->default_content?->title_image ?? ''" />
                    <x-input-error field="title_image" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="bg_image" :label="__('attribute.bg_image')"  :value="$section?->default_content?->bg_image ?? ''" />
                    <x-input-error field="bg_image" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="quote_image" :label="__('attribute.quote_image')"  :value="$section?->default_content?->quote_image ?? ''" />
                    <x-input-error field="quote_image" />
                </div>
            </div>
            <div class="row gy-5">
                <div class="col-md-6">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="title" />
                </div>

                <div class="col-md-6 {{ hideDivLang($code) }}">
                    <x-input-label for="btn_url" :value="__('attribute.btn_url')" />
                    <x-text-input id="btn_url" name="btn_url" :value="$section?->default_content?->btn_url ?? ''"/>
                    <x-input-error field="btn_url" />
                </div>

                <div class="col-md-12">
                    <x-input-label for="description" :value="__('attribute.description')" />
                    <x-textarea id="description" rows="4" name="description" :value="$section?->getTranslation($code)?->content?->description ?? ''" />
                    <x-input-error field="description" />
                </div>

                <div class="col-md-6">
                    <x-input-label for="quote" :value="__('attribute.quote')" />
                    <x-text-input id="quote" name="quote" :value="$section?->getTranslation($code)?->content?->quote ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="quote" />
                </div>

                <div class="col-md-6">
                    <x-input-label for="quote_author" :value="__('attribute.quote_author')" />
                    <x-text-input id="quote_author" name="quote_author" :value="$section?->getTranslation($code)?->content?->quote_author ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="quote_author" />
                </div>

                <div class="col-md-6">
                    <x-input-label for="quote_btn_text" :value="__('attribute.quote_btn_text')" />
                    <x-text-input id="quote_btn_text" name="quote_btn_text" :value="$section?->getTranslation($code)?->content?->quote_btn_text ?? ''"/>
                    <x-input-error field="quote_btn_text" />
                </div>

                <div class="col-md-6 {{ hideDivLang($code) }}">
                    <x-input-label for="quote_btn_url" :value="__('attribute.quote_btn_url')" />
                    <x-text-input id="quote_btn_url" name="quote_btn_url" :value="$section?->default_content?->quote_btn_url ?? ''"/>
                    <x-input-error field="quote_btn_url" />
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
