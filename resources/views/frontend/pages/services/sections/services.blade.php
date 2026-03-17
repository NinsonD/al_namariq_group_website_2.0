<section class="tp-service-4-solution-area pt-135 pb-140">
    <div class="container container-1320">
        <div class="row">
            <div class="col-lg-5">
                <div class="tp-service-4-solution-subtitle pb-50 tp_fade_anim">
                    <p> {!! clean(pureText($content?->subtitle)) !!}</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="tp-service-4-solution-heading pb-100 tp_fade_anim">
                    <h3 class="tp-service-4-solution-title"> {!! clean(pureText($content?->title)) !!}</h3>
                </div>
            </div>
        </div>

        @if ($services->isNotEmpty())
            <div class="row">
                @foreach ($services as $service)
                <div class="col-md-4">
                    <div class="tp-service-4-solution-item mb-30">
                        <div class="tp-service-4-solution-item-icon">
                            <img src="{{ asset($service->icon) }}" alt="{{ $service->title }}">
                        </div>
                        <div class="tp-service-4-solution-item-content">
                            <h4 class="tp-service-4-solution-item-title">
                                <a class="tp-line-black" href="{{ route('services.details', ['slug' => $service->slug]) }}">{!! clean(pureText($service->title)) !!}</a>
                            </h4>
                            <p>
                                {{ $service->short_description }}
                            </p>
                        </div>
                        <div class="tp-service-4-solution-item-btn">
                            <a class="tp-line-black" href="{{ route('services.details', ['slug' => $service->slug]) }}">
                                {{ __('frontend.view_details') }}
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35796 6.59396L1.14867 13.8038C1.02249 13.9296 0.851498 14.0003 0.673273 14.0001C0.540303 14.0001 0.410328 13.9606 0.299776 13.8867C0.189224 13.8129 0.103059 13.7079 0.0521774 13.585C0.00129604 13.4622 -0.0120192 13.327 0.0139141 13.1966C0.0398474 13.0661 0.103867 12.9463 0.197876 12.8523L7.40747 5.64271L2.41379 3.30208Z" fill="#030303" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

             <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex align-items-center justify-content-center pagination-default">
                        {{ $services->links('components.frontend-pagination') }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
