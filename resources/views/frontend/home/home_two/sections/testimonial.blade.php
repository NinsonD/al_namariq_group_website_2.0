@php
   if($default_content?->testimonials){
      $testimonials = is_null($default_content?->testimonials) ? [] : json_decode($default_content?->testimonials);
      $testimonials = \Modules\Testimonial\Models\Testimonial::with(['translations'])->whereIn('id', $testimonials)->active()->get();
   }else{
      $testimonials = collect();
   }
@endphp

@if (!empty($content?->title) || !empty($content?->description) || $testimonials->count() > 0)
<!-- testimonial area start -->
<div class="it-testimonial-area it-testimonial-ptb pt-140 pb-120">
    <div class="container container-1230">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="it-testimonial-title-box text-center mb-70">
                    <span class="tp-section-subtitle-platform platform-text-black mb-20 tp-split-text tp-split-right">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                    <h4 class="tp-section-title-platform platform-text-black mb-20 tp-split-text tp-split-right">
                        {!! clean(pureText($content?->title)) !!}
                    </h4>
                </div>
            </div>
        </div>

        @if ($testimonials->count() > 0)
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="it-testimonial-slider-wrap p-relative">
                    <div class="it-testimonial-arrow">
                        <button class="it-testimonial-prev">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 7H1M1 7L7 1M1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <button class="it-testimonial-next">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 7H13M13 7L7 1M13 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <div class="swiper-container it-testimonial-active fix">
                        <div class="swiper-wrapper">
                            @foreach ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="it-testimonial-item">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="it-testimonial-thumb">
                                                <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="it-testimonial-content">
                                                <p>
                                                    {{ $testimonial->comment }}
                                                </p>
                                                <span>{{ $testimonial->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
         @endif
    </div>
</div>
<!-- testimonial area end -->
@endif
