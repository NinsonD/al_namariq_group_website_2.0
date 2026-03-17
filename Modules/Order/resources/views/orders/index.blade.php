@extends('core::layout.app')

@section('title', __('admin.orders'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.orders'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.orders')]
    ]
])
@endsection

@section('content')

@can('order-show')


<x-card>

    @php
        $payment_status = request()->get('payment_status') ?? null;
        $status = request()->get('status') ?? null;
        $order_by = request()->get('order_by') ?? null;
        $per_page = request()->get('per_page') ?? null;
        $pageItems = [10, 15, 25, 50, 100, 'all'];
    @endphp

    <div class="p-5">
        <form action="{{ route('admin.orders.index')}}" method="GET" id="filterForm">

            <div class="row gy-4">
                <div class="col-xxl-3 col-lg-6 col-md-6">
                    <select class="form-select" name="payment_status" id="payment_status">
                        <option value="" >
                            {{ __('admin.select_payment_status') }}
                        </option>
                        <option value="pending" {{ $payment_status == 'pending' ? 'selected' : '' }}>
                            {{ __('admin.pending') }}
                        </option>
                        <option value="success" {{ $payment_status == 'success' ? 'selected' : '' }}>
                            {{ __('admin.success') }}
                        </option>
                        <option value="rejected" {{ $payment_status == 'rejected' ? 'selected' : '' }}>
                            {{ __('admin.rejected') }}
                        </option>
                        <option value="refund" {{ $payment_status == 'refund' ? 'selected' : '' }}>
                            {{ __('admin.refund') }}
                        </option>
                    </select>
                </div>
                <div class="col-xxl-2 col-lg-6 col-md-6">
                    <select class="form-select" name="status" id="status">
                        <option value="" >
                            {{ __('admin.select_order_status') }}
                        </option>
                        <option value="draft" {{ $status == 'draft' ? 'selected' : '' }}>
                            {{ __('admin.draft') }}
                        </option>
                        <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>
                            {{ __('admin.pending') }}
                        </option>
                        <option value="processing" {{ $status == 'processing' ? 'selected' : '' }}>
                            {{ __('admin.processing') }}
                        </option>
                        <option value="success" {{ $status == 'success' ? 'selected' : '' }}>
                            {{ __('admin.success') }}
                        </option>
                        <option value="refund" {{ $status == 'refund' ? 'selected' : '' }}>
                            {{ __('admin.refund') }}
                        </option>
                        <option value="rejected" {{ $status == 'rejected' ? 'selected' : '' }}>
                            {{ __('admin.rejected') }}
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


<x-card :heading="__('admin.orders')">

    @if(isset($orders) && !$orders->isEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.date') }}
                    </th>
                    <th>
                        {{ __('admin.customer') }}
                    </th>
                    <th>
                        {{ __('admin.order_id') }}
                    </th>
                    <th>
                        {{ __('admin.amount') }}
                    </th>
                    <th>
                        {{ __('admin.payment_status') }}
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
                @foreach ($orders as $order)
                <tr>
                    <td>{{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration }}</td>
                    <td>
                        {{ $order->created_at->format('d M Y') }}
                    </td>
                    <td>
                        <a href="{{ route('admin.user.edit' , ['user' => $order->user->id]) }}">
                            {{ $order->user->name }}
                        </a>
                    </td>
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->user_paid_amount }}</td>
                    <td>

                        <span class="custom-badge {{ $order->payment_status  }}">
                            {{ $order->payment_status }}
                        </span>

                    </td>
                    <td>
                        <span class="custom-badge {{ $order->order_status  }}">
                            {{ $order->order_status }}
                        </span>
                    </td>
                    <td>

                        @can('order-edit')
                        <x-table.edit :route="route('admin.orders.edit', ['order' => $order->id])" />
                        @endcan

                        @can('order-delete')
                        <x-table.delete :route="route('admin.orders.destroy', ['order' => $order->id])" />
                        @endcan

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $orders->links('components.pagination') }}
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
