<!-- text moving area start -->
<div class="des-text-moving-2-area pt-200 pb-60 z-index-1">
    <div class="des-text-moving-wrap">
        <div class="des-text-title-box text-center">
            <div class="des-text-title-wrap">
                <h4 class="des-text-title">{!! clean(pureText($content?->title)) !!}</h4>
            </div>
            <p>{!! clean(pureText($content?->description)) !!}</p>
        </div>
        <div class="des-text-moving-top active moving-text">
            <div class="des-text-item hover-reveal-item gradient-bulet sm wrapper-text">
                <div class="d-flex align-items-center">
                    <span>
                        <a href="{{ url($default_content?->service_url_1 ?? '#') }}">{{ $content?->service_title_1 }}</a>
                    </span>
                    <span>
                        <a href="{{ url($default_content?->service_url_1 ?? '#') }}">{{ $content?->service_title_1 }}</a>
                    </span>
                    <span>
                        <a href="{{ url($default_content?->service_url_1 ?? '#') }}">{{ $content?->service_title_1 }}</a>
                    </span>
                    <span>
                        <a href="{{ url($default_content?->service_url_1 ?? '#') }}">{{ $content?->service_title_1 }}</a>
                    </span>
                </div>
                <div class="des-text-reveal-img">
                    <img src="{{ asset($default_content?->service_image_1) }}" alt="{{ $content?->title }}">
                </div>
            </div>
        </div>
        <div class="des-text-title-box text-center">
            <div class="des-text-title-wrap">
                <h4 class="des-text-title sm">{!! clean(pureText($content?->info_text)) !!}</h4>
            </div>
        </div>
        <div class="des-text-moving-top active moving-text">
            <div class="des-text-item hover-reveal-item paste-bulet sm wrapper-text">
                <div class="d-flex align-items-center">
                    <span>
                        <a href="{{ url($default_content?->service_url_2 ?? '#') }}">{{ $content?->service_title_2 }}</a>
                    </span>
                    <span>
                        <a href="{{ url($default_content?->service_url_2 ?? '#') }}">{{ $content?->service_title_2 }}</a>
                    </span>
                    <span>
                        <a href="{{ url($default_content?->service_url_2 ?? '#') }}">{{ $content?->service_title_2 }}</a>
                    </span>
                    <span>
                        <a href="{{ url($default_content?->service_url_2 ?? '#') }}">{{ $content?->service_title_2 }}</a>
                    </span>
                </div>
                <div class="des-text-reveal-img">
                    <img src="{{ asset($default_content?->service_image_2) }}" alt="{{ $content?->title }}">
                </div>
            </div>
        </div>
        <div class="des-text-title-box text-center">
            <div class="des-text-title-wrap">
                <h4 class="des-text-title sm">{!! clean(pureText($content?->info_text)) !!}</h4>
            </div>
        </div>
        <div class="des-text-moving-top active moving-text">
            <div class="des-text-item hover-reveal-item yellow-bulet sm wrapper-text">
                <div class="d-flex align-items-center">
                    <span>
                        <a href="{{ url($default_content?->service_url_3 ?? '#') }}">{{ $content?->service_title_3 }}</a>
                    </span>
                    <span>
                        <a href="{{ url($default_content?->service_url_3 ?? '#') }}">{{ $content?->service_title_3 }}</a>
                    </span>
                    <span>
                        <a href="{{ url($default_content?->service_url_3 ?? '#') }}">{{ $content?->service_title_3 }}</a>
                    </span>
                    <span>
                        <a href="{{ url($default_content?->service_url_3 ?? '#') }}">{{ $content?->service_title_3 }}</a>
                    </span>
                </div>
                <div class="des-text-reveal-img">
                    <img src="{{ asset($default_content?->service_image_3) }}" alt="{{ $content?->title }}">
                </div>
            </div>
        </div>
        <div class="des-text-title-box text-center">
            <div class="des-text-title-wrap">
                <h4 class="des-text-title sm">{!! clean(pureText($content?->info_text)) !!}</h4>
            </div>
        </div>
        <div class="des-text-moving-top active moving-text">
            <div class="des-text-item hover-reveal-item pink-bulet sm wrapper-text">
                <div class="d-flex align-items-center">
                    <span>
                        <a href="{{ url($default_content?->service_url_4 ?? '#') }}">{{ $content?->service_title_4 }}</a>
                    </span>
                    <span>
                        <a href="{{ url($default_content?->service_url_4 ?? '#') }}">{{ $content?->service_title_4 }}</a>
                    </span>
                    <span>
                        <a href="{{ url($default_content?->service_url_4 ?? '#') }}">{{ $content?->service_title_4 }}</a>
                    </span>
                    <span>
                        <a href="{{ url($default_content?->service_url_4 ?? '#') }}">{{ $content?->service_title_4 }}</a>
                    </span>
                </div>
                <div class="des-text-reveal-img">
                    <img src="{{ asset($default_content?->service_image_4) }}" alt="{{ $content?->title }}">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- text moving area end -->
