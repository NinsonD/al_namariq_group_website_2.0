 <!-- video area start -->
<div class="tp-video-area black-bg mt-120 fix">
    <div class="container-fluid p-0">
        <div class="tp-video-thumb-wrap">
            <div class="tp-video-thumb d-none d-xl-block">
                <img src="{{ asset($default_content?->image_1) }}" alt="{{ $settings?->app_name }}">
            </div>
            @if (!empty($default_content?->video_url))
                 <div class="tp-video-thumb mb-25">
                    <video loop="" muted="" autoplay="" playsinline="">
                        <source src="{{ asset($default_content?->video_url) }}" type="video/mp4">
                    </video>
                </div>
            @else
                <div class="tp-video-thumb d-none d-xl-block mb-25">
                    <img src="{{ asset($default_content?->image_6) }}" alt="{{ $settings?->app_name }}">
                </div>
            @endif

            <div class="tp-video-thumb d-none d-xl-block mb-25">
                <img src="{{ asset($default_content?->image_2) }}" alt="{{ $settings?->app_name }}">
            </div>
            <div class="tp-video-thumb d-none d-xl-block mb-25">
                <img src="{{ asset($default_content?->image_3) }}" alt="{{ $settings?->app_name }}">
            </div>
            <div class="tp-video-thumb d-none d-xl-block">
                <img src="{{ asset($default_content?->image_4) }}" alt="{{ $settings?->app_name }}">
            </div>
            <div class="tp-video-thumb d-none d-xl-block">
                <img src="{{ asset($default_content?->image_5) }}" alt="{{ $settings?->app_name }}">
            </div>
        </div>
    </div>
</div>
<!-- video area end -->
