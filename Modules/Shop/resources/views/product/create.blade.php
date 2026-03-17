@extends('core::layout.app')

@section('title', __('admin.add_product'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.products'), 'url' => route('admin.product.index')],
        ['label' => __('admin.add_product')]
    ]
])
@endsection

@section('content')
@can('product-create')
<form id="product-add-form" class="app-content-pb-0" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_product')" :route="route('admin.product.index')" btnType="back">
        <div class="row gy-5 mb-5">
            <div class="col-md-12">
                <x-image-uploader name="image" :label="__('attribute.image')" />
                <x-input-error field="image" />
            </div>
            <div class="col-md-6">
                <x-input-label for="title" :value="__('attribute.title')" />
                <x-text-input id="title" name="title" :value="old('title')"/>
                <x-input-error field="title" />
            </div>
            <div class="col-md-6">
                <x-input-label for="slug" :value="__('attribute.slug')" />
                <x-text-input id="slug" name="slug" :value="old('slug')"/>
                <x-input-error field="slug" />
            </div>

            <div class="col-md-6">
                <x-input-label for="price" :value="__('attribute.price')" />
                <x-text-input id="price" class="price-field" name="price" type="number" step=".01" :value="old('price')"/>
                <x-input-error field="price" />
            </div>
            <div class="col-md-6">
                <x-input-label for="sale_price" :value="__('attribute.sale_price')" />
                <x-text-input id="sale_price" class="price-field" name="sale_price" type="number" step=".01" :value="old('sale_price')"/>
                <x-input-error field="sale_price" />
            </div>

             <div class="col-md-4">
                <div class="">
                    <x-input-label for="sku" :value="__('attribute.sku')" />
                    -
                    <button type="button" class="generate-sku-btn text-success">({{ __('admin.generate_sku') }})</button>
                </div>
                <x-text-input id="sku" name="sku" :value="old('sku')"/>
                <x-input-error field="sku" />
            </div>

            <div class="col-md-4">
                <x-input-label for="quantity" :value="__('attribute.quantity')" />
                <x-text-input class="quantity-field" id="quantity" name="qty" type="number" :value="old('qty', 1)"/>
                <x-input-error field="quantity" />
            </div>

            <div class="col-md-4">
                <x-input-label for="product_category_id" :value="__('attribute.category')" />
                <select name="product_category_id" id="product_category_id" class="form-select conca-select2">
                    <option value="">{{ __('admin.select_category') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('product_category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
                <x-input-error field="product_category_id" />
            </div>

            <div class="col-md-12">
                <x-input-label for="short_description"  :value="__('attribute.short_description')" />
                <x-textarea name="short_description" id="short_description" rows="7" :value="old('short_description')" />
                <x-input-error field="short_description" />
            </div>

            <div class="col-md-12">
                <x-input-label for="description" :value="__('attribute.description')" />
                <textarea  id="description" name="description" rows="7" class="form-control tinymce">{{ old('description') }}</textarea>
                <x-input-error field="description" />
            </div>


            <div class="col-md-12 ">
                <x-input-label for="tags" :value="__('attribute.tags')" />
                <input id="tagifyBasic" class="form-control" name="tags" value="{{ old('tags') }}" />
                <x-input-error field="tags" />
            </div>

            <div class="col-md-12">
                <x-input-label for="seo_title" :value="__('attribute.seo_title')" />
                <x-text-input id="seo_title" name="seo_title" :value="old('seo_title')"/>
                <x-input-error field="seo_title" />
            </div>

            <div class="col-md-12">
                <x-input-label for="seo_description" :value="__('attribute.seo_description')" />
                <x-textarea name="seo_description" id="seo_description" rows="7" :value="old('seo_description')" />
                <x-input-error field="seo_description" />
            </div>

            <div class="d-flex flex-wrap aliign-items-center gap-8 mb-5">
                <div class="mb-5">
                    <x-input-switch name="is_popular" :label="__('attribute.set_as_popular')" :checked="old('is_popular', false)" />
                </div>

                <div class="mb-5">
                    <x-input-switch name="is_new" :label="__('attribute.set_as_new')" :checked="old('is_new', false)" />
                </div>
                <div class="mb-5">
                    <x-input-switch name="status" :label="__('attribute.status')" :checked="old('status', false)" />
                </div>
            </div>
            <div class="col-md-12">
                <h5>{{ __('attribute.additional_information') }}</h5>
                <div class="form-repeater">
                    <div data-repeater-list="additional_information">
                        <div data-repeater-item class="mb-6">
                            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-5 align-items-end">
                                <div class="col">
                                    <x-input-label for="key" :value="__('attribute.key')" />
                                    <x-text-input id="key" name="key" />
                                </div>
                                <div class="col">
                                    <x-input-label for="value" :value="__('attribute.value')" />
                                    <x-text-input id="value" name="value" />
                                </div>
                                <div class="col d-flex align-items-end">
                                    <button class="btn btn-label-danger gap-1" type="button" data-repeater-delete>
                                        <svg width="12" height="12" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 0.999939L1 14.9999M1 0.999939L15 14.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ __('admin.delete') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <button class="btn btn-sm btn-label-primary" type="button" data-repeater-create>{{ __('admin.add_new') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <x-admin.button-add />
        </x-slot>

    </x-card>




</form>
@endcan
@endsection


@push('css')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/tagify/tagify.css') }}" />
@endpush

@push('js')
<script src="{{ asset('admin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/tagify/tagify.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
<script>
    'use strict';
    $(function(){
        const tagifyBasicEl = document.querySelector('#tagifyBasic');
        const TagifyBasic = new Tagify(tagifyBasicEl);

        $('.form-repeater').repeater({
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if(confirm("{{ __('admin.are_your_sure_delete') }}")) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
    })
</script>

@endpush
