@extends('core::layout.app')

@section('title', __('section.home_two_services_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_two_sections'), 'url' => route('admin.home_two.index')],
        ['label' => __('section.home_two_services_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_two.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_two.update_services_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_two_services_section')" :route="route('admin.home_two.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-6 {{ hideDivLang($code) }}">
                    <x-image-uploader name="bg_image" :label="__('attribute.bg_image')"  :value="$section?->default_content?->bg_image ?? ''" />
                    <x-input-error field="bg_image" />
                </div>
                <div class="col-md-6 {{ hideDivLang($code) }}">
                    <x-image-uploader name="shape" :label="__('attribute.shape')"  :value="$section?->default_content?->shape ?? ''" />
                    <x-input-error field="shape" />
                </div>

                <div class="col-md-6">
                    <x-input-label for="subtitle" :value="__('attribute.subtitle')" />
                    <x-text-input id="subtitle" name="subtitle" :value="$section?->getTranslation($code)?->content?->subtitle ?? ''"/>
                    <x-input-msg/>
                    <x-input-error field="subtitle" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-msg/>
                    <x-input-error field="title" />
                </div>
                <div class="col-md-12">
                    <x-input-label for="box_title" :value="__('attribute.box_title')" />
                    <x-text-input id="box_title" name="box_title" :value="$section?->getTranslation($code)?->content?->box_title ?? ''"/>
                    <x-input-msg/>
                    <x-input-error field="box_title" />
                </div>
                <div class="col-md-12">
                    <x-input-label for="btn_text" :value="__('attribute.btn_text')" />
                    <x-text-input id="btn_text" name="btn_text" :value="$section?->getTranslation($code)?->content?->btn_text ?? ''"/>
                    <x-input-error field="btn_text" />
                </div>

                @php
                    $services = \Modules\Service\Models\Service::with(['translations'])->active()->get();
                    $selectedServices = is_null($section?->default_content?->services) ? [] : json_decode($section?->default_content?->services);
                @endphp

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="services" :value="__('attribute.services')" />
                    <select class="form-control conca-select2" name="services[]" id="services" multiple>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ in_array($service->id, $selectedServices) ? 'selected' : '' }}>{{ $service->title }}</option>
                        @endforeach
                    </select>
                    <x-input-error field="services" />
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
