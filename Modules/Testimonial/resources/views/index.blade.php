@extends('core::layout.app')

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.testimonials')]
    ]
])
@endsection

@section('content')

@can('testimonial-show')


<x-card :heading="__('admin.testimonials')" :route="route('admin.testimonial.create')">

    @if(isset($testimonials) && !$testimonials->isEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.name') }}
                    </th>
                    <th>
                        {{ __('admin.designation') }}
                    </th>
                    <th>
                        {{ __('admin.image') }}
                    </th>
                    <th>
                        {{ __('admin.status') }}
                    </th>
                    <th width="13%">
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonials as $testimonial)
                <tr>
                    <td>{{ ($testimonials->currentPage() - 1) * $testimonials->perPage() + $loop->iteration }}</td>
                    <td>
                        {{$testimonial->getTranslation(getDefaultLocale())->name}}
                    </td>
                    <td>{{$testimonial->getTranslation(getDefaultLocale())->designation}}</td>
                    <td>
                        <img class="testimonial-img" src="{{ asset($testimonial->image) }}" alt="{{$testimonial->name}}" class="img-fluid">
                    </td>
                    <td>
                        <x-badge :variant="$testimonial->status ? 'success' : 'danger'" :text="$testimonial->status ? __('admin.active') : __('admin.inactive')" />
                    <td>

                        @can('testimonial-edit')
                        <x-table.edit :route="route('admin.testimonial.edit', ['testimonial' => $testimonial->id, 'code' => getDefaultLocale()])" />
                        @endcan

                        @can('testimonial-delete')
                        <x-table.delete :route="route('admin.testimonial.destroy', ['testimonial' => $testimonial->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $testimonials->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan
@endsection

@push('css')
<style>
    .testimonial-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
    }
</style>
@endpush
