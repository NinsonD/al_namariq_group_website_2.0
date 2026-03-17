@extends('core::layout.app')


@section('title', __('admin.subscriber_list'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.subscriber_list')]
    ]
])
@endsection

@section('content')

@can('newsletter-delete_unverified_delete')
<x-card>
    <form action="{{ route('admin.newsletter.delete_unverified') }}" method="POST">
        @csrf
        @method('POST')
        <button class="btn btn-label-danger common-delete-btn">
            {{ __('admin.delete_unverified_subscribers') }}
        </button>
    </form>
</x-card>
@endcan

@can('newsletter-show')


<x-card :heading="__('admin.subscriber_list')">
    @if ($subscribers->isNotEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.email') }}
                    </th>
                    <th>
                        {{ __('admin.is_verified') }}
                    </th>
                    <th>
                        {{ __('admin.subscribed_at') }}
                    </th>
                    <th>
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscribers as $index => $subscriber)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $subscriber->email }}</td>
                        <td>
                            <x-badge :text="$subscriber->is_verified ? __('admin.yes') : __('admin.no')" :variant="$subscriber->is_verified ? 'success' : 'danger' " />
                        </td>
                        <td>{{ $subscriber->created_at->format('M d, Y') }}</td>
                        <td>

                            @can('newsletter-delete')
                            <x-table.delete :route="route('admin.newsletter.destroy', $subscriber->id)" />
                            @endcan

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $subscribers->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif
</x-card>
@endcan
@endsection
