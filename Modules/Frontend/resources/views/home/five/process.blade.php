@extends('core::layout.app')

@section('title', __('section.home_five_process_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_five_sections'), 'url' => route('admin.home_five.index')],
        ['label' => __('section.home_five_process_section')]
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

        <x-card :heading="__('section.home_five_process_section')" :route="route('admin.home_five.index')" btnType="back">

            <div class="row gy-6">

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

                @for ($i = 1; $i <= 4; $i++)
                    <div class="col-md-4">
                        {{-- Process Title --}}
                        <div class="mb-5">
                            <x-input-label for="process_title_{{ $i }}" :value="__('attribute.process_title_' . $i)" />
                            <x-text-input
                                id="process_title_{{ $i }}"
                                name="process_title_{{ $i }}"
                                :value="$section?->getTranslation($code)?->content?->{'process_title_' . $i} ?? ''"
                            />
                            <x-input-msg />
                            <x-input-error field="process_title_{{ $i }}" />
                        </div>

                        {{-- Process Number --}}
                        <div class="mb-5">
                            <x-input-label for="process_number_{{ $i }}" :value="__('attribute.process_number_' . $i)" />
                            <x-text-input
                                id="process_number_{{ $i }}"
                                name="process_number_{{ $i }}"
                                :value="$section?->default_content?->{'process_number_' . $i} ?? ''"
                            />
                            <x-input-error field="process_number_{{ $i }}" />
                        </div>

                        {{-- Process Description --}}
                        <div class="mb-5">
                            <x-input-label for="process_description_{{ $i }}" :value="__('attribute.process_description_' . $i)" />
                            <x-textarea
                                id="process_description_{{ $i }}"
                                rows="4"
                                name="process_description_{{ $i }}"
                                :value="$section?->getTranslation($code)?->content?->{'process_description_' . $i} ?? ''"
                            />
                            <x-input-error field="process_description_{{ $i }}" />
                        </div>
                    </div>
                @endfor
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
