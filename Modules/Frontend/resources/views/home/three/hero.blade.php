@extends('core::layout.app')

@section('title', __('section.home_three_hero_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_three_sections'), 'url' => route('admin.home_three.index')],
        ['label' => __('section.home_three_hero_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_three.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_three.update_hero_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_three_hero_section')" :route="route('admin.home_three.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="main_image" :label="__('attribute.main_image')"  :value="$section?->default_content?->main_image ?? ''" />
                    <x-input-error field="main_image" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="main_image_bg" :label="__('attribute.main_image_bg')"  :value="$section?->default_content?->main_image_bg ?? ''" />
                    <x-input-error field="main_image_bg" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="bg_image" :label="__('attribute.bg_image')"  :value="$section?->default_content?->bg_image ?? ''" />
                    <x-input-error field="bg_image" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="bg_image_2" :label="__('attribute.bg_image_2')"  :value="$section?->default_content?->bg_image_2 ?? ''"/>
                    <x-input-error field="bg_image_2" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="app_image" :label="__('attribute.app_image')"  :value="$section?->default_content?->app_image ?? ''"/>
                    <x-input-error field="app_image" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="btn_icon" :label="__('attribute.btn_icon')"  :value="$section?->default_content?->btn_icon ?? ''"/>
                    <x-input-error field="btn_icon" />
                </div>

                @for ($i = 1; $i <= 5; $i++)
                    <div class="col-md-4 {{ hideDivLang($code) }}">
                        <x-image-uploader
                            :name="'shape_' . $i"
                            :label="__('attribute.shape_' . $i)"
                            :value="$section?->default_content?->{'shape_' . $i} ?? ''"
                        />
                        <x-input-error :field="'shape_' . $i" />
                    </div>
                @endfor


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
                    <x-input-label for="app_title" :value="__('attribute.app_title')" />
                    <x-text-input id="app_title" name="app_title" :value="$section?->getTranslation($code)?->content?->app_title ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="app_title" />
                </div>
                <div class="col-md-12">
                    <x-input-label for="description" :value="__('attribute.description')" />
                    <x-textarea id="description" name="description" :value="$section?->getTranslation($code)?->content?->description ?? ''" rows="7"/>
                    <x-input-msg />
                    <x-input-error field="description" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="btn_text" :value="__('attribute.btn_text')" />
                    <x-text-input id="btn_text" name="btn_text" :value="$section?->getTranslation($code)?->content?->btn_text ?? ''"/>
                    <x-input-error field="btn_text" />
                </div>
                <div class="col-md-6 {{ hideDivLang($code) }}">
                    <x-input-label for="btn_url" :value="__('attribute.btn_url')" />
                    <x-text-input id="btn_url" name="btn_url" :value="$section?->default_content?->btn_url ?? ''"/>
                    <x-input-error field="btn_url" />
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
