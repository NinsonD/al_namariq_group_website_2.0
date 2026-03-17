@php
   if($default_content?->faqs){
      $faqs = is_null($default_content?->faqs) ? [] : json_decode($default_content?->faqs);
      $faqs = \Modules\Faqs\Models\Faq::with(['translations'])->whereIn('id', $faqs)->active()->get();
   }else{
      $faqs = collect();
   }
@endphp
<!-- faq area start -->
<div class="app-faq-area p-relative pb-120">
    <div class="app-faq-shape" data-speed=".8">
        <img src="{{ asset($default_content?->shape) }}" alt="{{ $content?->title }}">
    </div>
    <div class="container container-1230">
        <div class="row">
            <div class="col-lg-4">
                <div class="app-faq-heading p-relative mb-40">
                    <span class="tp-section-subtitle border-bg bg-color tp_fade_anim" data-delay=".3">
                        {!! clean(pureText($content?->subtitle)) !!}
                    </span>
                    <h3 class="tp-section-title-phudu fs-70 mb-20 tp_fade_anim" data-delay=".5">
                        {!! clean(pureText($content?->title)) !!}
                    </h3>
                </div>
            </div>

            @if ($faqs->isNotEmpty())
            <div class="col-lg-8">
                <div class="app-faq-wrap pl-70">
                    <div class="ai-faq-accordion-wrap">
                        <div class="accordion" id="accordionExample1">

                            @foreach ($faqs as $faq)
                                @php
                                    $show = $loop->first ? 'show' : '';
                                @endphp
                            <div class="accordion-items">
                                <h2 class="accordion-header" id="heading-{{ $loop->index }}">
                                    <button class="accordion-buttons {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="true" aria-controls="collapse-{{ $loop->index }}">
                                       {{ $faq->question }}
                                        <span class="accordion-icon"></span>
                                    </button>
                                </h2>
                                <div id="collapse-{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading-{{ $loop->index }}" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <p>
                                            {{ $faq->answer }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- faq area end -->
