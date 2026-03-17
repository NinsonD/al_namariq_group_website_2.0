 <!-- service process area start -->
<div class="tp-service-4-process-ptb pt-140 pb-140">
    <div class="container container-1230">
        <div class="row">
            <div class="col-lg-12">
                <div class="dgm-service-title-box service-4-heading z-index-1 mb-60">
                    <span class="tp-section-subtitle subtitle-grey mb-15 text-black tp_fade_anim" data-delay=".3">{!! clean(pureText($content?->subtitle)) !!}</span>
                    <h4 class="tp-section-title-grotesk text-black tp_fade_anim the-title" data-delay=".5">
                       {!! clean(pureText($content?->title)) !!}
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="tp-service-4-process-wrap">

                    @for ($index = 1; $index <= 4; $index++)
                    <div class="tp-service-4-process-list">
                        <span>{{ str_pad($index, 2, '0', STR_PAD_LEFT) }}</span>
                        <p>
                            {!! clean(pureText($content?->{'process_title_' . $index})) !!}
                        </p>
                    </div>

                    @endfor
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tp-service-4-process-wrapper pl-70 p-relative">
                    <p class="pl-200 mb-50">{!! clean(pureText($content?->description)) !!}</p>
                    <div class="tp-service-4-process-thumb fix">
                        <div class="tp_img_reveal">
                            <img src="{{ asset($default_content?->image) }}" alt="{{ $content?->title }}">
                        </div>
                    </div>

                    @if (!empty($default_content?->video_url))
                    <div class="tp-service-4-process-video">
                        <a class="popup-video dgm-testimonial-playbtn" href="{{ url($default_content?->video_url ?? '#') }}">
                            <span>
                                <svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 12L0.5 23.2583V0.74167L20 12Z" fill="currentcolor" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service process area end -->
