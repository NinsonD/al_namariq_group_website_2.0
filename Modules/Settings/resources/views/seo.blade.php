@extends('core::layout.app')

@section('title', __('admin.seo_setup'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.seo_setup')]
    ]
])
@endsection

@section('content')

@can('seo_settings-show')


<x-card>
    <div class="row gy-8">
        <div class="col-12 col-sm-12 col-md-3">
            <div class="nav flex-column nav-pills me-3 gap-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @foreach ($seos as $key => $seo)
                    <button class="nav-link text-start border rounded {{ $key == 0 ? 'active' : '' }}" id="v-pills-{{ $key }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $key }}" type="button" role="tab" aria-controls="v-pills-{{ $key }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ ucwords($seo->page_name) }}</button>
                @endforeach
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-9">
            <div class="rounded">
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach ($seos as $key => $seo)
                        <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="v-pills-{{ $key }}" role="tabpanel" aria-labelledby="v-pills-{{ $key }}-tab">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin.seo-settings.update', $seo->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-4">
                                            <x-input-label for="seo_title" :value="__('attribute.seo_title')" />
                                            <x-text-input id="seo_title" name="seo_title" :value="$seo->seo_title ?? ''" />
                                            <x-input-error field="seo_title" />
                                        </div>
                                        <div class="mb-4">
                                            <x-input-label for="seo_description" :value="__('attribute.seo_title')" />
                                            <x-textarea name="seo_description" id="seo_description" rows="6" :value="$seo->seo_description ?? ''" />
                                            <x-input-error field="seo_description" />
                                        </div>
                                        <div class="mb-4">
                                            <x-input-label for="seo_keywords" :value="__('attribute.seo_keywords')" />
                                            <x-textarea name="seo_keywords" id="seo_keywords" rows="6" :value="$seo->seo_keywords ?? ''" />
                                            <x-input-error field="seo_keywords" />
                                        </div>

                                        @can('seo_settings-update')
                                        <div class="pt-3">
                                            <x-button :text="__('admin.save')" />
                                        </div>
                                        @endcan
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-card>
@endcan
@endsection
