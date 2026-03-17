@extends('core::layout.app')

@section('title', __('admin.contact_page'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.contact_page')],
    ]
])
@endsection

@section('content')

@foreach ($contacts as $contact)
   @include('frontend::pages.partials.contact-item', ['contact' => $contact])
@endforeach

@endsection


