@extends('core::layout.app')

@section('title', __('admin.posts_list'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.posts_list')]
    ]
])
@endsection

@section('content')

@can('blog-show')


<x-card>

    @php
        $status = request()->get('status') ?? null;
        $order_by = request()->get('order_by') ?? null;
        $per_page = request()->get('per_page') ?? null;
        $search = request()->get('search') ?? null;
        $pageItems = [10, 15, 25, 50, 100, 'all'];
    @endphp

    <div class="p-5">
        <form action="{{ route('admin.blog.index')}}" method="GET" id="filterForm">

            <div class="row gy-4">
                <div class="col-xxl-3 col-xl-12">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="{{ __('admin.search') }}" aria-label="{{ __('admin.search') }}" aria-describedby="search-btn" value="{{ $search }}">
                        <button class="btn btn-primary" type="button" id="search-btn">
                            <x-icons.search />
                        </button>
                    </div>
                </div>
                <div class="col-xxl-2 col-lg-6 col-md-6">
                    <select class="form-select" name="status" id="status">
                        <option value="" >
                            {{ __('admin.select_status') }}
                        </option>
                        <option value="active" {{ $status == 'active' ? 'selected' : '' }}>
                            {{ __('admin.active') }}
                        </option>
                        <option value="inactive" {{ $status == 'inactive' ? 'selected' : '' }}>
                            {{ __('admin.inactive') }}
                        </option>
                    </select>
                </div>
                <div class="col-xxl-2 col-lg-6 col-md-6">
                    <select class="form-select" name="order_by" id="order_by">
                        <option value="">
                            {{ __('admin.select_order_by') }}
                        </option>
                        <option value="asc" {{ $order_by == 'asc' ? 'selected' : '' }}>
                            {{ __('admin.latest') }}
                        </option>
                        <option value="desc" {{ $order_by == 'desc' ? 'selected' : '' }}>
                            {{ __('admin.oldest') }}
                        </option>
                    </select>
                </div>
                <div class="col-xxl-2 col-lg-6 col-md-6">
                    <select class="form-select" name="per_page" id="per_page">
                        <option value="">
                            {{ __('admin.select_per_page') }}
                        </option>
                        @foreach ($pageItems as $item)
                            <option value="{{ $item }}" {{ $per_page == $item ? 'selected' : '' }}>{{ ucfirst($item) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

</x-card>


<x-card :heading="__('admin.posts_list')" :route="route('admin.blog.create')">

    @if(isset($posts) && !$posts->isEmpty())
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
                        {{ __('admin.category') }}
                    </th>
                    <th>
                        {{ __('admin.show_homepage') }}
                    </th>
                    <th>
                        {{ __('admin.popular') }}
                    </th>
                    @can('blog-status')
                    <th>
                        {{ __('admin.status') }}
                    </th>
                    @endcan

                    <th width="13%">
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ ($posts->currentpage() - 1) * $posts->perpage() + $loop->iteration }}</td>
                    <td>{{$post->getTranslation(getDefaultLocale())->title}}</td>
                    <td>{{$post?->category?->getTranslation(getDefaultLocale())->title}}</td>
                    <td>
                        <x-badge :text="$post->show_homepage == 1 ? __('admin.yes') : __('admin.no')" :variant="$post->show_homepage == 1 ? 'success' : 'danger' " />
                    </td>
                    <td>
                        <x-badge :text="$post->popular == 1 ? __('admin.yes') : __('admin.no')" :variant="$post->popular == 1 ? 'success' : 'danger' " />
                    </td>

                    @can('blog-status')
                    <td>
                        <x-status :route="route('admin.blog.status', ['id' => $post->id])" :status="$post->status" :id="$post->id" />
                    </td>
                    @endcan

                    <td>

                        <x-table.view :route="route('blog.details', ['slug' => $post->slug])" />


                        @can('blog-edit')
                        <x-table.edit :route="route('admin.blog.edit', ['blog' => $post->id, 'code' => getDefaultLocale()])" />
                        @endcan

                        @can('blog-delete')
                        <x-table.delete :route="route('admin.blog.destroy', ['blog' => $post->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $posts->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan
@endsection
