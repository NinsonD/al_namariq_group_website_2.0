@extends('core::layout.app')

@section('title', __('admin.users'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.users')]
    ]
])
@endsection

@section('content')

@can('user-show')
<x-card>

    @php
        $status = request()->get('status') ?? null;
        $order_by = request()->get('order_by') ?? null;
        $per_page = request()->get('per_page') ?? null;
        $search = request()->get('search') ?? null;
        $verified = request()->get('verified') ?? null;
        $pageItems = [10, 15, 25, 50, 100, 'all'];
    @endphp

    <div class="p-5">
        <form action="{{ route('admin.user.index')}}" method="GET" id="filterForm">

            <div class="row gy-4">
                <div class="col-xxl-3 col-xl-12">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="{{ __('admin.search') }}" aria-label="{{ __('admin.search') }}" aria-describedby="search-btn" value="{{ $search }}">
                        <button class="btn btn-primary" type="button" id="search-btn">
                            <x-icons.search />
                        </button>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-6 col-md-6">
                    <select class="form-select" name="verified" id="verified">
                        <option value="">
                            {{ __('admin.select_verification') }}
                        </option>
                        <option value="verified" {{ $verified == 'verified' ? 'selected' : '' }}>
                            {{ __('admin.verified') }}
                        </option>
                        <option value="unverified" {{ $verified == 'unverified' ? 'selected' : '' }}>
                            {{ __('admin.unverified') }}
                        </option>
                    </select>
                </div>
                <div class="col-xxl-2 col-lg-6 col-md-6">
                    <select class="form-select" name="status" id="status">
                        <option value="" >
                            {{ __('admin.select_status') }}
                        </option>
                        <option value="active" {{ $status == 'active' ? 'selected' : '' }}>
                            {{ __('admin.active') }}
                        </option>
                        <option value="inactive" {{ $status == 'inactive' ? 'selected' : '' }}>
                            {{ __('admin.inactive') }}
                        </option>
                        <option value="suspended" {{ $status == 'suspended' ? 'selected' : '' }}>
                            {{ __('admin.suspended') }}
                        </option>
                    </select>
                </div>
                <div class="col-xxl-2 col-lg-6 col-md-6">
                    <select class="form-select" name="order_by" id="order_by">
                        <option value="">
                            {{ __('admin.select_order_by') }}
                        </option>
                        <option value="asc" {{ $order_by == 'asc' ? 'selected' : '' }}>
                            {{ __('admin.latest') }}
                        </option>
                        <option value="desc" {{ $order_by == 'desc' ? 'selected' : '' }}>
                            {{ __('admin.oldest') }}
                        </option>
                    </select>
                </div>
                <div class="col-xxl-2 col-lg-6 col-md-6">
                    <select class="form-select" name="per_page" id="per_page">
                        <option value="">
                            {{ __('admin.select_per_page') }}
                        </option>
                        @foreach ($pageItems as $item)
                            <option value="{{ $item }}" {{ $per_page == $item ? 'selected' : '' }}>{{ ucfirst($item) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

</x-card>



<div class="card mb-5 shadow rounded-md">
    <div class="card-header bg-white py-4 ">
        <div class="d-flex align-items-center w-100">
                <h6 class="demo-card-title m-0 d-flex align-items-center gap-1 text-capitalize">
                {{ __('admin.users') }}
                </h6>

                @can('user-create')
                <div class="ms-auto d-flex gap-2">
                    <button type="button" class="btn btn-primary gap-2" data-bs-toggle="modal" data-bs-target="#addNewUser">
                        <x-icons.plus /> {{ __('admin.add_new_user') }}
                    </button>
                </div>
                @endcan

        </div>
    </div>

    <div class="card-body py-6">
        @if(isset($users) && !$users->isEmpty())
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>
                            {{ __('admin.sn') }}
                        </th>
                        <th>
                            {{ __('admin.name') }}
                        </th>
                        <th>
                            {{ __('admin.email') }}
                        </th>
                        <th>
                            {{ __('admin.designation') }}
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
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->designation}}</td>
                        <td>
                            @if ($user->status == 'active')
                                <x-badge variant="success" :text="__('admin.active')" style="label" class="rounded-pill" />
                            @elseif ($user->status == 'inactive')
                                <x-badge variant="warning" :text="__('admin.inactive')" style="label" class="rounded-pill" />
                            @else
                                <x-badge variant="danger" :text="__('admin.suspended')" style="label" class="rounded-pill" />
                            @endif
                        <td>
                            @can('user-edit')
                            <x-table.edit :route="route('admin.user.edit', ['user' => $user->id])" />
                            @endcan

                            @can('user-delete')
                            <x-table.delete :route="route('admin.user.destroy', ['user' => $user->id])" />
                            @endcan
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
            <x-data-not-found />
        @endif
    </div>

</div>
@endcan

@can('user-create')
<!-- Modal -->
<div class="modal fade" id="addNewUser" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addNewUserLabel">
                        {{ __('admin.add_new_user') }}
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('attribute.name')" />
                        <x-text-input id="title" name="name" :value="old('name')" />
                        <x-input-error field="name" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('attribute.email')"/>
                        <x-text-input type="email" id="email" name="email" :value="old('email')" />
                        <x-input-error field="email" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="slug" :value="__('attribute.username')" />
                        <x-text-input id="slug" name="username" :value="old('username')" />
                        <x-input-error field="username" />
                    </div>
                    <small>{!! clean(pureText(__('admin.default_password_message'))) !!}</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">
                        {{ __('admin.close') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('admin.add') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endcan

@endsection

@push('js')
<script>
    'use strict';
    $(function() {
        let typingTimer;
        const typingDelay = 1000;

        $("[name='search']").on('keyup', function () {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(() => {
                $('#filterForm').submit();
            }, typingDelay);
        });

        $("[name='search']").on('keydown', function () {
            clearTimeout(typingTimer);
        });

        $("#filterForm select").on('change', function() {
            $('#filterForm').submit();
        });
    });
</script>

@endpush
