@extends('core::layout.app')

@section('title', __('admin.reviews'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.all_reviews'), 'url' => route('admin.product-review.index')],
        ['label' => __('admin.reviews')]
    ]
])
@endsection

@section('content')
@can('product_review-show')


<x-card :heading="__('admin.reviews')" :route="route('admin.product-review.index')" btnType="back">

    @if ($reviews->isNotEmpty())
        @foreach ($reviews as $review)

        <div class="mb-10">
            <div class="d-flex mb-5 timeline">
                <div class="avatar avatar-md rounded-pill">
                    @if (!empty($review->user->avatar) && file_exists(public_path($review->user->avatar)))
                        <img src="{{ asset($review->user->avatar) }}" alt="{{ $review->user->name }}">
                    @else
                        <div class="avatar-text bg-label-primary">
                            {{ $review->user->initials }}
                        </div>
                    @endif
                </div>

                <div class="ms-3 flex-grow-1">
                    <span class="badge badge-label-primary rounded-pill float-end">{{ $review->created_at->diffForHumans() }}</span>
                    <h5 class="mb-1 ">{{ $review->user->name }}</h5>
                    <p class="mb-0">{{ $review->user->email }}</p>
                </div>
            </div>
            <div class="">
                <div class="d-flex align-items-center mb-3">
                    <h6 class="m-0">{{ __('admin.rating') }}:</h6>
                    <p class="m-0 text-warning ms-2">
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
                    </p>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <h6 class="m-0">{{ __('admin.status') }}:</h6>
                    <p class="m-0 ms-2">
                        @if ($review->status == 1)
                            <span class="badge  badge-label-success">{{ __('admin.approved') }}</span>
                        @else
                            <span class="badge  badge-label-warning">{{ __('admin.pending') }}</span>
                        @endif
                    </p>
                </div>
                <h6>{{ __('admin.comment') }}:</h6>
                <p>{{ $review->comment }}</p>
            </div>
        </div>
        @endforeach

        <div class="d-flex justify-content-end">
            {{ $reviews->links('components.pagination') }}
        </div>

        @else
            <x-data-not-found />
        @endif
</x-card>

@endcan
@endsection
