@extends('core::layout.app')

@section('title', __('section.home_two_benefit_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_two_sections'), 'url' => route('admin.home_two.index')],
        ['label' => __('section.home_two_benefit_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_two.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_two.update_benefit_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_two_benefit_section')" :route="route('admin.home_two.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="icon_1" :label="__('attribute.icon_1')"  :value="$section?->default_content?->icon_1 ?? ''" />
                    <x-input-error field="icon_1" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="icon_2" :label="__('attribute.icon_2')"  :value="$section?->default_content?->icon_2 ?? ''" />
                    <x-input-error field="icon_2" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="icon_3" :label="__('attribute.icon_3')"  :value="$section?->default_content?->icon_3 ?? ''" />
                    <x-input-error field="icon_3" />
                </div>

                <div class="col-md-12">
                    <x-input-label for="subtitle" :value="__('attribute.subtitle')" />
                    <x-text-input id="subtitle" name="subtitle" :value="$section?->getTranslation($code)?->content?->subtitle ?? ''"/>
                    <x-input-msg/>
                    <x-input-error field="subtitle" />
                </div>

                <div class="col-md-12">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-msg/>
                    <x-input-error field="title" />
                </div>

                <div class="col-md-12">
                    <x-input-label for="benefit_title_1" :value="__('attribute.benefit_title_1')" />
                    <x-text-input id="benefit_title_1" name="benefit_title_1" :value="$section?->getTranslation($code)?->content?->benefit_title_1 ?? ''"/>
                    <x-input-msg/>
                    <x-input-error field="benefit_title_1" />
                </div>
                <div class="col-md-12">
                    <x-input-label for="benefit_description_1" :value="__('attribute.benefit_description_1')" />
                    <x-textarea id="benefit_description_1" name="benefit_description_1" :value="$section?->getTranslation($code)?->content?->benefit_description_1 ?? ''" rows="7"/>
                    <x-input-msg/>
                    <x-input-error field="benefit_description_1" />
                </div>

                @for ($i = 1; $i <= 3; $i++)

                    <div class="col-md-12">
                        <x-input-label
                            :for="'benefit_title_' . $i"
                            :value="__('attribute.benefit_title_' . $i)"
                        />
                        <x-text-input
                            :id="'benefit_title_' . $i"
                            :name="'benefit_title_' . $i"
                            :value="$section?->getTranslation($code)?->content?->{'benefit_title_' . $i} ?? ''"
                        />
                        <x-input-error :field="'benefit_title_' . $i" />
                    </div>

                    <div class="col-md-12">
                        <x-input-label
                            :for="'benefit_description_' . $i"
                            :value="__('attribute.benefit_description_' . $i)"
                        />
                        <x-textarea
                            :id="'benefit_description_' . $i"
                            :name="'benefit_description_' . $i"
                            :value="$section?->getTranslation($code)?->content?->{'benefit_description_' . $i} ?? ''"
                            rows="7"
                        />
                        <x-input-error :field="'benefit_description_' . $i" />
                    </div>
                    @if ($i < 3)
                    <div class="col-md-12">
                        <div class="border-bottom mt-5 mb-3"></div>
                    </div>
                    @endif

                @endfor

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
