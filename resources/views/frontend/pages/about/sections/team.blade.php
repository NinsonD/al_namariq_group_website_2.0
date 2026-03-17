@php
   if($default_content?->teams){
      $teams = is_null($default_content?->teams) ? [] : json_decode($default_content?->teams);
      $teams = \Modules\Team\Models\Team::whereIn('id', $teams)->active()->get();
   }else{
      $teams = collect();
   }
@endphp

<!-- testimonial area start -->
<div class="tp-testimonial-area tp-team-bg black-bg-3 p-relative fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="tp-testimonial-title-wrap z-index-3">
                    <div class="tp-testimonial-title-box mb-75 text-center">
                        <h4 class="tp-section-title text-white fs-140">
                            {!! clean(pureText($content?->title)) !!}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if ($teams->count() > 0)
    <div class="tp-team-slider-wrap">
        <div class="tp-team-slider-active swiper-container">
            <div class="swiper-wrapper slide-transtion">
                @foreach ($teams as $team)
                <div class="swiper-slide">
                    <div class="tp-team-item">
                        <div class="tp-team-item-thumb">
                            <a href="{{ route('team.details', ['username' => $team->username]) }}">
                                <img src="{{ asset($team->image) }}" alt="{{ $team->name }}">
                            </a>
                            <div class="studio-team-content text-center">
                                <h4 class="studio-team-title-sm">
                                    <a href="{{ route('team.details', ['username' => $team->username]) }}">{{ $team->name }}</a>
                                </h4>
                                <span>{{ $team->designation }}</span>
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
