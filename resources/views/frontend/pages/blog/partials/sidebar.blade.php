<div class="sidebar-wrapper">
    <div class="sidebar-widget mb-45">
        <div class="sidebar-search">
            <form action="{{ route('blog.index') }}" method="GET">
                <div class="sidebar-search-input">
                    <input name="keyword" type="text" placeholder="{{ __('frontend.search') }}" value="{{ request('keyword') }}">
                    <button type="submit">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.9999 19L14.6499 14.65M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="currentcolor" stroke-opacity="0.8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if ($categories->isNotEmpty())
    <div class="sidebar-widget mb-45">
        <h3 class="sidebar-widget-title">{{ __('frontend.categories') }}</h3>
        <div class="sidebar-widget-category">
            <ul>
                @foreach ($categories as $cat)
                <li>
                    <a href="{{ route('blog.index', ['cat' => $cat->slug]) }}" class="d-flex align-items-center justify-content-between">
                        {{ $cat->title }}
                        <span>{{ $cat->blogs_count }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
     @endif

    @if ($popular_blogs->isNotEmpty())
    <div class="sidebar-widget mb-45">
        <h3 class="sidebar-widget-title">{{ __('frontend.latest_posts') }}</h3>
        <div class="rc-post-wrap">
            @foreach ($popular_blogs as $post)
            <div class="rc-post d-flex align-items-center">
                <div class="rc-post-thumb">
                    <a href="{{ route('blog.details', ['slug' => $post->slug]) }}">
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                    </a>
                </div>
                <div class="rc-post-content">
                    <div class="rc-post-category">
                        <a href="{{ route('blog.index', ['cat' => $post->category?->slug]) }}">
                            {{ $post->category?->title }}
                        </a>
                    </div>
                    <h3 class="rc-post-title">
                        <a href="{{ route('blog.details', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                    </h3>
                    <div class="rc-post-meta">
                        <span>
                            {{ pureDate($post->created_at) }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    @if ($blog_tags->isNotEmpty())
    <div class="sidebar-widget">
        <h3 class="sidebar-widget-title">{{ __('frontend.tags') }}</h3>
        <div class="sidebar-widget-content">
            <div class="tagcloud">
                @foreach ($blog_tags as $tag)
                    <a href="{{ route('blog.index', ['tag' => $tag]) }}">{{ $tag }}</a>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
