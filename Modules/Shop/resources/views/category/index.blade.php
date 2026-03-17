@extends('core::layout.app')

@section('title', __('admin.product_categories'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.product_categories')]
    ]
])
@endsection

@section('content')

@can('product_category-show')

<x-card :heading="__('admin.product_categories')" :route="route('admin.product-category.create')">

    @if(isset($categories) && !$categories->isEmpty())
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
                        {{ __('admin.title') }}
                    </th>
                    @can('product_category-status')
                    <th>
                        {{ __('admin.status') }}
                    </th>
                    @endcan
                    <th>
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>

                @php
                    $code = getDefaultLocale();
                @endphp
                @foreach ($categories as $category)

                <tr>
                    <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                    <td>
                        <img class="circle-img" src="{{ asset($category->image) }}" alt="{{ $category->title }}" class="img-fluid">
                    </td>
                    <td>{{ $category?->getTranslation($code)?->title }}</td>

                    @can('product_category-status')
                    <td>
                        <x-admin.toggle-switch
                            :route="route('admin.product-category.updateStatus', ['product_category' => $category->id])"
                            :status="$category->status"
                            id="category-{{ $category->id }}"
                            column="status"
                        />
                    </td>
                    @endcan
                    <td>
                        @can('product_category-edit')
                        <x-table.edit :route="route('admin.product-category.edit', ['product_category' => $category->id])" />
                        @endcan

                        @can('product_category-delete')
                        <x-table.delete :route="route('admin.product-category.destroy', ['product_category' => $category->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $categories->links('components.pagination') }}
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
