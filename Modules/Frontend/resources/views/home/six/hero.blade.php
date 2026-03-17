@extends('core::layout.app')

@section('title', __('section.home_six_hero_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_six_sections'), 'url' => route('admin.home_six.index')],
        ['label' => __('section.home_six_hero_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_six.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_six.update_section', ['slug' => $section->slug, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-card :heading="__('section.home_six_hero_section')" :route="route('admin.home_six.index')" btnType="back">

             <div class="row gy-6 mb-6">
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="bg_image" :label="__('attribute.bg_image')"  :value="$section?->default_content?->bg_image ?? ''" />
                    <x-input-error field="bg_image" />
                </div>

                @for ($i = 1; $i <= 7; $i++)
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

                <div class="col-md-6">
                    <x-input-label for="people_title" :value="__('attribute.people_title')" />
                    <x-text-input id="people_title" name="people_title" :value="$section?->getTranslation($code)?->content?->people_title ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="people_title" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="people_number" :value="__('attribute.people_number')" />
                    <x-text-input id="people_number" name="people_number" :value="$section?->getTranslation($code)?->content?->people_number ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="people_number" />
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
