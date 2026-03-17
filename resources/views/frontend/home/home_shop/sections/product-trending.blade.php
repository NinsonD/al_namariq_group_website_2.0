<!-- product related area start -->
<div class="tp-product-related-ptb pt-100">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="tp-shop-category-title-box mb-50 text-center">
                    <span class="tp-shop-section-subtitle mb-10 tp_fade_anim" data-delay=".3">{!! clean(pureText($content?->subtitle)) !!}</span>
                    <h4 class="tp-shop-section-title tp_fade_anim" data-delay=".5">{!! clean(pureText($content?->title)) !!}</h4>
                </div>
            </div>
        </div>
        @if ($products->isNotEmpty())
        <div class="tp-product-related-wrap">
            <div class="row">
                @foreach($products as $product)
                @php
                    $delays = ['.3', '.5', '.7'];
                    $delay = $delays[$loop->index % 3];
                @endphp

                <div class="col-xl-3 col-lg-4 col-sm-6 tp_fade_anim" data-delay="{{ $delay }}">
                    @include('frontend.products.partials.product-card', ['product' => $product])
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
<!-- product related area end -->
