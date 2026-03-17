@extends('core::layout.app')

@section('title', __('admin.email_configuration'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.email_configuration'),]
    ]
])
@endsection

@section('content')

@php
    $tabs = [
        0 => [
            'id' => 'config',
            'label' => __('admin.configuration'),
            'active' => true,
            'aria-selected' => true,
        ],
        1 => [
            'id' => 'mail-template',
            'label' => __('admin.mail_template'),
            'active' => false,
            'aria-selected' => false,
        ],
    ];
@endphp

<div class="row gx-12 gy-6">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body p-6">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach ($tabs as $key => $tab )
                        <button class="nav-link text-start {{ $tab['active'] ? 'active' : '' }}" id="v-pills-{{ $tab['id'] }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $tab['id'] }}" type="button" role="tab" aria-controls="v-pills-{{ $tab['id'] }}" aria-selected="{{ $tab['aria-selected'] }}">{{ $tab['label'] }}</button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body p-6">
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach ($tabs as $key => $tab )
                        <div class="tab-pane fade {{ $tab['active'] ? 'show active' : '' }}" id="v-pills-{{ $tab['id'] }}" role="tabpanel" aria-labelledby="v-pills-{{ $tab['id'] }}-tab" tabindex="0">

                            @if ($tab['id'] == 'mail-template')
                                @include('settings::mail.template', ['templates' => $templates])
                            @else
                                @include('settings::mail.' . $tab['id'])
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    'use strict';

    $(function(){
        $("[name='is_mail_queable']").on('change', function(){
            $(this).closest('form').submit();
        })
    })
</script>

@endpush
