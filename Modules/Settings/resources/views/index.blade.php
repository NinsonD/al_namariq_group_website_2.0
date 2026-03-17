@extends('core::layout.app')

@section('title', __('admin.settings'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.settings')]
    ]
])
@endsection

@section('content')

@can('settings-show')
<div class="pb-12">
    <div class="row row-cols-1 row-cols-md-3">
        @can('settings-general_show')
        <div class="col">
            <x-icon-card :title="__('admin.general_settings')" link="{{ route('admin.general_setting') }}" :description="__('admin.general_setting_description')">
                <x-slot name="icon">
                    <x-icons.settings.general />
                </x-slot>
            </x-icon-card>
        </div>
        @endcan

        @can('mail-show')
        <div class="col">
            <x-icon-card :title="__('admin.email_configuration')" link="{{ route('admin.mail_configuration') }}" :description="__('admin.mail_configuration_description')">
                <x-slot name="icon">
                    <x-icons.settings.mail />
                </x-slot>
            </x-icon-card>
        </div>
        @endcan

        @can('credentials_settings-show')
        <div class="col">
            <x-icon-card :title="__('admin.credentials_settings')" link="{{ route('admin.credentials_settings') }}" :description="__('admin.credentials_settings_description')">
                <x-slot name="icon">
                    <x-icons.settings.credential />
                </x-slot>
            </x-icon-card>
        </div>
        @endcan

        @can('role-show')
        <div class="col">
            <x-icon-card :title="__('admin.admin_and_roles')" link="{{ route('admin.manage-admin.index') }}" :description="__('admin.manage_admin_description')">
                <x-slot name="icon">
                    <x-icons.settings.roles />
                </x-slot>
            </x-icon-card>
        </div>
        @endcan

        @can('seo_settings-show')
        <div class="col">
            <x-icon-card :title="__('admin.seo_setup')" link="{{ route('admin.seo-settings.index') }}" :description="__('admin.seo_settings_description')">
                <x-slot name="icon">
                    <x-icons.settings.seo />
                </x-slot>
            </x-icon-card>
        </div>
        @endcan
    </div>
</div>
@endcan
@endsection

