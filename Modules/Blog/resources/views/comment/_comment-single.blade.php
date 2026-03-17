<li class="timeline-item">
    <span class="timeline-point-avatar">
        @if ($comment->user->avatar == null)
            <div class="avatar avatar-sm rounded-pill">
                <div class="avatar-text bg-primary">
                    {{ $comment->user->getInitialsAttribute() }}
                </div>
            </div>
        @else
            <div class="avatar avatar-sm rounded-pill">
                <img src="{{ asset($comment->user->avatar) }}" alt="{{ $comment->user->name }}">
            </div>
        @endif
    </span>
    <div class="timeline-content">
        <div class="timeline-header mb-3">
            <h6 class="mb-0 timeline-title">{{$comment->user->name}}</h6>
            <small class="text-body-secondary">{{ $comment?->created_at?->diffForHumans() }}</small>
        </div>
        <div class="timeline-body">
            <p class="mb-4 border-bottom pb-3">{!! clean($comment->comment) !!}</p>

            <div class="comment-action d-flex gap-2 align-items-center">
                <a href="javascript:void(0);" title="Reply" data-id="{{ $comment->id }}" data-blog-id="{{ $comment->blog->id }}" data-bs-toggle="modal" data-bs-target="#post-reply" class="post-reply">
                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 12.5C11.08 10 10.36 9 7.5 9H6V12L1 6.5L6 1.5V4.5H7C12 4.5 13 9.5 14 12.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                -
                <a  href="{{route('admin.blog-comment.destroy',$comment->id)}}" data-modal="#deleteModal" class="delete-btn">{{ __('admin.trash') }}</a>
            </div>
            
        </div>
    </div>

    @if ($comment->replies->count())
    <ul class="children mt-7 d-flex flex-column gap-4">
        @foreach ($comment->replies as $reply)
            @include('blog::comment._comment-single', ['comment' => $reply])
        @endforeach
    </ul>
    @endif
</li>