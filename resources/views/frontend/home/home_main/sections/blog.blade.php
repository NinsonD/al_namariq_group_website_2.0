@php
   if($default_content?->blogs){
      $blogs = is_null($default_content?->blogs) ? [] : json_decode($default_content?->blogs);
      $blogs = \Modules\Blog\Models\Blog::whereIn('id', $blogs)->showOnHomepage()
                ->with([
                    'translations',
                    'author',
                    'category.translations',
                    'comments',
                ])
                ->active()
                ->get();
   }else{
      $blogs = collect();
   }
@endphp

@if (!empty($content?->title) || $blogs->count() > 0)

<!-- blog area start -->
<div class="dgm-blog-area pt-120 pb-120">
    <div class="container container-1330">
        <div class="dgm-blog-title-wrap mb-60">
            <div class="row align-items-end">
                <div class="col-lg-6 col-md-8">
                    <div class="dgm-blog-title-box">
                        <h4 class="tp-section-title-grotesk tp_fade_anim the-title" data-delay=".3">
                            {!! clean(pureText($content?->title)) !!}
                        </h4>
                    </div>
                </div>
                @if ($blogs->count() > 0)
                <div class="col-lg-6 col-md-4">
                    <div class="dgm-blog-btn text-start text-lg-end tp_fade_anim" data-delay=".3">
                        <a class="tp-btn-yellow-green green-solid btn-60" href="{{ route('blog.index') }}">
                            <span>
                                <span class="text-1">{{ $content?->btn_text }}</span>
                                <span class="text-2">{{ $content?->btn_text }}</span>
                            </span>
                            <i>
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </i>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>

        @if ($blogs->count() > 0)
        <div class="dgm-blog-main">

            @foreach ($blogs as $blog)
            <div class="dgm-blog-item tp_fade_anim">
                <div class="row">
                    <div class="col-xl-7 col-lg-8">
                        <div class="dgm-blog-content-wrap d-flex">
                            <div class="dgm-blog-content d-flex flex-column justify-content-between">
                                <div class="dgm-blog-meta mb-30">
                                    <h4>
                                        {{ $blog->author->name }}
                                    </h4>
                                    <span>
                                        {{ $blog->created_at->format('M d, Y') }}
                                    </span>
                                </div>
                                <div class="dgm-blog-category">
                                    <span>
                                        {{ $blog->category?->title }}
                                    </span>
                                </div>
                            </div>
                            <div class="dgm-blog-title-box">
                                <h4 class="dgm-blog-title-sm">
                                    <a class="tp-line-black" href="{{ route('blog.details', ['slug' => $blog->slug]) }}">
                                        {!! clean(pureText($blog->title)) !!}
                                        </a>
                                    </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 offset-xl-2 col-lg-4">
                        <div class="dgm-blog-thumb-wrap text-start text-lg-end">
                            <div class="dgm-blog-thumb">
                                <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">
                                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @endif
    </div>
</div>
<!-- blog area end -->
@endif
