@if ($products->isNotEmpty())
<div class="row row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-1">
    @foreach($products as $product)
        <div class="col">
            @include('frontend.products.partials.product-card', ['product' => $product])
        </div>
    @endforeach
</div>

<div class="shop-pagination mt-30">
    <div class="pagination-container">
        {{ $products->links('components.frontend-pagination') }}
    </div>
</div>

@else
    <div class="text-center py-5 w-100">
        <p class="text-muted">{{ __('frontend.no_products_found') }}</p>
    </div>
@endif
