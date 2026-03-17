@extends('core::layout.app')

@section('title', __('admin.profile'))

@section('content')
<form id="profile_form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="card mb-5 shadow rounded-md">
        @php

            $user_avatar = $user->avatar == null ? asset('admin/img/default-avatar.jpg') : asset($user->avatar);
            $userBio = $user->bio == null ? '' : $user->bio;
        @endphp

        <div class="card-body pt-4">
            <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom mb-3 flex-wrap">
                <img width="120" class="profile-photo img-thumbnail" src="{{asset($user_avatar)}}" alt="{{ $user->name }}" />


                <div class="button-wrapper">
                    <label for="avatar" class="btn btn-sm btn-primary me-3 mb-3" tabindex="0">
                        <span class="d-block">
                            {{__('admin.upload_new_avatar')}}
                        </span>

                        @isset($user->avatar)
                            <input type="file" id="avatar" name="avatar" name="avatar" class="profile-picture-upload" hidden>
                        @else
                            <input type="file" id="avatar" name="avatar" class="profile-picture-upload" hidden>
                        @endisset
                    </label>
                    <button type="button" class="btn btn-sm btn-outline-secondary profile-picture-reset mb-3 d-none">
                        <span class="d-block">
                            {{__('admin.reset')}}
                        </span>
                    </button>

                    <div class="form-text">
                        {{__('admin.avatar_size')}}
                    </div>
                </div>
            </div>
            @error('avatar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="row g-6">
                <div class="col-md-6">
                    <x-input-label for="name" :value="__('admin.name')" />
                    <x-text-input  type="text" id="name" name="name" value="{{ old('name', $user->name) }}" />
                    <x-input-error field="name" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="email" :value="__('admin.email')" />
                    <x-text-input  type="text" id="email" name="email" value="{{ old('email', $user->email) }}" />
                    <x-input-error field="email" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="designation" :value="__('admin.designation')" />
                    <x-text-input  type="text" id="designation" name="designation" value="{{ old('designation', $user->designation) }}" />
                    <x-input-error field="designation" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="phone" :value="__('admin.phone')" />
                    <x-text-input  type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" />
                    <x-input-error field="phone" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="address" :value="__('admin.address')" />
                    <x-text-input  type="text" id="address" name="address" value="{{ old('address', $user->address) }}" />
                    <x-input-error field="address" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="zip_code" :value="__('admin.zip_code')" />
                    <x-text-input  type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', $user->zip_code) }}" />
                    <x-input-error field="zip_code" />
                </div>
                <div class="col-md-12">
                    <x-input-label for="bio" :value="__('admin.bio')" />
                    <x-textarea rows="5" name="bio" :value="old('bio', $user->bio)"></x-textarea>
                    <x-input-error field="bio" />
                </div>

            </div>
        </div>
        <div class="card-footer bg-white p-4 ">
            <button type="submit" class="btn btn-primary">
                {{__('admin.update')}}
            </button>
        </div>
    </div>
</form>

<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('PUT')

    <x-card>
        <x-slot name="header">
            {{ __('admin.change_password') }}
        </x-slot>

        <div class="row g-2">
            <div class="col-md-12">
                <x-input-label for="current_password" :value="__('attribute.current_password')" />
                <div class="input-group mb-3">
                    <x-text-input  type="password" id="current_password" name="current_password" />
                    <span class="input-group-text password-toggle">
                        <span class="close-eye password-eye">
                            <x-icons.close-eye />
                        </span>
                        <span class="open-eye password-eye d-none">
                            <x-icons.open-eye />
                        </span>
                    </span>
                </div>
                <x-input-error field="current_password" />
            </div>
            <div class="col-md-12">
                <x-input-label for="update_password_password" :value="__('attribute.new_password')" />
                <div class="input-group mb-3">
                    <x-text-input  type="password" id="update_password_password" name="password" />
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
            <div class="col-md-12">
                <x-input-label for="update_password_password_confirmation" :value="__('attribute.confirm_password')" />
                <div class="input-group mb-3">
                    <x-text-input  type="password" id="update_password_password_confirmation" name="password_confirmation" />
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

        <x-slot name="footer">
            <x-button type="submit" variant="primary" :text="__('admin.update_password')" />
        </x-slot>
    </x-card>
</form>
@endsection

@push('js')
<script>
    "use strict";

    $(function() {

        // Profile Picture Upload
        $('.profile-picture-upload').on('change', function() {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.profile-photo').attr('src', e.target.result).removeClass('visually-hidden');
                }
                reader.readAsDataURL(input.files[0]);

                $('.profile-picture-reset').removeClass('d-none');
            } else {
                $('.profile-photo').attr('src', '{{ $user_avatar }}');
                Swal.fire({
                    icon: 'error',
                    title: "{{__('admin.oops')}}",
                    text: "{{__('admin.allowed_images')}}"
                });
            }
        });

        // Profile Picture Reset
        $('.profile-picture-reset').on('click' ,function() {
            $('.profile-photo').attr('src', '{{ $user_avatar }}').removeClass('visually-hidden');
            $('.profile-picture-upload').val('');
            $(this).addClass('d-none');
        });
    });


</script>
@endpush
