@extends('core::layout.app')

@section('title', __('admin.portfolio'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.portfolio')]
    ]
])
@endsection

@section('content')

    @can('portfolio-show')
    <x-card :heading="__('admin.portfolio')" :route="route('admin.portfolio.create')">

        @if(isset($portfolios) && !$portfolios->isEmpty())
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
                    @foreach ($portfolios as $portfolio)
                    <tr>
                        <td>{{ ($portfolios->currentPage() - 1) * $portfolios->perPage() + $loop->iteration }}</td>
                        <td>
                            <img class="circle-img" src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->getTranslation(getDefaultLocale())->title }}">
                        </td>
                        <td>
                            <a class=" text-hover-underline" href="{{ route('portfolios.details', ['slug' => $portfolio->slug]) }}" target="_blank">
                                {{ $portfolio->getTranslation(getDefaultLocale())->title }}
                            </a>
                        </td>
                        <td>
                            <x-badge :variant="$portfolio->status ? 'success' : 'danger'" :text="$portfolio->status ? __('admin.active') : __('admin.inactive')" />
                        </td>
                        <td>

                            <x-table.view target="_blank" :route="route('portfolios.details', ['slug' => $portfolio->slug])" />

                            @can('portfolio-edit')
                            <x-table.edit :route="route('admin.portfolio.edit', ['portfolio' => $portfolio->id, 'code' => getDefaultLocale()])" />
                            @endcan

                            @can('portfolio-delete')
                            <x-table.delete :route="route('admin.portfolio.destroy', ['portfolio' => $portfolio->id])" />
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end">
            {{ $portfolios->links('components.pagination') }}
        </div>
        @else
            <x-data-not-found />
        @endif

    </x-card>
    @endcan
@endsection
