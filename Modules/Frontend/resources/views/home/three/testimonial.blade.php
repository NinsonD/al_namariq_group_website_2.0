@extends('core::layout.app')

@section('title', __('section.home_three_testimonial_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_three_sections'), 'url' => route('admin.home_three.index')],
        ['label' => __('section.home_three_testimonial_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_three.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_three.update_testimonial_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_three_testimonial_section')" :route="route('admin.home_three.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="bg_shape" :label="__('attribute.bg_shape')"  :value="$section?->default_content?->bg_shape ?? ''" />
                    <x-input-error field="bg_shape" />
                </div>

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="shape_1" :label="__('attribute.shape_1')"  :value="$section?->default_content?->shape_1 ?? ''" />
                    <x-input-error field="shape_1" />
                </div>

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="shape_2" :label="__('attribute.shape_2')"  :value="$section?->default_content?->shape_2 ?? ''" />
                    <x-input-error field="shape_2" />
                </div>

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="brand_image" :label="__('attribute.brand_image')"  :value="$section?->default_content?->brand_image ?? ''" />
                    <x-input-error field="brand_image" />
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

                <div class="col-md-6 {{ hideDivLang($code) }}">
                    <x-input-label for="bg_rating" :value="__('attribute.bg_rating')" />
                    <x-text-input type="number" id="bg_rating" name="bg_rating" :value="$section?->getTranslation($code)?->content?->bg_rating ?? ''"/>
                    <x-input-error field="bg_rating" />
                </div>

                <div class="col-md-6">
                    <x-input-label for="rating_text" :value="__('attribute.rating_text')" />
                    <x-text-input id="rating_text" name="rating_text" :value="$section?->getTranslation($code)?->content?->rating_text ?? ''"/>
                    <x-input-error field="rating_text" />
                </div>

                <div class="{{ str_contains(hideDivLang($code), 'd-none') ? ' col-md-6' : 'col-md-12' }}">
                    <x-input-label for="rating_description" :value="__('attribute.rating_description')" />
                    <x-text-input id="rating_description" name="rating_description" :value="$section?->getTranslation($code)?->content?->rating_description ?? ''"/>
                    <x-input-error field="rating_description" />
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
