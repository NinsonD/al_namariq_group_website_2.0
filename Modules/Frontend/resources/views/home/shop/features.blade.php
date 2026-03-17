@extends('core::layout.app')

@section('title', __('section.home_shop_features_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_shop_sections'), 'url' => route('admin.home_shop.index')],
        ['label' => __('section.home_shop_features_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_shop.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_shop.update_features_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_shop_features_section')" :route="route('admin.home_shop.index')" btnType="back">
            <div class="row gy-5 mb-5">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="col-md-4 {{ hideDivLang($code) }}">
                        <x-image-uploader name="icon_{{ $i }}" :label="__('attribute.icon_' . $i)"  :value="$section?->default_content?->{'icon_' . $i} ?? ''" />
                        <x-input-error field="icon_{{ $i }}" />
                    </div>
                @endfor
            </div>
            <div class="row gy-5">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="col-md-12">
                        <x-input-label :for="'feature_title_' . $i" :value="__('attribute.feature_title_' . $i)" />
                        <x-text-input
                            :id="'feature_title_' . $i"
                            :name="'feature_title_' . $i"
                            :value="$section?->getTranslation($code)?->content?->{'feature_title_' . $i} ?? ''"
                        />
                        <x-input-msg />
                        <x-input-error :field="'feature_title_' . $i" />
                    </div>

                    <div class="col-md-12">
                        <x-input-label :for="'feature_description_' . $i" :value="__('attribute.feature_description_' . $i)" />
                        <x-textarea
                            :id="'feature_description_' . $i"
                            :name="'feature_description_' . $i"
                            :value="$section?->getTranslation($code)?->content?->{'feature_description_' . $i} ?? ''"
                            rows="7"
                        />
                        <x-input-msg />
                        <x-input-error :field="'feature_description_' . $i" />
                    </div>
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
