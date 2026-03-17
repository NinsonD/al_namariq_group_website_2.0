@extends('core::layout.app')

@section('title', __('admin.shipping_methods'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.shipping_methods'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.shipping_methods')]
    ]
])
@endsection

@section('content')

@can('shipping_method-show')
<x-card :heading="__('admin.shipping_methods')" :route="route('admin.shipping-methods.create')">

    @if(isset($methods) && !$methods->isEmpty())
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
                        {{ __('admin.fee') }}
                    </th>
                    <th>
                        {{ __('admin.min_amount') }}
                    </th>
                    <th>
                        {{ __('admin.is_free') }}
                    </th>
                    <th>
                        {{ __('admin.default') }}
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
                @foreach ($methods as $method)
                <tr>
                    <td>{{ ($methods->currentPage() - 1) * $methods->perPage() + $loop->iteration }}</td>
                    <td>{{ $method->title }}</td>
                    <td>{{ getSiteDefaultCurrency($method->fee) }}</td>
                    <td>{{ getSiteDefaultCurrency($method->min_amount) }}</td>
                    <td><x-badge :variant="$method->is_free ? 'success' : 'danger'" :text="$method->is_free ? __('admin.yes') : __('admin.no')" /></td>
                    <td>
                        <x-badge :variant="$method->default ? 'success' : 'danger'" :text="$method->default ? __('admin.yes') : __('admin.no')" />
                    </td>
                    <td>
                        <x-badge :variant="$method->status ? 'success' : 'danger'" :text="$method->status ? __('admin.active') : __('admin.inactive')" />
                    </td>
                    <td>
                        @can('shipping_method-edit')
                        <x-table.edit :route="route('admin.shipping-methods.edit', ['shipping_method' => $method->id])" />
                        @endcan

                        @can('shipping_method-delete')
                        <x-table.delete :route="route('admin.shipping-methods.destroy', ['shipping_method' => $method->id])" />
                        @endcan

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $methods->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan
@endsection
