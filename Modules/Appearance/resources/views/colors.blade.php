@extends('core::layout.app')

@section('title', __('admin.site_colors'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.site_colors')]
    ]
])
@endsection

@section('content')

@can('appearance-theme_colors_show')
<x-card :heading="__('admin.site_colors')">


    <form action="{{ route('admin.appearance.update-colors') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row gy-5">
            <div class="col-md-4">
                <x-input-label for="site_primary_color_input" :value="__('attribute.primary_color')" />
                <x-text-input type="text" hidden id="site_primary_color_input" name="site_primary_color" :value="old('site_primary_color', $settings->primary_color ?? '')" />
                <div id="site_primary_color" class="pickr-classic"></div>
                <x-input-error field="site_primary_color" />
            </div>
            <div class="col-md-4">
                <x-input-label for="site_secondary_color_input" :value="__('attribute.secondary_color')" />
                <x-text-input type="text" hidden id="site_secondary_color_input" name="site_secondary_color" :value="old('site_secondary_color', $settings->secondary_color ?? '')" />
                <div id="site_secondary_color" class="pickr-classic"></div>
                <x-input-error field="site_secondary_color" />
            </div>
            <div class="col-md-4">
                <x-input-label for="site_third_color_input" :value="__('attribute.third_color')" />
                <x-text-input type="text" hidden id="site_third_color_input" name="site_third_color" :value="old('site_third_color', $settings->third_color ?? '')" />
                <div id="site_third_color" class="pickr-classic"></div>
                <x-input-error field="site_third_color" />
            </div>
            <div class="col-md-4">
                <x-input-label for="shop_theme_color_input" :value="__('attribute.shop_theme_color')" />
                <x-text-input type="text" hidden id="shop_theme_color_input" name="shop_theme_color" :value="old('shop_theme_color', $settings->shop_theme_color ?? '')" />
                <div id="shop_theme_color" class="pickr-classic"></div>
                <x-input-error field="shop_theme_color" />
            </div>
        </div>

        @can('appearance-theme_colors_update')
        <button type="submit" class="btn btn-primary mt-5">{{ __('admin.save') }}</button>
        @endcan
    </form>
</x-card>
@endcan
@endsection


@push('css')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/pickr/pickr.css') }}">
<style>
    .pickr{
        border: 1px solid #dee2e6;
        line-height: 1;
        padding: 6px;
        border-radius: 3px;
        overflow: hidden;
    }
    .pickr .pcr-button{
        width: 100%;
        border-radius: 3px;
        overflow: hidden;
    }
</style>
@endpush

@push('js')
<script src="{{ asset('admin/assets/vendor/libs/pickr/pickr.js') }}"></script>

<script>
    'use strict';

    $(function(){

        // Initialize Pickr instances for each color
        initializePickr('#site_primary_color', '#site_primary_color_input', $('#site_primary_color_input').val() ? $('#site_primary_color_input').val() : '#000000');
        initializePickr('#site_secondary_color', '#site_secondary_color_input', $('#site_secondary_color_input').val() ? $('#site_secondary_color_input').val() : '#000000');
        initializePickr('#site_third_color', '#site_third_color_input', $('#site_third_color_input').val() ? $('#site_third_color_input').val() : '#000000');
        initializePickr('#shop_theme_color', '#shop_theme_color_input', $('#shop_theme_color_input').val() ? $('#shop_theme_color_input').val() : '#000000');

    });

    // Reusable function to initialize Pickr
    function initializePickr(elementId, inputId, defaultColor) {
        const colorValue = $(inputId).val();

        const pickrInstance = pickr.create({
            el: elementId,
            theme: 'classic',
            default: colorValue ? colorValue : defaultColor,
            swatches: [
                '#FF5722',
                '#FF4851',
                '#A0FF27',
                '#4260FF',
                '#a05916'
            ],
            components: {
                preview: true,
                opacity: true,
                hue: true,
                interaction: {
                    hex: true,
                    rgba: true,
                    hsla: true,
                    hsva: true,
                    cmyk: true,
                    input: true,
                    save: true
                }
            }
        });

        pickrInstance.on('save', (color) => {
            $(inputId).val(color.toHEXA().toString());
        }).on('clear', () => {
            $(inputId).val('');
        }).on('change', (color) => {
            $(inputId).val(color.toHEXA().toString());
        });


        return pickrInstance;
    }

</script>
@endpush
