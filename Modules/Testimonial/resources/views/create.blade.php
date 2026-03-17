@extends('core::layout.app')

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.testimonials'), 'url' => route('admin.testimonial.index')],
        ['label' => __('admin.add_testimonial')]
    ]
])
@endsection

@section('content')
<form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <x-card :heading="__('admin.add_testimonial')" :route="route('admin.testimonial.index')" btnType="back">


        <div class="mb-4">
            <x-input-label for="name" :value="__('attribute.name')" />
            <x-text-input id="name" name="name" />
            <x-input-error field="name" />
        </div>
        <div class="mb-4">
            <x-input-label for="designation" :value="__('attribute.designation')" />
            <x-text-input id="designation" name="designation" />
            <x-input-error field="designation" />
        </div>
        <div class="mb-4">
            <x-input-label for="comment" :value="__('attribute.comment')" />
            <x-textarea id="comment" rows="7" name="comment" :value="old('comment')" />
            <x-input-error field="comment" />
        </div>
        <div class="mb-4">
            <x-input-label for="rating" :value="__('attribute.rating')" />
            <div class="basic-ratings raty" data-score="3" data-number="5"></div>
            <x-input-error field="rating" />
        </div>
        <div class="mb-4">
            <x-image-uploader name="image" :label="__('attribute.image')" />
            <x-input-error field="image" />
        </div>
        <div class="mb-4">
            <x-input-switch name="status" :label="__('attribute.status')" />
            <x-input-error field="status" />
        </div>

        <x-slot name="footer">
            <x-admin.button-add />
        </x-slot>

    </x-card>
</form>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('admin/css/raty.css') }}">
@endpush

@push('js')
<script src="{{ asset('admin/js/raty.js') }}"></script>

<script>
    'use strict';

    $(function(){
        let isRtl = $('html').attr('dir') === 'rtl' ? true : false;
        let halfStarGray = '#fcfcfc';
        let halfStarGradient = `%3Cstop offset='50%25' style='stop-color:%23FFD700' /%3E%3Cstop offset='50%25' style='stop-color:%23fcfcfc' /%3E`;

        const fullStarSVG = `data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23FFD700' d='m8.243 7.34l-6.38.925l-.113.023a1 1 0 0 0-.44 1.684l4.622 4.499l-1.09 6.355l-.013.11a1 1 0 0 0 1.464.944l5.706-3l5.693 3l.1.046a1 1 0 0 0 1.352-1.1l-1.091-6.355l4.624-4.5l.078-.085a1 1 0 0 0-.633-1.62l-6.38-.926l-2.852-5.78a1 1 0 0 0-1.794 0z'/%3E%3C/svg%3E`;

        const halfStarSVG = `data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cdefs%3E%3ClinearGradient id='halfStarGradient'%3E${halfStarGradient}%3C/linearGradient%3E%3C/defs%3E%3Cpath fill='url(%23halfStarGradient)' d='m8.243 7.34l-6.38.925l-.113.023a1 1 0 0 0-.44 1.684l4.622 4.499l-1.09 6.355l-.013.11a1 1 0 0 0 1.464.944l5.706-3l5.693 3l.1.046a1 1 0 0 0 1.352-1.1l-1.091-6.355l4.624-4.5l.078-.085a1 1 0 0 0-.633-1.62l-6.38-.926l-2.852-5.78a1 1 0 0 0-1.794 0z'/%3E%3C/svg%3E`;

        const emptyStarSVG = `data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='rgb(230,230,232)' d='m8.243 7.34l-6.38.925l-.113.023a1 1 0 0 0-.44 1.684l4.622 4.499l-1.09 6.355l-.013.11a1 1 0 0 0 1.464.944l5.706-3l5.693 3l.1.046a1 1 0 0 0 1.352-1.1l-1.091-6.355l4.624-4.5l.078-.085a1 1 0 0 0-.633-1.62l-6.38-.926l-2.852-5.78a1 1 0 0 0-1.794 0z'/%3E%3C/svg%3E`;

        const basicRatings = document.querySelector('.basic-ratings');

        if (basicRatings) {
            let ratings = new Raty(basicRatings, {
                starOn: fullStarSVG,
                starHalf: halfStarSVG,
                starOff: emptyStarSVG
            });
        ratings.init();
    }
    })

</script>

@endpush
