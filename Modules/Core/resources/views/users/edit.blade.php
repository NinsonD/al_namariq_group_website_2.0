@extends('core::layout.app')

@section('title', __('admin.edit_users'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.users'), 'url' => route('admin.user.index')],
        ['label' => __('admin.edit_users')]
    ]
])
@endsection

@section('content')

@can('user-show')
    

<div class="row gy-5">
    <div class="col-xl-4">
        <div class="card shadow-custom rounded-custom">
            <div class="card-body p-6">
                <h4 class="fw-semibold mb-8 text-primary">
                    {{ __('admin.user_profile') }}
                </h4>

                @if ($user->avatar)
                <div class="avatar avatar-xl rounded-circle mb-6">
                    <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}">
                </div>
                @else
                <div class="avatar avatar-xl rounded-circle mb-6">
                    <div class="avatar-text">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                </div>
                @endif
                

                <div class="profile-info d-flex flex-column gap-3">
                    <div class="profile-info-item d-flex flex-wrap align-items-center">
                        <span class="profile-info-label">{{ __('admin.name') }}: </span>
                        <span class="profile-info-content">{{ $user->name }}</span>
                    </div>
                    <div class="profile-info-item d-flex flex-wrap align-items-center">
                        <span class="profile-info-label">{{ __('admin.email') }}: </span>
                        <span class="profile-info-content">{{ $user->email }}</span>
                    </div>
                    <div class="profile-info-item d-flex flex-wrap align-items-center">
                        <span class="profile-info-label">{{ __('admin.username') }}: </span>
                        <span class="profile-info-content">{{ $user->username }}</span>
                    </div>
                    <div class="profile-info-item d-flex flex-wrap align-items-center">
                        <span class="profile-info-label">{{ __('admin.designation') }}: </span>
                        <span class="profile-info-content">{{ $user->designation }}</span>
                    </div>
                    <div class="profile-info-item d-flex flex-wrap align-items-center">
                        <span class="profile-info-label">{{ __('admin.status') }}: </span>
                        <span class="profile-info-content">
                            @if ($user->status == 'active')
                                <span class="badge bg-label-success">{{ __('admin.active') }}</span>
                            @elseif ($user->status == 'inactive')
                                <span class="badge bg-label-warning">{{ __('admin.inactive') }}</span>
                            @else
                                <span class="badge bg-label-danger">{{ __('admin.suspended') }}</span>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="row">
            @can('user-edit')
            <div class="col-xl-12">
                <div class="card shadow-custom rounded-custom mb-5">
                    <div class="card-body p-6">
                        <form action="{{ route('admin.user.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h4 class="fw-semibold mb-8 text-primary">
                                {{ __('admin.profile_information') }}
                            </h4>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <x-input-label for="name" :value="__('attribute.name')" />
                                    <x-text-input id="name" name="name" :value="old('name', $user->name)" />
                                    <x-input-error field="name" /> 
                                </div>
                                <div class="col-md-6">
                                    <x-input-label for="email" :value="__('attribute.email')" />
                                    <x-text-input type="email" id="email" name="email" :value="old('email', $user->email)" />
                                    <x-input-error field="email" />
                                </div>
                                <div class="col-md-6">
                                    <x-input-label for="username" :value="__('attribute.username')" />
                                    <x-text-input id="username" name="username" :value="old('username', $user->username)" />
                                    <x-input-error field="username" /> 
                                </div>
                                <div class="col-md-6">
                                    <x-input-label for="status" :value="__('attribute.status')" />
                                    <select class="form-select" name="status" id="status">
                                        <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>{{ __('admin.active') }}</option>
                                        <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>{{ __('admin.inactive') }}</option>
                                        <option value="suspended" {{ $user->status == 'suspended' ? 'selected' : '' }}>{{ __('admin.suspended') }}</option>
                                    </select>
                                    <x-input-error field="status" /> 
                                </div>
                                <div class="col-md-6">
                                    <x-input-label for="designation" :value="__('attribute.designation')" />
                                    <x-text-input id="designation" name="designation" :value="old('designation', $user->designation)" />
                                    <x-input-error field="designation" /> 
                                </div>
                                <div class="col-md-6">
                                    <x-input-label for="phone" :value="__('attribute.phone')" />
                                    <x-text-input id="phone" name="phone" :value="old('phone', $user->phone)" />
                                    <x-input-error field="phone" /> 
                                </div>
                                <div class="col-md-6">
                                    <x-input-label for="address" :value="__('attribute.address')" />
                                    <x-text-input id="address" name="address" :value="old('address', $user->address)" />
                                    <x-input-error field="address" /> 
                                </div>
                                <div class="col-md-6">
                                    <x-input-label for="zip_code" :value="__('attribute.zip_code')" />
                                    <x-text-input id="zip_code" name="zip_code" :value="old('zip_code', $user->zip_code)" />
                                    <x-input-error field="zip_code" /> 
                                </div>
                                <div class="col-12">
                                    <x-input-label for="bio" :value="__('attribute.bio')" />
                                    <x-textarea id="bio" name="bio" :value="old('bio', $user->bio)" rows="7" />
                                    <x-input-error field="bio" /> 
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-success gap-2">
                                    <x-icons.update />
                                    {{ __('admin.update') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endcan

            @can('user-password_update')
            <div class="col-xl-12">
                <div class="card shadow-custom rounded-custom">
                    <div class="card-body p-6">
                        <h4 class="fw-semibold mb-8 text-primary">
                            {{ __('admin.change_password') }}
                        </h4>
        
                        <form action="{{ route('admin.user.password-update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <x-input-label for="password" :value="__('attribute.password')" />
                                    <div class="input-group mb-3">
                                        <x-text-input id="password" type="password" name="password" required />
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
                                        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required />
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
                                
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-success gap-2">
                                    <x-icons.update />
                                    {{ __('admin.update_password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </div>
</div>
@endcan
@endsection