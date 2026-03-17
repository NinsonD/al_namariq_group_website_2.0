@extends('core::layout.app')

@section('title', __('admin.site_themes'))

@section('breadcrumb')
    @include('core::layout.partials.breadcrumb', [
        'title' => __('admin.settings'),
        'breadcrumbs' => [
            ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
            ['label' => __('admin.site_themes')]
        ]
    ])
@endsection
@use(App\Enums\ThemeList)
@section('content')

<x-card :heading="__('admin.site_themes')">
    <div class="row gy-6">

        <div class="col-xl-12">
            @can('appearance-show_all_homepage_update')
                <form action="{{ route('admin.appearance.update-theme-show-all-homepage') }}" method="POST" class="pb-4 mb-4 border-bottom">
                    @csrf
                    @method('PUT')
                    <x-input-switch class="show-all-homepages" name="show_all_homepage" :label="__('admin.show_all_homepage')" :checked="cache()->get('setting')->show_all_homepage"/>
                </form>
                @endcan
        </div>

        @foreach ($themes as $theme)
        @php
            $is_active = SITE_DEFAULT_HOME == $theme?->slug;
        @endphp
        <div class="col-lg-4">
            <div class="theme-card position-relative">
                <div class="theme-thumb">
                    <img class="mw-100" src="{{ asset($theme?->preview) }}">
                </div>

                <div class="theme-content @if ($theme?->slug == SITE_DEFAULT_HOME) justify-content-center @else  justify-content-between @endif">
                    <h5 class="theme-card-title text-black lh-1 m-0 text-center d-flex align-items-center justify-content-center gap-2">
                        {{ $theme?->title }}

                        @if ($is_active)
                        <span class="badge badge-success">
                            {{ __('admin.active') }}
                        </span>
                        @endif
                    </h5>
                    @unless ($is_active)
                    <form action="{{ route('admin.appearance.update-theme') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" class="d-none" id="{{ $theme?->slug }}" name="theme" value="{{ $theme?->slug }}" required />

                        @can('appearance-theme-update')
                            <button type="submit" class="btn btn-sm btn-primary appearance-theme-active-btn activate-default-theme position-absolute">
                                {{ __('admin.activate') }}
                            </button>
                        @endcan
                    </form>
                @endunless
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-card>

@endsection

@push('js')
    <script>
        'use strict';
        $(function(){
            $('.show-all-homepages').on('change', function(e){
                e.preventDefault();
                // disable click again
                $(this).prop('disabled', true);
                $(this).closest('form').submit();
            })
        })
    </script>
@endpush
