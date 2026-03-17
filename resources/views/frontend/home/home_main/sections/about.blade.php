<div class="dgm-about-area pt-120 pb-120">
    <div class="container container-1230">
        <div class="row">
            <div class="col-lg-6">
                <div class="dgm-about-thumb-wrap p-relative">
                    <img class="tp_fade_anim" data-delay=".3" data-fade-from="left" src="{{ asset($default_content?->image) }}" alt="{{ $content?->title }}">
                    <img class="dgm-about-thumb-1 tp_fade_anim" data-speed="1.1" data-delay=".5" src="{{ asset($default_content?->image_2) }}" alt="{{ $content?->title }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="dgm-about-right">
                    <div class="dgm-about-title-box z-index-1 mb-35">
                        <span class="tp-section-subtitle subtitle-black mb-15 tp_fade_anim" data-delay=".3">{!! clean(pureText($content?->subtitle)) !!}</span>
                        <h4 class="tp-section-title-grotesk tp_fade_anim the-title" data-delay=".5">
                           {!! clean(pureText($content?->title)) !!}
                        </h4>
                    </div>
                    <div class="dgm-about-content">
                        <div class="tp_fade_anim" data-delay=".3">
                            <p>
                                {!! clean(pureText($content?->description)) !!}
                            </p>
                        </div>
                        @if (!empty($content?->btn_text))
                        <div class="tp_fade_anim" data-delay=".5">
                            <a class="tp-btn-yellow-green green-solid btn-60 mb-50" href="{{ url($default_content?->btn_url ?? '#') }}">
                                <span>
                                    <span class="text-1">{{ $content?->btn_text }}</span>
                                    <span class="text-2">{{ $content?->btn_text }}</span>
                                </span>
                                <i>
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </i>
                            </a>
                        </div>
                          @endif
                        <div class="dgm-about-review-wrap tp_fade_anim" data-delay=".6">
                            <div class="dgm-about-review-box d-inline-flex align-items-center">
                                <div class="dgm-about-review">
                                    <h4>{{ __('frontend.review_number', ['number' => 4.9]) }}</h4>
                                    <span>{{ __('frontend.review_count', ['count' => 24]) }}</span>
                                </div>
                                <div class="dgm-about-ratting">
                                    <h4>{{ __('frontend.average_rating') }}</h4>
                                    <div class="dgm-about-ratting-icon">
                                        <span>
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
