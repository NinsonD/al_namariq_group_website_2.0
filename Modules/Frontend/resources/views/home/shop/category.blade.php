@extends('core::layout.app')

@section('title', __('section.home_shop_category_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_shop_sections'), 'url' => route('admin.home_shop.index')],
        ['label' => __('section.home_shop_category_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_shop.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_shop.update_category_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_shop_category_section')" :route="route('admin.home_shop.index')" btnType="back">
            <div class="row gy-5">

                @php
                    $categories = \Modules\Shop\Models\ProductCategory::with('translations')->active()->get();
                    $selectedCategories = is_null($section?->default_content?->categories) ? [] : json_decode($section?->default_content?->categories);
                    $big_category = $section?->default_content?->big_category ?? null;
                @endphp

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="big_category" :value="__('attribute.big_category')" />
                    <select class="form-control conca-select2" name="big_category" id="big_category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $big_category ? 'selected' : '' }}>{{ Str::limit($category->title, 30, '...') }}</option>
                        @endforeach
                    </select>
                    <x-input-error field="big_category" />
                </div>

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="categories" :value="__('attribute.categories')" />
                    <select class="form-control conca-select2" name="categories[]" id="categories" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }}>{{ Str::limit($category->title, 30, '...') }}</option>
                        @endforeach
                    </select>
                    <x-input-error field="categories" />
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
