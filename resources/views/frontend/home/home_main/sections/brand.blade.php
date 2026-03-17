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
<div class="dgm-brand-area fix">
    <div class="dgm-brand-wrapper">
        <div class="swiper-container dgm-brand-active">
            <div class="swiper-wrapper">
                @foreach ($brands as $brand)
                <div class="swiper-slide">
                    @if (!empty($brand->url))
                        <a href="{{ url($brand->url ?? '#') }}" target="_blank" rel="noopener noreferrer">
                            <div class="dgm-brand-item">
                                <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}">
                            </div>
                        </a>
                    @else
                        <div class="dgm-brand-item">
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
