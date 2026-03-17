@extends('core::layout.app')

@section('title', __('admin.coupon_history'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.coupon_history')]
    ]
])
@endsection

@section('content')
@can('coupon-history')
<x-card :heading="__('admin.coupon_history')">

    @if(isset($coupon_history) && !$coupon_history->isEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.coupon_code') }}
                    </th>
                    <th>
                        {{ __('admin.order_id') }}
                    </th>
                    <th>
                        {{ __('admin.used_by') }}
                    </th>
                    <th>
                        {{ __('admin.discount_amount') }}
                    </th>
                    <th>
                        {{ __('admin.date') }}
                    </th>
                    <th>
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupon_history as $coupon)
                <tr>
                    <td>{{ ($coupon_history->currentpage() - 1) * $coupon_history->perpage() + $loop->iteration }}</td>
                    <td>{{$coupon->coupon_code}}</td>
                    <td>
                        @if ($coupon->order)
                            <a href="{{ route('admin.orders.edit', ['order' => $coupon->order->id]) }}">
                                {{$coupon->order->order_no}}
                            </a>
                        @else
                            <span class="text-muted">--</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.user.edit', ['user' => $coupon->user->id]) }}">
                             {{ $coupon->user->name }}
                        </a>

                    </td>
                    <td>
                        @if($coupon->discount_type == 'percentage')
                            {{ round($coupon->discount) }}%
                        @else
                            {{ getSiteDefaultCurrency($coupon->discount) }}
                        @endif
                    </td>
                    <td>{{ pureDate($coupon->created_at) }}</td>
                    <td>
                        @can('coupon-history_delete')
                        <x-table.delete :route="route('admin.coupon_history.destroy', ['coupon' => $coupon->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $coupon_history->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan
@endsection

