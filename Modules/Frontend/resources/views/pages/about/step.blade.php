@extends('core::layout.app')

@section('title', __('section.about_page_step_section'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.about_page_sections'), 'url' => route('admin.about_page.index')],
        ['label' => __('section.about_page_step_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.about_page.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.about_page.update_step_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.about_page_step_section')" :route="route('admin.about_page.index')" btnType="back">
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
                        <div class="border-bottom mt-5 mb-3"></div>
                </div>


                @for ($i = 1; $i <= 4; $i++)

                    <div class="col-md-12">
                        <x-input-label
                            :for="'step_title_' . $i"
                            :value="__('attribute.step_title_' . $i)"
                        />
                        <x-text-input
                            :id="'step_title_' . $i"
                            :name="'step_title_' . $i"
                            :value="$section?->getTranslation($code)?->content?->{'step_title_' . $i} ?? ''"
                        />
                        <x-input-error :field="'step_title_' . $i" />
                    </div>

                    <div class="col-md-12">
                        <x-input-label
                            :for="'step_description_' . $i"
                            :value="__('attribute.step_description_' . $i)"
                        />
                        <x-textarea
                            :id="'step_description_' . $i"
                            :name="'step_description_' . $i"
                            :value="$section?->getTranslation($code)?->content?->{'step_description_' . $i} ?? ''"
                            rows="7"
                        />
                        <x-input-error :field="'step_description_' . $i" />
                    </div>
                    @if ($i < 4)
                    <div class="col-md-12">
                        <div class="border-bottom mt-5 mb-3"></div>
                    </div>
                    @endif

                @endfor

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
