@extends('core::layout.app')

@section('title', __('admin.blog_comments'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.blog_comments')]
    ]
])
@endsection

@section('content')

@can('settings-auto_approve_comments_update')
<x-card>
    <x-status id="comments_auto_approved" :text="__('attribute.comment_auto_approve')" :route="route('admin.blog.approve-status')" :status="$settings->comments_auto_approved" />
</x-card>
@endcan

<x-card :heading="__('admin.blog_comments')">

    @if(isset($comments) && !$comments->isEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.comment') }}
                    </th>
                    <th>
                        {{ __('admin.post') }}
                    </th>
                    <th>
                        {{ __('admin.author') }}
                    </th>
                    <th>
                        {{ __('admin.email') }}
                    </th>

                    @can('blog_comment-status')
                    <th>
                        {{ __('admin.status') }}
                    </th>
                    @endcan
                    <th width="13%">
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                <tr>
                    <td>{{ ($comments->currentpage() - 1) * $comments->perpage() + $loop->iteration }}</td>
                    <td>{{ Str::limit($comment?->comment, 30, '...') }}</td>
                    <td>
                        <a target="_blank" class=" text-hover-underline" href="{{ route('blog.details', ['slug' => $comment?->blog?->slug] ) }}">{{ $comment?->blog?->title }}</a>
                    </td>
                    <td>
                        {{ $comment?->user?->name }}
                    </td>
                    <td>
                        {{ $comment?->user?->email }}
                    </td>

                    @can('blog_comment-status')
                    <td>
                        <x-status :id="$comment->id" :route="route('admin.blog-comment.status', ['id' => $comment->id])" :status="$comment->status" />
                    </td>
                    @endcan
                    <td>
                        @can('blog_comment-show')
                        <x-table.view :route="route('admin.blog-comment.show', ['blog_comment' => $comment->id])" />
                        @endcan
                        @can('blog_comment-delete')
                        <x-table.delete :route="route('admin.blog-comment.destroy', ['blog_comment' => $comment->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $comments->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endsection
