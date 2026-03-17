@extends('core::layout.app')

@section('title', __('admin.general_settings'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.general_settings')]
    ]
])
@endsection

@section('content')

@php
    $tabs = [
        0 => [
            'id' => 'general',
            'label' => __('sidebar.general'),
            'active' => true,
            'aria-selected' => true,
        ],
        1 => [
            'id' => 'logo-favicon',
            'label' => __('sidebar.logo_favicon'),
            'active' => false,
            'aria-selected' => false,
        ],
        2 => [
            'id' => 'cookie-consent',
            'label' => __('sidebar.cookie_consent'),
            'active' => false,
            'aria-selected' => false,
        ],
        3 => [
            'id' => 'search-engine-indexing',
            'label' => __('sidebar.search_engine_indexing'),
            'active' => false,
            'aria-selected' => false,
        ],
        4 => [
            'id' => 'copyright-text',
            'label' => __('sidebar.copyright_text'),
            'active' => false,
            'aria-selected' => false,
        ],
        5 => [
            'id' => 'maintenance-mode',
            'label' => __('sidebar.maintenance_mode'),
            'active' => false,
            'aria-selected' => false,
        ],
    ];
@endphp

<div class="row gx-12 gy-6">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body p-6">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach ($tabs as $key => $tab )
                        <button class="nav-link text-start {{ $tab['active'] ? 'active' : '' }}" id="v-pills-{{ $tab['id'] }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $tab['id'] }}" type="button" role="tab" aria-controls="v-pills-{{ $tab['id'] }}" aria-selected="{{ $tab['aria-selected'] }}">{{ $tab['label'] }}</button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body p-6">
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach ($tabs as $key => $tab )
                        <div class="tab-pane fade {{ $tab['active'] ? 'show active' : '' }}" id="v-pills-{{ $tab['id'] }}" role="tabpanel" aria-labelledby="v-pills-{{ $tab['id'] }}-tab" tabindex="0">
                            @include('settings::global.sections.' . $tab['id'], ['all_timezones' => $all_timezones])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
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
<script src="{{ asset('admin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    'use strict';

    $(function(){

        // Initialize Pickr instances for each color
        initializePickr('#cookie_background_color', '#cookie_background_color_input', $('#cookie_background_color_input').val() ? $('#cookie_background_color_input').val() : '#000000');
        initializePickr('#cookie_text_color', '#cookie_text_color_input', $('#cookie_text_color_input').val() ? $('#cookie_text_color_input').val() : '#000000');
        initializePickr('#cookie_border_color', '#cookie_border_color_input', $('#cookie_border_color_input').val() ? $('#cookie_border_color_input').val() : '#000000');
        initializePickr('#cookie_btn_bg_color', '#cookie_btn_bg_color_input', $('#cookie_btn_bg_color_input').val() ? $('#cookie_btn_bg_color_input').val() : '#000000');
        initializePickr('#cookie_btn_text_color', '#cookie_btn_text_color_input', $('#cookie_btn_text_color_input').val() ? $('#cookie_btn_text_color_input').val() : '#000000');

    });

    // Reusable function to initialize Pickr
    function initializePickr(elementId, inputId, defaultColor) {
        const colorValue = $(inputId).val();

        const pickrInstance = pickr.create({
            el: elementId,
            theme: 'classic',
            default: colorValue ? colorValue : defaultColor,
            swatches: [
                '#B7124D',
                '#d59020',
                '#5A5859',
                '#141414',
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
