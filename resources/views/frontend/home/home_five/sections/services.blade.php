@php
   if($default_content?->services){
      $services = is_null($default_content?->services) ? [] : json_decode($default_content?->services);
      $services = \Modules\Service\Models\Service::with(['translations'])->whereIn('id', $services)->active()->get();
   }else{
      $services = collect();
   }
@endphp

<!-- service area start -->
<div class="tp-service-area pt-120">
    <div class="container-fluid p-0">
        <div class="row gx-0">
            <div class="col-12">
                <div class="tp-service-title-box">
                    <span class="tp-section-subtitle pre">{!! clean(pureText($content?->subtitle)) !!}</span>
                </div>
            </div>
        </div>
        @if ($services->count() > 0)
        <div class="tp-service-pin">
            @foreach ($services as $service)
            <div class="tp-service-item tp-service-panel">
                <div class="row">
                    <div class="col-xxl-3 col-xl-2 col-lg-1 col-md-1">
                        <div class="tp-service-number">
                            <span>
                                {{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}.
                            </span>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-7">
                        <div class="tp-service-content">
                            <h4 class="tp-section-title">
                                <a class="tp_text_invert" href="{{ route('services.details', ['slug' => $service->slug]) }}">{{ $service->title }}</a>
                            </h4>
                            <p>
                                {{ $service->short_description }}
                            </p>
                            <div class="tp-service-btn">
                                <a href="{{ route('services.details', ['slug' => $service->slug]) }}" class="tp-btn-black btn-red-bg">
                                    <span class="tp-btn-black-filter-blur">
                                        <svg width="0" height="0">
                                            <defs>
                                                <filter id="buttonFilter2-{{ $loop->index }}">
                                                    <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur"></feGaussianBlur>
                                                    <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9"></feColorMatrix>
                                                    <feComposite in="SourceGraphic" in2="buttonFilter2-{{ $loop->index }}" operator="atop"></feComposite>
                                                    <feBlend in="SourceGraphic" in2="buttonFilter2-{{ $loop->index }}"></feBlend>
                                                </filter>
                                            </defs>
                                        </svg>
                                    </span>
                                    <span class="tp-btn-black-filter d-inline-flex align-items-center" style="filter: url(#buttonFilter2-{{ $loop->index }})">
                                        <span class="tp-btn-black-text">
                                            {{ __('frontend.view_more') }}
                                        </span>
                                        <span class="tp-btn-black-circle">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 9L9 1M9 1H1M9 1V9" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </span>
                                </a>
                            </div>
                            @if (is_array($service->tags) && count($service->tags) > 0)
                                <div class="tp-service-category">
                                    @foreach ($service->tags as $tag)
                                        <span>{{ $tag['value'] }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                        <div class="tp-service-thumb text-end">
                            <img class="tp_fade_anim" data-fade-from="right" data-delay=".2" src="{{ asset($service->image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
<!-- service area end -->
