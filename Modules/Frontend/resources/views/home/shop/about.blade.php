@extends('core::layout.app')

@section('title', __('section.home_shop_about_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_shop_sections'), 'url' => route('admin.home_shop.index')],
        ['label' => __('section.home_shop_about_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_shop.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_shop.update_about_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_shop_about_section')" :route="route('admin.home_shop.index')" btnType="back">
            <div class="row gy-5 mb-5 {{ hideDivLang($code) }}">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="col-md-4 {{ hideDivLang($code) }}">
                        <x-image-uploader name="image_{{ $i }}" :label="__('attribute.image_' . $i)"  :value="$section?->default_content?->{'image_' . $i} ?? ''" />
                        <x-input-error field="image_{{ $i }}" />
                    </div>
                @endfor
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="shape" :label="__('attribute.shape')"  :value="$section?->default_content?->shape ?? ''" />
                    <x-input-error field="shape" />
                </div>
            </div>
            <div class="row gy-5">
                <div class="col-md-12">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-error field="title" />
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
