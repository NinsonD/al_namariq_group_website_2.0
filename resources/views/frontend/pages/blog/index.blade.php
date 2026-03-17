@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['blog']['seo_title'])
@section('meta_description', $seo_setting['blog']['seo_description'])
@section('meta_keywords', $seo_setting['blog']['seo_keywords'])

@php
    extract(getSiteMenus());
@endphp

@section('header')
   @include('frontend.layouts.headers.header-inner', ['main_menu' => $main_menu])
@endsection

@section('content')
   <x-breadcrumb :title="__('frontend.blog_breadcrumb_title')" />


    <section id="postbox" class="postbox-area pt-110 pb-80">
        <div class="container container-1330">
            <div class="row">
                <div class="col-lg-{{ $blogs->isNotEmpty() ? '8' : '12' }}">
                    <div class="postbox-wrapper">
                        @if ($blogs->isNotEmpty())
                            @foreach ($blogs as $blog )
                                @include('frontend.pages.blog.partials._blog-card', ['blog' => $blog])
                            @endforeach
                            <div class="mt-30">
                                {{ $blogs->links('components.frontend-pagination') }}
                            </div>

                            @else
                            <div class="alert alert-warning text-center" role="alert">
                                {{ __('frontend.no_blogs_found') }}
                            </div>
                        @endif
                    </div>
                </div>

                @if ($blogs->isNotEmpty())
                <div class="col-lg-4">
                    @include('frontend.pages.blog.partials.sidebar',[
                        'popular_blogs' => $popular_blogs,
                        'categories' => $categories,
                        'blog_tags' => $blog_tags,
                    ])
                </div>
                @endif
            </div>
        </div>
    </section>


@endsection

@section('footer')
    @include('frontend.layouts.footers.footer-inner', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection
