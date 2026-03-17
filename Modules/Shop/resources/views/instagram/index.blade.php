@extends('core::layout.app')

@section('title', __('admin.all_instagrams'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.all_instagrams')]
    ]
])
@endsection

@section('content')

@can('instagram-show')
<x-card :heading="__('admin.all_instagrams')" :route="route('admin.instagram.create')">

    @if(isset($instagrams) && !$instagrams->isEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.image') }}
                    </th>
                    <th>
                        {{ __('admin.status') }}
                    </th>
                    <th>
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>

                @php
                    $code = getDefaultLocale();
                @endphp
                @foreach ($instagrams as $instagram)

                <tr>
                    <td>{{ ($instagrams->currentPage() - 1) * $instagrams->perPage() + $loop->iteration }}</td>
                    <td>
                        <img class="circle-img" src="{{ asset($instagram->image) }}" alt="{{ __('admin.instagram') }}" class="img-fluid">
                    </td>
                    <td>
                        <x-badge :variant="$instagram->status ? 'success' : 'danger'" :text="$instagram->status ? __('admin.active') : __('admin.inactive')" />
                    </td>
                    <td>
                        @can('instagram-edit')
                        <x-table.edit :route="route('admin.instagram.edit', ['instagram' => $instagram->id])" />
                        @endcan

                        @can('instagram-delete')
                        <x-table.delete :route="route('admin.instagram.destroy', ['instagram' => $instagram->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $instagrams->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan

@endsection


@push('css')
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-toggle.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('admin/js/bootstrap-toggle.jquery.min.js') }}"></script>
<script>
    'use strict';

    const categoryRoute = "{{ route('admin.product-category.index') }}";

     $(document).on("change", ".toggle-status", function(e) {
        e.preventDefault();
        var url = $(this).prop("href");
        var type = $(this).data("column");
        $.ajax({
            type: "put",
            data: {
                _token: '{{ csrf_token() }}',
                column: type
            },
            url: url,
            success: function(response) {
                if (response.status) {
                    toastr.success(response.message);

                    window.location.href = categoryRoute;

                } else {
                    toastr.error(response.message);
                }
            },
            error: function(err) {
                if (err.responseJSON && err.responseJSON.message) {
                    toastr.error(err.responseJSON.message);
                } else {
                    toastr.error("{{ __('notification.something_went_wrong') }}");
                }
            }
        })
    });
</script>
@endpush
