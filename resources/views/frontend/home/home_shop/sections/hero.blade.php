@php
   if($default_content?->sliders){
      $sliders = is_null($default_content?->sliders) ? [] : json_decode($default_content?->sliders);
      $sliders = \Modules\Frontend\Models\Slider::with('translations')->whereIn('id', $sliders)->active()->get();
   }else{
      $sliders = collect();
   }
@endphp
<!-- tp-hero-shop-area start -->
<div class="tp-hero-shop-area pt-120 p-relative fix" data-bg-color="#E8E0D4">
    <h1 class="tp-hero-shop-title">{!! clean(pureText($content?->title)) !!}</h1>
    <div class="container container-1830">
        <div class="tp-hero-shop-slider-main">
            @if ($sliders->isNotEmpty())
            <div class="tp-hero-shop-slider-wrap slider-for-1">
                @foreach($sliders as $slider)
                <div class="tp-hero-shop-slider-item">
                    <div class="row align-items-end">
                        <div class="offset-xl-1 col-xl-4">
                            <div class="tp-hero-shop-slider-content">
                                <span class="tp-hero-shop-slider-subtitle">{!! clean(pureText($slider?->subtitle)) !!}</span>
                                <h4 class="tp-hero-shop-slider-title">{!! clean(pureText($slider?->title)) !!}</h4>
                                @if (!empty($slider->btn_text))
                                <div class="tp-hero-shop-btn">
                                    <a class="tp-btn-white-border coffee-bg" href="{{ url($slider->btn_link ?? '#') }}">{{ $slider->btn_text }}</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="tp-hero-shop-slider-thumb">
                                <img src="{{ asset($slider?->image) }}" alt="{{ $slider?->title }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
             @endif
            <div class="tp-hero-shop-slider-nav-wrap">
                <div class="tp-hero-shop-slider-nav slider-nav-1">
                     @foreach($sliders as $slider)
                    <div class="tp-hero-shop-slider-nav-thumb">
                        <img src="{{ asset($slider?->nav_image) }}" alt="{{ $slider?->title }}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tp-hero-shop-area start -->
