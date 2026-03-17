@extends('core::layout.app')

@section('title', __('admin.blog_comments'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.blog_comments'), 'url' => route('admin.blog-comment.index')],
        ['label' => __('admin.single_comment')]
    ]
])
@endsection

@section('content')
<x-card :heading="__('admin.blog_comments')" :route="route('admin.blog-comment.index')" btnType="back">
    <ul class="timeline timeline-avatar mb-0 d-flex flex-column gap-4">
        @foreach ($comments as $comment)
            @include('blog::comment._comment-single', ['comment' => $comment])
        @endforeach
    </ul>
</x-card>

<!-- reply modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="post-reply">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.blog-comment.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('admin.reply_to_comment') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="parent_id" id="parent_id">
                    <input type="hidden" name="blog_id" id="blog_id">
                    <div class="form-group">
                        <x-textarea rows="7" name="comment" id="comment" label="{{ __('admin.reply') }}" placeholder="{{ __('admin.your_reply') }}" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">{{ __('admin.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('admin.reply') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<x-admin.delete-modal />

@endsection

@push('css')
    <style>
        .comment-action a{
            color: #6c757d;
            font-size: 14px;
            text-decoration: none;
        }
        .comment-action a.delete-btn{
            color: #dc3545;
        }
    </style>
@endpush

@push('js')
    <script>
        "use strict";
        $(function() {
            $('.post-reply').on('click', function(e) {
                e.preventDefault();
                var commentId = $(this).data('id');
                var blogId = $(this).data('blog-id');
                $('#parent_id').val(commentId);
                $('#blog_id').val(blogId);
            });

            // reset comment id on modal close
            $('#post-reply').on('hidden.bs.modal', function () {
                $('#parent_id').val('');
                $('#blog_id').val('');
            });
        });
    </script>

@endpush
