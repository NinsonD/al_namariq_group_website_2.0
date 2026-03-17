<!-- work area start -->
<div class="tp-work-area pt-120 pb-145 tp-panel-pin-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="tp-work-title-box tp-panel-pin">
                    <span class="tp-section-subtitle pre mb-20">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                    <h2 class="tp-section-title fs-140">
                        {!! clean(pureText($content?->title)) !!}
                    </h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tp-work-wrapper">

                    @for ($i = 1; $i <= 4; $i++)
                    <div class="tp-work-item tp-panel-pin mb-15">
                        <div class="tp-work-number p-relative">
                            <span></span>
                            <i>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</i>
                        </div>
                        <div class="tp-work-content">
                            <h4 class="tp-work-title">
                                {!! clean(pureText($content?->{'step_title_' . $i})) !!}
                            </h4>
                            <p>
                                {!! clean(pureText($content?->{'step_description_' . $i})) !!}
                            </p>
                        </div>
                    </div>
                @endfor


                </div>
            </div>
        </div>
    </div>
</div>
<!-- work area end -->
