<!-- feature area start -->
<div class="tp-shop-feature-ptb pb-120">
    <div class="container container-1200">
        <div class="tp-shop-feature-wrap">
            <div class="row">
                @for ($i = 1; $i <= 3; $i++)
                <div class="col-xl-4 col-md-6 tp_fade_anim" data-delay=".3">
                    <div class="tp-shop-feature-item mb-30 text-center">
                        <span>
                            <img width="26" src="{{ asset($default_content?->{'icon_' . $i}) }}" alt="{{ $content?->{'feature_title_' . $i} }}">
                        </span>
                        <h4>{{ $content?->{'feature_title_' . $i} }}</h4>
                        <p>
                            {!! clean(pureText($content?->{'feature_description_' . $i})) !!}
                        </p>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
<!-- feature area end -->
