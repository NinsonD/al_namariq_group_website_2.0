@php
   if($default_content?->testimonials){
      $testimonials = is_null($default_content?->testimonials) ? [] : json_decode($default_content?->testimonials);
      $testimonials = \Modules\Testimonial\Models\Testimonial::with(['translations'])->whereIn('id', $testimonials)->active()->get();
   }else{
      $testimonials = collect();
   }

    $styles = ['white-style', 'green-style', 'black-style', 'grey-style'];
    $styleCount = count($styles);
    $lastStyle = null;

@endphp

<!-- testimonial area start -->
<div class="tp-testimonial-area tp-testimonial-bg black-bg-3 p-relative fix" data-background="{{ asset('admin/img/default/home-five/h5-testimonial-noise.png') }}">
    <div class="tp-testimonial-global">
        <img class="global-img" src="{{ asset($default_content?->bg_shape) }}" alt="{{ $content?->title }}">
        <img class="overlay-img" src="{{ asset($default_content?->bg_image) }}" alt="{{ $content?->title }}">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="tp-testimonial-title-wrap z-index-3">
                    <div class="tp-testimonial-title-box mb-20 text-center">
                        <h4 class="tp-section-title text-white">{!! clean(pureText($content?->title)) !!}</h4>
                    </div>
                    <div class="tp-testimonial-ratting-box d-flex justify-content-center">
                        <img class="overlay-img" src="{{ asset($default_content?->review_image) }}" alt="{{ $content?->title }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($testimonials->count() > 0)
    <div class="tp-testimonial-slider-wrap z-index-3">
        <div class="swiper-container tp-testimonial-slider-active">
            <div class="swiper-wrapper">
                @foreach ($testimonials as $index => $testimonial)
                @php
                    $style = $styles[$index % $styleCount];

                    if ($style === $lastStyle) {
                        $nextIndex = ($index + 1) % $styleCount;
                        $style = $styles[$nextIndex];
                    }

                    $lastStyle = $style;
                @endphp

                <div class="swiper-slide">
                    <div class="tp-testimonial-item {{ $style }}">
                        <div class="tp-testimonial-text">
                            <p>
                                {{ $testimonial->comment }}
                            </p>
                        </div>
                        <div class="tp-testimonial-author d-flex align-items-center">
                            <div class="tp-testimonial-avater">
                                <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}">
                            </div>
                            <div class="tp-testimonial-author-info">
                                <span>{{ $testimonial->name }}</span>
                                <p>{{ $testimonial->designation }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    @endif
</div>
<!-- testimonial area end -->


<!-- award area start -->
<div class="tp-award-area tp-award-bg black-bg-3" data-background="{{ asset('admin/img/default/home-five/h5-testimonial-noise.png') }}">
    <div class="container container-1230">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class="tp-award-top-wrap mb-160">
                    <div class="row">
                        <div class="col-md-4 mb-30">
                            <div class="tp-award-img text-center">
                                <img src="{{ asset($default_content?->image_1) }}" alt="{{ $content?->title }}">
                            </div>
                        </div>
                        <div class="col-md-4 mb-30">
                            <div class="tp-award-img text-center">
                                <img src="{{ asset($default_content?->image_2) }}" alt="{{ $content?->title }}">
                            </div>
                        </div>
                        <div class="col-md-4 mb-30">
                            <div class="tp-award-img text-center">
                                <img src="{{ asset($default_content?->image_3) }}" alt="{{ $content?->title }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- award area end -->
