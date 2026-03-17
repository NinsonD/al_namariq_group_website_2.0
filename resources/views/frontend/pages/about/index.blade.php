@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['about']['seo_title'])
@section('meta_description', $seo_setting['about']['seo_description'])
@section('meta_keywords', $seo_setting['about']['seo_keywords'])


@php
    extract(getSiteMenus());
@endphp

@section('header')
   @include('frontend.layouts.headers.header-inner', ['main_menu' => $main_menu])
@endsection


@section('content')

    @php
        $slugs = [
            'hero', 'about', 'services', 'step', 'team',
        ];
    @endphp



    @foreach ($slugs as $slug)
        @php $section = $sections[$slug] ?? null; @endphp

        @if ($section?->status)
            @includeIf('frontend.pages.about.sections.' . $slug, [
                'default_content' => $section->default_content ?? null,
                'content' => $section?->content ?? null,
            ])
        @endif
    @endforeach


@endsection


@section('footer')
    @include('frontend.layouts.footers.footer-inner', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two, 'whiteStyle' => true])
@endsection

@push('js')
<script>
$(function () {
    const shapeURL = "{{ asset('admin/img/default/common/breadcrumb-title-shape.png') }}";
    const shapeHTML = `<img src="${shapeURL}" alt="{{ $seo_setting['portfolio']['seo_title'] }}">`;

    $('.insert-breadcrumb-shape').each(function () {
        const updated = $(this).html().replaceAll('(shape)', shapeHTML);
        $(this).html(updated);
    });
});
</script>
@endpush
