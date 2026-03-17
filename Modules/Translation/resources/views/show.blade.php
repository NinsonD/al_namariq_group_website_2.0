@extends('core::layout.app')

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [

        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.languages'), 'url' => route('admin.languages.index')],
        ['label' => $lang, 'url' => route('admin.languages.translations.index', ['code' => $lang])],
        ['label' => $file, 'url' => route('admin.languages.translations.show',['lang' => $lang, 'file' => $file])],
        ['label' => __('admin.translations')]
    ]
])
@endsection

@section('content')

<x-card :heading="__('admin.search_translations')">
    <form method="GET" action="{{ route('admin.languages.translations.show', ['lang' => $lang, 'file' => $file]) }}" class="d-flex w-100">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control me-2" placeholder="{{ __('admin.search_translations') }}">
        <button type="submit" class="btn btn-icon btn-primary">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 15.9999L11.6731 11.673M13.5077 7.25385C13.5077 10.7078 10.7078 13.5077 7.25385 13.5077C3.79994 13.5077 1 10.7078 1 7.25385C1 3.79994 3.79994 1 7.25385 1C10.7078 1 13.5077 3.79994 13.5077 7.25385Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </form>

</x-card>


<x-card :heading="__('admin.edit_translations')" :route="route('admin.languages.translations.index', ['code' => $lang])" btnType="back">

    @if($translations->count() > 0)
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.key') }}
                    </th>
                    <th>
                        {{ __('admin.text') }}
                    </th>

                    @can('translation-edit')
                    <th width="13%">
                        {{ __('admin.action') }}
                    </th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach($translations as $key => $value)
                <tr class="translation-{{$key}}">
                    <td>{{ $key }}</td>
                    <td>
                        <span class="value-display" data-key="{{ $key }}">{{ $value }}</span>
                        <input type="text" class="form-control value-edit d-none" data-key="{{ $key }}" value="{{ $value }}">
                    </td>
                    <td>

                        @can('translation-edit')
                        <button class="edit-btn btn btn-sm btn-icon rounded-pill btn-primary" data-key="{{ $key }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{ __('admin.edit') }}">
                            <x-icons.edit />
                        </button>
                        <button class="save-btn btn btn-sm btn-icon rounded-pill btn-success d-none" data-key="{{ $key }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{ __('admin.save') }}">
                            <x-icons.save />
                        </button>
                        @endcan
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $translations->links('components.pagination') }}
    </div>

    @else
        <x-data-not-found />
    @endif

    </x-card>

@endsection


@push('js')

<script>
    'use strict';

    $(function () {
        // Handle edit button click
        $(document).on('click', '.edit-btn',  function () {
            var key = $(this).data('key');
            var span =  $(this).closest('tr').find('.value-display');
            var input = $(this).closest('tr').find('.value-edit');
            var saveBtn = $(this).closest('tr').find('.save-btn');

            // Show the input field and hide the span
            span.hide();
            input.removeClass('d-none').focus();
            saveBtn.removeClass('d-none');
            $(this).hide();
        });


       $(document).on('click', '.save-btn',  function () {
            var key = $(this).data('key');
            var newValue = $('input.value-edit[data-key="' + key + '"]').val();
            var lang = "{{ $lang }}";
            var file = "{{ $file }}";


            // check if the value is empty
            if (newValue.trim() === '') {
                 Swal.fire({
                    icon: 'error',
                    title: "{{__('admin.oops')}}",
                    text: "{{__('notification.please_enter_value')}}",
                });
            }else{
                $.ajax({
                url: "{{ route('admin.languages.translations.update', ['lang' => $lang, 'file' => $file]) }}",
                type: 'POST',
                data: {
                    key: key,
                    value: newValue,
                    lang: lang,
                    file: file,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        $('span.value-display[data-key="' + key + '"]').text(newValue).show();
                        $('input.value-edit[data-key="' + key + '"]').hide();
                        $('.save-btn[data-key="' + key + '"]').hide();
                        $('.edit-btn[data-key="' + key + '"]').show();


                        Swal.fire({
                            icon: 'success',
                            title: "{{ __('notification.translation_updated') }}",
                            text: "{{__('notification.translation')}}"
                        });

                        window.location.reload(true);

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: "{{__('notification.error')}}",
                            text: "{{__('notification.failed')}}"
                        });
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: "{{__('notification.error')}}",
                        text: "{{__('notification.failed')}}"
                    });

                    window.location.reload(true);
                }
            });
            }
        });

    });

</script>

@endpush
