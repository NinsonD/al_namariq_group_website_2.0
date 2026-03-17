@extends('core::layout.app')

@section('title', __('admin.roles_and_permissions'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.roles_and_permissions')]
    ]
])
@endsection

@section('content')

@can('role-show')
<x-card :heading="__('admin.roles_and_permissions')" :route="route('admin.roles.create')">

    <div class="row">
        <div class="col-md-12">
            @if (isset($roles) && !$roles->isEmpty())
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">
                                {{ __('admin.sn') }}
                            </th>
                            <th>
                                {{ __('admin.role_name') }}
                            </th>
                            <th>
                                {{ __('admin.permissions') }}
                            </th>
                            <th>
                                {{ __('admin.action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ ucwords($role->name) }}</td>
                            <td>
                                {{ $role?->permissions?->count() ?? 0 }}
                            </td>
                            <td>

                                @if ($role->name != 'super_admin')

                                    @can('role-edit')
                                    <x-table.edit :route="route('admin.roles.edit', $role->id)" />
                                    @endcan

                                    @can('role-delete')
                                    <x-table.delete :route="route('admin.roles.destroy', $role->id)" />
                                    @endcan
                                @else
                                    <x-badge :text="__('admin.super_admin')" variant="danger" style="label" class=" rounded-pill" />
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $roles->links('components.pagination') }}
            </div>

            @else
                <x-data-not-found/>
            @endif
        </div>
    </div>
</x-card>
@endcan
@endsection
