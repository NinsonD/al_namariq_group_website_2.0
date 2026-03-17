@extends('core::layout.app')

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.team'), 'url' => route('admin.team.index')],
        ['label' => __('admin.add_team')]
    ]
])
@endsection

@section('content')
<form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_team')" :route="route('admin.team.index')" btnType="back">

        <div class="row gy-5">
            <div class="col-md-12">
                <x-image-uploader name="image" :label="__('attribute.image')" />
                <x-input-error field="image" />
            </div>

            <div class="col-md-12">
                <x-input-label for="title" :value="__('admin.name')" />
                <x-text-input id="title" name="name" :value="old('name')" />
                <x-input-error field="name" />
            </div>
            <div class="col-md-6">
                <x-input-label for="slug" :value="__('admin.username')" />
                <x-text-input id="slug" name="username" :value="old('username')" />
                <x-input-error field="username" />
            </div>
            <div class="col-md-6">
                <x-input-label for="email" :value="__('admin.email')" />
                <x-text-input type="email" id="email" name="email" :value="old('email')" />
                <x-input-error field="email" />
            </div>

            <div class="col-md-6">
                <x-input-label for="designation" :value="__('admin.designation')" />
                <x-text-input id="designation" name="designation" :value="old('designation')" />
                <x-input-error field="designation" />
            </div>
            <div class="col-md-6">
                <x-input-label for="phone" :value="__('admin.phone')" />
                <x-text-input id="phone" name="phone" :value="old('phone')" />
                <x-input-error field="phone" />
            </div>
            <div class="col-md-6">
                <x-input-label for="qualification" :value="__('admin.qualification')" />
                <x-text-input id="qualification" name="qualification" :value="old('qualification')" />
                <x-input-error field="qualification" />
            </div>
            <div class="col-md-6">
                <x-input-label for="location" :value="__('admin.location')" />
                <x-text-input  id="location" name="location" :value="old('location')" />
                <x-input-error field="location" />
            </div>
            <div class="col-md-6">
                <x-input-label for="age" :value="__('admin.age')" />
                <x-text-input type="number" id="age" name="age" :value="old('age')" />
                <x-input-error field="age" />
            </div>
            <div class="col-md-6">
                <x-input-label for="gender" :value="__('admin.gender')" />
                <select class="form-select" name="gender" id="gender">
                    <option value="male">{{ __('admin.male') }}</option>
                    <option value="female">{{ __('admin.female') }}</option>
                    <option value="other">{{ __('admin.gender_other') }}</option>
                </select>
                <x-input-error field="gender" />
            </div>


            <div class="col-md-12">
                <x-input-label for="bio" :value="__('admin.bio')" />
                <textarea  id="bio" name="bio" rows="7" class="form-control tinymce">{{ old('bio') }}</textarea>
                <x-input-error field="bio" />
            </div>
            <div class="col-md-6">
                <x-input-switch name="status" :label="__('attribute.status')" />
                <x-input-error field="status" />
            </div>

        </div>

        <div class="mb-4 mt-7 pt-5 border-top ">
            <div class="row mb-5 gy-4 align-items-center">
                <div class="col-md-3">
                    <h4 class="fs-5 flex-basis-0 m-0">{{ __('admin.member_socials') }}</h4>
                </div>
                <div class="col-md-9">
                    <div class="form-text">
                       <x-icon-description />
                   </div>
                </div>
            </div>
            <div class="form-repeater">
                <div data-repeater-list="social">
                    <div data-repeater-item class="mb-6">
                        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-5 align-items-end">
                            <div class="col">
                                <x-input-label for="icon" :value="__('admin.icon_class')" />
                                <x-text-input id="icon" name="icon" />
                            </div>
                            <div class="col">
                                <x-input-label for="url" :value="__('admin.url')" />
                                <x-text-input id="url" name="url" />
                            </div>
                            <div class="col d-flex align-items-end">
                                <button class="btn btn-label-danger gap-1" type="button" data-repeater-delete>
                                    <svg width="12" height="12" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 0.999939L1 14.9999M1 0.999939L15 14.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    {{ __('admin.delete') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <button class="btn btn-sm btn-label-primary" type="button" data-repeater-create>{{ __('admin.add_new') }}</button>
                    </div>
                </div>
            </div>
        </div>


        <x-slot name="footer">
            <x-admin.button-add />
        </x-slot>

    </x-card>
</form>
@endsection

@push('js')
    <script src="{{ asset('admin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>

    <script>
        'use strict';

        $(function(){
            $('.form-repeater').repeater({
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if(confirm("{{ __('admin.are_your_sure_delete') }}")) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
        })
    </script>
@endpush
