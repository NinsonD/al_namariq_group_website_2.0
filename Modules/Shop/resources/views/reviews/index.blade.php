@extends('core::layout.app')

@section('title', __('admin.reviews'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.reviews')]
    ]
])
@endsection

@section('content')
@can('product_review-show')


<x-card>

    @php
        $status = request()->get('status') ?? null;
        $rating = request()->get('rating') ?? null;
        $per_page = request()->get('per_page') ?? null;
        $pageItems = [10, 15, 25, 50, 100, 'all'];
    @endphp

    <div class="p-5">
        <form action="{{ route('admin.product-review.index')}}" method="GET" id="filterForm">

            <div class="row gy-4">
                <div class="col-xxl-2 col-lg-6 col-md-6">
                    <select class="form-select" name="status" id="status">
                        <option value="" >
                            {{ __('admin.select_status') }}
                        </option>
                        <option value="active" {{ $status == 'active' ? 'selected' : '' }}>
                            {{ __('admin.active') }}
                        </option>
                        <option value="inactive" {{ $status == 'inactive' ? 'selected' : '' }}>
                            {{ __('admin.inactive') }}
                        </option>
                    </select>
                </div>
                <div class="col-xxl-2 col-lg-6 col-md-6">
                    <select class="form-select" name="rating" id="rating">
                        <option value="" >
                            {{ __('admin.select_rating') }}
                        </option>
                        <option value="1" {{ $rating == '1' ? 'selected' : '' }}>
                            {{ __('admin.1_star') }}
                        </option>
                        <option value="2" {{ $rating == '2' ? 'selected' : '' }}>
                            {{ __('admin.2_star') }}
                        </option>
                        <option value="3" {{ $rating == '3' ? 'selected' : '' }}>
                            {{ __('admin.3_star') }}
                        </option>
                        <option value="4" {{ $rating == '4' ? 'selected' : '' }}>
                            {{ __('admin.4_star') }}
                        </option>
                        <option value="5" {{ $rating == '5' ? 'selected' : '' }}>
                            {{ __('admin.5_star') }}
                        </option>
                    </select>
                </div>
                <div class="col-xxl-2 col-lg-6 col-md-6">
                    <select class="form-select" name="per_page" id="per_page">
                        <option value="">
                            {{ __('admin.select_per_page') }}
                        </option>
                        @foreach ($pageItems as $item)
                            <option value="{{ $item }}" {{ $per_page == $item ? 'selected' : '' }}>{{ ucfirst($item) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

</x-card>


<x-card :heading="__('admin.reviews')">

    @if(isset($reviews) && !$reviews->isEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.review') }}
                    </th>
                    <th>
                        {{ __('admin.product') }}
                    </th>
                    <th>
                        {{ __('admin.user') }}
                    </th>
                    @can('product_review-status_update')
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
                @foreach ($reviews as $review)

                <tr>
                    <td>{{ ($reviews->currentPage() - 1) * $reviews->perPage() + $loop->iteration }}</td>
                    <td>
                        <span class=" text-warning">
                        @foreach (range(1, 5) as $i)
                            @if($i <= $review->rating)
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.06619 1.36136L10.9015 5.06653C10.9432 5.16057 11.0089 5.24203 11.0919 5.30279C11.1749 5.36355 11.2724 5.40148 11.3747 5.41281L15.4262 6.01302C15.5435 6.0281 15.6541 6.07624 15.745 6.15183C15.836 6.22741 15.9036 6.32732 15.9399 6.43988C15.9762 6.55244 15.9797 6.67301 15.9501 6.7875C15.9204 6.902 15.8588 7.0057 15.7724 7.08648L12.8522 9.98367C12.7776 10.0533 12.7217 10.1405 12.6894 10.2372C12.6572 10.334 12.6496 10.4373 12.6675 10.5377L13.3716 14.6122C13.392 14.7293 13.3791 14.8498 13.3344 14.9599C13.2897 15.07 13.215 15.1654 13.1188 15.2351C13.0226 15.3049 12.9087 15.3462 12.7901 15.3545C12.6716 15.3627 12.5531 15.3375 12.4482 15.2817L8.80072 13.3541C8.70732 13.3083 8.60465 13.2844 8.50061 13.2844C8.39656 13.2844 8.2939 13.3083 8.2005 13.3541L4.55304 15.2817C4.44811 15.3375 4.32962 15.3627 4.21107 15.3545C4.09251 15.3462 3.97865 15.3049 3.88243 15.2351C3.78622 15.1654 3.71152 15.07 3.66683 14.9599C3.62213 14.8498 3.60925 14.7293 3.62963 14.6122L4.33373 10.4915C4.35158 10.3911 4.34403 10.2878 4.31177 10.1911C4.27952 10.0943 4.22358 10.0071 4.14905 9.9375L1.19415 7.08648C1.10673 7.00349 1.04525 6.89692 1.01716 6.7797C0.989069 6.66247 0.995574 6.53962 1.03588 6.42601C1.0762 6.31241 1.14858 6.21293 1.24428 6.13963C1.33997 6.06633 1.45487 6.02235 1.57505 6.01302L5.6265 5.41281C5.72877 5.40148 5.82628 5.36355 5.90931 5.30279C5.99235 5.24203 6.05801 5.16057 6.09975 5.06653L7.93502 1.36136C7.985 1.25344 8.06481 1.16208 8.16502 1.09805C8.26524 1.03402 8.38168 1 8.50061 1C8.61953 1 8.73598 1.03402 8.83619 1.09805C8.93641 1.16208 9.01622 1.25344 9.06619 1.36136V1.36136Z" fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            @else
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.06619 1.36136L10.9015 5.06653C10.9432 5.16057 11.0089 5.24203 11.0919 5.30279C11.1749 5.36355 11.2724 5.40148 11.3747 5.41281L15.4262 6.01302C15.5435 6.0281 15.6541 6.07624 15.745 6.15183C15.836 6.22741 15.9036 6.32732 15.9399 6.43988C15.9762 6.55244 15.9797 6.67301 15.9501 6.7875C15.9204 6.902 15.8588 7.0057 15.7724 7.08648L12.8522 9.98367C12.7776 10.0533 12.7217 10.1405 12.6894 10.2372C12.6572 10.334 12.6496 10.4373 12.6675 10.5377L13.3716 14.6122C13.392 14.7293 13.3791 14.8498 13.3344 14.9599C13.2897 15.07 13.215 15.1654 13.1188 15.2351C13.0226 15.3049 12.9087 15.3462 12.7901 15.3545C12.6716 15.3627 12.5531 15.3375 12.4482 15.2817L8.80072 13.3541C8.70732 13.3083 8.60465 13.2844 8.50061 13.2844C8.39656 13.2844 8.2939 13.3083 8.2005 13.3541L4.55304 15.2817C4.44811 15.3375 4.32962 15.3627 4.21107 15.3545C4.09251 15.3462 3.97865 15.3049 3.88243 15.2351C3.78622 15.1654 3.71152 15.07 3.66683 14.9599C3.62213 14.8498 3.60925 14.7293 3.62963 14.6122L4.33373 10.4915C4.35158 10.3911 4.34403 10.2878 4.31177 10.1911C4.27952 10.0943 4.22358 10.0071 4.14905 9.9375L1.19415 7.08648C1.10673 7.00349 1.04525 6.89692 1.01716 6.7797C0.989069 6.66247 0.995574 6.53962 1.03588 6.42601C1.0762 6.31241 1.14858 6.21293 1.24428 6.13963C1.33997 6.06633 1.45487 6.02235 1.57505 6.01302L5.6265 5.41281C5.72877 5.40148 5.82628 5.36355 5.90931 5.30279C5.99235 5.24203 6.05801 5.16057 6.09975 5.06653L7.93502 1.36136C7.985 1.25344 8.06481 1.16208 8.16502 1.09805C8.26524 1.03402 8.38168 1 8.50061 1C8.61953 1 8.73598 1.03402 8.83619 1.09805C8.93641 1.16208 9.01622 1.25344 9.06619 1.36136V1.36136Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            @endif
                        @endforeach
                        </span>

                        <br>
                        {{ Str::limit($review->comment, 50, '...') }}
                    </td>
                    <td>
                        <a class=" text-hover-underline d-flex align-items-center gap-2" href="{{ route('products.show', ['slug' => $review->product->slug]) }}" target="_blank">
                            <div>
                                <img class="circle-img" src="{{ asset($review->product->image) }}" alt="">
                            </div>
                            {{ $review?->product?->getTranslation($code)?->title }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.user.edit', ['user' => $review->user->id]) }}" class="d-flex align-items-center gap-2 text-hover-underline" target="_blank">

                            <div class="avatar avatar-md rounded-pill">
                                @if (!empty($review->user->avatar) && file_exists(public_path($review->user->avatar)))
                                    <img src="{{ asset($review->user->avatar) }}" alt="{{ $review->user->name }}">
                                @else
                                    <div class="avatar-text bg-label-primary">
                                        {{ $review->user->initials }}
                                    </div>
                                @endif
                            </div>
                            {{ $review?->user?->name }}
                        </a>
                    </td>

                    @can('product_review-status_update')
                    <td>
                        <x-admin.toggle-switch
                            :route="route('admin.product-review.updateStatus', ['product_review' => $review->id])"
                            :status="$review->status"
                            id="review-{{ $review->id }}"
                            column="status"
                        />
                    </td>
                    @endcan
                    <td>
                        @can('product_review-update')
                        <x-table.view :route="route('admin.product-review.show', ['product_review' => $review->product_id])" />
                        @endcan

                        @can('product_review-delete')
                            <x-table.delete :route="route('admin.product-review.destroy', ['product_review' => $review->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $reviews->links('components.pagination') }}
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

    let typingTimer;
    const typingDelay = 1000;

    $("[name='search']").on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => {
            $('#filterForm').submit();
        }, typingDelay);
    });

    $("[name='search']").on('keydown', function () {
        clearTimeout(typingTimer);
    });

    $("#filterForm select").on('change', function() {
        $('#filterForm').submit();
    });

    const reviewRoute = "{{ route('admin.product-review.index') }}";

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

                    window.location.href = reviewRoute;

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

