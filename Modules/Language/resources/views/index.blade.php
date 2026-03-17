@extends('core::layout.app')

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.languages')]
    ]
])
@endsection

@section('content')

<x-card :heading="__('admin.languages')" :route="route('admin.languages.create')">

    @if(isset($languages) && !$languages->isEmpty())
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
                        {{ __('admin.code') }}
                    </th>
                    <th>
                        {{ __('admin.direction') }}
                    </th>
                    <th>
                        {{ __('admin.default') }}
                    </th>
                    <th>
                        {{ __('admin.translations') }}
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
                @foreach ($languages as $language)
                <tr>
                    <td>{{ ($languages->currentPage() - 1) * $languages->perPage() + $loop->iteration }}</td>
                    <td>{{ $language->name }}</td>
                    <td>{{ $language->code }}</td>
                    <td>{{ $language->direction == 'ltr' ? __('admin.ltr') : __('admin.rtl') }}</td>
                    <td>
                        <x-admin.toggle-switch
                            :route="route('admin.languages.updateStatus', ['language' => $language])"
                            :status="$language->is_default"
                            id="language-{{ $language->id }}"
                            column="default"
                        />
                    </td>
                    <td>
                        <a href="{{ route('admin.languages.translations.index', ['code' => $language->code]) }}" class="btn btn-icon btn-primary">
                            <x-icons.translate />
                        </a>
                    </td>
                    <td>
                        <x-admin.toggle-switch
                            :route="route('admin.languages.updateStatus', ['language' => $language])"
                            :status="$language->status"
                            id="language-{{ $language->id }}"
                            column="status"
                        />
                    </td>
                    <td>

                        <x-table.edit :route="route('admin.languages.edit', ['language' => $language])" />

                        @if(!$language->is_default && $language->code !== 'en')
                            <x-table.delete :route="route('admin.languages.destroy', ['language' => $language])" />
                        @endif


                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $languages->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>

@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-toggle.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('admin/js/bootstrap-toggle.jquery.min.js') }}"></script>
<script>
    'use strict';

    const languageRoute = "{{ route('admin.languages.index') }}";

     $(document).on("change", ".toggle-status", function(e) {
        e.preventDefault();
        var url = $(this).prop("href");
        var type = $(this).data("column");
        $.ajax({
            type: "put",
            data: {
                _token: '{{ csrf_token() }}',
                column: type
            },
            url: url,
            success: function(response) {
                if (response.status) {
                    toastr.success(response.message);

                    window.location.href = languageRoute;

                } else {
                    toastr.warning(response.message);
                    if (!response.status) {
                        window.location.href = languageRoute;
                    }
                }
            },
            error: function(err) {
                if (err.responseJSON && err.responseJSON.message) {
                    toastr.error(err.responseJSON.message);
                } else {
                    toastr.error("{{ __('notification.something_went_wrong') }}");
                }
            }
        })
    });
</script>
@endpush
