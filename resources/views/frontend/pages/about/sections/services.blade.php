@php
   if($default_content?->services){
      $services = is_null($default_content?->services) ? [] : json_decode($default_content?->services);
      $services = \Modules\Service\Models\Service::with(['translations'])->whereIn('id', $services)->active()->get();
   }else{
      $services = collect();
   }
@endphp

<!-- service area start -->
<div class="creative-service-area pb-70 pt-160">
    <div class="container container-1580">
        <div class="row mb-80">
            <div class="col-xl-3">
                <div class="creative-service-subtitle-box about-us-4">
                    <span class="tp-section-subtitle mb-20 fs-17 pre-circle">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="creative-service-title-box">
                    <h4 class="tp-section-title fs-44">
                        {!! clean(pureText($content?->title)) !!}
                    </h4>
                </div>
            </div>
            <div class="col-xl-3 col-lg-5">
                <div class="creative-service-top-content">
                    <p>
                        {!! clean(pureText($content?->description)) !!}
                    </p>
                    <a href="blog-grid-2-col-light.html" class="tp-btn-black btn-red-bg pr-15">
                        <span class="tp-btn-black-filter-blur">
                            <svg width="0" height="0">
                                <defs>
                                    <filter id="buttonFilter5">
                                        <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur"></feGaussianBlur>
                                        <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9"></feColorMatrix>
                                        <feComposite in="SourceGraphic" in2="buttonFilter5" operator="atop"></feComposite>
                                        <feBlend in="SourceGraphic" in2="buttonFilter5"></feBlend>
                                    </filter>
                                </defs>
                            </svg>
                        </span>
                        <span class="tp-btn-black-filter d-inline-flex align-items-center" style="filter: url(#buttonFilter5)">
                            <span class="tp-btn-black-text">
                                {{ __('frontend.see_all_services') }}
                            </span>
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

        @if ($services->count() > 0)
        <div class="creative-service-wrap">
            <div class="row">
                <div class="offset-xl-3 col-xl-9">
                    @foreach ($services as $service)
                    <div class="creative-service-item about-us-4 d-flex align-items-start justify-content-between tp_fade_anim">
                        <div class="creative-service-content d-flex align-items-start">
                            <span>
                                ({{ $loop->iteration < 10 ? '0' : '' }}{{ $loop->iteration }})
                            </span>
                            <div class="creative-service-title-info">
                                <h4 class="creative-service-title">
                                    <a href="{{ route('services.details', ['slug' => $service->slug]) }}">{!! clean(pureText($service->title)) !!}</a>
                                </h4>
                                @if (is_array($service->tags) && count($service->tags) > 0)
                                <div class="creative-service-category">
                                    @foreach ($service->tags as $tag)
                                        <span>{{ $tag['value'] }}</span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="creative-service-link">
                            <a href="{{ route('services.details', ['slug' => $service->slug]) }}">
                                <span>
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 13L13 1M13 1H1M13 1V13" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<!-- service area end -->
