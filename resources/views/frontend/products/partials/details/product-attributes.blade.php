<div class="tp-product-details-query">
    @if (!empty($sku))
    <div class="tp-product-details-query-item d-flex align-items-center">
        <span>{{ __('frontend.sku') }}: </span>
        <p>{{ $sku }}</p>
    </div>
    @endif

    @if (!empty($category))
    <div class="tp-product-details-query-item d-flex align-items-center">
        <span>{{ __('frontend.category') }}: </span>
        <p>
            <a href="{{ route('products', ['category' => $category->id]) }}">{{ $category->title }}</a>
        </p>
    </div>
    @endif

    @if (!empty($tags) && is_array($tags) && count($tags) > 0)
    <div class="tp-product-details-query-item d-flex align-items-center">
        <span>{{ __('frontend.tags') }}: </span>
        <p>
            @foreach ($tags as $tag)
                {{ $tag['value'] }}
            @if (!$loop->last)
                ,
            @endif

            @endforeach
        </p>
    </div>
    @endif
</div>
