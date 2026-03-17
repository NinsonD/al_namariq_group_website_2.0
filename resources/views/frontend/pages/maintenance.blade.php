@extends('frontend.layouts.master')

@section('meta_title', $settings->maintenance_title)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="maintenance-content text-center d-flex flex-column justify-content-center align-items-center">
                <div class="maintenance-logo mb-4">
                    <img src="{{ asset($settings->maintenance_image) }}" alt="{{ $settings?->app_name }}" class="img-fluid">
                </div>
                <h2 class="mb-0">{{ $settings->maintenance_title }}</h2>
                <p>{!! clean($settings->maintenance_description) !!}</p>
                <div class="maintenance-btn mt-1">
                    <a href="{{ url('/') }}" class="tp-btn-black-square">{{ __('frontend.go_to_home') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    .maintenance-content{
        padding-top: 100px;
        padding-bottom: 100px;
        min-height: 100vh;
    }
</style>

@endpush
