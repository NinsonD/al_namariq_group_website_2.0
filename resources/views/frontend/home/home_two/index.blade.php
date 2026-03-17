@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['home']['seo_title'])
@section('meta_description', $seo_setting['home']['seo_description'])
@section('meta_keywords', $seo_setting['home']['seo_keywords'])

@section('header')
   @include('frontend.layouts.headers.header-2', ['main_menu' => $main_menu])
@endsection

@section('content')
    <div data-bg-color="#FDF7F4">
        @php
            $slugs = [
                'hero', 'step', 'brand', 'services', 'about', 'portfolio', 'text-slider', 'testimonial', 'app-brand', 'benefit', 'faq'
            ];
        @endphp

        @foreach ($slugs as $slug)
            @php $section = $sections[$slug] ?? null; @endphp

            @if ($section?->status)
                @includeIf('frontend.home.home_two.sections.' . $slug, [
                    'default_content' => $section->default_content ?? null,
                    'content' => $section?->content ?? null,
                ])
            @endif
        @endforeach

    </div>

@endsection

@section('footer')
    @include('frontend.layouts.footers.footer-2', [
        'footer_menu_one' => $footer_menu_one,
        'footer_menu_two' => $footer_menu_two,
    ])
@endsection

@push('js')
    <script>
        'use strict';
        (function ($) {
            if ($('.hero-title-shape').length) {
                $('.hero-title-shape').each(function () {
                    var $this = $(this);
                    let text = $this.html();

                    let img1URL = $this.data('shape-1');
                    let img2URL = $this.data('shape-2');
                    let title = "{{ $settings?->app_name }}"

                    text = text.replaceAll('shape_1', `<img class="img-1" src="${img1URL}" alt="${title}">`);
                    text = text.replaceAll('shape_2', `<img class="img-2" src="${img2URL}" alt="${title}">`);

                    $this.html(text);
                });
            }
        })(jQuery);
    </script>
@endpush
