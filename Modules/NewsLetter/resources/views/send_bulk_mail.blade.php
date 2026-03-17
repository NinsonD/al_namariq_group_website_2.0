@extends('core::layout.app')

@section('title', __('admin.send_bulk_email'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.subscriber_list'), 'url' => route('admin.newsletter.index')],
        ['label' => __('admin.send_bulk_email')]
    ]
])
@endsection

@section('content')

@can('newsletter-send_bulk_mail_show')
<x-card>
    <form action="{{ route('admin.newsletter.send_mail_to_subscribers') }}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-4">
            <x-input-label for="subject" :value="__('admin.subject')" />
            <x-text-input id="subject" name="subject" :value="old('subject')"/>
            <x-input-error field="subject" /> 
        </div>

        <div class="mb-4">
            <x-input-label for="message" :value="__('admin.message')" />
            <textarea  id="message" name="message" rows="7" class="form-control tinymce">{{ old('message') }}</textarea>
            <x-input-error field="message" />
        </div>

        @can('newsletter-send_bulk_mail_send')
        <x-button type="submit" :text="__('admin.send_mail')" />
        @endcan
    </form>
</x-card>
@endcan

@endsection

@push('js')
<script src="{{ asset('admin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
@endpush