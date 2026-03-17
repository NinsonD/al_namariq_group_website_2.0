<!-- CSS here -->
@if (session('dir') == 'rtl')
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-rtl.css')}}">
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/rtl.css')}}">
@else
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css')}}">
@endif
<link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome-pro.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/spacing.css')}}">
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/toastr/toastr.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/cookie-consent.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css')}}">
@if (session('dir') == 'rtl')
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/rtl.css')}}">
@endif
<style>
    :root{
       --tp-theme-primary: {{ $settings?->primary_color }};
       --tp-common-red-3: {{ $settings?->secondary_color }};
       --tp-theme-shop: {{ $settings?->shop_theme_color }};
       --tp-theme-green: {{ $settings?->third_color }};
       --tp-common-green-regular: {{ $settings?->third_color }};
    }
 </style>
