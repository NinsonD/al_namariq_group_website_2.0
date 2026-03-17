@extends('core::layout.app')

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.team')]
    ]
])
@endsection

@section('content')

@can('team-show')
<x-card :heading="__('admin.team')" :route="route('admin.team.create')">


    @if(isset($teams) && !$teams->isEmpty())
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
                @foreach ($teams as $team)
                <tr>
                    <td>{{ ($teams->currentPage() - 1) * $teams->perPage() + $loop->iteration }}</td>
                    <td>
                        {{$team->name}}
                    </td>
                    <td>{{$team->designation}}</td>
                    <td>
                        <img class="team-img" src="{{ asset($team->image) }}" alt="{{$team->name}}" class="img-fluid">
                    </td>
                    <td>
                        <x-badge :variant="$team->status ? 'success' : 'danger'" :text="$team->status ? __('admin.active') : __('admin.inactive')" />
                    <td>

                        @can('team-edit')
                        <x-table.edit :route="route('admin.team.edit', ['team' => $team->id])" />
                        @endcan

                        @can('team-delete')
                        <x-table.delete :route="route('admin.team.destroy', ['team' => $team->id])" />
                        @endcan

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $teams->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endcan
@endsection

@push('css')
<style>
    .team-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
    }
</style>
@endpush
