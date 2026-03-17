@extends('core::layout.app')

@section('title', __('admin.currency'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.currency')]
    ]
])
@endsection

@section('content')
@can('currency-show')


<x-card :heading="__('admin.currency')" :route="route('admin.currency.create')">

    @if(isset($currencies) && !$currencies->isEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.title') }}
                    </th>
                    <th>
                        {{ __('admin.code') }}
                    </th>
                    <th>
                        {{ __('admin.symbol') }}
                    </th>
                    <th>
                        {{ __('admin.exchange_rate') }}
                    </th>
                    <th>
                        {{ __('admin.status') }}
                    </th>
                    <th>
                        {{ __('admin.default') }}
                    </th>
                    <th width="13%">
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($currencies as $currency)
                <tr>
                    <td>{{ ($currencies->currentpage() - 1) * $currencies->perpage() + $loop->iteration }}</td>
                    <td>
                        {{ $currency->title }}
                    </td>
                    <td>
                        {{ $currency->code }}
                    </td>
                    <td>
                        {{ $currency->symbol }}
                    </td>
                    <td>
                        {{ $currency->exchange_rate }}
                    </td>
                    <td>
                        <x-badge :variant="$currency->status == 1 ? 'success' : 'danger'" text="{{ $currency->status == 1 ? __('admin.active') : __('admin.inactive')}}" />
                    </td>
                    <td>
                        <x-badge :variant="$currency->is_default ? 'success' : 'danger'" text="{{ $currency->is_default ? __('admin.yes') : __('admin.no')}}" />
                    </td>
                    <td>
                        @can('currency-edit')
                        <x-table.edit :route="route('admin.currency.edit', ['currency' => $currency->id])" />
                        @endcan

                        @can('currency-delete')
                            @if (!$currency->is_default)
                            <x-table.delete :route="route('admin.currency.destroy', ['currency' => $currency->id])" />
                            @endif
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $currencies->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan
@endsection

