<div class="des-project-area pb-200">
    <div class="container container-1510">
        <div class="des-project-title-wrap pb-90 pt-140">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-5">
                    <div class="des-project-title-box">
                        <span class="tp-section-subtitle text-capitalize text-black mb-15">{!! clean(pureText($content?->subtitle)) !!}</span>
                        <h3 class="tp-section-title-mango mb-0">{!! clean(pureText($content?->title)) !!}</h3>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-7">
                    <div class="des-project-top-text">
                        <p>{!! clean(pureText($content?->description)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="des-project-wrap">
            <div class="row">

                @for ($i = 1; $i <= 3; $i++)
                    <div class="col-xxl-6 offset-xxl-6 col-xl-7 offset-xl-5">
                        <div class="des-project-item d-flex align-items-center">
                            <div class="des-project-total">
                                <span><i data-purecounter-duration="1" data-purecounter-end="{{ $default_content?->{'fact_number_' . $i} }}" class="purecounter"></i>{{ $default_content?->{'fact_unit_' . $i} }}</span>
                            </div>
                            <div class="des-project-info">
                                <span>{!! clean($content?->{'fact_subtitle_' . $i}) !!}</span>
                                <h4>{!! clean(pureText($content?->{'fact_title_' . $i})) !!}</h4>
                            </div>
                        </div>
                    </div>
                @endfor


            </div>
        </div>
    </div>
</div>
