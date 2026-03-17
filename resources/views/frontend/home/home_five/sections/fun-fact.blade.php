 <!-- funfact area start -->
<div class="tp-funfact-area">
    <div class="tp-funfact-panel-wrap">
        <div class="tp-funfact-panel">
            <div class="tp-funfact-green-wrap include-bg tp-text-bounce-trigger p-relative" data-bg-color="#F6F6F9">
                <div class="container container-1300">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="tp-funfact-img-wrap">
                                <div class="row gx-20">
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay=".3">
                                            <img src="{{ asset($default_content?->image_1) }}" alt="{{ $content?->fact_title_1 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay=".5">
                                            <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_1 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay=".7">
                                            <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_1 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay=".9">
                                            <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_1 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1">
                                            <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_1 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.1">
                                            <img src="{{ asset($default_content?->image_2) }}" alt="{{ $content?->fact_title_1 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.2">
                                            <img src="{{ asset($default_content?->image_3) }}" alt="{{ $content?->fact_title_1 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.3">
                                            <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_1 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="tp-funfact-content-wrap">
                                <div class="tp-funfact-content tp_fade_anim" data-fade-from="right" data-delay="1.3">
                                    <span class="tp-funfact-subtitle">{!! clean(pureText($content?->fact_subtitle_1)) !!}</span>
                                    <h4 class="tp-funfact-title">{!! clean(pureText($content?->fact_title_1)) !!}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tp-funfact-img-wrap-2 p-relative">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row gx-20">
                                            <div class="col-lg-6 col-sm-4 col-6">
                                                <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.4">
                                                    <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-4 col-6">
                                                <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.5">
                                                    <img src="{{ asset($default_content?->image_4) }}" alt="{{ $content?->fact_title_1 }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-4 col-6">
                                                <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.6">
                                                    <img src="{{ asset($default_content?->image_5) }}" alt="{{ $content?->fact_title_1 }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-4 col-6">
                                                <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.7">
                                                    <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_1 }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tp-funfact-big-img mb-20 tp-text-bounce" data-delay=".7">
                                            <img src="{{ asset($default_content?->fact_icon_1) }}" alt="{{ $content?->fact_title_1 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="tp-funfact-content-wrap">
                                    <div class="tp-funfact-number">

                                       @php
                                            $number = $default_content?->fact_number_1;
                                            $digits = str_split($number ?? '');
                                        @endphp

                                        <span class="d-inline-flex">
                                            @foreach ($digits as $index => $digit)
                                                @if (count($digits) > 1 && $loop->last)
                                                    <i class="tp-text-bounce" data-delay="{{ 1 + ($index * 0.3) }}">{{ $digit }}</i>
                                                @else
                                                    <span class="tp-text-bounce" data-delay="{{ 1 + ($index * 0.3) }}">{{ $digit }}</span>
                                                @endif
                                            @endforeach
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tp-funfact-panel">
            <div class="tp-funfact-green-wrap pink-style include-bg tp-text-bounce-trigger" data-bg-color="#F6F6F9">
                <div class="container container-1300">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="tp-funfact-img-wrap">
                                <div class="row gx-20">
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay=".3">
                                            <img src="{{ asset($default_content?->image_6) }}" alt="{{ $content?->fact_title_2 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay=".5">
                                            <img src="{{ asset($default_content?->image_7) }}" alt="{{ $content?->fact_title_2 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay=".7">
                                            <img src="{{ asset($default_content?->image_8) }}" alt="{{ $content?->fact_title_2 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay=".9">
                                            <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_2 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1">
                                            <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_2 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.1">
                                            <img src="{{ asset($default_content?->image_9) }}" alt="{{ $content?->fact_title_2 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.2">
                                            <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_2 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.3">
                                            <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_2 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="tp-funfact-content-wrap">
                                <div class="tp-funfact-content">
                                    <span class="tp-funfact-subtitle">{!! clean(pureText($content?->fact_subtitle_2)) !!}</span>
                                    <h4 class="tp-funfact-title">{!! clean(pureText($content?->fact_title_2)) !!}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tp-funfact-img-wrap-2 p-relative">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row gx-20">
                                            <div class="col-lg-6 col-sm-4 col-6">
                                                <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.4">
                                                    <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_2 }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-4 col-6">
                                                <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.5">
                                                    <img src="{{ asset($default_content?->image_10) }}" alt="{{ $content?->fact_title_2 }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-4 col-6">
                                                <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.6">
                                                    <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_2 }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-4 col-6">
                                                <div class="tp-funfact-img mb-20 tp_fade_anim" data-delay="1.7">
                                                    <img src="{{ asset($default_content?->image_11) }}" alt="{{ $content?->fact_title_2 }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tp-funfact-big-img mb-20 tp-text-bounce" data-delay=".7">
                                            <img src="{{ asset($default_content?->fact_icon_2) }}" alt="{{ $content?->fact_title_2 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="tp-funfact-content-wrap">
                                    <div class="tp-funfact-number">

                                        @php
                                            $number = $default_content?->fact_number_2;
                                            $digits = str_split($number ?? '');
                                        @endphp

                                        <span class="d-inline-flex">
                                            @foreach ($digits as $index => $digit)
                                                @if (count($digits) > 1 && $loop->last)
                                                    <i class="tp-text-bounce" data-delay="{{ 1 + ($index * 0.3) }}">{{ $digit }}</i>
                                                @else
                                                    <span class="tp-text-bounce" data-delay="{{ 1 + ($index * 0.3) }}">{{ $digit }}</span>
                                                @endif
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tp-funfact-panel">
            <div class="tp-funfact-green-wrap yellow-style include-bg tp-text-bounce-trigger" data-bg-color="#F6F6F9">
                <div class="container container-1300">
                    <div class="row align-items-md-end">
                        <div class="col-lg-6 col-md-6">
                            <div class="tp-funfact-img-wrap">
                                <div class="row gx-20">
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20">
                                            <img src="{{ asset($default_content?->image_12) }}" alt="{{ $content?->fact_title_3 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20">
                                            <img src="{{ asset($default_content?->image_13) }}" alt="{{ $content?->fact_title_3 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20">
                                            <img src="{{ asset($default_content?->image_14) }}" alt="{{ $content?->fact_title_3 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20">
                                            <img src="{{ asset($default_content?->image_15) }}" alt="{{ $content?->fact_title_3 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20">
                                            <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_3 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20">
                                            <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_3 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20">
                                            <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_3 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-6">
                                        <div class="tp-funfact-img mb-20">
                                            <img src="{{ asset('admin/img/default/home-five/h5-funfact-placeholder.png') }}" alt="{{ $content?->fact_title_3 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="tp-funfact-content-wrap pl-140 mb-20">
                                <div class="tp-funfact-content">
                                    <span class="tp-funfact-subtitle">{!! clean(pureText($content?->fact_subtitle_3)) !!}</span>
                                    <h4 class="tp-funfact-title pl-45">{!! clean(pureText($content?->fact_title_3)) !!}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tp-funfact-img-wrap p-relative">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="tp-funfact-content-wrap">
                                    <div class="tp-funfact-number">

                                        @php
                                            $formatted = preg_replace('/_(.*?)_/', '<em>$1</em>', e($content?->fact_text));
                                        @endphp

                                        <span>
                                            {!! clean(pureText($formatted)) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- funfact area end -->
