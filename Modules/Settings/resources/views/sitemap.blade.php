@extends('core::layout.app')

@section('title', __('admin.sitemap'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.sitemap')]
    ]
])
@endsection

@section('content')

@can('sitemap-show')


<x-card>
    <div class="alert alert-info d-flex gap-3 flex-sm-nowrap flex-wrap" role="alert">
        <div class="flex-shrink-1">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.5 4.46148V7.92302M16 8.5C16 12.6421 12.6421 16 8.5 16C4.35786 16 1 12.6421 1 8.5C1 4.35786 4.35786 1 8.5 1C12.6421 1 16 4.35786 16 8.5ZM9.07693 11.3846C9.07693 11.7032 8.81864 11.9615 8.50001 11.9615C8.18138 11.9615 7.92309 11.7032 7.92309 11.3846C7.92309 11.0659 8.18138 10.8077 8.50001 10.8077C8.81864 10.8077 9.07693 11.0659 9.07693 11.3846Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
        </div>
        <div class="">
            <h4 class="alert-heading">
                {{ __('admin.information') }}
            </h4>
            <p class="mb-0">
                {{ __('admin.sitemap_description') }}
            </p>
        </div>
    </div>

    @can('sitemap-create')
    <form action="{{ route('admin.sitemap.store') }}" method="POST">
        @csrf
        @method('POST')
        <button type="submit" class="btn btn-primary mb-3">{{ __('admin.generate_sitemap') }}</button>
    </form>
    @endcan
</x-card>

@endcan
@endsection
