@extends('core::layout.app')

@section('title', __('admin.send_bulk_email'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.send_bulk_email')]
    ]
])
@endsection

@section('content')

<x-card>
    <x-slot name="header_2">
        <div class="d-flex align-items-center">
            <span class="card-title m-0 fs-4 fw-semibold text-black">
                {{ __('admin.send_bulk_email') }}
            </span>
        </div>
    </x-slot>

    @can('user-send_bulk_mail_update')
    <form action="{{ route('admin.user.send-bulk-email.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mb-4">
            <x-input-label for="subject" :value="__('attribute.subject')" />
            <x-text-input id="subject" name="subject" :value="old('subject')" />
            <x-input-error field="subject" /> 
        </div>
        <div class="mb-4">
            <x-input-label for="message" :value="__('attribute.message')" />
            <textarea class="form-control tinymce" id="message" name="message">{{ old('message') }}</textarea>
            <x-input-error field="message" /> 
        </div>
        <div class="mb-4">
            <button type="submit" class="btn btn-primary">
                {{ __('admin.send_mail') }}
            </button>
        </div>
    </form>
    @endcan

</x-card>

@endsection

@push('js')
<script src="{{ asset('admin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
@endpush