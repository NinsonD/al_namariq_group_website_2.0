@extends('installer::layout')

@section('content')

@php
    $steps = \Modules\Installer\Traits\InstallerTrait::getSteps();
@endphp

@section('title', __('installer.setup_database'))

<x-installer :steps="$steps" :cardTitle="__('installer.setup_database')" :cardText="__('installer.setup_database_description')">

    <x-slot:card>

        <div class="ins-alert error mb-8 database-error d-none">

        </div>


        <form id="database_form" action="{{ route('installer.database.post') }}" autocomplete="off" method="POST">
            <div class="db-form ">
                <div class="row row-cols-1  g-4">
                    <div class="col">
                        <div class="">
                            <label for="db_host" class="ins-label">{{ __('installer.database_host') }} <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="db_host" name="db_host" placeholder="{{ __('installer.database_host') }}" value="localhost">
                            <x-input-error field="db_host" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <label for="db_name" class="ins-label">{{ __('installer.database_name') }} <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="db_name" name="db_name" placeholder="{{ __('installer.database_name') }}" value="test">
                            <x-input-error field="db_name" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <label for="db_username" class="ins-label">{{ __('installer.database_username') }} <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="db_username" name="db_username" placeholder="{{ __('installer.database_username') }}" value="root">
                            <x-input-error field="db_username" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <label for="db_password" class="ins-label">{{ __('installer.database_password') }} <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="db_password" name="db_password" placeholder="{{ __('installer.database_password') }}">
                            <x-input-error field="db_password" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <label for="db_port" class="ins-label">{{ __('installer.database_port') }} <span class="required">*</span> </label>
                            <input type="text" class="ins-input" id="db_port" name="db_port" placeholder="{{ __('installer.database_port') }}" value="3306">
                            <x-input-error field="db_port" />
                        </div>
                    </div>
                    <div class="col d-none reset_database">
                        <div class="ins-checkbox-group">
                            <input type="checkbox" class="ins-checkbox" id="reset_database" name="reset_database">
                            <label for="reset_database" class="ins-checkbox-label">{{ __('installer.yes_i_want_to_clear_database') }}</label>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning d-flex gap-3 flex-sm-nowrap flex-wrap mt-8" role="alert">
                    <div class="flex-shrink-1">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 10V14.8462M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10ZM10.6923 6.5387C10.6923 6.92105 10.3824 7.23101 10 7.23101C9.61769 7.23101 9.30773 6.92105 9.30773 6.5387C9.30773 6.15635 9.61769 5.84639 10 5.84639C10.3824 5.84639 10.6923 6.15635 10.6923 6.5387Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="">
                        <h4 class="alert-heading">
                            {{ __('installer.demo_data_installation') }}
                        </h4>
                        <p class="mb-5">
                            {{ __('installer.demo_data_installation_description') }}
                        </p>

                        <input type="text" name="database_seed" id="database_seed" value="" class="d-none">

                        <div class="toggle-switch-wrapper d-inline-flex">
                            <div class="toggle-item-wrapper toggle-item-wrapper d-inline-flex justify-content-center align-items-center">
                                <button class="toggle-item active" data-value="dummy">{{ __('installer.demo_install') }}</button>
                                <button class="toggle-item" data-value="fresh">{{ __('installer.fresh_install') }}</button>
                                <span class="bar"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <button type="submit" class="ins-btn setup-database-btn mt-5">
                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.8077 7.90385C16.4662 7.90385 17 7.37003 17 6.71154V1.94231C17 1.28381 16.4662 0.75 15.8077 0.75H2.69231C2.03381 0.75 1.5 1.28381 1.5 1.94231V6.71154C1.5 7.37003 2.03381 7.90385 2.69231 7.90385M15.8077 7.90385H2.69231M15.8077 7.90385C16.1239 7.90385 16.4272 8.02946 16.6508 8.25307C16.8744 8.47667 17 8.77993 17 9.09615V13.8654C17 14.1816 16.8744 14.4849 16.6508 14.7085C16.4272 14.9321 16.1239 15.0577 15.8077 15.0577H2.69231C2.37609 15.0577 2.07282 14.9321 1.84922 14.7085C1.62562 14.4849 1.5 14.1816 1.5 13.8654V9.09615C1.5 8.77993 1.62562 8.47667 1.84922 8.25307C2.07282 8.02946 2.37609 7.90385 2.69231 7.90385M9.8457 4.32715H14.0188M9.8457 11.481H14.0188M5.67278 4.32711C5.67278 4.65636 5.40587 4.92326 5.07662 4.92326C4.74738 4.92326 4.48047 4.65636 4.48047 4.32711C4.48047 3.99786 4.74738 3.73096 5.07662 3.73096C5.40587 3.73096 5.67278 3.99786 5.67278 4.32711ZM5.67278 11.4809C5.67278 11.8102 5.40587 12.0771 5.07662 12.0771C4.74738 12.0771 4.48047 11.8102 4.48047 11.4809C4.48047 11.1517 4.74738 10.8848 5.07662 10.8848C5.40587 10.8848 5.67278 11.1517 5.67278 11.4809Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        {{ __('installer.setup_database') }}
                    </button>
                </div>
            </div>
        </form>

    </x-slot:card>

</x-installer>
@endsection


