@php
   if($default_content?->services){
      $services = is_null($default_content?->services) ? [] : json_decode($default_content?->services);
      $services = \Modules\Service\Models\Service::with(['translations'])->whereIn('id', $services)->active()->get();
   }else{
      $services = collect();
   }
@endphp

@if (!empty($content?->title) || !empty($content?->subtitle) || $services->count() > 0)


<!-- service area end -->
<div class="dgm-service-area dgm-service-radius pt-120 black-bg-5 z-index-1">
    <div class="container container-1230">
        <div class="row">
            <div class="col-xl-7">
                <div class="dgm-service-title-box z-index-1 mb-60">
                    <span class="tp-section-subtitle subtitle-grey mb-15 text-white tp_fade_anim" data-delay=".3">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                    <h4 class="tp-section-title-grotesk text-white tp_fade_anim the-title" data-delay=".5">
                        {!! clean(pureText($content?->title)) !!}
                    </h4>
                </div>
            </div>
        </div>
        <div class="dgm-service-wrap">
            <div class="row">
                <div class="col-xl-12">

                    @if ($services->count() > 0)
                        @foreach ($services as $service)
                            <div class="dgm-service-item p-relative tp_fade_anim">
                                <div class="dgm-service-bg">
                                    <img src="{{ asset($default_content?->services_item_bg) }}" alt="{{ $service->title }}">
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-5">
                                        <div class="dgm-service-content-left d-inline-flex align-items-center">
                                            <span>
                                                {{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}
                                            </span>
                                            <h4 class="dgm-service-title-sm">
                                                <a  href="{{ route('services.details', ['slug' => $service->slug]) }}">
                                                    {!! clean(pureText($service->title)) !!}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="dgm-service-content-right d-flex align-items-center justify-content-between">
                                            <p>{{ $service->short_description }}</p>
                                            <a class="dgm-service-link" href="{{ route('services.details', ['slug' => $service->slug]) }}">
                                                <span>
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.880859 13L12.8809 1M12.8809 1H0.880859M12.8809 1V13" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.880859 13L12.8809 1M12.8809 1H0.880859M12.8809 1V13" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!-- service area end -->
@endif
