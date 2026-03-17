@extends('core::layout.app')

@section('title', __('section.home_main_testimonial_section'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_main_sections'), 'url' => route('admin.home_main.index')],
        ['label' => __('section.home_main_testimonial_section')]
    ]
])
@endsection

@section('content')

<x-admin.language-nav route="admin.home_main.section" :params="['slug' => $section->slug]" />

@php
    $code = request()->get('code', 'en');
@endphp

<div class="pb-12">
    <form action="{{ route('admin.home_main.update_testimonial_section', ['section_id' => $section->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card :heading="__('section.home_main_testimonial_section')" :route="route('admin.home_main.index')" btnType="back">
            <div class="row gy-5">

                <div class="col-md-6 {{ hideDivLang($code) }}">
                    <x-image-uploader name="video_thumbnail" :label="__('attribute.video_thumbnail')"  :value="$section?->default_content?->video_thumbnail ?? ''" />
                    <x-input-error field="video_thumbnail" />
                </div>
                <div class="col-md-6 {{ hideDivLang($code) }}">
                    <x-image-uploader name="bg_shape" :label="__('attribute.bg_shape')"  :value="$section?->default_content?->bg_shape ?? ''" />
                    <x-input-error field="bg_shape" />
                </div>

                <div class="col-md-12">
                    <x-input-label for="subtitle" :value="__('attribute.subtitle')" />
                    <x-text-input id="subtitle" name="subtitle" :value="$section?->getTranslation($code)?->content?->subtitle ?? ''"/>
                    <x-input-msg />
                    <x-input-error field="subtitle" />
                </div>

                <div class="col-md-12">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-msg :text="__('admin.text_shape_insert')" />
                    <x-input-error field="title" />
                </div>

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="video_url" :value="__('attribute.video_url')" />
                    <x-text-input id="video_url" name="video_url" :value="$section?->default_content?->video_url ?? ''"/>
                    <x-input-error field="video_url" />
                </div>

                @php
                    $testimonials = \Modules\Testimonial\Models\Testimonial::active()->get();
                    $selectedTestimonials = is_null($section?->default_content?->testimonials) ? [] : json_decode($section?->default_content?->testimonials);

                @endphp

                <div class="col-md-12 {{ hideDivLang($code) }}">
                    <x-input-label for="testimonials" :value="__('attribute.testimonials')" />
                    <select class="form-control conca-select2" name="testimonials[]" id="testimonials" multiple>
                        @foreach ($testimonials as $testimonial)
                            <option value="{{ $testimonial->id }}" {{ in_array($testimonial->id, $selectedTestimonials) ? 'selected' : '' }}>{{ Str::limit($testimonial->comment, 50, '...') }}</option>
                        @endforeach
                    </select>
                    <x-input-error field="testimonials" />
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
