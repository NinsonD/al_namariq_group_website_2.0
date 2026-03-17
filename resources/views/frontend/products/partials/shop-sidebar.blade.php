<div class="tp-shop-sidebar">

    <div class="tp-shop-widget mb-35">
        <h3 class="tp-shop-widget-title no-border">{{ __('frontend.search_products') }}</h3>
        <div class="tp-shop-widget-content tp-shop-widget-search">
            <input type="text" id="productSearch" placeholder="{{ __('frontend.enter_keywords') }}" value="{{ request('search') ?? '' }}">
            <button id="searchBtn" class="" type="button">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 15.9999L11.6731 11.673M13.5077 7.25385C13.5077 10.7078 10.7078 13.5077 7.25385 13.5077C3.79994 13.5077 1 10.7078 1 7.25385C1 3.79994 3.79994 1 7.25385 1C10.7078 1 13.5077 3.79994 13.5077 7.25385Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>


    <!-- filter -->
    <div class="tp-shop-widget mb-35">
        <h3 class="tp-shop-widget-title no-border">{{ __('frontend.price_filter') }}</h3>
        <div class="tp-shop-widget-content">
            <a href="#" class="tp-shop-widget-filter p-relative">
                <div id="slider-range" class="mb-10"></div>
                <div class="tp-shop-widget-filter-info d-flex align-items-center justify-content-between">
                    <span class="input-range">
                        <input type="text" id="amount" readonly>
                    </span>
                    <button class="tp-shop-widget-filter-btn reset-price-filter-btn" type="button">{{ __('frontend.reset') }}</button>
                </div>
            </a>
        </div>
    </div>
    <!-- status -->
    <div class="tp-shop-widget mb-50">
        <h3 class="tp-shop-widget-title">
            {{ __('frontend.stock_status') }}
        </h3>
        <div class="tp-shop-widget-content">
            <div class="tp-shop-widget-radio">
                <div class="filter-item">
                    <input type="radio" name="stock_status" id="all_stock" value="all_stock" class="status-filter" checked>
                    <label for="all_stock">{{ __('frontend.all_stock') }}</label>
                </div>
                <div class="filter-item">
                    <input type="radio" name="stock_status" id="in_stock" value="in_stock" class="status-filter">
                    <label for="in_stock">{{ __('frontend.in_stock') }}</label>
                </div>
                <div class="filter-item">
                    <input type="radio" name="stock_status" id="out_of_stock" value="out_of_stock" class="status-filter">
                    <label for="out_of_stock">{{ __('frontend.out_of_stock') }}</label>
                </div>

            </div>
        </div>
    </div>

    @if ($categories->isNotEmpty())


    <!-- categories -->
    <div class="tp-shop-widget mb-50">
        <h3 class="tp-shop-widget-title">{{ __('frontend.categories') }}</h3>
        <div class="tp-shop-widget-content">
            <div class="tp-shop-widget-checkbox">
                <ul class="filter-items filter-checkbox">
                    @foreach ($categories as $category)
                        <li class="filter-item checkbox">
                            <input class="category-filter" id="cat-{{ $category->id }}" type="checkbox" {{ request('category') == $category->id ? 'checked' : '' }} value="{{ $category->id }}">
                            <label for="cat-{{ $category->id }}">{{ $category->title }} <span class="cat-count">{{ $category->products_count }}</span></label>
                        </li>
                    @endforeach
                </ul><!-- .filter-items -->
            </div>
        </div>
    </div>
    @endif


    <!-- Ratting -->
    <div class="tp-shop-widget mb-50">
        <h3 class="tp-shop-widget-title">{{ __('frontend.rating') }}</h3>
        <div class="tp-shop-widget-content">
            <div class="tp-shop-widget-ratting">
                <div class="tp-shop-widget-checkbox">
                    <ul class="filter-items filter-checkbox rating-checkbox">
                        @foreach ([5, 4, 3, 2, 1] as $rating)
                            <li class="filter-item checkbox">
                                <input class="rating-filter" id="rating_{{ $rating }}" type="checkbox" name="ratings[]" value="{{ $rating }}">
                                <label for="rating_{{ $rating }}" class="d-flex align-items-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="{{ $i <= $rating ? 'active' : 'inactive' }}">
                                            <x-icons.star2 />
                                        </span>
                                    @endfor
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- reset filter -->
    <button class="ss-shop-btn reset-filters-btn d-none" type="button">
        {{ __('frontend.reset_filters') }}
    </button>
</div>
