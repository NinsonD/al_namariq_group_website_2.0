@extends('core::layout.app')

@section('title', __('admin.add_price_plan'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.price_plan'), 'url' => route('admin.pricing.index')],
        ['label' => __('admin.add_price_plan')]
    ]
])
@endsection

@section('content')
<form action="{{ route('admin.pricing.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_price_plan')" :route="route('admin.pricing.index')" btnType="back">
        <div class="row row-cols-md-2 row-cols-1">
            <div class="col">
                <div class="mb-6">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="old('title')" />
                    <x-input-error field="title" />
                </div>
            </div>
            <div class="col">
                <div class="mb-6">
                    <x-input-label for="price" :value="__('attribute.price')" />
                    <x-text-input type="number" step="any" id="price" name="price" :value="old('price')" />
                    <x-input-error field="price" />
                </div>
            </div>
            <div class="col">
                <div class="mb-6">
                    <x-input-label for="serial" :value="__('attribute.serial')" />
                    <x-text-input type="number" id="serial" name="serial" :value="old('serial')" />
                    <x-input-error field="serial" />
                </div>
            </div>
            <div class="col">
                <div class="mb-6">
                    <x-input-label for="expiration" :value="__('attribute.expiration')" />
                    <select name="expiration" id="expiration" class="form-select">
                        <option value="monthly">{{ __('admin.monthly') }}</option>
                        <option value="yearly">{{ __('admin.yearly') }}</option>
                    </select>
                    <x-input-error field="expiration" />
                </div>
            </div>
        </div>


        <div class="mb-6">
            <x-input-label for="short_description" :value="__('attribute.short_description')" />
            <x-textarea name="short_description" id="short_description" rows="7" :value="old('short_description')" />
            <x-input-error field="short_description" />
        </div>
        <div class="mb-6">
            <x-input-label for="description" :value="__('attribute.description')" />
            <textarea  id="description" name="description" rows="5" class="form-control tinymce">{{ old('content') }}</textarea>
            <x-input-error field="description" />
        </div>

        <div class="row row-cols-md-2 row-cols-1">
            <div class="col">
                <div class="mb-6">
                    <x-input-label for="btn_text" :value="__('attribute.btn_text')" />
                    <x-text-input id="btn_text" name="btn_text" :value="old('btn_text')" />
                    <x-input-error field="btn_text" />
                </div>
            </div>
            <div class="col">
                <div class="mb-6">
                    <x-input-label for="btn_url" :value="__('attribute.btn_url')" />
                    <x-text-input id="btn_url" name="btn_url" :value="old('btn_url')" />
                    <x-input-error field="btn_url" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="mb-6">
                    <x-input-switch name="show_on_home" :label="__('attribute.show_on_home')" />
                    <x-input-error field="show_on_home" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-6">
                    <x-input-switch name="status" :label="__('attribute.status')" />
                    <x-input-error field="status" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-6">
                    <x-input-switch name="is_popular" :label="__('attribute.mark_as_popular')" />
                    <x-input-error field="is_popular" />
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <x-admin.button-add />
        </x-slot>

    </x-card>
</form>
@endsection


@push('js')
<script src="{{ asset('admin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
@endpush
