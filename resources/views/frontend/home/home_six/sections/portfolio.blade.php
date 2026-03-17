@php
   if($default_content?->portfolios){
      $portfolios = is_null($default_content?->portfolios) ? [] : json_decode($default_content?->portfolios);
      $portfolios = \Modules\Portfolio\Models\Portfolio::with(['translations'])->whereIn('id', $portfolios)->active()->get();
   }else{
      $portfolios = collect();
   }
@endphp

@if ($portfolios->count() > 0)
<!-- portfolio area start -->
<div class="des-portfolio-area pb-160">
    <div class="container container-1750">
        <div class="row">
            <div class="col-xl-12">
                <div class="des-portfolio-wrap">
                    @foreach ($portfolios as $portfolio)
                    <div class="des-portfolio-item des-portfolio-panel p-relative not-hide-cursor mb-30" data-cursor="{!! clean(pureText($content?->view_demo)) !!}">
                        <a class="cursor-hide" href="{{ route('portfolios.details', ['slug' => $portfolio->slug]) }}">
                            <div class="des-portfolio-thumb p-relative">
                                <img src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->title }}">
                            </div>

                            @if (is_array($portfolio->tags) && count($portfolio->tags) > 0)
                            <div class="des-portfolio-category">
                                @foreach ($portfolio->tags as $tag)
                                <span>{{ $tag['value'] }}</span>
                                @endforeach
                            </div>
                            @endif


                            <div class="des-portfolio-category portfolio-meta">
                                <span>
                                    {{ $portfolio->year }}
                                </span>
                            </div>
                        </a>
                        <div class="des-portfolio-content">
                            <h2 class="des-portfolio-title">
                                <a href="{{ route('portfolios.details', ['slug' => $portfolio->slug]) }}">{{ $portfolio->title }}</a>
                            </h2>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- portfolio area end -->
@endif
