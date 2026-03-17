@extends('installer::layout')

@php
    $steps = \Modules\Installer\Traits\InstallerTrait::getSteps();
@endphp

@section('title', __('installer.setup_smtp'))

@section('content')

<x-installer :steps="$steps" :cardTitle="__('installer.setup_smtp')" :cardText="__('installer.setup_smtp_description')">

    <x-slot:card>

    <form action="{{ route('installer.smtp.post') }}" method="POST" class="ins-form">
            @csrf
            @method('POST')
            <div class="db-form mb-10">
                <div class="row g-6">
                    <div class="col-12 col-md-6">
                        <div class="">
                            <label for="mail_host" class="ins-label">{{ __('attribute.mail_host') }} <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="mail_host" name="mail_host" placeholder="{{ __('attribute.mail_host') }} " value="{{ old('mail_host') }}">
                            <x-input-error field="mail_host" /> 
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="">
                            <label for="mail_port" class="ins-label">{{ __('attribute.mail_port') }}  <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="mail_port" name="mail_port" placeholder="{{ __('attribute.mail_port') }} " value="{{ old('mail_port') }}">
                            <x-input-error field="mail_port" /> 
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="">
                            <label for="smtp_username" class="ins-label">{{ __('attribute.mail_username') }}  <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="smtp_username" name="smtp_username" placeholder="{{ __('attribute.mail_username') }} " value="{{ old('smtp_username') }}">
                            <x-input-error field="smtp_username" /> 
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="">
                            <label for="smtp_password" class="ins-label">{{ __('attribute.mail_password') }}  <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="smtp_password" name="smtp_password" placeholder="{{ __('attribute.mail_password') }} " value="{{ old('smtp_password') }}">
                            <x-input-error field="smtp_password" /> 
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="">
                            <label for="mail_sender_name" class="ins-label">{{ __('attribute.mail_sender_name') }}  <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="mail_sender_name" name="mail_sender_name" placeholder="{{ __('attribute.mail_sender_name') }} " value="{{ old('mail_sender_name') }}">
                            <x-input-error field="mail_sender_name" /> 
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="">
                            <label for="mail_sender_email" class="ins-label">{{ __('attribute.mail_sender_email') }}  <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="mail_sender_email" name="mail_sender_email" placeholder="{{ __('attribute.mail_sender_email') }} " value="{{ old('mail_sender_email') }}">
                            <x-input-error field="mail_sender_email" /> 
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="">
                            <label for="mail_encryption" class="ins-label">{{ __('attribute.mail_encryption') }}  <span class="required">*</span> </label>
                            <select id="mail_encryption" name="mail_encryption">
                                <option value="tls">
                                    {{ __('installer.tls') }}
                                </option>
                                <option value="ssl">
                                    {{ __('installer.ssl') }}
                                </option>
                            </select>
                            <x-input-error field="mail_encryption" /> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center gap-3 align-items-center">
                <button type="submit" class="ins-btn">
                    {{ __('installer.setup_smtp') }}
                </button>
                <button type="button" class="ins-btn success-label" data-bs-toggle="modal" data-bs-target="#smtpSkipModal">
                    {{ __('installer.skip_now') }}
                </button>
            </div>
        </form>
    </x-slot:card>
</x-installer>

<!-- Modal -->
<div class="modal fade" id="smtpSkipModal" tabindex="-1" aria-labelledby="smtpSkipModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('installer.smtp.skip') }}" method="POST" class="ins-form">
            @csrf
            @method('POST')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="smtpSkipModalLabel">
                        {{ __('installer.skip_smtp_setup') }}
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <p class="fs-4">
                            {{ __('installer.skip_smtp_setup_description') }}
                        </p>
                        <p class="text-danger fs-4">
                            <strong>
                                {{ __('installer.note') }}
                            </strong> {{ __('installer.smtp_warning') }}
                        </p>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        {{ __('installer.cancel') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('installer.skip_smtp_setup') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


@push('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}">
@endpush

@push('js')
<script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
<script>
    $(function(){

        $('#mail_encryption').wrap('<div class="position-relative"></div>').select2({
            placeholder: "{{ __('admin.select_value') }}",
            dropdownParent: $('#mail_encryption').parent()
        });
    })
</script>
@endpush