@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['portfolio']['seo_title'])
@section('meta_description', $seo_setting['portfolio']['seo_description'])
@section('meta_keywords', $seo_setting['portfolio']['seo_keywords'])

@php
    extract(getSiteMenus());
@endphp

@section('header')
   @include('frontend.layouts.headers.header-inner', ['main_menu' => $main_menu])
@endsection


@section('content')

<!-- breadcurmb area start -->
<div class="tp-breadcrumb-area tp-breadcrumb-ptb">
    <div class="container container-1430">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="tp-portfolio-inner-box pb-100">
                    <div class="tp-portfolio-heading pb-30 d-flex p-relative tp_fade_anim">
                        <span class="tp-section-subtitle pre orange-color tp_fade_anim mr-95">{{ __('frontend.portfolio') }} <svg xmlns="http://www.w3.org/2000/svg" width="82" height="9" viewBox="0 0 82 9" fill="none">
                                <path d="M78 7.95425L81.5 4.47169L78 0.989136M1 3.98977H81V4.98977H1V3.98977Z" stroke="#FF5722" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>

                        <h3 class="tp-blog-title fs-100 tp_fade_anim insert-breadcrumb-shape">
                            {!! clean(pureText(__('frontend.we_make_digital_beautiful'))) !!}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcurmb area end -->

@if ($portfolios->isNotEmpty())
<!-- portfolio area start -->
<div class="tp-portfolio-inner-ptb pb-70">
    <div class="container container-1430">
        <div class="tp-portfolio-tab-content-wrap">
            <div class="row">
                @foreach ($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6">
                    @include('frontend.pages.portfolio._card', ['portfolio' => $portfolio])
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-center mt-30">
                        {{ $portfolios->links('components.frontend-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- portfolio area end -->
@endif

@endsection


@section('footer')
    @include('frontend.layouts.footers.footer-inner', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection

@push('js')
<script>
    if(('.insert-breadcrumb-shape').length){

        const shapeURL = "{{ asset('admin/img/default/common/breadcrumb-title-shape.png') }}"
        const shapeHTML = `<img src="${shapeURL}" alt="{{ $seo_setting['portfolio']['seo_title'] }}">`;
        $('.insert-breadcrumb-shape').each(function () {
            let $wrapper = $('<div>').html($(this).html());

            $wrapper.find('span').each(function () {
                $(this).replaceWith(shapeHTML);
            });

            $(this).html($wrapper.html());
        });
    }

</script>
@endpush