@push('js')
<script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script>
    $(function(){

        function setBarPosition(item, bar) {
            const itemWidth = item.offsetWidth;
            const itemLeft = item.offsetLeft;

            bar.style.width = `${itemWidth}px`;
            bar.style.left = `${itemLeft}px`;
        }

        document.querySelectorAll('.toggle-item-wrapper').forEach((wrapper, index) => {
            const activeItem = wrapper.querySelector('.toggle-item.active');
            const bar = wrapper.querySelector('.bar');
            setBarPosition(activeItem, bar);
        });


        document.querySelectorAll('.toggle-item-wrapper .toggle-item').forEach((item, index) => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const wrapper = this.closest('.toggle-item-wrapper');
                const bar = wrapper.querySelector('.bar');
                const activeItem = wrapper.querySelector('.toggle-item.active');

                activeItem.classList.remove('active');
                this.classList.add('active');

                setBarPosition(this, bar);
            });
        });


        $('.toggle-item').on('click', function() {
            let value = $(this).attr('data-value');
            $('#database_seed').val(value);
        });

        // on first load, set the value of the active item
        let activeItem = document.querySelector('.toggle-item.active');
        let activeValue = activeItem.getAttribute('data-value');
        $('#database_seed').val(activeValue);


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function resetButton(form) {
            let html = `<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.8077 7.90385C16.4662 7.90385 17 7.37003 17 6.71154V1.94231C17 1.28381 16.4662 0.75 15.8077 0.75H2.69231C2.03381 0.75 1.5 1.28381 1.5 1.94231V6.71154C1.5 7.37003 2.03381 7.90385 2.69231 7.90385M15.8077 7.90385H2.69231M15.8077 7.90385C16.1239 7.90385 16.4272 8.02946 16.6508 8.25307C16.8744 8.47667 17 8.77993 17 9.09615V13.8654C17 14.1816 16.8744 14.4849 16.6508 14.7085C16.4272 14.9321 16.1239 15.0577 15.8077 15.0577H2.69231C2.37609 15.0577 2.07282 14.9321 1.84922 14.7085C1.62562 14.4849 1.5 14.1816 1.5 13.8654V9.09615C1.5 8.77993 1.62562 8.47667 1.84922 8.25307C2.07282 8.02946 2.37609 7.90385 2.69231 7.90385M9.8457 4.32715H14.0188M9.8457 11.481H14.0188M5.67278 4.32711C5.67278 4.65636 5.40587 4.92326 5.07662 4.92326C4.74738 4.92326 4.48047 4.65636 4.48047 4.32711C4.48047 3.99786 4.74738 3.73096 5.07662 3.73096C5.40587 3.73096 5.67278 3.99786 5.67278 4.32711ZM5.67278 11.4809C5.67278 11.8102 5.40587 12.0771 5.07662 12.0771C4.74738 12.0771 4.48047 11.8102 4.48047 11.4809C4.48047 11.1517 4.74738 10.8848 5.07662 10.8848C5.40587 10.8848 5.67278 11.1517 5.67278 11.4809Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Setup Database`;

            form.find('.setup-database-btn').attr('disabled', false).html(html);
        }

        function ajaxInProgress(show = false){
            let ajaxOverlay = $('#ajax-overlay');

            if (show) {
                ajaxOverlay.addClass('show');
            } else {
                ajaxOverlay.removeClass('show');
            }
        }


        // Setup Database
        $('#database_form').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');
            var btnHTML = form.find('.setup-database-btn').html();
            var processing = "{{ __('installer.processing') }}";
            let loadingHTML = `<i class="fa fa-spinner fa-spin"></i> ${processing}`;

            let redirectMessage = "{{ __('installer.redirecting') }}";


            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                beforeSend: function() {
                    form.find('.setup-database-btn').attr('disabled', true);
                    form.find('.setup-database-btn').html(loadingHTML);
                    $('.database-error').addClass('d-none');
                    $('.reset_database').addClass('d-none');
                    ajaxInProgress(true);
                },
                success: function(response) {
                    console.log(response);
                    if (response.status === true && response.type == 'database_migration_success') {
                        toastr.success(response.message + '<br> ' + redirectMessage);

                        setTimeout(function() {
                            window.location.href = response.redirect_url;
                        }, 2000);
                    }
                    else if (response.status === false && response.type == 'database_migration_failed'){
                        toastr.error(response.message);
                    }
                    else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {

                    if(xhr.responseJSON?.type == 'table_exists'){
                        $('.database-error').removeClass('d-none').text(xhr.responseJSON.message);
                        $('.reset_database').removeClass('d-none');
                        toastr.error(xhr.responseJSON.message);
                    }
                    else if(xhr.responseJSON?.type == 'database_not_found'){
                        $('.database-error').removeClass('d-none').text(xhr.responseJSON.message);
                        toastr.error(xhr.responseJSON.message);
                    }
                    else if(xhr.responseJSON?.type == 'connection_failed'){
                        $('.database-error').removeClass('d-none').text(xhr.responseJSON.message);
                        toastr.error(xhr.responseJSON.message);
                    }

                    else if(xhr && xhr.status) {
                        switch (true) {
                            case xhr.status === 422 && xhr.responseJSON?.errors:
                                Object.values(xhr.responseJSON.errors).forEach(messages => {
                                    toastr.error(messages[0] || "{{ __('notification.failed') }}");
                                });
                                break;

                            case xhr.status === 500:
                                toastr.error(xhr.responseJSON?.message || "{{ __('notification.a_server_error_occurred') }}");
                                break;

                            default:
                                toastr.error(xhr.responseJSON?.message || "{{ __('notification.something_went_wrong') }}");
                                break;
                        }
                    }

                    resetButton(form);
                },
                complete: function() {
                    resetButton(form);
                    ajaxInProgress(false);
                    $('#reset_database').prop('checked', false);

                }
            });

        });
    })
</script>
@endpush
