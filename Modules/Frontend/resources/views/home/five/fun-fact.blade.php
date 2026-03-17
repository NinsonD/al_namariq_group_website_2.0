@extends('core::layout.app')

@section('title', __('section.home_five_funfact_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_five_sections'), 'url' => route('admin.home_five.index')],
        ['label' => __('section.home_five_funfact_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_five.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_five.update_section', ['slug' => $section->slug, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-card :heading="__('section.home_five_funfact_section')" :route="route('admin.home_five.index')" btnType="back">

            <div class="row gy-6 mb-6">

                @for ($i = 1; $i <= 15; $i++)
                    <div class="col-md-4 {{ hideDivLang($code) }}">
                        <x-image-uploader
                            name="image_{{ $i }}"
                            :label="__('attribute.image_' . $i)"
                            :value="$section?->default_content?->{'image_' . $i} ?? ''"
                        />
                        <x-input-error field="image_{{ $i }}" />
                    </div>
                @endfor

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="fact_icon_1" :label="__('attribute.fact_icon_1')"  :value="$section?->default_content?->fact_icon_1 ?? ''" />
                    <x-input-error field="fact_icon_1" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="fact_icon_2" :label="__('attribute.fact_icon_2')"  :value="$section?->default_content?->fact_icon_2 ?? ''" />
                    <x-input-error field="fact_icon_2" />
                </div>
            </div>

            <div class="row gy-5 mb-6">
                @for ($i = 1; $i <= 3; $i++)
                    {{-- Fact Subtitle --}}
                    <div class="col-md-4">
                        <x-input-label for="fact_subtitle_{{ $i }}" :value="__('attribute.fact_subtitle_' . $i)" />
                        <x-text-input
                            id="fact_subtitle_{{ $i }}"
                            name="fact_subtitle_{{ $i }}"
                            :value="$section?->getTranslation($code)?->content?->{'fact_subtitle_' . $i} ?? ''"
                        />
                        <x-input-error field="fact_subtitle_{{ $i }}" />
                    </div>

                    {{-- Fact Title --}}
                    <div class="col-md-4 ">
                        <x-input-label for="fact_title_{{ $i }}" :value="__('attribute.fact_title_' . $i)" />
                        <x-text-input
                            id="fact_title_{{ $i }}"
                            name="fact_title_{{ $i }}"
                            :value="$section?->getTranslation($code)?->content?->{'fact_title_' . $i} ?? ''"
                        />
                        <x-input-error field="fact_title_{{ $i }}" />
                    </div>

                    {{-- Fact Number --}}

                    @if ($i == 3)
                        @continue
                    @endif

                    <div class="col-md-4 {{ hideDivLang($code) }}">
                        <x-input-label for="fact_number_{{ $i }}" :value="__('attribute.fact_number_' . $i)" />
                        <x-text-input
                            id="fact_number_{{ $i }}"
                            name="fact_number_{{ $i }}"
                            :value="$section?->default_content?->{'fact_number_' . $i} ?? ''"
                        />
                        <x-input-error field="fact_number_{{ $i }}" />
                    </div>
                @endfor


                 <div class="col-md-12">
                    <x-input-label for="fact_text" :value="__('attribute.fact_text')" />
                    <x-text-input id="fact_text" name="fact_text" :value="$section?->getTranslation($code)?->content?->fact_text ?? ''"/>
                    <x-input-error field="fact_text" />
                </div>

                 @php
                    $portfolios = \Modules\Portfolio\Models\Portfolio::with(['translations'])->active()->get();
                    $selectedPortfolios = is_null($section?->default_content?->portfolios) ? [] : json_decode($section?->default_content?->portfolios);

                @endphp

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="portfolios" :value="__('attribute.portfolios')" />
                    <select class="form-control conca-select2" name="portfolios[]" id="portfolios" multiple>
                        @foreach ($portfolios as $portfolio)
                            <option value="{{ $portfolio->id }}" {{ in_array($portfolio->id, $selectedPortfolios) ? 'selected' : '' }}>{{ $portfolio->title }}</option>
                        @endforeach
                    </select>
                    <x-input-error field="portfolios" />
                </div>
            </div>


            <div class="row gy-5">
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
