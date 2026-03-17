@php
   if($default_content?->brands){
      $brands = is_null($default_content?->brands) ? [] : json_decode($default_content?->brands);
      $brands = \Modules\Brand\Models\Brand::whereIn('id', $brands)
            ->with('translations')
            ->active()
            ->get();;
   }else{
      $brands = collect();
   }
@endphp


<!-- brand area start -->
<div class="app-brand-area pt-120 pb-130">
    <div class="container container-1230">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="app-brand-heading text-center mb-45">
                    <span class="tp-section-subtitle subtitle-black">
                        {{ $content?->title }}
                    </span>
                </div>
            </div>


            @if ($brands->count() > 0)
            <div class="col-lg-8">
                <div class="swiper-container app-brand-active fix">
                    <div class="swiper-wrapper slider-transtion">

                        @foreach ($brands as $brand)
                        <div class="swiper-slide">
                            @if (!empty($brand->url))
                                <a href="{{ url($brand->url ?? '#') }}" target="_blank" rel="noopener noreferrer">
                                    <div class="app-brand-item">
                                        <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}">
                                    </div>
                                </a>
                            @else
                                <div class="app-brand-item">
                                    <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}">
                                </div>
                            @endif
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- brand area end -->
