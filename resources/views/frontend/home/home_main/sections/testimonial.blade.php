@php
   if($default_content?->testimonials){
      $testimonials = is_null($default_content?->testimonials) ? [] : json_decode($default_content?->testimonials);
      $testimonials = \Modules\Testimonial\Models\Testimonial::with(['translations'])->whereIn('id', $testimonials)->active()->get();
   }else{
      $testimonials = collect();
   }
@endphp

@if (!empty($content?->title) || !empty($content?->subtitle) || $testimonials->count() > 0 || $default_content?->video_url)


<!-- testimonial area start -->
<div class="dgm-testimonial-area dgm-testimonial-radius dgm-testimonial-space grey-bg-2 pt-120 pb-120 p-relative">
    <div class="dgm-testimonial-bg" data-background="{{ asset($default_content?->bg_shape) }}"></div>
    <div class="dgm-testimonial-thumb">
        <div class="anim-zoomin-wrap">
            <img class="anim-zoomin" src="{{ asset($default_content?->video_thumbnail) }}" alt="{{ $content?->title }}">
        </div>
        <a class="popup-video dgm-testimonial-playbtn" href="{{ url($default_content?->video_url ?? '#' ) }}">
            <span>
                <svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 12L0.5 23.2583V0.74167L20 12Z" fill="currentcolor" />
                </svg>
            </span>
        </a>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="offset-xl-6 col-xl-6 col-lg-8 col-md-9">
                <div class="dgm-testimonial-title-box text-center z-index-1 mb-45">
                    <span class="tp-section-subtitle subtitle-grey mb-15 tp_fade_anim" data-delay=".3">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                    <h4 class="tp-section-title-grotesk tp_fade_anim the-title" data-delay=".5">
                        {!! clean(pureText($content?->title)) !!}
                    </h4>
                </div>
                @if ($testimonials->count() > 0)
                <div class="dgm-testimonial-slider-wrap z-index-1">
                    <div class="siwper-container dgm-testimonial-active fix">
                        <div class="swiper-wrapper">

                            @foreach ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="dgm-testimonial-slider-item text-center">
                                    <div class="dgm-testimonial-quote">
                                        <span>
                                            <svg width="40" height="32" viewBox="0 0 40 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.417 2.25185V11.4963C15.417 13.6296 14.4936 16.079 12.6467 18.8444L4.33602 30.8148C3.77395 31.6049 3.01113 32 2.04757 32C0.682522 32 0 31.2099 0 29.6296V2.37037C0 0.790124 0.802967 0 2.4089 0H13.1285C14.6542 0 15.417 0.750615 15.417 2.25185Z" fill="currentcolor" />
                                                <path d="M40 2.25185V11.4963C40 13.6296 39.0766 16.079 37.2298 18.8444L28.919 30.8148C28.357 31.6049 27.5942 32 26.6306 32C25.2656 32 24.583 31.2099 24.583 29.6296V2.37037C24.583 0.790124 25.386 0 26.9919 0H37.7115C39.2372 0 40 0.750615 40 2.25185Z" fill="currentcolor" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="dgm-testimonial-text">
                                        <p>
                                            {{ $testimonial->comment }}
                                        </p>
                                    </div>
                                    <div class="dgm-testimonial-author-wrap d-flex align-items-center justify-content-center">
                                        <div class="dgm-testimonial-author p-relative">
                                            <img class="dgm-testimonial-author-img" src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}">
                                        </div>
                                        <div class="dgm-testimonial-author-info">
                                            <h4 class="dgm-testimonial-author-name">
                                                {{ $testimonial->name }}
                                            </h4>
                                            <span>
                                                {{ $testimonial->designation }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="dgm-testimonial-dot text-center"></div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- testimonial area end -->
@endif
