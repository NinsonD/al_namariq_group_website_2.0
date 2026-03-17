@extends('core::layout.app')

@section('title', __('section.home_six_brand_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_six_sections'), 'url' => route('admin.home_six.index')],
        ['label' => __('section.home_six_brand_section')]
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

        <x-card :heading="__('section.home_six_brand_section')" :route="route('admin.home_six.index')" btnType="back">

            <div class="row gy-5">

                <div class="col-md-12">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="title" />
                </div>

                @php
                    $brands = \Modules\Brand\Models\Brand::with(['translations'])->active()->get();
                    $selectedbrands_top = is_null($section?->default_content?->brands_top) ? [] : json_decode($section?->default_content?->brands_top);
                    $selectedBrands_bottom = is_null($section?->default_content?->brands_bottom) ? [] : json_decode($section?->default_content?->brands_bottom);
                @endphp

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="brands_top" :value="__('attribute.brands_top')" />
                    <select class="form-control conca-select2" name="brands_top[]" id="brands_top" multiple>
                        @foreach ($brands as $brand_top)
                            <option value="{{ $brand_top->id }}" {{ in_array($brand_top->id, $selectedbrands_top) ? 'selected' : '' }}>{{ $brand_top->title }}</option>
                        @endforeach
                    </select>
                    <x-input-error field="brands_top" />
                </div>

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="brands_bottom" :value="__('attribute.brands_bottom')" />
                    <select class="form-control conca-select2" name="brands_bottom[]" id="brands_bottom" multiple>
                        @foreach ($brands as $brand_bottom)
                            <option value="{{ $brand_bottom->id }}" {{ in_array($brand_bottom->id, $selectedBrands_bottom) ? 'selected' : '' }}>{{ $brand_bottom->title }}</option>
                        @endforeach
                    </select>
                    <x-input-error field="brands_bottom" />
                </div>

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
