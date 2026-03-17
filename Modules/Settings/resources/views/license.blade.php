@extends('core::layout.app')

@section('title', __('admin.license'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.license')]
    ]
])
@endsection

@section('content')
<x-card :heading="__('admin.license_details')">

    <div class="p-5">
        @if (is_array($data) && count($data) > 0)
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">{{ __('admin.license_to') }}</th>
                    <td>{{ $data['buyer'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ __('admin.license_type') }}</th>
                    <td>{{ $data['license'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ __('admin.support_until') }}</th>
                    @if (isset($data['expired']) && $data['expired'] == 'Unlimited')
                        <td>{{ __('admin.unlimited') }}</td>
                    @else
                        <td>{{ pureDate($data['expired']) ?? 'N/A' }}</td>
                    @endif
                </tr>
            </tbody>
        </table>
        @endif

        <div class="mt-6">
            <form action="{{ route('admin.deactivate-license') }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-primary">{{ __('admin.deactivate_license') }}</button>
            </form>
        </div>
    </div>

</x-card>
@endsection
