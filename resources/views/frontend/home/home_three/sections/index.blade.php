@extends('core::layout.app')

@section('title', $page->title)

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_three_sections')],
    ]
])
@endsection

@section('content')

<div class="pb-12">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @foreach ($page->sections as $key => $section)
        <div class="col">
            <x-card :heading="$section->title">
                {{ $section->title }}
                <a href="{{ route('admin.home_three.section', ['slug' => $section->slug, 'code' => getDefaultLocale()]) }}" class="btn btn-sm btn-primary">Edit</a>
            </x-card>
        </div>
        @endforeach
    </div>
</div>
@endsection


