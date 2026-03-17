@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['services']['seo_title'])
@section('meta_description', $seo_setting['services']['seo_description'])
@section('meta_keywords', $seo_setting['services']['seo_keywords'])

@php
    extract(getSiteMenus());
@endphp

@section('header')
   @include('frontend.layouts.headers.header-inner', ['main_menu' => $main_menu])
@endsection

@section('content')

    @php
        $slugs = [
            'hero', 'services', 'text-slider', 'pricing', 'process', 'brand',
        ];
    @endphp

    @if ($sections['hero']?->status)
        @include('frontend.pages.services.sections.hero', [
            'default_content' => $sections['hero']?->default_content ?? null,
            'content' => $sections['hero']->content ?? null,
        ])
    @endif

    @if ($sections['services']?->status)
        @include('frontend.pages.services.sections.services', [
            'default_content' => $sections['services']?->default_content ?? null,
            'content' => $sections['services']->content ?? null,
        ])
    @endif

    <div class="tp-service-4-padding-area" data-bg-color="#F6F8EF">
        @if ($sections['text-slider']?->status)
            @include('frontend.pages.services.sections.text-slider', [
                'default_content' => $sections['text-slider']?->default_content ?? null,
                'content' => $sections['text-slider']->content ?? null,
            ])
        @endif


        @if ($sections['pricing']?->status)
            @include('frontend.pages.services.sections.pricing', [
                'default_content' => $sections['pricing']?->default_content ?? null,
                'content' => $sections['pricing']->content ?? null,
            ])
        @endif


    </div>

    @if ($sections['process']?->status)
        @include('frontend.pages.services.sections.process', [
            'default_content' => $sections['process']?->default_content ?? null,
            'content' => $sections['process']->content ?? null,
        ])
    @endif

    @if ($sections['brand']?->status)
        @include('frontend.pages.services.sections.brand', [
            'default_content' => $sections['brand']?->default_content ?? null,
            'content' => $sections['brand']->content ?? null,
        ])
    @endif

@endsection


@section('footer')
    @include('frontend.layouts.footers.footer-inner', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection
