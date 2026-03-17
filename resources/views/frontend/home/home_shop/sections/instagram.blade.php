@php
   if($default_content?->instagrams){
      $instagrams = is_null($default_content?->instagrams) ? [] : json_decode($default_content?->instagrams);
      $instagrams = \Modules\Shop\Models\Instagram::whereIn('id', $instagrams)->active()->get();
   }else{
      $instagrams = collect();
   }
@endphp

<!-- instagram area start -->
<div class="tp-shop-instagram-area p-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-product-instagram-heading text-center mb-50">
                    <h4 class="tp-shop-section-title">{!! clean(pureText($content?->title)) !!}</h4>
                    <p>{!! clean(pureText($content?->subtitle)) !!}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="row gx-0">
            <div class="col-xl-12">
                <div class="swiper-container ai-instagram-active">
                    <div class="swiper-wrapper">
                        @foreach($instagrams as $instagram)
                        <div class="swiper-slide">
                            <div class="tp-shop-instagram-item">
                                <a href="{{ url($instagram->link ?? '#') }}">
                                    <img src="{{ asset($instagram->image) }}" alt="{{ $settings?->app_name }}">
                                </a>
                                <div class="tp-shop-instagram-icon">
                                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M24.5 2H9.5C5.35786 2 2 5.35786 2 9.5V24.5C2 28.6421 5.35786 32 9.5 32H24.5C28.6421 32 32 28.6421 32 24.5V9.5C32 5.35786 28.6421 2 24.5 2Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M23 16.0545C23.1852 17.3028 22.9719 18.5778 22.3907 19.698C21.8094 20.8182 20.8898 21.7266 19.7625 22.294C18.6352 22.8614 17.3577 23.0589 16.1117 22.8584C14.8657 22.6579 13.7147 22.0696 12.8223 21.1772C11.9299 20.2848 11.3416 19.1338 11.1412 17.8878C10.9407 16.6418 11.1381 15.3643 11.7055 14.237C12.2729 13.1098 13.1813 12.1901 14.3015 11.6088C15.4217 11.0276 16.6967 10.8144 17.945 10.9995C19.2184 11.1883 20.3973 11.7817 21.3076 12.6919C22.2179 13.6022 22.8112 14.7811 23 16.0545Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M25.25 8.75H25.265" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- instagram area end -->
