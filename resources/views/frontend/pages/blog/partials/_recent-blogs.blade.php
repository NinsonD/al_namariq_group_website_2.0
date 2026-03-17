<!-- article-area-start -->
<section class="articale-area border-top pt-80 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <h4 class="articale-title mb-35">{{ __('frontend.similar_posts') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="articale-arrow d-flex align-items-center justify-content-md-end mb-35">
                    <div class="articale-button-next">
                        <span>
                            <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 11L1 6L6 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                    <div class="articale-button-prev">
                        <span>
                            <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper-container articale-active">
                    <div class="swiper-wrapper">
                        @foreach ($recent_blogs as $blog)
                        <div class="swiper-slide">
                            <div class="tpblog-item-2 mb-30">
                                <div class="tpblog-thumb-2">
                                    <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">
                                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                                    </a>
                                </div>
                                <div class="tpblog-wrap">
                                    <div class="tpblog-content-2">
                                        @if ($blog->category)
                                        <span>
                                            <a href="{{ route('blog.index', ['cat' => $blog->category?->title]) }}">{{ $blog->category?->title  }}</a>
                                        </span>
                                        @endif
                                        <h4 class="tpblog-title-2">
                                            <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                        </h4>
                                    </div>
                                    <div class="tpblog-meta-2">
                                        <span>
                                            <i>
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15 8C15 11.864 11.864 15 8 15C4.136 15 1 11.864 1 8C1 4.136 4.136 1 8 1C11.864 1 15 4.136 15 8Z"  stroke="#565764" stroke-width="1.5" stroke-linecap="round"  stroke-linejoin="round" />
                                                    <path d="M10.5967 10.226L8.42672 8.93099C8.04872 8.70699 7.74072 8.16799 7.74072 7.72699V4.85699"  stroke="#565764" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            {{ $blog->created_at->format('d M, Y') }}
                                        </span>
                                        <span>
                                            <a href="{{ route('blog.index', ['author' => $blog->author?->name]) }}">
                                                <i>
                                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none"  xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.99976 7.98487C8.92858 7.98487 10.4922 6.42125 10.4922 4.49243C10.4922 2.56362 8.92858 1 6.99976 1C5.07094 1 3.50732 2.56362 3.50732 4.49243C3.50732 6.42125 5.07094 7.98487 6.99976 7.98487Z"  stroke="#565764" stroke-width="1.5" stroke-linecap="round"  stroke-linejoin="round" />
                                                    <path d="M13 14.9697C13 12.2665 10.3108 10.0803 7 10.0803C3.68917 10.0803 1 12.2665 1 14.9697" stroke="#565764" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                </i>
                                                {{ $blog->author?->name }}
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- article-area-end -->