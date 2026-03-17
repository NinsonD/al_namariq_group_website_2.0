@extends('core::layout.app')

@section('title', __('admin.manage_admin'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.manage_admin'),]
    ]
])
@endsection

@section('content')

<x-card :heading="__('admin.manage_admin')" :route="route('admin.manage-admin.create')">

    <div class="row">
        <div class="col-md-12">
            @if (isset($users) && !$users->isEmpty())
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">
                                {{ __('admin.sn') }}
                            </th>
                            <th>
                                {{ __('admin.name') }}
                            </th>
                            <th>
                                {{ __('admin.email') }}
                            </th>
                            <th>
                                {{ __('admin.role') }}
                            </th>
                            <th>
                                {{ __('admin.action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ ucwords($user->name) }}</td>
                            <td>
                                {{ $user?->email }}
                            </td>
                            <td>
                                @foreach ($user->roles as $role)
                                <span class="text-dark mb-2 me-2">{{ucwords(Str::replaceFirst('_', ' ', $role->name))}}</span>
                                <br />
                                @endforeach
                            </td>
                            <td>

                                @if ($user->hasrole('super_admin') != 'super_admin')
                                    <x-table.edit :route="route('admin.manage-admin.edit', $user->id)" />
                                    <x-table.delete :route="route('admin.manage-admin.destroy', $user->id)" />
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
                {{ $users->links('components.pagination') }}
            </div>

            @else
                <x-data-not-found/>
            @endif
        </div>
    </div>



</x-card>
@endsection
