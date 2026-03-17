<!-- feature area start -->
<div class="app-feature-2-area app-feature-2-ptb z-index-1 pt-160 pb-140">
    <div class="app-feature-2-bg">
        <img class="main-bg" src="{{ asset($default_content?->bg_image) }}" alt="{{ $content?->title }}">
        <img class="shape-1 tp_fade_anim" data-fade-from="top" data-delay=".5" data-ease="bounce" src="{{ asset($default_content?->shape_2) }}" alt="{{ $content?->title }}">
        <img class="shape-2 tp_fade_anim" data-fade-from="top" data-delay=".7" data-ease="bounce" src="{{ asset($default_content?->shape_1) }}" alt="{{ $content?->title }}">
        <img class="shape-3 tp_fade_anim" data-fade-from="top" data-delay=".9" data-ease="bounce" src="{{ asset($default_content?->shape_3) }}" alt="{{ $content?->title }}">
    </div>
    <div class="container container-1230">
        <div class="row">
            <div class="col-lg-12">
                <div class="app-feature-2-heading text-center z-index-1 mb-80">
                    <span class="tp-section-subtitle border-bg bg-color tp_fade_anim" data-delay=".3">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                    <h3 class="tp-section-title-phudu fs-70 mb-20 tp_fade_anim" data-delay=".5">
                        {!! clean(pureText($content?->title)) !!}
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="app-feature-2-content">
                    <span class="tp-section-subtitle border-bg tp_fade_anim" data-fade-from="top" data-delay=".3" data-ease="bounce">
                        {!! clean(pureText($content?->title_2)) !!}
                    </span>
                    <div class="app-feature-2-brd"></div>
                    <div class="app-feature-2-content-icon d-flex">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20" fill="none">
                                <path d="M2.45844 0H1.04844C0.118443 0 -0.351558 1.13 0.308442 1.79L6.03844 7.52C7.67844 9.16 10.3284 9.16 11.9684 7.52L17.6984 1.79C18.3484 1.13 17.8784 0 16.9484 0H15.5384C14.7084 0 13.9084 0.33 13.3184 0.92L9.73844 4.5C9.32844 4.91 8.66844 4.91 8.25844 4.5L4.67844 0.92C4.08844 0.33 3.28844 0 2.45844 0Z" fill="#292D32" />
                                <path opacity="0.4" d="M2.45844 19.97H1.04844C0.118443 19.97 -0.351558 18.84 0.308442 18.18L6.03844 12.45C7.67844 10.81 10.3284 10.81 11.9684 12.45L17.6984 18.18C18.3584 18.84 17.8884 19.97 16.9584 19.97H15.5484C14.7184 19.97 13.9184 19.64 13.3284 19.05L9.74844 15.47C9.33844 15.06 8.67844 15.06 8.26844 15.47L4.68844 19.05C4.08844 19.64 3.28844 19.97 2.45844 19.97Z" fill="#292D32" />
                            </svg></span>
                        <p>
                            {!! clean(pureText($content?->title_3)) !!}
                        </p>
                    </div>
                </div>
                <div class="app-feature-2-thumb z-index-1">
                    <img data-speed="1.1" src="{{ asset($default_content?->main_image) }}" alt="{{ $content?->title }}">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- feature area end -->
