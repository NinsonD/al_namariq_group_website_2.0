@extends('core::layout.app')

@section('title', __('section.home_six_services_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_six_sections'), 'url' => route('admin.home_six.index')],
        ['label' => __('section.home_six_services_section')]
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

        <x-card :heading="__('section.home_six_services_section')" :route="route('admin.home_six.index')" btnType="back">

            <div class="row gy-6 mb-6">
                @for ($i = 1; $i <= 4; $i++)
                    <div class="col-md-4 {{ hideDivLang($code) }}">
                        <x-image-uploader
                            name="service_image_{{ $i }}"
                            :label="__('attribute.service_image_' . $i)"
                            :value="$section?->default_content?->{'service_image_' . $i} ?? ''"
                        />
                        <x-input-error field="service_image_{{ $i }}" />
                    </div>
                @endfor
            </div>

            <div class="row gy-5">

                <div class="col-md-6">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-error field="title" />
                </div>

                <div class="col-md-6">
                    <x-input-label for="info_text" :value="__('attribute.info_text')" />
                    <x-text-input id="info_text" name="info_text" :value="$section?->getTranslation($code)?->content?->info_text ?? ''"/>
                    <x-input-error field="info_text" />
                </div>

                <div class="col-md-12">
                    <x-input-label for="description" :value="__('attribute.description')" />
                    <x-textarea id="description" name="description" :value="$section?->getTranslation($code)?->content?->description ?? ''" rows="7"/>
                    <x-input-msg/>
                    <x-input-error field="description" />
                </div>

                @for ($i = 1; $i <= 4; $i++)
                    <div class="col-md-6">
                        <x-input-label for="service_title_{{ $i }}" :value="__('attribute.service_title_' . $i)" />
                        <x-text-input
                            id="service_title_{{ $i }}"
                            name="service_title_{{ $i }}"
                            :value="$section?->getTranslation($code)?->content?->{'service_title_' . $i} ?? ''"
                        />
                        <x-input-error field="service_title_{{ $i }}" />
                    </div>

                    <div class="col-md-6 {{ hideDivLang($code) }}">
                        <x-input-label for="service_url_{{ $i }}" :value="__('attribute.service_url_' . $i)" />
                        <x-text-input
                            id="service_url_{{ $i }}"
                            name="service_url_{{ $i }}"
                            :value="$section?->default_content?->{'service_url_' . $i} ?? ''"
                        />
                        <x-input-error field="service_url_{{ $i }}" />
                    </div>
                @endfor


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
