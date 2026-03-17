@extends('core::layout.app')
@section('title', __('admin.email_template'))
@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
       ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.email_configuration'), 'url' => route('admin.mail_configuration')],
        ['label' => __('admin.email_template')],
    ]
])
@endsection

@section('content')

<x-card :heading="__('admin.email_template')" :route="route('admin.mail_configuration')" btnType="back">


    <div class="table-responsive mb-4">
        <table class="table table-striped">
            <thead class="table-dark">
                <th>{{ __('admin.variable') }}</th>
                <th>{{ __('admin.meaning') }}</th>
            </thead>
            <tbody>
                @php
                    $variables = [
                        '{{user_name}}' => __('admin.user_name'),
                        '{{order_id}}' => __('admin.order_id'),
                        '{{payment_status}}' => __('admin.payment_status'),
                        '{{company_name}}' => __('admin.company_name'),
                    ];
                @endphp
                @foreach($variables as $key => $meaning)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $meaning }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-card>

<x-card>
    <form action="{{ route('admin.update.mail_template', ['id' => $template->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-input-label for="subject" :value="__('attribute.subject')" />
            <x-text-input id="subject" name="subject" :value="$template->subject" />
            <x-input-error field="subject" />
        </div>
        <div class="mb-4">
            <x-input-label for="subject" :value="__('attribute.message')" />
            <textarea id="subject" name="message" class="form-control tinymce" rows="10">{!! clean($template->message) !!}</textarea>
            <x-input-error field="subject" />
        </div>

        <div class="">
            <button type="submit" class="btn btn-success gap-1">
                 <x-icons.update /> {{ __('admin.update') }}
            </button>
        </div>
    </form>
</x-card>

@endsection

@push('js')
<script src="{{ asset('admin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
@endpush
