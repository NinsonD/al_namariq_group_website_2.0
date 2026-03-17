@extends('core::layout.app')

@section('title', __('admin.social_links'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.social_links')]
    ]
])
@endsection

@section('content')

@can('social-show')


<x-card :heading="__('admin.social_links')" :route="route('admin.social.create')">

    @if(isset($socials) && !$socials->isEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.icon') }}
                    </th>
                    <th>
                        {{ __('admin.link') }}
                    </th>
                    <th>
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($socials as $social)
                <tr>
                    <td>{{ ($socials->currentPage() - 1) * $socials->perPage() + $loop->iteration }}</td>
                    <td>
                        <i class="{{$social->icon}}"></i>
                    </td>
                    <td>{{$social->link}}</td>
                    <td>

                        @can('social-edit')
                        <x-table.edit :route="route('admin.social.edit', ['social' => $social->id])" />
                        @endcan

                        @can('social-delete')
                        <x-table.delete :route="route('admin.social.destroy', ['social' => $social->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $socials->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan

@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome-pro.css') }}">
@endpush
