@extends('core::layout.app')

@section('title', __('admin.page_builder'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.page_builder')]
    ]
])
@endsection

@section('content')

@can('page-show')


<x-card :heading="__('admin.page_builder')" :route="route('admin.page.create')">

    @if(isset($pages) && $pages->isNotEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.title') }}
                    </th>
                    <th>
                        {{ __('admin.slug') }}
                    </th>
                     @can('page-status')
                    <th>
                        {{ __('admin.status') }}
                    </th>
                    @endcan
                    <th>
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                <tr>
                    <td>{{ ($pages->currentPage() - 1) * $pages->perPage() + $loop->iteration }}</td>
                    <td>
                        @if (in_array($page->slug, ['privacy-policy', 'terms-of-service', 'terms-and-conditions']))
                            <a class="text-hover-underline" href="{{ route($page->slug) }}" target="_blank">
                                {{$page->getTranslation(getDefaultLocale())->title}}
                            </a>

                        @else
                            <a class="text-hover-underline" href="{{ route('custom.page', ['slug' => $page->slug]) }}" target="_blank">
                                {{$page->getTranslation(getDefaultLocale())->title}}
                            </a>
                        @endif

                    </td>
                    <td>
                        @if (in_array($page->slug, ['privacy-policy', 'terms-of-service', 'terms-and-conditions']))
                            <code>{{ $page->slug }}</code>
                        @else
                            <code>/{{ __('admin.page_slug') }}/{{ $page->slug}}</code>
                        @endif
                    </td>

                    @can('page-status')
                    <td>
                        <x-status :route="route('admin.page.update-status', ['id' => $page->id])" :status="$page->status" :id="$page->id" />
                    </td>
                    @endcan

                    <td>
                        @php
                            $route = in_array($page->slug, ['privacy-policy', 'terms-of-service', 'terms-and-conditions']) ? route($page->slug) : url('/' . 'page/' . $page->slug);
                        @endphp
                        <x-table.view :route="$route" target="_blank" />

                        @can('page-edit')
                            <x-table.edit :route="route('admin.page.edit', ['page' => $page->id, 'code' => getDefaultLocale()])"/>
                        @endcan

                        @unless ($page->slug == 'privacy-policy' || $page->slug == 'terms-of-service' || $page->slug == 'terms-and-conditions')
                            @can('page-delete')
                            <x-table.delete :route="route('admin.page.destroy', ['page' => $page->id])" />
                            @endcan
                        @endunless
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $pages->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan
@endsection

