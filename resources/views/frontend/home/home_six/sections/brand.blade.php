@php
   if($default_content?->brands_top){
      $brands_top = is_null($default_content?->brands_top) ? [] : json_decode($default_content?->brands_top);
      $brands_top = \Modules\Brand\Models\Brand::whereIn('id', $brands_top)
            ->with('translations')
            ->active()
            ->get();
   }else{
      $brands_top = collect();
   }

   if($default_content?->brands_bottom){
      $brands_bottom = is_null($default_content?->brands_bottom) ? [] : json_decode($default_content?->brands_bottom);
      $brands_bottom = \Modules\Brand\Models\Brand::whereIn('id', $brands_bottom)
            ->with('translations')
            ->active()
            ->get();
   }else{
      $brands_bottom = collect();
   }
@endphp

<!-- brand area start -->
<div class="des-brand-area pb-140">
    @if ($content?->title)
    <div class="container container-1510">
        <div class="row">
            <div class="col-xl-6">
                <div class="des-brand-title-box mb-40">
                    <h3 class="tp-section-title-mango mb-0">{!! clean(pureText($content?->title)) !!}</h3>
                </div>
            </div>
        </div>
    </div>
     @endif
    <div class="des-brand-moving-wrap">
        @if ($brands_top->count() > 0)
        <div class="des-brand-moving-top moving-text pb-10">
            <div class="des-brand-item wrapper-text black-style d-flex align-items-center">
                @foreach ($brands_top as $brand)
                    @if (!empty($brand->url))
                    <a class="des-brand-item-inner" href="{{ url($brand->url ?? '#') }}" target="_blank" rel="noopener noreferrer">
                        <div>
                            <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}">
                        </div>
                    </a>
                    @else
                    <div class="des-brand-item-inner">
                        <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}">
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        @endif

        @if ($brands_bottom->count() > 0)
        <div class="des-brand-moving-bottom moving-text">
            <div class="des-brand-item wrapper-text black-style d-flex align-items-center">

                @foreach ($brands_bottom as $brand)
                    @if (!empty($brand->url))
                    <a href="{{ url($brand->url ?? '#') }}" target="_blank" rel="noopener noreferrer">
                        <div class="des-brand-item-inner">
                            <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}">
                        </div>
                    </a>
                    @else
                    <div class="des-brand-item-inner">
                        <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}">
                    </div>
                    @endif
                @endforeach

            </div>
        </div>
        @endif
    </div>
</div>
<!-- brand area end -->
