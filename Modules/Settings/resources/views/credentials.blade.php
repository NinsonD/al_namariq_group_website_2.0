@extends('core::layout.app')

@section('title', __('admin.credentials_settings'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.credentials_settings')]
    ]
])
@endsection

@section('content')

@php
    $tabs = [
        0 => [
            'id' => 'google-recaptcha',
            'label' => __('admin.google_recaptcha'),
            'active' => true,
            'aria-selected' => true,
        ],
        1 => [
            'id' => 'google-tag-manager',
            'label' => __('admin.google_tag_manager'),
            'active' => false,
            'aria-selected' => false,
        ],
        2 => [
            'id' => 'google-analytic',
            'label' => __('admin.google_analytic'),
            'active' => false,
            'aria-selected' => false,
        ],
        3 => [
            'id' => 'tawk-chat',
            'label' => __('admin.tawk_chat'),
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
                            @include('settings::credentials.' . $tab['id'])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
