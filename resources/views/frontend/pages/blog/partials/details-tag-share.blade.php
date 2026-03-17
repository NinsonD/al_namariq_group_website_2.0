@php
$tags = is_array($tags) && count($tags) > 0 ? collect($tags)->pluck('value')->toArray() : [];
@endphp

<div class="postbox-details-tag-wrap d-flex justify-content-between align-items-center">

    @if (count($tags) > 0)
    <div class="postbox-details-tag d-flex align-items-center mb-0">
        <span>{{ __('frontend.tagged_with') }}</span>
        <div class="tagcloud">
            @foreach ($tags as $tag)
            <a href="{{ route('blog.index', ['tag' => $tag]) }}">{{ $tag }}</a>
            @endforeach
        </div>
    </div>
    @endif

</div>
