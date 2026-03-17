@php
   if($default_content?->services){
      $services = is_null($default_content?->services) ? [] : json_decode($default_content?->services);
      $services = \Modules\Service\Models\Service::with(['translations'])->whereIn('id', $services)->active()->get();
   }else{
      $services = collect();
   }
@endphp

<!-- feature area start -->
<div class="it-feature-area it-feature-ptb z-index-2 p-relative pb-55" data-bg-color="#FDF7F4">
    <div class="it-feature-brand-shape">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="1980" height="121" viewBox="0 0 1980 121" fill="none">
                <path d="M1651.4 1.13373L1970.71 75.1373C1976.15 76.3979 1980 81.2437 1980 86.8274V108.077C1980 114.74 1974.57 120.127 1967.91 120.076L11.9091 105.258C5.31738 105.208 0 99.8504 0 93.2584V24.3544C0 16.5721 7.29346 10.8483 14.8527 12.6984L339.997 92.2748C346.375 93.8356 352.822 89.9816 354.467 83.6255L373.536 9.94507C375.18 3.59379 381.62 -0.260145 387.994 1.29266L759.617 91.8242C765.947 93.3664 772.352 89.5756 774.045 83.2841L793.964 9.2801C795.654 3.00175 802.036 -0.788759 808.358 0.731769L1183.03 90.8533C1189.4 92.3843 1195.82 88.5314 1197.46 82.1939L1216.04 10.4265C1217.68 4.07977 1224.11 0.22659 1230.48 1.77277L1603.51 92.3026C1609.89 93.8489 1616.32 89.995 1617.96 83.6477L1637.07 9.81727C1638.7 3.51669 1645.06 -0.335644 1651.4 1.13373Z" fill="#FDF7F4" />
            </svg>
        </span>
    </div>
    <div class="it-feature-shape-1">
        <img data-speed="1.1" src="{{ asset($default_content?->shape) }}" alt="{{ $content?->title }}">
    </div>
    <div class="container container-1460">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="it-feature-title-box text-center mb-70">
                    <span class="tp-section-subtitle-platform platform-text-black tp-split-text tp-split-right">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                    <h4 class="tp-section-title-platform platform-text-black fs-200 tp-split-text tp-split-right">
                        {!! clean(pureText($content?->title)) !!}
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">

            @if ($services->count() > 0)
                @foreach ($services as $service)
                @php
                    $delays = ['.3', '.5', '.7'];
                    $delay = $delays[$loop->index % 3];
                @endphp
                <div class="col-xl-4 col-md-6 mb-25 tp_fade_anim" data-delay="{{ $delay }}">
                    <div class="it-feature-item text-center tp_fade_ainm">
                        <h4 class="it-feature-title">
                             <a class="tp-line-black" href="{{ route('services.details', ['slug' => $service->slug]) }}">
                                {!! clean(pureText($service->title)) !!}
                            </a>
                        </h4>
                        <div class="it-feature-icon">
                            <img src="{{ asset($service?->icon) }}" alt="{{ $service->title }}">
                        </div>
                        <div class="it-feature-content">
                            <p>
                                {!! clean(pureText($service->short_description)) !!}
                            </p>
                        </div>
                        @if (is_array($service->tags) && count($service->tags) > 0)
                        <div class="it-feature-category">
                            @foreach ($service->tags as $tag)
                                <span>{{ $tag['value'] }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            @endif

            <div class="col-xl-4 col-md-6 mb-25 tp_fade_anim" data-delay=".7">
                <div class="it-feature-item it-feature-item-style-bg d-flex justify-content-between flex-column z-index-1 tp_fade_ainm" data-background="{{ asset($default_content?->bg_image) }}">
                    <div class="it-feature-content">
                        <h4 class="it-feature-title">
                            {!! clean(pureText($content?->box_title)) !!}
                        </h4>
                    </div>
                    <div class="it-feature-btn-box">
                        <a class="tp-btn-black-radius btn-blur d-flex align-items-center justify-content-between" href="{{ route('services') }}">
                            <span>
                                <span class="text-1">{{ $content?->btn_text }}</span>
                                <span class="text-2">{{ $content?->btn_text }}</span>
                            </span>
                            <i>
                                <span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1H1M9 1V9" stroke="#21212D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1H1M9 1V9" stroke="#21212D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- feature area end -->
