<!-- feature area start -->
<div class="app-feature-area app-feature-border-style">
    <div class="container container-1230">
        <div class="row">
            <div class="col-lg-12">
                <div class="app-feature-heading text-center mb-55">
                    <span class="tp-section-subtitle border-bg bg-color tp_fade_anim" data-delay=".3">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                    <h3 class="tp-section-title-phudu fs-70 mb-20 tp_fade_anim" data-delay=".5">
                        {!! clean(pureText($content?->title)) !!}
                    </h3>
                    <div class="tp_fade_anim" data-delay=".7">
                        <p>{!! clean(pureText($content?->description)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-feature-bg tp_fade_anim">
            <div class="row gx-10">
               @for ($i = 1; $i <= 3; $i++)
                <div class="col-lg-4 col-md-6">
                    <div class="app-feature-item mb-30">
                        <div class="app-feature-item-icon">
                            <span>
                                <img width="26" src="{{ asset($default_content?->{'icon_' . $i}) }}" alt="{{ $content?->{'feature_title_' . $i} }}">
                            </span>
                        </div>
                        <div class="app-feature-item-content">
                            <h4 class="app-feature-title">
                                {{ $content?->{'feature_title_' . $i} }}
                            </h4>
                            <p>
                                {!! clean(pureText($content?->{'feature_description_' . $i})) !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endfor

            </div>
        </div>
    </div>
</div>
<!-- feature area end -->
