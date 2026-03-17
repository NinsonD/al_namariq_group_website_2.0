<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/img/favicon.png') }}">

    <!-- global style sheet for all pages -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/installer/installer.css') }}">

    @stack('css')

</head>

<body>

    <div id="ajax-overlay" class="ajax-loading">
        <div class="ajax-loading-inner d-flex flex-column justify-content-center align-items-center">
            <div class="ajax-loading-icon">
                <span class="ajax-loader"></span>
            </div>
            <div class="ajax-loading-text">
                {{ __('installer.please_wait') }}
            </div>
        </div>
    </div>

    <div class="installer-layout-wrapper">
        @yield('content')
    </div>

    <!-- global js scripts for all pages -->
    <script src="{{ asset('admin/assets/js/bootstrap.js') }}"></script>

    <!-- app js -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/toastr/toastr.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    <script>
        'use strict';

         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Toastr
        @if (Session::has('messege'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
            }
        @endif

        @if($errors->any())
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000",
            };

            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        // get the data-bg-image attribute value with attribute select and set background image for all

        let bgImages = document.querySelectorAll('[data-bg-image]');
        bgImages.forEach((bgImage) => {
            let image = bgImage.getAttribute('data-bg-image');
            bgImage.style.backgroundImage = `url(${image})`;
        });


    </script>

    @stack('js')

</body>
</html>
