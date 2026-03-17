@php
   if($default_content?->portfolios){
      $portfolios = is_null($default_content?->portfolios) ? [] : json_decode($default_content?->portfolios);
      $portfolios = \Modules\Portfolio\Models\Portfolio::with(['translations'])->whereIn('id', $portfolios)->active()->get();
   }else{
      $portfolios = collect();
   }
@endphp

<!-- project area start -->
<div class="tp-project-area pt-200 pb-60">
    <div class="container">
        <div class="tp-project-title-box mb-50">
            <div class="row">
                <div class="col-md-6">
                    <div class="tp-project-subtitle-wrap">
                        <span class="tp-section-subtitle pre">{!! clean(pureText($content?->subtitle)) !!}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tp-project-link text-start text-md-end">
                        <a href="{{ url($default_content?->btn_url ?? '#') }}" class="tp-btn-black btn-red-bg">
                            <span class="tp-btn-black-filter-blur">
                                <svg width="0" height="0">
                                    <defs>
                                        <filter id="buttonFilter6">
                                            <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur"></feGaussianBlur>
                                            <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9"></feColorMatrix>
                                            <feComposite in="SourceGraphic" in2="buttonFilter6" operator="atop"></feComposite>
                                            <feBlend in="SourceGraphic" in2="buttonFilter6"></feBlend>
                                        </filter>
                                    </defs>
                                </svg>
                            </span>
                            <span class="tp-btn-black-filter d-inline-flex align-items-center" style="filter: url(#buttonFilter6)">
                                <span class="tp-btn-black-text">{!! clean(pureText($content?->subtitle)) !!}</span>
                                <span class="tp-btn-black-circle">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1H1M9 1V9" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if ($portfolios->count() > 0)
        <div class="row gx-135 grid">
            @foreach ($portfolios as $portfolio)
            <div class="col-md-6 grid-item">
                <div class="tp-project-item mb-95 tp--hover-item ">
                    <div class="tp-project-thumb not-hide-cursor" data-cursor="{!! clean(pureText($content?->view_demo)) !!}">
                        <a class="cursor-hide tp--hover-img" data-displacement="{{ asset('admin/img/default/home-five/h5-portfolio-webgl.jpg') }}" data-intensity="0.6" data-speedin="1" data-speedout="1" href="{{ route('portfolios.details', ['slug' => $portfolio->slug]) }}">
                            <img src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->title }}">
                        </a>
                    </div>
                    <div class="tp-project-content">
                        <h4 class="tp-project-title">
                            <a class="tp-line-black" href="{{ route('portfolios.details', ['slug' => $portfolio->slug]) }}">{{ $portfolio->title }}</a>
                        </h4>

                        @if (is_array($portfolio->tags) && count($portfolio->tags) > 0)
                        <div class="tp-project-category">
                            @foreach ($portfolio->tags as $tag)
                                <span>{{ $tag['value'] }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @endif
    </div>
</div>
<!-- project area end -->
