<!DOCTYPE html>
<html lang="{{ getSiteLocale() ?? 'en' }}" dir="{{ session('dir') ?? 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', __('admin.dashboard'))</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset($settings->favicon) }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom Meta -->
    @yield('custom_meta')

    @include('core::layout.partials.styles')
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    @stack('css')

</head>

<body>
    <div class="app-main">

        <!-- app wrapper start -->
        <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch min-vh-100" data-sidebar-collapsed="false">

            @include('core::layout.sidebar')

            @include('core::layout.partials.header')

            <!-- app content start -->
            <div class="app-content-wrapper pt-13 pb-13 px-2 px-lg-6">

                <div class="container-fluid">

                    @yield('breadcrumb')

                    <div class="page-content">
                        @yield('content')
                    </div><!-- page content end -->

                </div>
            </div><!-- app content end -->

            <div class="app-backdrop"></div>
            <!-- app content end -->
        </div>
        <!-- app wrapper end -->
    </div>

    @include('core::layout.partials.scripts')
    @stack('js')

</body>

</html>
