@extends('core::layout.app')

@section('title', __('admin.manage_admin'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.manage_admin'), 'url' => route('admin.manage-admin.index')],
        ['label' => __('admin.add_new')]
    ]
])
@endsection

@section('content')

<form action="{{ route('admin.manage-admin.store') }}" method="POST">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.manage_admin')" :route="route('admin.manage-admin.index')" btnType="back">

        <p class="text-danger">
            {!! clean(pureText(__('admin.default_password_message'))) !!}
        </p>

        <div class="row gy-6">
            <div class="col-12">
                <x-input-label for="name" :value="__('attribute.name')" />
                <x-text-input type="text" id="name" name="name" :value="old('name')" />
                <x-input-error field="name" />
            </div>
            <div class="col-md-6">
                <x-input-label for="email" :value="__('attribute.email')" />
                <x-text-input type="email" id="email" name="email" :value="old('email')" />
                <x-input-error field="email" />
            </div>
            <div class="col-md-6">
                <x-input-label for="username" :value="__('attribute.username')" />
                <x-text-input type="text" id="username" name="username" :value="old('username')" />
                <x-input-error field="username" />
            </div>

            @php
                $roles = \Spatie\Permission\Models\Role::whereNotIn('name', ['super_admin'])->get();
            @endphp
            <div class="col-md-6">
                <x-input-label for="role" :value="__('attribute.roles')" />
                <div class="select2-primary">
                    <select class="form-select user-role-select" name="roles[]" aria-label="Role" multiple>
                        @foreach ($roles as $role)
                        <option value="{{$role->name}}">{{ucwords(Str::replaceFirst('_', ' ', $role->name))}}</option>
                        @endforeach
                    </select>
                </div>
                <x-input-error field="roles" />
            </div>
        </div>

        <x-slot name="footer">
            <div class="float-end">
                <x-admin.button-add />
            </div>
        </x-slot>


    </x-card>
</form>
@endsection

@push('js')
<script>
    'use strict';

    $(function() {

        $('.user-role-select').wrap('<div class="position-relative"></div>').select2({
            placeholder: "{{ __('admin.select_value') }}",
            dropdownParent: $('.user-role-select').parent()
        });
    });
</script>
@endpush

