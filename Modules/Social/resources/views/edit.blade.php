@extends('core::layout.app')

@section('title', __('admin.edit_social_link'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.social_links'), 'url' => route('admin.social.index')],
        ['label' => __('admin.edit_social_link')]
    ]
])
@endsection

@section('content')
<form action="{{ route('admin.social.update', ['social' => $social->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <x-card :heading="__('admin.edit_social_link')" :route="route('admin.social.index')" btnType="back">

        <div class="mb-4">
            <x-input-label for="link" :value="__('attribute.link')" />
            <x-text-input id="link" name="link" :value="$social->link ?? ''" />
            <x-input-error field="link" />
        </div>
        <div class="mb-4">
            <x-input-label for="icon" :value="__('attribute.icon_class')" />
            <x-text-input id="icon" name="icon" :value="$social->icon ?? ''" />
            <div class="mt-2 form-text">
                <x-icon-description />
            </div>
            <x-input-error field="icon" />
        </div>
        <div class="mb-4">
            <x-input-switch name="status" :label="__('attribute.status')" :checked="$social->status" />
            <x-input-error field="status" />
        </div>

        <x-slot name="footer">
            <x-admin.button-update />
        </x-slot>

    </x-card>
</form>
@endsection

