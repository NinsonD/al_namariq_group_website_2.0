@extends('core::layout.app')

@section('title', __('admin.category_list'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.category_list')]
    ]
])
@endsection

@section('content')
@can('blog_category-show')
<x-card :heading="__('admin.category_list')" :route="route('admin.blog-category.create')">


    @if(isset($categories) && !$categories->isEmpty())
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
                    @can('blog_category-status')
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
                @foreach ($categories as $category)
                <tr>
                    <td>{{ ($categories->currentpage() - 1) * $categories->perpage() + $loop->iteration }}</td>
                    <td>{{$category->getTranslation(getDefaultLocale())->title}}</td>
                    <td>{{$category->slug}}</td>

                    @can('blog_category-status')
                    <td>
                        <x-status :route="route('admin.blog-category.status', ['id' => $category->id])" :status="$category->status" :id="$category->id" />
                    </td>
                    @endcan

                    <td>
                        @can('blog_category-edit')
                        <x-table.edit :route="route('admin.blog-category.edit', ['blog_category' => $category->id, 'code' => getDefaultLocale()])" />
                        @endcan

                        @can('blog_category-delete')
                        <x-table.delete :route="route('admin.blog-category.destroy', ['blog_category' => $category->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $categories->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan
@endsection
