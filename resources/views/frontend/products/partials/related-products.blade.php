@if ($relatedProducts->isNotEmpty())
<!-- product related area start -->
<div class="tp-product-related-ptb pt-100 pb-90">
    <div class="container container-1750">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-product-related-heading mb-40">
                    <h4 class="tp-product-related-title">
                        {{ __('frontend.related_products') }}
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($relatedProducts as $relatedProduct)
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    @include('frontend.products.partials.product-card', ['product' => $relatedProduct])
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- product related area end -->
@endif
