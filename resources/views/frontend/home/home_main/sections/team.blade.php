@php
   if($default_content?->teams){
      $teams = is_null($default_content?->teams) ? [] : json_decode($default_content?->teams);
      $teams = \Modules\Team\Models\Team::whereIn('id', $teams)->active()->get();
   }else{
      $teams = collect();
   }
@endphp

@if (!empty($content?->title) || !empty($content?->subtitle) || $teams->count() > 0)


<!-- team area start -->
<div class="dgm-team-area pt-120 pb-80">
    <div class="container container-1330">
        <div class="dgm-team-top-wrap mb-60">
            <div class="row align-items-end">
                <div class="col-md-8">
                    <div class="dgm-team-title-box z-index-">
                        <span class="tp-section-subtitle subtitle-black mb-15 tp_fade_anim" data-delay=".3">
                            {!! clean(pureText($content?->subtitle)) !!}
                        </span>
                        <h4 class="tp-section-title-grotesk mb-0 tp_fade_anim the-title" data-delay=".5">
                             {!! clean(pureText($content?->title)) !!}
                        </h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dgm-team-btn-box text-start text-md-end tp_fade_anim" data-delay=".3">
                        <a class="tp-btn-yellow-green green-solid btn-60" href="{{ route('team') }}">
                            <span>
                                <span class="text-1">
                                    {{ $content?->btn_text }}
                                </span>
                                <span class="text-2">
                                    {{ $content?->btn_text }}
                                </span>
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
                </div>
            </div>
        </div>
        @if ($teams->count() > 0)
        <div class="dgm-team-wrap">
            <div class="row">
                @foreach ($teams as $team)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="dgm-team-item mb-40 tp_fade_anim" data-delay=".3">
                        <div class="dgm-team-thumb tp--hover-item p-relative">
                            <a href="{{ route('team.details', ['username' => $team->username]) }}">
                                <div class="tp--hover-img" data-displacement="{{ asset('admin/img/default/common/fluid.jpg') }}" data-intensity="0.6" data-speedin="1" data-speedout="1">
                                    <img src="{{ asset($team->image) }}" alt="{{ $team->name }}">
                                </div>
                            </a>
                        </div>
                        <div class="dgm-team-content">
                            <h4 class="dgm-team-title-sm">
                                <a class="tp-line-black" href="{{ route('team.details', ['username' => $team->username]) }}">
                                    {{ $team->name }}
                                </a>
                            </h4>
                            <span>
                                {{ $team->designation }}
                            </span>

                            @if (is_array($team->social_links) && count($team->social_links) > 0)
                            <div class="dgm-team-social">
                               @foreach ($team->social_links as $link)
                                <a href="{{ $link['url'] ?? '#' }}"><i class="{{ $link['icon'] ?? 'icon' }}"></i></a>
                                @endforeach
                            </div>
                             @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
<!-- team area end -->
@endif
