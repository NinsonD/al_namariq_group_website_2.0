@extends('core::layout.app')

@section('title', __('admin.service'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.service')]
    ]
])
@endsection

@section('content')

@can('services-show')


<x-card :heading="__('admin.service')" :route="route('admin.service.create')">

    @if(isset($services) && !$services->isEmpty())
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
                    <th>
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                <tr>
                    <td>{{ ($services->currentPage() - 1) * $services->perPage() + $loop->iteration }}</td>
                    <td>
                        <img class="circle-img" src="{{ asset($service->image) }}" alt="">
                    </td>
                    <td>{{$service->getTranslation(getDefaultLocale())->title}}</td>
                    <td>
                        <x-badge :variant="$service->status ? 'success' : 'danger'" :text="$service->status ? __('admin.active') : __('admin.inactive')" />
                    </td>
                    <td>
                        <x-table.view target="_blank" :route="route('services.details', ['slug' => $service->slug])" />

                        @can('services-edit')
                        <x-table.edit :route="route('admin.service.edit', ['service' => $service->id, 'code' => getDefaultLocale()])" />
                        @endcan

                        @can('services-delete')
                        <x-table.delete :route="route('admin.service.destroy', ['service' => $service->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $services->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan
@endsection
