@extends('core::layout.app')

@section('title', $page->title)

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.home_five_sections')],
    ]
])
@endsection

@section('content')

<div class="pb-12">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @foreach ($page->sections as $key => $section)
        <div class="col">
            <div class="card mb-5 shadow rounded-md ">
                <div class="card-header bg-white py-4 d-flex align-items-center flex-wrap gap-8">
                    <div class="d-flex align-items-center">
                        <h6 class="demo-card-title m-0 d-flex align-items-center gap-1 text-capitalize">
                            {{ $section->title }}
                        </h6>
                    </div>
                    <div class="ms-auto d-flex gap-2">
                        <a href="{{ route('admin.home_five.section', ['slug' => $section->slug, 'code' => getDefaultLocale()]) }}" class="btn btn-sm btn-icon btn-label-primary gap-2 d-inline-flex align-items-center">
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.9516 2.31982C10.4732 1.75466 10.734 1.47208 11.0112 1.30725C11.6799 0.909531 12.5034 0.897164 13.1833 1.27463C13.465 1.43106 13.7339 1.70568 14.2715 2.25493C14.8092 2.80418 15.078 3.07881 15.2312 3.36665C15.6007 4.06118 15.5886 4.90235 15.1992 5.58549C15.0379 5.86861 14.7613 6.13504 14.208 6.66791L7.62544 13.008C6.57701 14.0178 6.0528 14.5227 5.39764 14.7786C4.74248 15.0345 4.02224 15.0157 2.58176 14.978L2.38576 14.9729C1.94723 14.9614 1.72797 14.9557 1.60051 14.811C1.47305 14.6664 1.49045 14.443 1.52526 13.9963L1.54415 13.7538C1.64211 12.4965 1.69108 11.8678 1.9366 11.3028C2.18211 10.7377 2.6056 10.2788 3.4526 9.36115L9.9516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></path>
                                <path d="M9.19922 2.39996L14.0992 7.29996" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></path>
                                <path d="M9.89941 15L15.4994 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection


