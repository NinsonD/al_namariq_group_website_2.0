@extends('installer::layout')

@section('content')

@php
    $steps = \Modules\Installer\Traits\InstallerTrait::getSteps();
@endphp

@section('title', __('installer.create_super_admin'))

<x-installer :steps="$steps" :cardTitle="__('installer.create_super_admin')" :cardText="__('installer.create_super_admin_description')">

    <x-slot:card>

        <form action="{{ route('installer.account.post') }}" method="POST" class="ins-form">
            @csrf
            @method('POST')
            <div class="db-form mb-10">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="">
                            <label for="name" class="ins-label">{{ __('attribute.name') }} <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="name" name="name" placeholder="{{ __('attribute.name') }}" value="{{ old('name') }}">
                            <x-input-error field="name" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <label for="email" class="ins-label">{{ __('attribute.email') }} <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="email" name="email" placeholder="{{ __('attribute.email') }}" value="{{ old('email') }}">
                            <x-input-error field="email" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <label for="password" class="ins-label">{{ __('attribute.password') }} <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="password" name="password" placeholder="{{ __('attribute.password') }}" value="{{ old('password') }}">
                            <x-input-error field="password" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <label for="password_confirmation" class="ins-label">{{ __('attribute.confirm_password') }} <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="password_confirmation" name="password_confirmation" placeholder="{{ __('attribute.confirm_password') }}" value="{{ old('password_confirmation') }}">
                            <x-input-error field="password_confirmation" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="ins-btn">
                    {{ __('installer.create_account') }}
                </button>
            </div>

        </form>
            
    </x-slot:card>
</x-installer>
@endsection