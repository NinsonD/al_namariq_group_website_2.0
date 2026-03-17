@php
   if($default_content?->brands){
      $brands = is_null($default_content->brands) ? [] : json_decode($default_content->brands);
      $brands = \Modules\Brand\Models\Brand::whereIn('id', $brands)->active()->get();
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
                    <div class="dgm-brand-item">
                        @if (!empty($brand->url))
                            <a href="{{ url($brand->url ?? '#') }}">
                                <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}">
                            </a>
                        @else
                            <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}">
                        @endif

                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- brand area end -->
@endif
