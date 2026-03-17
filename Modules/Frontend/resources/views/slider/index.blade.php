@extends('core::layout.app')

@section('title', __('admin.sliders'))


@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.sliders')]
    ]
])
@endsection

@section('content')

    @can('slider-show')
    <x-card :heading="__('admin.sliders')" :route="route('admin.slider.create')">

        @if(isset($sliders) && !$sliders->isEmpty())
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>
                            {{ __('admin.sn') }}
                        </th>
                        <th>
                            {{ __('admin.image') }}
                        </th>
                        <th>
                            {{ __('admin.title') }}
                        </th>
                        <th>
                            {{ __('admin.status') }}
                        </th>
                        <th>
                            {{ __('admin.action') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                    <tr>
                        <td>{{ ($sliders->currentPage() - 1) * $sliders->perPage() + $loop->iteration }}</td>
                        <td>
                            <img class="circle-img" src="{{ asset($slider->image) }}" alt="{{ $slider->getTranslation(getDefaultLocale())->title }}">
                        </td>
                        <td>
                            {{ $slider->getTranslation(getDefaultLocale())->title }}
                        </td>
                        <td>
                            <x-badge :variant="$slider->status ? 'success' : 'danger'" :text="$slider->status ? __('admin.active') : __('admin.inactive')" />
                        </td>
                        <td>

                            @can('slider-edit')
                            <x-table.edit :route="route('admin.slider.edit', ['slider' => $slider->id, 'code' => getDefaultLocale()])" />
                            @endcan

                            @can('slider-delete')
                            <x-table.delete :route="route('admin.slider.destroy', ['slider' => $slider->id])" />
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end">
            {{ $sliders->links('components.pagination') }}
        </div>
        @else
            <x-data-not-found />
        @endif

    </x-card>
    @endcan
@endsection
