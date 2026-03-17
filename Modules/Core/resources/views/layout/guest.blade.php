<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset($settings->favicon ?? '') }}" type="image/x-icon">

    <!-- global style sheet for all pages -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/conca.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/auth.css') }}">

    @yield('css')

</head>

<body>

    <div class="conca-guest">
        @yield('content')
    </div>

    <!-- global js scripts for all pages -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.js') }}"></script>

    <!-- app js -->
    <script src="{{ asset('admin/assets/js/conca-sidebar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/conca.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/toastr/toastr.js') }}"></script>

    <script>
        'use strict';
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

        $('.show-loading-btn').on('click', function(e){
            e.preventDefault();
            
            var $this = $(this);
            // add loading in button
            $this.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);

            // submit form
            $this.closest('form').submit();
        })
    </script>

    @yield('js')
    
</body>
</html>