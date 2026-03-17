@extends('core::layout.app')

@section('title', __('admin.add_new_faq'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.faqs'), 'url' => route('admin.faqs.index')],
        ['label' => __('admin.add_new_faq')]
    ]
])
@endsection

@section('content')
<form action="{{ route('admin.faqs.store') }}" method="POST">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_new_faq')" :route="route('admin.faqs.index')" btnType="back">

        <div class="mb-4">
            <x-input-label for="question" :value="__('attribute.question')" />
            <x-text-input id="question" name="question" :value="old('question')"/>
            <x-input-error field="question" />
        </div>
        <div class="mb-4">
            <x-input-label for="answer" :value="__('attribute.answer')" />
            <textarea id="answer" name="answer" rows="7" class="form-control">{{ old('answer') }}</textarea>
            <x-input-error field="answer" />
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="mb-4">
                    <x-input-switch name="status" :label="__('attribute.status')" checked="true"/>
                    <x-input-error field="status" />
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-4">
                    <x-input-switch name="show_on_homepage" :label="__('attribute.show_homepage')" checked="false" />
                    <x-input-error field="show_on_homepage" />
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <x-admin.button-add />
        </x-slot>

    </x-card>
</form>
@endsection
