@extends('frontend.layouts.master')

@php
    extract(getSiteMenus());
@endphp

@section('header')
   @include('frontend.layouts.headers.header-inner', ['main_menu' => $main_menu])
@endsection

@isset($page)

@section('meta_title', $page->title . ' || ' . $settings->app_name)

@section('content')
    <x-breadcrumb id="custom-page" :title="$page->title" />

    <section class="custom-page pt-120 pb-120" id="custom-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! clean($page->content) !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@endisset

@section('footer')
    @include('frontend.layouts.footers.footer-inner', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection
