@php
    $categories = [];
    if($default_content?->categories){
        $categories = is_null($default_content?->categories) ? [] : json_decode($default_content?->categories);
    }
    if($default_content?->big_category){
        $categories[] = $default_content?->big_category;
    }

    $categories = \Modules\Shop\Models\ProductCategory::with('translations')
                        ->withCount(['products' => function ($query) {
                            $query->active();
                        }])
                        ->whereIn('id', $categories)->active()->get();

    if($categories->isEmpty()){
        $categories = collect();
    }

@endphp
<!-- product area end -->
<div class="tp-shop-category-2-area">
    <div class="container-fluid">
        <div class="row gx-15">
            <!-- get the big category from categories -->
            @php
                $newBigCategory = $categories->firstWhere('id', $default_content?->big_category);
            @endphp
            @if ($newBigCategory)
            <div class="col-xl-6">
                <div class="tp-shop-category-2-item p-relative mb-15 fix">
                    <a href="{{ route('products', ['category' => $newBigCategory?->id]) }}">
                        <div class="tp-shop-category-2-thumb">
                            <img class="w-100" src="{{ asset($newBigCategory?->image) }}" alt="{{ $newBigCategory?->title }}">
                            <div class="tp-shop-category-2-content">
                                <div class="tp-shop-category-2-content-wrap">
                                    <h4 class="tp-shop-category-2-title">
                                        {{ $newBigCategory?->title }}
                                    </h4>
                                    <span>
                                        {{ $newBigCategory?->products_count ?? 0 }} {{ __('frontend.products') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endif

            <div class="col-xl-6">
                <div class="row gx-15">
                    @foreach ($categories as $category)
                        <!-- check if category is big_category then continue -->
                        @if($category->id == $default_content?->big_category)
                            @continue
                        @endif
                        <div class="col-md-6">
                            <div class="tp-shop-category-2-item p-relative mb-15 fix">
                                <a href="{{ route('products', ['category' => $category->id]) }}">
                                    <div class="tp-shop-category-2-thumb">
                                        <img class="w-100" src="{{ asset($category->image) }}" alt="{{ $category->title }}">
                                        <div class="tp-shop-category-2-content">
                                            <div class="tp-shop-category-2-content-wrap">
                                                <h4 class="tp-shop-category-2-title sm">{{ $category->title }}</h4>
                                                <span>{{ $category->products_count ?? 0 }} {{ __('frontend.products') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product area start -->
