@php
   if($default_content?->teams){
      $teams = is_null($default_content?->teams) ? [] : json_decode($default_content?->teams);
      $teams = \Modules\Team\Models\Team::whereIn('id', $teams)->active()->get();
   }else{
      $teams = collect();
   }
@endphp

@if ($teams->count() > 0)
<!-- team area start -->
<div class="des-team-area pb-200">
    <div class="container container-1750">
        <div class="row">
            <div class="col-xl-12">
                <div class="des-team-wrap">
                    @foreach ($teams as $team)
                    <div class="des-team-item-box hover-reveal-item p-relative active">
                        <a href="{{ route('team.details', ['username' => $team->username]) }}">
                            <div class="des-team-item d-flex align-items-center justify-content-between">
                                <span>
                                    {{ $team->qualification }}
                                </span>
                                <h4 class="des-team-title">
                                    {{ $team->name }}
                                </h4>
                                <span>{{ $team->designation }}</span>
                            </div>
                        </a>
                        <div class="des-team-reveal-img" data-background="{{ asset($team->image) }} "></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- team area end -->
@endif
