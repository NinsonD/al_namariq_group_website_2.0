<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ $settings?->favicon ?? '' }}" type="image/x-icon">

    <!-- global style sheet for all pages -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/conca.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">

</head>

<body>

    @php
        $code = $exception->getStatusCode();
    @endphp
    <div class="min-vh-100 row justify-content-center my-auto g-0" data-bg-color="#E9E7FF">
        <div class="col-xl-9 col-md-10 col-11 my-auto">
            <div class="px-5 py-14 error-img text-center rounded">
                <h1 class="display-2 fw-bold mb-10">@yield('title')</h1>
                <div class="mb-14 error-page-content">
                    @switch($code)
                        @case('401')
                            <x-error.401 />
                            @break
                        @case('402')
                            <x-error.402 />
                            @break
                        @case('403')
                            <x-error.403 />
                            @break
                        @case('404')
                            <x-error.404 />
                            @break
                        @case('419')
                            <x-error.419 />
                            @break
                        @case('429')
                            <x-error.429 />
                            @break
                        @case('404')
                            <x-error.404 />
                            @break
                        @case('500')
                            <x-error.500 />
                            @break
                        @case('503')
                            <x-error.503 />
                            @break
                        @default
                            <x-error.404 />
                    @endswitch

                </div>
                <h2 class="display-7 fw-semibold text-uppercase">
                    {{ __('error.something_went_wrong') }}
                </h2>
                <p class="lead mb-7">
                    @yield('message')
                </p>
                <a href="{{route('home')}}" class="btn btn-primary">
                    {{__('error.back_to_home')}}
                </a>
            </div>
        </div>
    </div>

    <!-- global js scripts for all pages -->
    <script src="{{asset('admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.js')}}"></script>

    <script src="{{asset('admin/assets/js/conca.js')}}"></script>
</body>

</html>
