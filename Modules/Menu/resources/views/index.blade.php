@extends('core::layout.app')

@section('title', __('admin.menu_builder'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.menu_builder')]
    ]
])
@endsection

@section('content')

@can('menu-show')
<x-card :heading="__('admin.all_menus')">

    @if(isset($all_menu) && !$all_menu->isEmpty())
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
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_menu as $menu)
                <tr>
                    <td>{{ ($all_menu->currentPage() - 1) * $all_menu->perPage() + $loop->iteration }}</td>
                    <td>{{ $menu->en_title ?? '-' }}</td>
                    <td>
                        @can('menu-edit')
                            <x-table.edit :route="route('admin.menu.edit', ['menu' => $menu->id, 'code' => getDefaultLocale()])" />
                        @endcan
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $all_menu->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan
@endsection

