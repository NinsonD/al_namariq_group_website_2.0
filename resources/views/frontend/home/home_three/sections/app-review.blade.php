<!-- review area start -->
<div class="app-review-area app-review-ptb tp_fade_anim">
    <div class="container container-1230">
        <div class="app-review-bg z-index-1">
            <div class="app-review-img">
                <img src="{{ asset($default_content?->main_image) }}" alt="{{ $content?->title }}">
            </div>
            <div class="row align-items-end">
                <div class="col-lg-5 col-md-6">
                    <div class="app-review-heading z-index-1">
                        <h4 class="app-review-title">
                            {!! clean(pureText($content?->title)) !!}
                        </h4>
                        <p>
                            {!! clean(pureText($content?->subtitle)) !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 order-4 order-lg-2">
                    <div class="app-review-item ml">
                        <div class="app-review-item-icon">
                             <img src="{{ asset($default_content?->icon_1) }}" alt="{{ $content?->title }}">
                        </div>
                        <div class="app-review-item-content">
                            <h3 class="app-review-item-title">
                                {!! clean(pureText($content?->item_title_1)) !!}
                            </h3>
                            <p>
                                {!! clean(pureText($content?->item_subtitle_1)) !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 order-3">
                    <div class="app-review-item mr">
                        <div class="app-review-item-icon">
                             <img src="{{ asset($default_content?->icon_2) }}" alt="{{ $content?->title }}">
                        </div>
                        <div class="app-review-item-content">
                            <h3 class="app-review-item-title">
                                {!! clean(pureText($content?->item_title_2)) !!}
                            </h3>
                            <p>
                                {!! clean(pureText($content?->item_subtitle_2)) !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 order-2 order-lg-4">
                    <div class="app-review-item text-start text-md-center">
                        <div class="app-review-item-icon">
                             <img src="{{ asset($default_content?->image_2) }}" alt="{{ $content?->title }}">
                        </div>
                        <div class="app-review-item-content">
                            <p>
                                {!! clean(pureText($content?->title_2)) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- review area end -->
