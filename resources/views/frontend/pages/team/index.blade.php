@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['team']['seo_title'])
@section('meta_description', $seo_setting['team']['seo_description'])
@section('meta_keywords', $seo_setting['team']['seo_keywords'])


@php
    extract(getSiteMenus());
@endphp

@section('header')
   @include('frontend.layouts.headers.header-inner', ['main_menu' => $main_menu])
@endsection


@section('content')

<!-- hero area start -->
<div class="tp-team-inner-ptb p-relative pb-70" data-background="assets/img/team/team-bg.png">
    <div class="tp-career-shape-1">
        <span><svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
                <path d="M36.3761 0.5993C40.3065 8.98556 47.3237 34.898 32.8824 44.3691C25.3614 49.0997 9.4871 52.826 1.7513 31.3747C-1.16691 23.2826 5.38982 15.9009 20.5227 20.0332C29.2536 22.4173 50.3517 27.8744 60.9 44.2751C66.4672 52.9311 71.833 71.0287 69.4175 82.9721M69.4175 82.9721C70.1596 77.2054 74.079 66.0171 83.8204 67.3978M69.4175 82.9721C69.8033 79.1875 67.076 70.1737 53.0797 64.3958M49.1371 20.8349C52.611 22.1801 63.742 28.4916 67.9921 39.9344" stroke="#030303" stroke-width="1.5" />
            </svg></span>
    </div>
    <div class="container container-1230">
        <div class="ar-about-us-4-hero-ptb">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="ar-hero-title-box tp_fade_anim" data-delay=".3">
                        <div class="ar-about-us-4-title-box d-flex align-items-center mb-20">
                            <span class="tp-section-subtitle pre tp_fade_anim">
                                {{ __('frontend.team') }}
                            </span>
                            <div class="ar-about-us-4-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                    <rect y="4" width="80" height="1" fill="#111013" />
                                    <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="tp-career-title insert-breadcrumb-shape">
                            {!! clean(pureText(__('frontend.meet_the_minds_behind_magic') )) !!}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero area end -->

    @if ($teams->count() > 0)
   <!-- team-area-start -->
   <section class="team-area pb-40">
      <div class="container">
        <div class="dgm-team-wrap">
            <div class="row">
                @foreach ($teams as $team)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="dgm-team-item mb-40 tp_fade_anim" data-delay=".3">
                        <div class="dgm-team-thumb tp--hover-item p-relative">
                            <a href="{{ route('team.details', ['username' => $team->username]) }}">
                                <div class="tp--hover-img" data-displacement="{{ asset('admin/img/default/common/fluid.jpg') }}" data-intensity="0.6" data-speedin="1" data-speedout="1">
                                    <img src="{{ asset($team->image) }}" alt="{{ $team->name }}">
                                </div>
                            </a>
                        </div>
                        <div class="dgm-team-content">
                            <h4 class="dgm-team-title-sm">
                                <a class="tp-line-black" href="{{ route('team.details', ['username' => $team->username]) }}">
                                    {{ $team->name }}
                                </a>
                            </h4>
                            <span>
                                {{ $team->designation }}
                            </span>

                            @if (is_array($team->social_links) && count($team->social_links) > 0)
                            <div class="dgm-team-social">
                               @foreach ($team->social_links as $link)
                                <a href="{{ $link['url'] ?? '#' }}"><i class="{{ $link['icon'] ?? 'icon' }}"></i></a>
                                @endforeach
                            </div>
                             @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
         <div class="mt-30">
            <div class="d-flex justify-content-center align-items-center">
               {{ $teams->links('components.frontend-pagination') }}
            </div>
         </div>
      </div>
   </section>
   <!-- team-area-end -->
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
