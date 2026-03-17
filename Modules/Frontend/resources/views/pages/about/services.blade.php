@extends('core::layout.app')

@section('title', __('section.about_page_services_section'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.about_page_sections'), 'url' => route('admin.about_page.index')],
        ['label' => __('section.about_page_services_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.about_page.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.about_page.update_services_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.about_page_services_section')" :route="route('admin.about_page.index')" btnType="back">
            <div class="row gy-5">

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
                    <x-input-label for="description" :value="__('attribute.description')" />
                    <textarea id="description" name="description" rows="6" class="form-control">{{ old('description', $section?->getTranslation($code)?->content?->description) }}</textarea>
                    <x-input-error field="description" />
                </div>

                @php
                    $services = \Modules\Service\Models\Service::active()->get();
                    $selectedServices = is_null($section?->default_content?->services) ? [] : json_decode($section?->default_content?->services);

                @endphp

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="services" :value="__('attribute.services')" />
                    <select class="form-control conca-select2" name="services[]" id="services" multiple>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ in_array($service->id, $selectedServices) ? 'selected' : '' }}>{{ $service->getTranslation(getDefaultLocale())?->title }}</option>
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
