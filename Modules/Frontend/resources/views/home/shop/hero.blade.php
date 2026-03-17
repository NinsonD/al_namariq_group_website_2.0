@extends('core::layout.app')

@section('title', __('section.home_shop_hero_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_shop_sections'), 'url' => route('admin.home_shop.index')],
        ['label' => __('section.home_shop_hero_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_shop.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_shop.update_hero_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_shop_hero_section')" :route="route('admin.home_shop.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-12">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-error field="title" />
                </div>

                @php
                    $sliders = \Modules\Frontend\Models\Slider::with('translations')->active()->get();
                    $selectedsliders = is_null($section?->default_content?->sliders) ? [] : json_decode($section?->default_content?->sliders);
                @endphp

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="sliders" :value="__('attribute.sliders')" />
                    <select class="form-control conca-select2" name="sliders[]" id="sliders" multiple>
                        @foreach ($sliders as $slider)
                            <option value="{{ $slider->id }}" {{ in_array($slider->id, $selectedsliders) ? 'selected' : '' }}>{{ Str::limit($slider->title, 30, '...') }}</option>
                        @endforeach
                    </select>
                    <x-input-error field="sliders" />
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
