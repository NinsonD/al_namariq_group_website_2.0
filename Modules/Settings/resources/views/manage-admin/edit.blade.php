@extends('core::layout.app')

@section('title', __('admin.manage_admin'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' =>  __('admin.manage_admin'), 'url' => route('admin.manage-admin.index')],
        ['label' => __('admin.edit_admin')]
    ]
])
@endsection

@section('content')
@isset($user)
<form action="{{ route('admin.manage-admin.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

     <x-card :heading="__('admin.edit_admin')" :route="route('admin.manage-admin.index')" btnType="back">

        <div class="row gy-6">
            <div class="col-12">
                <x-input-label for="name" :value="__('attribute.name')" />
                <x-text-input type="text" id="name" name="name" :value="$user->name" />
                <x-input-error field="name" />
            </div>
            <div class="col-md-6">
                <x-input-label for="email" :value="__('attribute.email')" />
                <x-text-input type="email" id="email" name="email" :value="$user->email" />
                <x-input-error field="email" />
            </div>
            <div class="col-md-6">
                <x-input-label for="username" :value="__('attribute.username')" />
                <x-text-input type="text" id="username" name="username" :value="$user->username" />
                <x-input-error field="username" />
            </div>
            <div class="col-md-6">
                <x-input-label for="password" :value="__('attribute.password')" />
                <div class="input-group mb-3">
                    <x-text-input type="password" id="password" name="password" />
                    <span class="input-group-text password-toggle">
                        <span class="close-eye password-eye">
                            <x-icons.close-eye />
                        </span>
                        <span class="open-eye password-eye d-none">
                            <x-icons.open-eye />
                        </span>
                    </span>
                </div>
                <x-input-error field="password" />
            </div>
            <div class="col-md-6">
                <x-input-label for="password_confirmation" :value="__('attribute.confirm_password')" />
                <div class="input-group mb-3">
                    <x-text-input type="password" id="password_confirmation" name="password_confirmation" />
                    <span class="input-group-text password-toggle">
                        <span class="close-eye password-eye">
                            <x-icons.close-eye />
                        </span>
                        <span class="open-eye password-eye d-none">
                            <x-icons.open-eye />
                        </span>
                    </span>
                </div>
                <x-input-error field="password_confirmation" />
            </div>
            @php
                $roles = \Spatie\Permission\Models\Role::whereNotIn('name', ['super_admin'])->get();
            @endphp
            <div class="col-md-6">
                <x-input-label for="role" :value="__('attribute.roles')" />
                <div class="select2-primary">
                    <select class="form-select user-role-select" name="roles[]" aria-label="Role" multiple>
                        @foreach ($roles as $role)
                        <option value="{{$role->name}}" @if ($user->hasRole($role->name)) selected @endif>{{ucwords(Str::replaceFirst('_', ' ', $role->name))}}</option>
                        @endforeach
                    </select>
                </div>
                <x-input-error field="roles" />
            </div>
        </div>

        <x-slot name="footer">
            <div class="float-end">
                <x-admin.button-update />
            </div>
        </x-slot>


    </x-card>
</form>
@endisset
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

