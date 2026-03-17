<!-- comparison area start -->
<div class="it-comparison-area tp_fade_anim">
    <div class="container container-1230">
        <div class="it-comparison-bg">
            <div class="row gx-0">
                @for ($i = 1; $i <= 3; $i++)
                    @php
                        $image = $default_content?->{'image_'.$i};
                        $title = $content?->{'title_'.$i};
                    @endphp

                    @if (!empty($image) && !empty($title))
                        <div class="col-lg-4">
                            <div class="it-comparison-item text-center">
                                <div class="it-comparison-logo">
                                    <img src="{{ asset($image) }}" alt="{{ $title }}">
                                </div>
                                <div class="it-comparison-content">
                                    <span>{!! clean(pureText($title)) !!}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
</div>
<!-- comparison area end -->
