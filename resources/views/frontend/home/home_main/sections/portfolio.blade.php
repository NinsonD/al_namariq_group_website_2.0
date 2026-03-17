@php
   if($default_content?->portfolios){
      $portfolios = is_null($default_content?->portfolios) ? [] : json_decode($default_content?->portfolios);
      $portfolios = \Modules\Portfolio\Models\Portfolio::with(['translations'])->whereIn('id', $portfolios)->active()->get();
   }else{
      $portfolios = collect();
   }
@endphp

@if (!empty($content?->title) || !empty($content?->description) || $portfolios->count() > 0)


<!-- project area start -->
<div class="dgm-project-area black-bg-5 pb-120 fix">
    <div class="container container-1330">
        <div class="dgm-project-top-wrap">
            <div class="row align-items-end">
                <div class="col-xl-4 col-lg-6">
                    <div class="dgm-project-title-box z-index-1 mb-30">
                        <h4 class="tp-section-title-grotesk text-white mb-0 tp_fade_anim the-title">
                           {!! clean(pureText($content?->title)) !!}
                        </h4>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="dgm-project-top-text mb-30 tp_fade_anim">
                        <p>
                           {!! clean(pureText($content?->description)) !!}
                        </p>
                    </div>
                </div>
                @if ($portfolios->count() > 0)
                <div class="col-xl-2 col-lg-6">
                    <div class="dgm-project-arrow text-start text-xl-end z-index-1 mb-30 tp_fade_anim">
                        <button class="dgm-project-prev">
                            <span>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.0711 7.92898H0.928955M0.928955 7.92898L8.00002 15M0.928955 7.92898L8.00002 0.85791" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </button>
                        <button class="dgm-project-next">
                            <span>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.928955 8.00002H15.0711M15.0711 8.00002L8.00002 0.928955M15.0711 8.00002L8.00002 15.0711" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @if ($portfolios->count() > 0)
    <div class="dgm-project-slider-wrap">
        <div class="swiper-container dgm-project-active">
            <div class="swiper-wrapper">
                @foreach ($portfolios as $portfolio)
                <div class="swiper-slide">
                    <div class="dgm-project-item">
                        <div class="dgm-project-thumb">
                            <img src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->title }}">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="swiper-container dgm-project-text-active fix mt-55">
            <div class="swiper-wrapper">
                @foreach ($portfolios as $portfolio)
                <div class="swiper-slide">
                    <div class="dgm-project-item">
                        <div class="dgm-project-content text-center">
                            <h4 class="dgm-project-title-sm">
                                <a class="tp-line-white" href="{{ route('portfolios.details', ['slug' => $portfolio->slug]) }}">
                                    {{ $portfolio->title }}
                                </a>
                            </h4>
                            <h5>
                                <span>
                                    {{ $portfolio->service ?? '' }}
                                </span>
                            </h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
<!-- project area end -->
@endif
