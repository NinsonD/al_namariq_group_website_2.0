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

@if ($brands->count() > 0)
<!-- brand area start -->
<div class="creative-brand-area it-brand-style text-center paste-bg-2 p-relative pb-200">
    <span class="creative-brand-top-text tp-split-text tp-split-right">
        {!! clean(pureText($content?->title)) !!}
    </span>
    <div class="creative-brand-wrapper">
        <div class="swiper-container creative-brand-active">
            <div class="swiper-wrapper slider-transtion align-items-center">

                @foreach ($brands as $brand)
                <div class="swiper-slide">
                    @if (!empty($brand->url))
                        <a href="{{ url($brand->url ?? '#') }}" target="_blank" rel="noopener noreferrer">
                            <div class="creative-brand-item">
                                <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}">
                            </div>
                        </a>
                    @else
                        <div class="creative-brand-item">
                            <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}">
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- brand area end -->

@endif
