@extends('installer::layout')

@section('content')

@php
    $steps = \Modules\Installer\Traits\InstallerTrait::getSteps();
@endphp

@section('title', __('installer.active_license'))

<x-installer title="Active License" :cardTitle="__('installer.active_license')" :cardText="__('installer.enter_purchase_code_below')">
    <x-slot:card>

        <form action="{{ route('page-active-license.post') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-5">
                <x-input-label for="purchase_code" :value="__('attribute.purchase_code')" />
                <x-text-input id="purchase_code" name="purchase_code" :value="old('purchase_code')"/>
                <x-input-error field="purchase_code" />
            </div>

            <button id="verify-license-btn" class="ins-btn" type="submit">{{ __('installer.active_license') }}</button>
        </form>

    </x-slot:card>
</x-installer>
@endsection

@push('js')
<script>
    'use strict';

    $(function(){

        $('#verify-license-btn').on('click', function(e){
            e.preventDefault();

            let form = $(this).closest('form');
            let formData = form.serialize();
            let btn = $(this);
            let $input = $(this).closest('form').find('input[name="purchase_code"]');
            btn.prop('disabled', true).text('{{ __("installer.verifying") }}');

            const verifyingText = "{{ __('installer.verifying') }}";
            const verifyLicenseText = "{{ __('installer.active_license') }}";
            const verificationFailedText = "{{ __('installer.verification_failed') }}";
            const serverErrorText = "{{ __('notification.a_server_error_occurred') }}";
            const redirectUrl = "{{ route('admin.license') }}";

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: {
                    purchase_code: $input.val(),
                    csrf_token: '{{ csrf_token() }}'
                },
                beforeSend: function(){
                    $input.closest('.form-text').text('');
                    btn.prop('disabled', true).text(verifyingText);
                },
                success: function(response){
                    if(response.success){
                        window.location.href = redirectUrl;
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message || verificationFailedText,
                        });
                    }
                },
                error: function(xhr){

                    if(xhr.responseJSON && xhr.responseJSON.errors){
                        let errors = xhr.responseJSON.errors;

                        $.each(errors, function(field, messages){
                            let input = $('[name="'+field+'"]');
                            input.closest('.form-text').text(messages[0]);
                        });
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr?.responseJSON?.message || serverErrorText,
                    });

                    btn.prop('disabled', false).text(verifyLicenseText);
                },
                complete: function(){
                    btn.prop('disabled', false).text(verifyLicenseText);
                }
            });
        });

    })

</script>
@endpush
