<!-- product area end -->
<div class="tp-shop-product-area">
    <div class="container-fluid">
        <div class="row gx-15">
            <div class="col-xl-6">
                <div class="tp-shop-product-banner">
                    <img class="w-100" src="{{ asset($default_content?->image) }}" alt="{{ __('frontend.products') }}">
                </div>
            </div>
            @if ($products->isNotEmpty())
            <div class="col-xl-6">
                <div class="row gx-15">
                    @foreach($products as $product)
                    <div class="col-md-6">
                        @include('frontend.products.partials.product-card', ['product' => $product])
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- product area start -->
