@extends('core::layout.app')

@section('title', __('admin.coupons'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.coupons')]
    ]
])
@endsection

@section('content')
@can('coupon-show')


<x-card :heading="__('admin.coupons')" :route="route('admin.coupons.create')">

    @if(isset($coupons) && !$coupons->isEmpty())
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
                        {{ __('admin.min_price') }}
                    </th>
                    <th>
                        {{ __('admin.discount') }}
                    </th>
                    <th>
                        {{ __('admin.start_time') }}
                    </th>
                    <th>
                        {{ __('admin.end_time') }}
                    </th>
                    <th>
                        {{ __('admin.status') }}
                    </th>
                    <th width="13%">
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $coupon)
                <tr>
                    <td>{{ ($coupons->currentpage() - 1) * $coupons->perpage() + $loop->iteration }}</td>
                    <td>{{$coupon->coupon_code}}</td>
                    <td>{{themeCurrency($coupon->min_price)}}</td>
                    <td>
                        @if($coupon->discount_type == 'percentage')
                            {{ round($coupon->discount) }}%
                        @else
                            {{ themeCurrency($coupon->discount) }}
                        @endif
                    </td>
                    <td>{{ pureDate($coupon->start_time) }}</td>
                    <td>{{ pureDate($coupon->end_time) }}</td>
                    <td>
                        <x-badge :variant="$coupon->status == 1 ? 'success' : 'danger'" text="{{ $coupon->status == 1 ? __('admin.active') : __('admin.inactive')}}" />
                    </td>
                    <td>
                        @can('coupon-edit')
                        <x-table.edit :route="route('admin.coupons.edit', ['coupon' => $coupon->id])" />
                        @endcan

                        @can('coupon-delete')
                        <x-table.delete :route="route('admin.coupons.destroy', ['coupon' => $coupon->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $coupons->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan
@endsection

