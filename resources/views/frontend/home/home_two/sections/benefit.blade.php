<!-- benifit area start -->
<div class="it-benifit-area p-relative pt-120 pb-120">
    <div class="container container-1230">
        <div class="it-benifit-bg pt-120 pb-120 z-index-1" data-bg-color="#ffede3">
            <div class="row">
                <div class="col-xl-6">
                    <div class="it-benifit-title-box mb-55">
                        <span class="tp-section-subtitle-platform platform-text-black mb-20 tp-split-text tp-split-right">
                            {!! clean(pureText($content?->subtitle)) !!}
                        </span>
                        <h4 class="tp-section-title-platform platform-text-black mb-20 tp-split-text tp-split-right">
                            {!! clean(pureText($content?->title)) !!}
                        </h4>
                    </div>
                </div>
            </div>

            <div class="row">
                @for ($i = 1; $i <= 3; $i++)
                    @php
                        $icon = $default_content?->{'icon_'.$i};
                        $title = $content?->{'benefit_title_'.$i};
                        $description = $content?->{'benefit_description_'.$i};
                    @endphp

                    @if (!empty($icon) && !empty($title))
                        <div class="col-lg-4">
                            <div class="it-benifit-item">
                                <div class="it-benifit-icon">
                                    <span>
                                        <img src="{{ asset($icon) }}" alt="{{ $title }}">
                                    </span>
                                </div>
                                <div class="it-benifit-content">
                                    <h4 class="it-benifit-title">{{ $title }}</h4>
                                    @if (!empty($description))
                                        <p>{{ $description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
</div>
<!-- benifit area end -->
