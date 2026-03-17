
@php
    $title_image_url = $default_content?->title_image ? asset($default_content?->title_image) : '';

    $rawTitle = $content?->title;

    $newTitle = str_replace('[title_image]', '', $rawTitle);

    // Replace all [title_image] placeholders with the span+img HTML
    $processedTitle = str_replace(
        '[title_image]',
        '<span><img class="tp-hero-video d-none d-xl-inline-block" src="' . e($title_image_url) . '" alt="' . e($newTitle) . '"></span>',
        e($rawTitle)
    );

    $processedTitle = html_entity_decode($processedTitle);

@endphp

<!-- hero area start -->
<div class="tp-hero-area tp-hero-ptb tp-image-distortion p-relative fix z-index-1" data-background="{{ asset($default_content?->bg_image) }}">
    <div class="container container-1750">
        <div class="row">
            <div class="col-xl-9">
                <div class="tp-hero-title-box">
                    <h2 class="tp-hero-title tp-char-animation">
                        {!! clean(pureText($processedTitle)) !!}
                    </h2>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="tp-hero-content-wrap d-flex flex-xl-column justify-content-between pb-20">
                    <div class="tp-hero-info d-flex align-items-start justify-content-between tp_text_anim">
                        <p>{!! clean(pureText($content?->description)) !!}</p>
                        <span>
                            <a href="{{ url($default_content?->btn_url ?? '#') }}">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 21L21 1M21 1H1M21 1V21" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 21L21 1M21 1H1M21 1V21" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </span>
                    </div>
                    <div class="tp-hero-more-info-wrap d-inline-flex justify-content-end tp_fade_anim" data-delay="1.5">
                        <div class="tp-hero-more-info p-relative" data-background="{{ asset('admin/img/default/home-five/hero-svg-1.svg') }}">
                            <span class="tp-hero-line d-none d-sm-block"></span>
                            <div class="tp-hero-avater d-flex align-items-center justify-content-between">
                                <img src="{{ asset($default_content?->quote_image) }}" alt="{{ $content?->quote_author }}">
                                <span>{!! clean(pureText($content?->quote_author)) !!}</span>
                            </div>
                            <p>{!! clean(pureText($content?->quote)) !!}</p>

                            @if (!empty($content?->quote_btn_text))
                            <div class="tp-hero-link text-end">
                                <a href="{{ url($default_content?->btn_url ?? '#') }}">{!! clean(pureText($content?->quote_btn_text)) !!}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero area end -->
