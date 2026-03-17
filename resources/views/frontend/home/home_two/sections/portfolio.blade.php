@php
   if($default_content?->portfolios){
      $portfolios = is_null($default_content?->portfolios) ? [] : json_decode($default_content?->portfolios);
      $portfolios = \Modules\Portfolio\Models\Portfolio::with(['translations'])->whereIn('id', $portfolios)->active()->get();
   }else{
      $portfolios = collect();
   }
@endphp

@if (!empty($content?->title) || !empty($content?->description) || $portfolios->count() > 0)


<!-- case area start -->
<div class="it-project-area it-project-ptb pt-120">
    <div class="container container-1230">
        <div class="row justify-content-center">
            <div class="col-xl-11">
                <div class="it-project-title-box text-center mb-45">
                    <span class="tp-section-subtitle-platform platform-text-black tp-split-text tp-split-right">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                    <h4 class="tp-section-title-platform platform-text-black fs-200 tp-split-text tp-split-right">
                        {!! clean(pureText($content?->title)) !!}
                    </h4>
                </div>
            </div>
        </div>
    </div>

     @if ($portfolios->count() > 0)
    <div class="it-project-slider-wrap text-center">
        <div class="swiper-container it-project-active pb-50">
            <div class="swiper-wrapper">

                @foreach ($portfolios as $portfolio)
                <div class="swiper-slide">
                    <div class="it-project-item text-center">
                        <div class="it-project-thumb fix">
                            <a href="portfolio-details-custom-light.html">
                                <img class="w-100" src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->title }}">
                            </a>
                        </div>
                        <div class="it-project-content">
                            <h4 class="it-project-title">
                                 <a class="tp-line-black" href="{{ route('portfolios.details', ['slug' => $portfolio->slug]) }}">
                                    {{ $portfolio->title }}
                                </a>
                            </h4>
                            <span>
                                {{ $portfolio->service ?? '' }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="it-project-arrow d-inline-flex align-items-center justify-content-center gap-3">
            <button class="it-project-prev">
                <span>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 7H1M1 7L7 1M1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </button>
            <div class="it-project-dots"></div>
            <button class="it-project-next">
                <span>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7H13M13 7L7 1M13 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
    @endif
</div>
<!-- case area end -->
@endif
