@extends('core::layout.app')

@section('title', __('section.home_three_brand_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_three_sections'), 'url' => route('admin.home_three.index')],
        ['label' => __('section.home_three_brand_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_three.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_three.update_brand_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_three_brand_section')" :route="route('admin.home_three.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-12">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-error field="title" />
                </div>

                @php
                    $brands = \Modules\Brand\Models\Brand::with(['translations'])->active()->get();
                    $selectedBrands = is_null($section?->default_content?->brands) ? [] : json_decode($section?->default_content?->brands);
                @endphp

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="brands" :value="__('attribute.brands')" />
                    <select class="form-control conca-select2" name="brands[]" id="brands" multiple>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ in_array($brand->id, $selectedBrands) ? 'selected' : '' }}>{{ $brand->title }}</option>
                        @endforeach
                    </select>
                    <x-input-error field="brands" />
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
