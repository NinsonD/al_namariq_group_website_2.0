@extends('installer::layout')

@section('content')

@php
    $steps = \Modules\Installer\Traits\InstallerTrait::getSteps();
@endphp

@section('title', __('installer.configuration'))

<x-installer :steps="$steps" :cardTitle="__('installer.configuration')" :cardText="__('installer.configuration_description')">

    <x-slot:card>

    <form action="{{ route('installer.configuration.post') }}" method="POST" class="ins-form">
        @csrf
        @method('POST')

        <div class="db-form mb-10">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="">
                        <label for="app_name" class="ins-label">{{ __('attribute.app_name') }} <span class="required">*</span> </label>
                        <input type="text" class="ins-input" id="app_name" name="app_name" placeholder="{{ __('attribute.app_name') }}">
                        <x-input-error field="app_name" />
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <label for="timezone" class="ins-label">{{ __('attribute.timezone') }} <span class="required">*</span> </label>
                        <select class="ins-input" id="timezone" name="timezone">
                            <option value="">{{ __('installer.select_timezone') }}</option>
                            @foreach(timezone_identifiers_list() as $timezone)
                                <option value="{{ $timezone }}">{{ $timezone }}</option>
                            @endforeach
                        </select>
                        <x-input-error field="timezone" />
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="ins-btn">{{ __('installer.set_configuration') }}</button>
        </div>

    </form>

    </x-slot:card>

</x-installer>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}">
@endpush

@push('js')
<script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
<script>
    $(function(){

        $('#timezone').wrap('<div class="position-relative"></div>').select2({
            placeholder: "{{ __('admin.select_value') }}",
            dropdownParent: $('#timezone').parent()
        });
    })
</script>
@endpush
