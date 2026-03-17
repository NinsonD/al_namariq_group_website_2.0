@php

    $testimonials = \Modules\Testimonial\Models\Testimonial::active()->get();
@endphp

<!-- testimonial area start -->
<div class="app-testimonial-area app-testimonial-ptb p-relative pb-140">
    <div class="app-testimonial-shape">
        <div class="shape-1" data-speed=".9">
            <img src="{{ asset($default_content?->shape_1) }}" alt="{{ $content?->title }}">
        </div>
        <div class="shape-2" data-speed="1.1">
            <img src="{{ asset($default_content?->shape_2) }}" alt="{{ $content?->title }}">
        </div>
        <div class="shape-3">
            <img src="{{ asset($default_content?->bg_shape) }}" alt="{{ $content?->title }}">
        </div>
    </div>
    <div class="container container-1230">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="app-testimonial-warp mb-55">
                    <div class="app-testimonial-heading text-center p-relative mb-40">
                        <span class="tp-section-subtitle border-bg bg-color tp_fade_anim" data-delay=".3">
                            {!! clean(pureText($content?->subtitle)) !!}
                        </span>
                        <h3 class="tp-section-title-phudu mb-20 tp_fade_anim" data-delay=".5">
                            {!! clean(pureText($content?->title)) !!}
                        </h3>
                        <div class="app-testimonial-big-text">
                            <h3>
                                {{ $content?->bg_rating }}
                            </h3>
                        </div>
                    </div>
                    <div class="app-testimonial-review-width tp_fade_anim" data-delay=".6" data-fade-from="top" data-ease="bounce">
                        <div class="app-testimonial-review">
                            <div class="app-testimonial-review-icon">
                                <span>
                                    <img width="38" src="{{ asset($default_content?->brand_image) }}" alt="{{ $content?->title }}">
                                </span>
                            </div>
                            <div class="app-testimonial-review-content">
                                <span>
                                    <i>
                                        {{ $content?->rating_text }}
                                    </i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                        <path d="M6.12215 1.09728C6.24667 0.739057 6.75328 0.739057 6.8778 1.09728L8.17194 4.82036C8.22687 4.97839 8.37435 5.08554 8.54162 5.08895L12.4824 5.16925C12.8616 5.17698 13.0181 5.6588 12.7159 5.88792L9.57495 8.26922C9.44163 8.37029 9.3853 8.54366 9.43375 8.70379L10.5751 12.4765C10.685 12.8395 10.2751 13.1373 9.9638 12.9207L6.72845 10.6693C6.59112 10.5738 6.40883 10.5738 6.2715 10.6693L3.03615 12.9207C2.72485 13.1373 2.31499 12.8395 2.42481 12.4765L3.5662 8.70379C3.61465 8.54366 3.55832 8.37029 3.425 8.26922L0.284053 5.88792C-0.0181605 5.6588 0.138392 5.17698 0.517561 5.16925L4.45833 5.08895C4.6256 5.08554 4.77308 4.97839 4.82801 4.82036L6.12215 1.09728Z" fill="#FFAF1B" />
                                    </svg> <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                        <path d="M6.12215 1.09728C6.24667 0.739057 6.75328 0.739057 6.8778 1.09728L8.17194 4.82036C8.22687 4.97839 8.37435 5.08554 8.54162 5.08895L12.4824 5.16925C12.8616 5.17698 13.0181 5.6588 12.7159 5.88792L9.57495 8.26922C9.44163 8.37029 9.3853 8.54366 9.43375 8.70379L10.5751 12.4765C10.685 12.8395 10.2751 13.1373 9.9638 12.9207L6.72845 10.6693C6.59112 10.5738 6.40883 10.5738 6.2715 10.6693L3.03615 12.9207C2.72485 13.1373 2.31499 12.8395 2.42481 12.4765L3.5662 8.70379C3.61465 8.54366 3.55832 8.37029 3.425 8.26922L0.284053 5.88792C-0.0181605 5.6588 0.138392 5.17698 0.517561 5.16925L4.45833 5.08895C4.6256 5.08554 4.77308 4.97839 4.82801 4.82036L6.12215 1.09728Z" fill="#FFAF1B" />
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                        <path d="M6.12215 1.09728C6.24667 0.739057 6.75328 0.739057 6.8778 1.09728L8.17194 4.82036C8.22687 4.97839 8.37435 5.08554 8.54162 5.08895L12.4824 5.16925C12.8616 5.17698 13.0181 5.6588 12.7159 5.88792L9.57495 8.26922C9.44163 8.37029 9.3853 8.54366 9.43375 8.70379L10.5751 12.4765C10.685 12.8395 10.2751 13.1373 9.9638 12.9207L6.72845 10.6693C6.59112 10.5738 6.40883 10.5738 6.2715 10.6693L3.03615 12.9207C2.72485 13.1373 2.31499 12.8395 2.42481 12.4765L3.5662 8.70379C3.61465 8.54366 3.55832 8.37029 3.425 8.26922L0.284053 5.88792C-0.0181605 5.6588 0.138392 5.17698 0.517561 5.16925L4.45833 5.08895C4.6256 5.08554 4.77308 4.97839 4.82801 4.82036L6.12215 1.09728Z" fill="#FFAF1B" />
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                        <path d="M6.12215 1.09728C6.24667 0.739057 6.75328 0.739057 6.8778 1.09728L8.17194 4.82036C8.22687 4.97839 8.37435 5.08554 8.54162 5.08895L12.4824 5.16925C12.8616 5.17698 13.0181 5.6588 12.7159 5.88792L9.57495 8.26922C9.44163 8.37029 9.3853 8.54366 9.43375 8.70379L10.5751 12.4765C10.685 12.8395 10.2751 13.1373 9.9638 12.9207L6.72845 10.6693C6.59112 10.5738 6.40883 10.5738 6.2715 10.6693L3.03615 12.9207C2.72485 13.1373 2.31499 12.8395 2.42481 12.4765L3.5662 8.70379C3.61465 8.54366 3.55832 8.37029 3.425 8.26922L0.284053 5.88792C-0.0181605 5.6588 0.138392 5.17698 0.517561 5.16925L4.45833 5.08895C4.6256 5.08554 4.77308 4.97839 4.82801 4.82036L6.12215 1.09728Z" fill="#FFAF1B" />
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                        <path d="M6.12215 1.09728C6.24667 0.739057 6.75328 0.739057 6.8778 1.09728L8.17194 4.82036C8.22687 4.97839 8.37435 5.08554 8.54162 5.08895L12.4824 5.16925C12.8616 5.17698 13.0181 5.6588 12.7159 5.88792L9.57495 8.26922C9.44163 8.37029 9.3853 8.54366 9.43375 8.70379L10.5751 12.4765C10.685 12.8395 10.2751 13.1373 9.9638 12.9207L6.72845 10.6693C6.59112 10.5738 6.40883 10.5738 6.2715 10.6693L3.03615 12.9207C2.72485 13.1373 2.31499 12.8395 2.42481 12.4765L3.5662 8.70379C3.61465 8.54366 3.55832 8.37029 3.425 8.26922L0.284053 5.88792C-0.0181605 5.6588 0.138392 5.17698 0.517561 5.16925L4.45833 5.08895C4.6256 5.08554 4.77308 4.97839 4.82801 4.82036L6.12215 1.09728Z" fill="#FFAF1B" />
                                    </svg></span>
                                <p>
                                    {{ $content?->rating_description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($testimonials->count() > 0)
    <div class="container container-1680">
        <div class="row">
            <div class="col-lg-12">
                <div class="app-testimonial-wrapper">
                    <div class="app-testimonial-slider d-flex">

                        @foreach ($testimonials as $testimonial)
                        <div class="app-testimonial-item">
                            <div class="app-testimonial-item-icon-box d-flex align-items-center mb-20">
                                <div class="app-testimonial-item-icon">
                                    <span>
                                        <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}">
                                    </span>
                                </div>
                                <div class="app-testimonial-item-icon-content">
                                    <h4 class="app-testimonial-item-icon-title">{{ $testimonial->name }}</h4>
                                    <p>{{ $testimonial->designation }}</p>
                                </div>
                            </div>
                            <div class="app-testimonial-item-content">
                                <p>
                                    {{ $testimonial->comment }}
                                </p>


                                @php
                                    $rating = $testimonial?->rating ?? 0;
                                @endphp

                                <div class="app-testimonial-item-star">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                                <path d="M7.21451 0.878193C7.30431 0.6018 7.69534 0.6018 7.78514 0.878193L9.34084 5.66614C9.381 5.78975 9.49619 5.87343 9.62616 5.87343L14.6605 5.87343C14.9511 5.87343 15.0719 6.24532 14.8368 6.41614L10.764 9.37525C10.6588 9.45164 10.6148 9.58706 10.655 9.71066L12.2107 14.4986C12.3005 14.775 11.9841 15.0048 11.749 14.834L7.67616 11.8749C7.57101 11.7985 7.42864 11.7985 7.32349 11.8749L3.25062 14.834C3.01551 15.0048 2.69916 14.775 2.78897 14.4986L4.34467 9.71066C4.38483 9.58706 4.34083 9.45164 4.23568 9.37525L0.162814 6.41614C-0.0723004 6.24532 0.0485323 5.87343 0.339149 5.87343L5.37349 5.87343C5.50346 5.87343 5.61865 5.78975 5.65881 5.66614L7.21451 0.878193Z"
                                                    fill="{{ $i <= $rating ? '#FFAF1B' : '#c1bfbf' }}" />
                                            </svg>
                                        </span>
                                    @endfor
                                </div>

                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<!-- testimonial area end -->
