@php
    $content_1 = $content?->slider_content_1 ? explode(',', $content?->slider_content_1) : [];
    $content_2 = $content?->slider_content_2 ? explode(',', $content?->slider_content_2) : [];
@endphp

@if (count($content_1) > 0 || count($content_2) > 0)
<!-- text moving area start -->
<div class="des-text-moving-area black-bg-4 pt-100 pb-160">
    @if (count($content_1) > 0)
    <div class="des-text-moving-top moving-text">
        <div class="des-text-item wrapper-text d-flex align-items-center">
            @foreach ($content_1 as $item)
            <span>{{ $item }}</span>
            @endforeach
        </div>
    </div>
    @endif

    @if (count($content_2) > 0)
    <div class="des-text-moving-bottom moving-text">
        <div class="des-text-item wrapper-text d-flex align-items-center">
            @foreach ($content_2 as $item)
            <span>{{ $item }}</span>
            @endforeach
        </div>
    </div>
    @endif
</div>
<!-- text moving area end -->
@endif
