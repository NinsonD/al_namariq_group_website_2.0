<article class="postbox-item mb-30">
    <div class="postbox-author-wrap d-flex align-items-center justify-content-between mb-30">
        <div class="postbox-author-box d-flex align-items-center ">
            <div class="postbox-author-img">
                <a href="{{ route('blog.index', ['author' => $blog->author?->username]) }}">
                    <img src="{{ asset($blog->author?->avatar) }}" alt="{{ $blog->author?->name }}">
                </a>
            </div>
            <div class="postbox-author-info">
                <h4 class="postbox-author-name">
                    <a href="{{ route('blog.index', ['author' => $blog->author?->username]) }}">
                        {{ $blog->author?->name }}
                    </a>
                </h4>
                <span>
                    {{ $blog->author?->designation }}
                </span>
            </div>
        </div>
        <div class="postbox-meta">
            <i>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 4.19997V8.99997L12.2 10.6M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="black" stroke-opacity="0.6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </i>
            <span>{{ pureDate($blog->created_at) }} </span>
        </div>
    </div>
    <div class="postbox-thumb mb-35">
        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">
            <img class="w-100" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
        </a>
    </div>
    <div class="postbox-content">
        <span class="postbox-tag">
            <a href="{{ route('blog.index', ['category' => $blog->category?->slug]) }}">
                <i>
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.39101 4.39135H4.39936M13.6089 8.73899L8.74578 13.6021C8.61979 13.7283 8.47018 13.8283 8.3055 13.8966C8.14082 13.9649 7.9643 14 7.78603 14C7.60777 14 7.43124 13.9649 7.26656 13.8966C7.10188 13.8283 6.95228 13.7283 6.82629 13.6021L1 7.78264V1H7.78264L13.6089 6.82629C13.8616 7.08045 14.0034 7.42427 14.0034 7.78264C14.0034 8.14102 13.8616 8.48483 13.6089 8.73899Z" stroke="black" stroke-opacity="0.6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </i>
                {{ $blog->category?->title }}
            </a>
        </span>
        <h3 class="postbox-title">
            <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
        </h3>
        <p>
            {{ $blog->short_description }}
        </p>
        <a class="tp-btn-yellow-border postbox-btn" href="{{ route('blog.details', ['slug' => $blog->slug]) }}">
            <span>
                <span class="text-1">{{ __('frontend.view_more') }}</span>
                <span class="text-2">{{ __('frontend.view_more') }}</span>
            </span>
            <i>
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 11L11 1M11 1V11M11 1H1" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 11L11 1M11 1V11M11 1H1" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </i>
        </a>
    </div>
</article>
