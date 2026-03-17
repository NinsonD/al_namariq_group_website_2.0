@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['home']['seo_title'])
@section('meta_description', $seo_setting['home']['seo_description'])
@section('meta_keywords', $seo_setting['home']['seo_keywords'])


@section('header')
   @include('frontend.layouts.headers.header-5', ['main_menu' => $main_menu])
@endsection

@section('content')

    @php
        $slugs = [
            'hero', 'about', 'banner', 'text-slider', 'services', 'gallery',
            'portfolio', 'fun-fact', 'process', 'testimonial'
        ];
    @endphp

    @foreach ($slugs as $slug)
        @php $section = $sections[$slug] ?? null; @endphp

        @if ($section?->status)
            @includeIf('frontend.home.home_five.sections.' . $slug, [
                'default_content' => $section->default_content ?? null,
                'content' => $section?->content ?? null,
            ])
        @endif
    @endforeach

@endsection



@section('footer')
    @include('frontend.layouts.footers.footer-5', [
        'footer_menu_one' => $footer_menu_one,
        'footer_menu_two' => $footer_menu_two,
    ])
@endsection
