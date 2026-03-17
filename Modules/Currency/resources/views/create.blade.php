@extends('core::layout.app')

@section('title', __('admin.add_currency'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.currency'), 'url' => route('admin.currency.index')],
        ['label' => __('admin.add_currency')]
    ]
])
@endsection

@section('content')

@can('currency-create')
<form action="{{ route('admin.currency.store') }}" method="POST">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_currency')" :route="route('admin.currency.index')" btnType="back">

        <div class="row gy-5 mb-5">
            <div class="col-md-6">
                <x-input-label for="title" :value="__('attribute.title')" />
                <x-text-input id="title" name="title" :value="old('title')"/>
                <x-input-error field="title" />
            </div>
            @isset($allCurrencies)
            <div class="col-md-6">
                <x-input-label for="code" :value="__('attribute.code')" />
                <select id="code" name="code" class="form-select conca-select2">
                    @foreach($allCurrencies as $code => $currency)
                    <option value="{{$code}}" @if (old('code') == $code) selected @endif>
                        {{Str::upper($code)}} - {{$currency}}
                    </option>
                    @endforeach
                </select>
                <x-input-error field="code" />
            </div>
            @endisset

            <div class="col-md-4">
                <x-input-label for="symbol" :value="__('attribute.symbol')" />
                <x-text-input id="symbol" name="symbol" :value="old('symbol')"/>
                <x-input-error field="symbol" />
            </div>
            <div class="col-md-4">
                <x-input-label for="exchange_rate" :value="__('attribute.exchange_rate')" />
                <x-text-input id="exchange_rate" name="exchange_rate" :value="old('exchange_rate')"/>
                <x-input-error field="exchange_rate" />
            </div>
            <div class="col-md-4">
                <x-input-label for="symbol_position" :value="__('attribute.symbol_position')" />
                <select id="symbol_position" name="symbol_position" class="form-select">
                    <option value="before_price" {{ old('symbol_position') == 'before_price' ? 'selected' : '' }}>{{ __('attribute.before_price') }}</option>
                    <option value="after_price" {{ old('symbol_position') == 'after_price' ? 'selected' : '' }}>{{ __('attribute.after_price') }}</option>
                    <option value="before_price_space" {{ old('symbol_position') == 'before_price_space' ? 'selected' : '' }}>{{ __('attribute.before_price_space') }}</option>
                    <option value="after_price_space" {{ old('symbol_position') == 'after_price_space' ? 'selected' : '' }}>{{ __('attribute.after_price_space') }}</option>
                </select>
                <x-input-error field="symbol_position" />
            </div>
        </div>


        <div class="row">
            <div class="col-sm-4">
                <div class="mb-4">
                    <x-input-switch name="is_default" :label="__('attribute.set_as_default')" checked="false"/>
                    <x-input-error field="is_default" />
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-4">
                    <x-input-switch name="status" :label="__('attribute.show_homepage')" checked="true" />
                    <x-input-error field="status" />
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <x-admin.button-add />
        </x-slot>

    </x-card>
</form>
@endcan
@endsection
