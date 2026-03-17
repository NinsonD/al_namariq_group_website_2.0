@extends('core::layout.app')

@section('title', __('admin.edit_faq'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' =>  __('admin.faqs'), 'url' => route('admin.faqs.index')],
        ['label' => __('admin.edit_faq')]
    ]
])
@endsection

@section('content')
@php
    $code = request()->get('code', 'en');
@endphp

<x-admin.language-nav route="admin.faqs.edit" :params="['faq' => $faq->id, 'code' => $code]" />

<form action="{{ route('admin.faqs.update', ['faq' => $faq->id, 'code' => $code]) }}" method="POST">
    @csrf
    @method('PUT')
    <x-card :heading="__('admin.edit_faq')" :route="route('admin.faqs.index')" btnType="back">


        <div class="mb-4">
            <x-input-label for="question" :value="__('attribute.question')" />
            <x-text-input id="question" name="question" :value="old('question', $faq->getTranslation($code)->question)"/>
            <x-input-error field="question" />
        </div>
        <div class="mb-4">
            <x-input-label for="answer" :value="__('attribute.answer')"  />
            <textarea id="answer" name="answer" rows="7" class="form-control">{{ old('answer', $faq->getTranslation($code)->answer) }}</textarea>
            <x-input-error field="answer" />
        </div>

        <div class="row {{ hideDivLang($code) }}">
            <div class="col-sm-4">
                <div class="mb-4">
                    <x-input-switch name="status" :label="__('attribute.status')" :checked="$faq->status"/>
                    <x-input-error field="status" />
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-4">
                    <x-input-switch name="show_on_homepage" :label="__('attribute.show_homepage')" :checked="$faq->show_on_homepage"/>
                    <x-input-error field="show_on_homepage" />
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <x-admin.button-update />
        </x-slot>

    </x-card>
</form>
@endsection
