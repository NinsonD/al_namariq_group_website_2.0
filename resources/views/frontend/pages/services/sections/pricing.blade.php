<!-- service pricing area start -->
<section class="tp-service-4-price-ptb z-index-1 pb-140">
    <div class="tp-service-4-price-shape">
        <img src="{{ asset($default_content?->bg_image) }}" alt="{{ $content?->title }}">
    </div>
    <div class="container container-1230">
        <div class="row">
            <div class="col-lg-12">
                <div class="dgm-service-title-box text-center z-index-1 mb-60">
                    <span class="tp-section-subtitle subtitle-grey mb-15 text-black tp_fade_anim" data-delay=".3">{!! clean(pureText($content?->subtitle)) !!}</span>
                    <h4 class="tp-section-title-grotesk text-black tp_fade_anim" data-delay=".5">{!! clean(pureText($content?->title)) !!}</h4>
                </div>

                 @if ($monthly_pricing->isNotEmpty() && $yearly_pricing->isNotEmpty())
                    <div class="app-price-tab-wrap mb-30 tp_fade_anim d-flex justify-content-center" data-delay=".7">
                        <div class="ai-price-tab tp-marker-tab d-inline-flex justify-content-center p-relative">
                            <ul class="nav nav-tab" id="myTab" role="tablist">
                                <li class="nav-items" role="presentation">
                                    <button class="nav-links active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                        {{ __('frontend.pricing_monthly') }}
                                    </button>
                                </li>
                                <li class="nav-items" role="presentation">
                                    <button class="nav-links" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                                        {{ __('frontend.pricing_yearly') }}
                                    </button>
                                </li>
                            </ul>
                            <span id="lineMarker"></span>
                        </div>
                    </div>
                    @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="app-price-box app-price-service">
                    @if ($monthly_pricing->isNotEmpty() && $yearly_pricing->isNotEmpty())
                    <div class="tab-content" id="myTabContent">
                        @if ($monthly_pricing->isNotEmpty())
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="row">
                                @foreach ($monthly_pricing as $pricing)
                               <div class="col-lg-4 col-md-6">
                                   @include('frontend.pages.services.sections._price-card', ['price' => $pricing])
                               </div>
                               @endforeach
                            </div>
                        </div>
                        @endif

                        @if ($yearly_pricing->isNotEmpty())
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="app-price-box app-price-inner-style">
                                <div class="row">
                                    @foreach ($yearly_pricing as $pricing)
                                    <div class="col-lg-4 col-md-6">
                                        @include('frontend.pages.services.sections._price-card', ['price' => $pricing])
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    @else
                        @if ($pricings->isNotEmpty())
                            <div class="row">
                                @foreach ($pricings as $pricing)
                                <div class="col-lg-4 col-md-6">
                                    @include('frontend.pages.services.sections._price-card', ['price' => $pricing])
                                </div>
                                @endforeach
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service pricing area end -->
