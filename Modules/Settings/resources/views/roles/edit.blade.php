@extends('core::layout.app')

@section('title', __('admin.edit_role'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.roles_and_permissions'), 'url' => route('admin.roles.index')],
        ['label' => __('admin.edit_role')]
    ]
])
@endsection

@section('content')
<form action="{{ route('admin.roles.update', ['role' => $role->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <x-card :heading="__('admin.edit_role')" :route="route('admin.roles.index')" btnType="back">

        <div class="row gy-6 mb-8">
            <div class="col-md-12">
                <x-input-label for="name" :value="__('attribute.name')" />
                <x-text-input id="name" name="name" :value="$role->name ?? ''" />
                <x-input-error field="name" />
            </div>
        </div>

         <div class="row">
            <div class="col-sm-6">
                <div class="text-nowrap fw-medium text-heading ps-0 mb-2">
                    {{ __('admin.administrator_access') }}
                    <i class="ms-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="{{ __('admin.allow_full_access_to_system') }}" data-bs-original-title="{{ __('admin.allow_full_access_to_system') }}">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.53845 7.53864C7.53845 7.15069 7.6535 6.77144 7.86903 6.44887C8.08457 6.1263 8.39092 5.87488 8.74934 5.72642C9.10777 5.57795 9.50217 5.53911 9.88267 5.61479C10.2632 5.69048 10.6127 5.8773 10.887 6.15162C11.1613 6.42595 11.3482 6.77546 11.4238 7.15597C11.4995 7.53647 11.4607 7.93087 11.3122 8.28929C11.1638 8.64771 10.9123 8.95406 10.5898 9.1696C10.2672 9.38514 9.88795 9.50018 9.49999 9.50018V10.8079M18 9.5C18 14.1944 14.1944 18 9.5 18C4.80558 18 1 14.1944 1 9.5C1 4.80558 4.80558 1 9.5 1C14.1944 1 18 4.80558 18 9.5ZM9.50002 14.0767C9.31946 14.0767 9.17309 13.9304 9.17309 13.7498C9.17309 13.5693 9.31946 13.4229 9.50002 13.4229C9.68057 13.4229 9.82692 13.5693 9.82692 13.7498C9.82692 13.9304 9.68057 14.0767 9.50002 14.0767Z" stroke="#000001" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </i>
                </div>
                <div class="form-check mb-0 text-black">
                    <input class="form-check-input" type="checkbox" id="selectAll">
                    <label class="form-check-label text-primary fw-medium" for="selectAll">
                        {{ __('admin.all_permissions')}}
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-6 mb-3 border-bottom"></div>

        @php
            $groupedPermissions = \Spatie\Permission\Models\Permission::all()->groupBy(function($item, $key) {
                return explode('-', $item->name)[0];
            });
        @endphp

        <div class="row">
            @foreach ($groupedPermissions as $group => $permissions)
            @php
                $groupName = str_replace('_', ' ', $group);
            @endphp
            <div class="col-lg-4 border-bottom border-end permission-group-parent" id="group-permission-{{ $groupName }}">
                <div class="py-6">
                    <div class="row g-4">
                        <div class="col-12">
                            <input type="checkbox" value="" class="form-check-input group-permission-input me-1" id="permission-{{ $groupName }}">
                            <label class="form-check-label text-primary fw-medium" for="permission-{{ $groupName}}">
                                {{ ucfirst($groupName) }}
                            </label>
                        </div>
                        <div class="col-12">
                            <div class="row row-cols-1 g-2 ps-7">
                                @foreach($permissions as $permission)
                                @php
                                    $permissionName = explode('-', $permission->name);
                                    $permissionTitleOne = array_key_exists(1, $permissionName) ? $permissionName[1] : '';
                                    $permissionTitleTwo = array_key_exists(2, $permissionName) ? $permissionName[2] : '';
                                    $permissionTitleOne = str_replace('_', ' ', $permissionTitleOne);

                                    $title = ucfirst($permissionTitleOne) . ' ' . ucfirst($permissionTitleTwo);
                                @endphp
                                <div class="col">
                                    <div class="form-check mb-0">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ $role->hasPermissionTo($permission->name) ? "checked" : "" }} class="form-check-input permission-input me-2" id="permission-{{ $permission->id }}">
                                        <label class="form-check-label" for="permission-{{ $permission->id }}">
                                            {{ $title }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>




        <x-slot name="footer">
            <x-button :text="__('admin.update')" />
        </x-slot>

    </x-card>

</form>

@endsection

@push('js')
<script>
    "use strict";

    $(function () {

        function updateSelectAllState() {
            const total = $('.permission-input').length;
            const checked = $('.permission-input:checked').length;
            const selectAll = $('#selectAll');

            if (checked === total) {
                selectAll.prop('checked', true).prop('indeterminate', false);
            } else if (checked > 0) {
                selectAll.prop('checked', false).prop('indeterminate', true);
            } else {
                selectAll.prop('checked', false).prop('indeterminate', false);
            }
        }

        function updateGroupCheckboxState() {
            $('.group-permission-input').each(function () {
                const groupBox = $(this);
                const groupContainer = groupBox.closest('.permission-group-parent');
                const checkboxes = groupContainer.find('.permission-input');
                const total = checkboxes.length;
                const checked = checkboxes.filter(':checked').length;

                if (checked === total) {
                    groupBox.prop('checked', true).prop('indeterminate', false);
                } else if (checked > 0) {
                    groupBox.prop('checked', false).prop('indeterminate', true);
                } else {
                    groupBox.prop('checked', false).prop('indeterminate', false);
                }
            });
        }

        // When a permission checkbox changes
        $('.permission-input').on('change', function () {
            updateGroupCheckboxState();
            updateSelectAllState();
        });

        // When a group checkbox is toggled
        $('.group-permission-input').on('change', function () {
            const isChecked = $(this).is(':checked');
            const groupContainer = $(this).closest('.permission-group-parent');
            groupContainer.find('.permission-input').prop('checked', isChecked);
            $(this).prop('indeterminate', false);
            updateSelectAllState();
        });

        // When selectAll is toggled
        $('#selectAll').on('change', function () {
            const isChecked = $(this).is(':checked');
            $('.permission-input').prop('checked', isChecked);
            $('.group-permission-input').prop('checked', isChecked).prop('indeterminate', false);
        });

        // Initialize states
        updateGroupCheckboxState();
        updateSelectAllState();
    });
</script>
@endpush
