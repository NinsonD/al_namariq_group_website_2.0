<!-- step area start -->
<div class="it-step-area it-step-bg paste-bg-2 p-relative pt-120 pb-140 z-index-1">
    <div class="it-step-shape-1">
        <img data-speed="1.1" src="{{ asset($default_content?->bg_shape_1) }}" alt="{{ $content?->title }}">
    </div>
    <div class="it-step-shape-2 d-none d-xxl-block">
        <img data-speed="1.1" src="{{ asset($default_content?->bg_shape_2) }}" alt="{{ $content?->title }}">
    </div>
    <div class="container container-1230">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="it-step-title-box z-index-1 text-center mb-105">
                    <span class="tp-section-subtitle-platform mb-20 tp-split-text tp-split-right">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                    <h4 class="tp-section-title-platform mb-20 tp-split-text tp-split-right">
                        {!! clean(pureText($content?->title)) !!}
                    </h4>
                    <div class="tp_text_anim">
                        <p>
                            {!! clean(pureText($content?->description)) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-xl-5">
                <div class="it-step-thumb-wrap p-relative">
                    <div class="it-step-thumb">
                        <img src="{{ asset($default_content?->main_image) }}" alt="{{ $content?->title }}">
                    </div>
                    <img class="it-step-thumb-shape-1" data-speed=".9" src="{{ asset($default_content?->thumb_shape_1) }}" alt="{{ $content?->title }}">
                    <img class="it-step-thumb-shape-2" src="{{ asset($default_content?->thumb_shape_2) }}" alt="{{ $content?->title }}">
                </div>
            </div>
            <div class="col-xl-7">
                <div class="it-step-accordion-wrap it-faq-wrap">
                    <div class="accordion it-faq-accordion" id="accordionExample">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="accordion-items {{ $i == 1 ? 'faq-active' : '' }}">
                                <h2 class="accordion-header">
                                    <button class="accordion-buttons {{ $i != 1 ? 'collapsed' : '' }}"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $i }}"
                                            aria-expanded="{{ $i == 1 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $i }}">
                                        <i>{{ $content?->{'step_subtitle_'.$i} }}</i>
                                        <span>{{ $content?->{'step_title_'.$i} }}</span>
                                    </button>
                                </h2>
                                <div id="collapse{{ $i }}"
                                    class="accordion-collapse collapse {{ $i == 1 ? 'show' : '' }}"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{ $content?->{'step_description_'.$i} }}</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- step area end -->
