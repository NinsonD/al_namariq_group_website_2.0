@extends('core::layout.app')

@section('title', __('admin.view_message'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.contact_messages'), 'url' => route('admin.contact-message.index')],
        ['label' => __('admin.view_message')]
    ]
])
@endsection

@section('content')
<x-card :heading="__('admin.view_message')" :route="route('admin.contact-message.index')" btnType="back">
    <div class="p-3">
        <div class="d-flex flex-column gap-3">
            <p class="mb-0 fs-4"><strong>{{ __('admin.name')}}:</strong> {{ $message->name }}</p>
            <p class="mb-0 fs-4"><strong>{{ __('admin.email')}}:</strong> <a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
            <p class="mb-0 fs-4"><strong>{{ __('admin.subject')}}:</strong> {{ $message->subject }}</p>
            <p class="mb-0 fs-4"><strong>{{ __('admin.received_at')}}:</strong> {{ $message->created_at->format('M d, Y') }}</p>
            <p class="mb-0 fs-4"><strong>{{ __('admin.message')}}:</strong> <br/> {{ $message->message }}</p>
        </div>
    </div>
</x-card>

@endsection
