@php
    $pricings = \Modules\Pricing\Models\Pricing::with('translations')->active()->get();
    $yearly_pricing = $pricings->where('expiration', 'yearly');
    $monthly_pricing = $pricings->where('expiration', 'monthly');
@endphp

<!-- price area start -->
<div class="app-price-area p-relative pb-130">
    <div class="app-price-bg-shape">
        <img src="{{ asset($default_content?->bg_image) }}" alt="{{ $content?->title }}">
    </div>
    <div class="container container-1230">
        <div class="row align-items-end">
            <div class="col-lg-6">
                <div class="app-price-heading">
                    <span class="tp-section-subtitle border-bg bg-color tp_fade_anim" data-delay=".3">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                    <h3 class="tp-section-title-phudu fs-70 mb-55 tp_fade_anim" data-delay=".5">
                        {!! clean(pureText($content?->title)) !!}
                    </h3>
                </div>
                @if ($monthly_pricing->isNotEmpty() && $yearly_pricing->isNotEmpty())
                <div class="app-price-tab-wrap mb-30 tp_fade_anim" data-delay=".7">
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
            <div class="col-lg-6">
                <div class="d-flex justify-content-start justify-content-lg-end">
                    <div class="app-price-wrap mb-30">

                        <div class="app-price-heading">
                            <p>
                                {!! clean(pureText($content?->description)) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @if ($monthly_pricing->isNotEmpty() && $yearly_pricing->isNotEmpty())
        <div class="tab-content" id="myTabContent">
             @if ($monthly_pricing->isNotEmpty())
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="app-price-box">
                    <div class="row">
                         @foreach ($monthly_pricing as $pricing)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            @include('frontend.pages.partials.price-card-2', ['pricing' => $pricing])
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            @if ($yearly_pricing->isNotEmpty())
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="app-price-box">
                    <div class="row">
                        @foreach ($yearly_pricing as $pricing)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            @include('frontend.pages.partials.price-card-2', ['pricing' => $pricing])
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
        @else
        <!-- content -->
            @if ($pricings->isNotEmpty())
            <div class="app-price-box">
                <div class="row">
                    @foreach ($pricings as $pricing)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        @include('frontend.pages.partials.price-card-2', ['pricing' => $pricing])
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endif
    </div>
</div>
<!-- price area end -->
