@extends('core::layout.app')

@section('title', __('section.home_six_funfact_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_six_sections'), 'url' => route('admin.home_six.index')],
        ['label' => __('section.home_six_funfact_section')]
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

        <x-card :heading="__('section.home_six_funfact_section')" :route="route('admin.home_six.index')" btnType="back">

            <div class="row gy-5">

                @for ($i = 1; $i <= 4; $i++)
                    {{-- Fact Subtitle --}}
                    <div class="col-md-3">
                        <x-input-label for="fact_subtitle_{{ $i }}" :value="__('attribute.fact_subtitle_' . $i)" />
                        <x-text-input
                            id="fact_subtitle_{{ $i }}"
                            name="fact_subtitle_{{ $i }}"
                            :value="$section?->getTranslation($code)?->content?->{'fact_subtitle_' . $i} ?? ''"
                        />
                        <x-input-error field="fact_subtitle_{{ $i }}" />
                    </div>

                    {{-- Fact Title --}}
                    <div class="col-md-3 ">
                        <x-input-label for="fact_title_{{ $i }}" :value="__('attribute.fact_title_' . $i)" />
                        <x-text-input
                            id="fact_title_{{ $i }}"
                            name="fact_title_{{ $i }}"
                            :value="$section?->getTranslation($code)?->content?->{'fact_title_' . $i} ?? ''"
                        />
                        <x-input-error field="fact_title_{{ $i }}" />
                    </div>

                    {{-- Fact Number --}}
                    <div class="col-md-3 {{ hideDivLang($code) }}">
                        <x-input-label for="fact_number_{{ $i }}" :value="__('attribute.fact_number_' . $i)" />
                        <x-text-input
                            id="fact_number_{{ $i }}"
                            name="fact_number_{{ $i }}"
                            :value="$section?->default_content?->{'fact_number_' . $i} ?? ''"
                        />
                        <x-input-error field="fact_number_{{ $i }}" />
                    </div>

                    <div class="col-md-3 {{ hideDivLang($code) }}">
                        <x-input-label for="fact_unit_{{ $i }}" :value="__('attribute.fact_unit_' . $i)" />
                        <x-text-input
                            id="fact_unit_{{ $i }}"
                            name="fact_unit_{{ $i }}"
                            :value="$section?->default_content?->{'fact_unit_' . $i} ?? ''"
                        />
                        <x-input-error field="fact_unit_{{ $i }}" />
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
