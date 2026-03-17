@extends('core::layout.app')

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.languages'), 'url' => route('admin.languages.index')],
        ['label' => request('code') ?? 'en', 'url' => route('admin.languages.translations.index', ['code' => request('code') ?? 'en'])],
        ['label' => __('admin.translations')]
    ]
])
@endsection



@section('content')

@can('translation-show')
    
<x-card :heading="__('admin.translations')">

    @if(isset($files) && !$files->isEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.type') }}
                    </th>

                    @can('translation-edit')
                    <th width="13%">
                        {{ __('admin.action') }}
                    </th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                

                @foreach($files as $key => $file)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ucwords($file) }}</td>
                        <td>
                            @can('translation-show')
                            <x-table.edit :route="route('admin.languages.translations.show', ['file' => $file, 'lang' => $code])" />
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $files->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan
@endsection