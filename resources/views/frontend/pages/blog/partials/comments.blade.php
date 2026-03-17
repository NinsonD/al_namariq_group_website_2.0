<div class="postbox__comment pb-50">
    <h3 class="postbox__comment-title">{{ __('frontend.comments') }} ({{ $comments->count() }})</h3>

    <ul>
        @foreach ($comments->where('parent_id', null) as $comment)
            @include('frontend.pages.blog.partials._comment-single', ['comment' => $comment, 'blog_id' => $blog_id])
        @endforeach
    </ul>
</div>
