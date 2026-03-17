@extends('core::layout.app')

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.languages'), 'url' => route('admin.languages.index')],
        ['label' => __('admin.update_language')]
    ]
])
@endsection

@section('content')
<form action="{{ route('admin.languages.update', ['language' => $language->id]) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')


    <x-card :heading="__('admin.update_language')" :route="route('admin.languages.index')" btnType="back">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <x-input-label for="name" :value="__('attribute.name')" />
                    <x-text-input id="name" name="name" value="{{ old('name', $language->name) }}" />
                    <x-input-error field="name" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4">
                    <x-input-label for="code" :value="__('attribute.code')" />
                    <select name="code" id="code" class="form-select conca-select2"  required>
                        @foreach($languages as $lang)
                            <option value="{{ $lang->code }}" @if ($language->code == $lang->code) selected @endif >{{ $lang->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error field="code" />
                </div>
            </div>
        </div>


        <x-slot name="footer">
            <x-admin.button-update />
        </x-slot>
    </x-card>


</form>
@endsection
