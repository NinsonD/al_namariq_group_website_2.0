@extends('core::layout.app')

@section('title', __('section.home_five_testimonial_section'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_five_sections'), 'url' => route('admin.home_five.index')],
        ['label' => __('section.home_five_testimonial_section')]
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

        <x-card :heading="__('section.home_five_testimonial_section')" :route="route('admin.home_five.index')" btnType="back">

            <div class="row gy-6 mb-6">

                @for ($i = 1; $i <= 3; $i++)
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
                    <x-image-uploader name="bg_image" :label="__('attribute.bg_image')"  :value="$section?->default_content?->bg_image ?? ''" />
                    <x-input-error field="bg_image" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="bg_shape" :label="__('attribute.bg_shape')"  :value="$section?->default_content?->bg_shape ?? ''" />
                    <x-input-error field="bg_shape" />
                </div>
                <div class="col-md-4 {{ hideDivLang($code) }}">
                    <x-image-uploader name="review_image" :label="__('attribute.review_image')"  :value="$section?->default_content?->review_image ?? ''" />
                    <x-input-error field="review_image" />
                </div>
            </div>

            <div class="row gy-5 mb-6">
                <div class="col-md-12">
                    <x-input-label for="title" :value="__('attribute.title')" />
                    <x-text-input id="title" name="title" :value="$section?->getTranslation($code)?->content?->title ?? ''"/>
                    <x-input-error field="title" />
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
