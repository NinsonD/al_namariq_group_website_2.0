@extends('core::layout.app')

@section('title', __('section.home_two_portfolio_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_two_sections'), 'url' => route('admin.home_two.index')],
        ['label' => __('section.home_two_portfolio_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_two.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_two.update_portfolio_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_two_portfolio_section')" :route="route('admin.home_two.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-6">
                    <x-input-label for="subtitle" :value="__('attribute.subtitle')" />
                    <x-text-input id="subtitle" name="subtitle" :value="$section?->getTranslation($code)?->content?->subtitle ?? ''"/>
                    <x-input-msg/>
                    <x-input-error field="subtitle" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-msg/>
                    <x-input-error field="title" />
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
