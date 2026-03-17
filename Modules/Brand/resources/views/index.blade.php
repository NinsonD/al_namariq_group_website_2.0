@extends('core::layout.app')

@section('title', __('admin.brands'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.brands')]
    ]
])
@endsection

@section('content')
<x-card :heading="__('admin.brands')" :route="route('admin.brand.create')">


    @if(isset($brands) && !$brands->isEmpty())
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
                    <th>
                        {{ __('admin.status') }}
                    </th>
                    <th width="13%">
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                <tr>
                    <td>{{ ($brands->currentpage() - 1) * $brands->perpage() + $loop->iteration }}</td>
                    <td>
                        <img class="brand-table-img" src="{{ asset($brand->image) }}" alt="">
                    </td>
                    <td>{{$brand->getTranslation(getDefaultLocale())->title}}</td>
                    <td>
                        <x-badge :variant="$brand->status == 1 ? 'success' : 'danger'" :text="$brand->status == 1 ? __('admin.activate') : __('admin.inactivate')" />
                    </td>
                    <td>
                        @can('brands-edit')
                        <x-table.edit :route="route('admin.brand.edit', ['brand' => $brand->id, 'code' => getDefaultLocale()])" />
                        @endcan

                        @can('brands-delete')
                        <x-table.delete :route="route('admin.brand.destroy', ['brand' => $brand->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $brands->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endsection

@push('css')
    <style>
        .brand-table-img {
            width: 50px;
            height: auto;
        }
    </style>
@endpush
