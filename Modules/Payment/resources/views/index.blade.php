@extends('core::layout.app')

@section('title', __('admin.payment_gateways'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.payment_gateways'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.payment_gateways')]
    ]
])
@endsection

@section('content')
@can('payment_method-show')


<div class="row gx-12 gy-6">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body p-6">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach ($paymentMethods as $key => $tab )
                        @php
                            $active = $loop->first ? 'active' : '';
                        @endphp
                        <button class="nav-link text-start {{ $active }}" id="v-pills-{{ $tab->key }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $tab->key }}" type="button" role="tab" aria-controls="v-pills-{{ $tab->key }}" aria-selected="true">{{ ucfirst(Str::replace('_', ' ', $tab->key)) }}</button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body p-6">
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach ($paymentMethods as $key => $tab )
                        @php
                            $active = $loop->first ? 'show active' : '';
                        @endphp
                        <div class="tab-pane fade {{ $active }}" id="v-pills-{{ $tab->key }}" role="tabpanel" aria-labelledby="v-pills-{{ $tab->key }}-tab" tabindex="0">
                            @include('payment::payments.' . $tab->key, ['payment' => $tab, 'data' => (object) $tab->value])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection
