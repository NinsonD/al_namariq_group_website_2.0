@extends('core::layout.app')

@section('title', __('section.home_shop_instagram_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_shop_sections'), 'url' => route('admin.home_shop.index')],
        ['label' => __('section.home_shop_instagram_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_shop.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_shop.update_instagram_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_shop_instagram_section')" :route="route('admin.home_shop.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-6">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-error field="title" />
                </div>

                <div class="col-md-6">
                    <x-input-label for="subtitle" :value="__('attribute.subtitle')" />
                    <x-text-input id="subtitle" name="subtitle" :value="$section?->getTranslation($code)?->content?->subtitle ?? ''"/>
                    <x-input-error field="subtitle" />
                </div>

                @php
                    $instagrams = \Modules\Shop\Models\Instagram::active()->get();
                    $selectedInstagrams = is_null($section?->default_content?->instagrams) ? [] : json_decode($section?->default_content?->instagrams);
                @endphp

                <div class="col-md-12 select2-instagram-img {{ hideDivLang($code) }}">
                    <x-input-label for="instagrams" :value="__('attribute.instagrams')" />
                    <select class="form-control select2-instagrams" name="instagrams[]" id="instagrams" multiple>
                            @foreach ($instagrams as $instagram)
                            <option value="{{ $instagram->id }}" data-icon="{{ asset($instagram->image) }}" {{ in_array($instagram->id, $selectedInstagrams) ? 'selected' : '' }}></option>
                            @endforeach
                        </select>
                    </select>
                    <x-input-error field="instagrams" />
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

@push('css')
<style>
    .select2-instagram-img img,
    .select2-results__options img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
    }


</style>
@endpush

@push('js')
<script>
    'use strict';

    $(function() {

        function formatState (state) {
            if (!state.id) {
                return state.text;
            }
            var $state = $(`<span><img src="${$(state.element).data('icon')}" /></span>`);
            return $state;
        };

        $('.select2-instagrams').select2({
            templateResult: formatState,
            templateSelection: formatState,
            escapeMarkup: function(m) { return m; }
        });
    });
</script>

@endpush
