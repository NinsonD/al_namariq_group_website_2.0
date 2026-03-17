@extends('core::layout.app')

@section('title', __('section.home_three_dashboard_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_three_sections'), 'url' => route('admin.home_three.index')],
        ['label' => __('section.home_three_dashboard_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_three.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_three.update_dashboard_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_three_dashboard_section')" :route="route('admin.home_three.index')" btnType="back">
            <div class="row gy-5">

                @for ($i = 1; $i <= 3; $i++)
                    <div class="col-md-4 {{ hideDivLang($code) }}">
                        <x-image-uploader
                            :name="'image_' . $i"
                            :label="__('attribute.image_' . $i)"
                            :value="$section?->default_content?->{'image_' . $i} ?? ''"
                        />
                        <x-input-error :field="'image_' . $i" />
                    </div>
                @endfor

                @for ($i = 1; $i <= 9; $i++)
                    <div class="col-md-4 {{ hideDivLang($code) }}">
                        <x-image-uploader
                            :name="'shape_' . $i"
                            :label="__('attribute.shape_' . $i)"
                            :value="$section?->default_content?->{'shape_' . $i} ?? ''"
                        />
                        <x-input-error :field="'shape_' . $i" />
                    </div>
                @endfor


                @for ($i = 1; $i <= 3; $i++)
                <div class="col-md-6">
                    <x-input-label :for="'subtitle_' . $i" :value="__('attribute.subtitle_' . $i)" />
                    <x-text-input
                        :id="'subtitle_' . $i"
                        :name="'subtitle_' . $i"
                        :value="$section?->getTranslation($code)?->content?->{'subtitle_' . $i} ?? ''"
                    />
                    <x-input-msg />
                    <x-input-error :field="'subtitle_' . $i" />
                </div>

                <div class="col-md-6">
                    <x-input-label :for="'title_' . $i" :value="__('attribute.title_' . $i)" />
                    <x-text-input
                        :id="'title_' . $i"
                        :name="'title_' . $i"
                        :value="$section?->getTranslation($code)?->content?->{'title_' . $i} ?? ''"
                    />
                    <x-input-msg />
                    <x-input-error :field="'title_' . $i" />
                </div>

                <div class="col-md-12">
                    <x-input-label :for="'description_' . $i" :value="__('attribute.description_' . $i)" />
                    <x-textarea
                        :id="'description_' . $i"
                        :name="'description_' . $i"
                        :value="$section?->getTranslation($code)?->content?->{'description_' . $i} ?? ''"
                        rows="7"
                    />
                    <x-input-msg />
                    <x-input-error :field="'description_' . $i" />
                </div>

                <div class="col-md-6">
                    <x-input-label :for="'btn_text_' . $i" :value="__('attribute.btn_text_' . $i)" />
                    <x-text-input
                        :id="'btn_text_' . $i"
                        :name="'btn_text_' . $i"
                        :value="$section?->getTranslation($code)?->content?->{'btn_text_' . $i} ?? ''"
                    />
                    <x-input-error :field="'btn_text_' . $i" />
                </div>

                <div class="col-md-6 {{ hideDivLang($code) }}">
                    <x-input-label :for="'btn_url_' . $i" :value="__('attribute.btn_url_' . $i)" />
                    <x-text-input
                        :id="'btn_url_' . $i"
                        :name="'btn_url_' . $i"
                        :value="$section?->default_content?->{'btn_url_' . $i} ?? ''"
                    />
                    <x-input-error :field="'btn_url_' . $i" />
                </div>
                <div class="col-12"></div>
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
