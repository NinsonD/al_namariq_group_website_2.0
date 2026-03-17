@extends('core::layout.app')

@section('title', __('admin.all_products'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.all_products')]
    ]
])
@endsection

@section('content')
@can('product-show')
<x-card>

    @php
        $status = request()->get('status') ?? null;
        $order_by = request()->get('order_by') ?? null;
        $per_page = request()->get('per_page') ?? null;
        $search = request()->get('search') ?? null;
        $on_sale = request()->get('on_sale') ?? null;
        $pageItems = [10, 15, 25, 50, 100, 'all'];
    @endphp

    <div class="p-5">
        <form action="{{ route('admin.product.index')}}" method="GET" id="filterForm">

            <div class="row gy-4">
                <div class="col-xxl-3 col-xl-12">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="{{ __('admin.search') }}" aria-label="{{ __('admin.search') }}" aria-describedby="search-btn" value="{{ $search }}">
                        <button class="btn btn-primary" type="button" id="search-btn">
                            <x-icons.search />
                        </button>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-6 col-md-6">
                    <select class="form-select" name="on_sale" id="on_sale">
                        <option value="">
                            {{ __('admin.on_sale') }}
                        </option>
                        <option value="yes" {{ $on_sale == 'yes' ? 'selected' : '' }}>
                            {{ __('admin.yes') }}
                        </option>
                        <option value="no" {{ $on_sale == 'no' ? 'selected' : '' }}>
                            {{ __('admin.no') }}
                        </option>
                    </select>
                </div>
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
                    <select class="form-select" name="order_by" id="order_by">
                        <option value="">
                            {{ __('admin.select_order_by') }}
                        </option>
                        <option value="asc" {{ $order_by == 'asc' ? 'selected' : '' }}>
                            {{ __('admin.latest') }}
                        </option>
                        <option value="desc" {{ $order_by == 'desc' ? 'selected' : '' }}>
                            {{ __('admin.oldest') }}
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


<x-card :heading="__('admin.all_products')" :route="route('admin.product.create')">

    @if(isset($products) && !$products->isEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.product') }}
                    </th>
                    <th>
                        {{ __('admin.sku') }}
                    </th>
                    <th>
                        {{ __('admin.quantity') }}
                    </th>
                    <th>
                        {{ __('admin.category') }}
                    </th>
                    <th>
                        {{ __('admin.price') }}
                    </th>
                    <th>
                        {{ __('admin.sale') }}
                    </th>
                    <th>
                        {{ __('admin.popular') }}
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
                @foreach ($products as $product)

                <tr>
                    <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img class="circle-img" src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                            {{ $product?->getTranslation($code)?->title }}
                        </div>
                    </td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>
                        {{ $product->category ? $product->category?->getTranslation($code)?->title : __('admin.no_category') }}
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>
                        @php
                            $isOnSale = $product->sale_price && $product->sale_price < $product->price;
                        @endphp
                        <x-badge :variant="$isOnSale ? 'success' : 'danger'" :text="$isOnSale ? __('admin.yes') : __('admin.no')" />
                    </td>
                    <td>
                        <x-badge :variant="$product->is_popular ? 'success' : 'danger'" :text="$product->is_popular ? __('admin.yes') : __('admin.no')" />
                    </td>
                    <td>
                        <x-badge :variant="$product->status ? 'success' : 'danger'" :text="$product->status ? __('admin.active') : __('admin.inactive')" />
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-icon btn-icon-secondary dropdown-toggle hide-arrow rounded-pill" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                    <svg width="3" height="14" viewBox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 12.5165C3 12.9231 2.85278 13.272 2.55833 13.5632C2.26389 13.8544 1.91111 14 1.5 14C1.08889 14 0.736112 13.8544 0.441667 13.5632C0.147223 13.272 0 12.9231 0 12.5165C0 12.1099 0.147223 11.761 0.441667 11.4698C0.736112 11.1786 1.08889 11.033 1.5 11.033C1.77222 11.033 2.02222 11.1016 2.25 11.239C2.47778 11.3709 2.66111 11.5495 2.8 11.7747C2.93333 11.9945 3 12.2418 3 12.5165Z" fill="currentColor"></path>
                                        <path d="M3 7C3 7.40659 2.85278 7.75549 2.55833 8.0467C2.26389 8.33791 1.91111 8.48352 1.5 8.48352C1.08889 8.48352 0.736112 8.33791 0.441667 8.0467C0.147223 7.75549 0 7.40659 0 7C0 6.59341 0.147223 6.24451 0.441667 5.9533C0.736112 5.66209 1.08889 5.51648 1.5 5.51648C1.77222 5.51648 2.02222 5.58517 2.25 5.72253C2.47778 5.8544 2.66111 6.03297 2.8 6.25824C2.93333 6.47802 3 6.72527 3 7Z" fill="currentColor"></path>
                                        <path d="M3 1.48351C3 1.89011 2.85278 2.23901 2.55833 2.53022C2.26389 2.82143 1.91111 2.96703 1.5 2.96703C1.08889 2.96703 0.736112 2.82143 0.441667 2.53022C0.147223 2.23901 0 1.89011 0 1.48351C0 1.07692 0.147223 0.728022 0.441667 0.436812C0.736112 0.145604 1.08889 0 1.5 0C1.77222 0 2.02222 0.0686817 2.25 0.206044C2.47778 0.337913 2.66111 0.516483 2.8 0.741757C2.93333 0.961538 3 1.20879 3 1.48351Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="bottom-start">
                                    @can('product-edit')
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center justify-content-start gap-2" href="{{ route('admin.product.edit', ['product' => $product->id]) }}">
                                            <x-icons.edit />
                                        {{ __('admin.edit') }}
                                        </a>
                                    </li>
                                    @endcan
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center justify-content-start gap-2" target="_blank" href="{{ route('products.show', ['slug' => $product->slug]) }}">
                                            <x-icons.view />
                                            {{ __('admin.view') }}
                                        </a>
                                    </li>
                                    @can('product-delete')
                                    <li>
                                        <form action="{{ route('admin.product.destroy', ['product' => $product->id]) }}" method="POST" class="d-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item d-flex align-items-center justify-content-start gap-2 common-delete-btn" type="button">
                                                <x-icons.delete />
                                                {{ __('admin.delete') }}
                                            </button>
                                        </form>
                                    </li>
                                    @endcan
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $products->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>

@endcan

@endsection

@push('js')
<script>
    'use strict';
    $(function() {
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
    });
</script>

@endpush
