@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['home']['seo_title'])
@section('meta_description', $seo_setting['home']['seo_description'])
@section('meta_keywords', $seo_setting['home']['seo_keywords'])

@section('header')
   @include('frontend.layouts.headers.header-3', ['main_menu' => $main_menu])
@endsection

@section('content')

    <div class="" data-bg-color="#F7F7FD">


    @php
        $slugs = [
            'hero', 'brand', 'features', 'how-it-works', 'app-review',
            'dashboard', 'pricing', 'testimonial', 'faq', 'app-download'
        ];
    @endphp

    @foreach ($slugs as $slug)
        @php $section = $sections[$slug] ?? null; @endphp

        @if ($section?->status)
            @includeIf('frontend.home.home_three.sections.' . $slug, [
                'default_content' => $section->default_content ?? null,
                'content' => $section?->content ?? null,
            ])
        @endif
    @endforeach
    </div>

@endsection

@section('footer')
    @include('frontend.layouts.footers.footer-3', [
        'footer_menu_one' => $footer_menu_one,
        'footer_menu_two' => $footer_menu_two,
    ])
@endsection

