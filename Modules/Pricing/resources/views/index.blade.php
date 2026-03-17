@extends('core::layout.app')

@section('title', __('admin.price_plan'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.price_plan')]
    ]
])
@endsection

@section('content')

@can('pricing-show')
<x-card :heading="__('admin.price_plan')" :route="route('admin.pricing.create')">


    @if(isset($pricings) && !$pricings->isEmpty())
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
                        {{ __('admin.price') }}
                    </th>
                    <th>
                        {{ __('admin.expiration') }}
                    </th>
                    <th>
                        {{ __('admin.show_on_home') }}
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
                @foreach ($pricings as $pricing)
                <tr>
                    <td>{{ ($pricings->currentPage() - 1) * $pricings->perPage() + $loop->iteration }}</td>
                    <td>{{$pricing->getTranslation(getDefaultLocale())->title}}</td>
                    <td>{{$pricing->price}}</td>
                    <td>{{ucwords($pricing->expiration)}}</td>
                    <td>
                        <x-badge :variant="$pricing->show_on_home ? 'success' : 'danger'" :text="$pricing->show_on_home ? __('admin.yes') : __('admin.no')" style="label" class="rounded-pill" />
                    </td>
                    <td>
                        <x-badge :variant="$pricing->status ? 'success' : 'danger'" :text="$pricing->status ? __('admin.active') : __('admin.inactive')" class="rounded-pill" />
                    </td>
                    <td>
                        @can('pricing-edit')
                        <x-table.edit :route="route('admin.pricing.edit', ['pricing' => $pricing->id])" />
                        @endcan

                        @can('pricing-delete')
                        <x-table.delete :route="route('admin.pricing.destroy', ['pricing' => $pricing->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $pricings->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan
@endsection
