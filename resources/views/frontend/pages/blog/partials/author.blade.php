@isset($author)
    @php
        $avatar = !empty($author->avatar) ? asset($author->avatar) : null;
    @endphp

<div class="postbox-details-author mt-30">
    <div class="sidebar-widget-author d-flex align-items-start">
        @if ($author->avatar && file_exists(public_path($author->avatar)))
        <div class="sidebar-widget-author-img">
            <img src="{{ $avatar }}" alt="{{ $author->name }}">
        </div>
        @endif
        <div class="postbox-details-content">
            <div class="sidebar-widget-author-content">
                <span>{{ __('frontend.about_author') }}</span>
                <h4 class="sidebar-widget-author-name">{{ $author->name }}</h4>
                <p>
                    {!! clean(pureText($author->bio)) !!}
                </p>
            </div>
        </div>
    </div>
</div>
@endisset
