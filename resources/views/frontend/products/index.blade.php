@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['shop']['seo_title'])
@section('meta_description', $seo_setting['shop']['seo_description'])
@section('meta_keywords', $seo_setting['shop']['seo_keywords'])

@php extract(getSiteMenus()); @endphp

@section('header')
   @include('frontend.layouts.headers.header-shop', ['main_menu' => $main_menu])
@endsection

@section('content')
<div class="tp-product-ptb pt-200 pb-120 shop-archive">
    <div class="container container-1750">
        @include('frontend.products.partials.shop-breadcrumb')
        <div class="row gy-5">
            <div class="col-xl-3 col-lg-4">
                @include('frontend.products.partials.shop-sidebar', ['categories' => $categories])
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="row align-items-center gy-5 mb-4">
                    <div class="col-lg-6">
                        <div id="product-count-container" class=""></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tp-product-filter-wrap d-flex justify-content-lg-end align-items-center">
                            <div class="tp-product-filter-select tp-select">
                                <select id="shopSortBy" class="">
                                    <option value="default">
                                        {{ __('frontend.default') }}
                                    </option>
                                    <option value="low" @if (request('sort_by') == 'low') selected @endif>{{ __('frontend.low_to_high') }}</option>
                                    <option value="high" @if (request('sort_by') == 'high') selected @endif>{{ __('frontend.high_to_low') }}</option>
                                    <option value="new" @if (request('sort_by') == 'new') selected @endif>{{ __('frontend.new_added') }}</option>
                                    <option value="sale" @if (request('sort_by') == 'sale') selected @endif>{{ __('frontend.on_sale') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="productContainer">
                    <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-sm-2 row-cols-1">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('frontend.layouts.footers.footer-shop', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/slider-range.css') }}">
@endpush

@push('js')
<script src="{{ asset('frontend/assets/js/range-slider.js') }}"></script>
<script>
"use strict";
$(function () {
    var currency_code = {!! json_encode(session('currency.symbol', '$')) !!};
    var initialMin = {!! json_encode((int) $minPrice) !!};
    var initialMax = {!! json_encode((int) $maxPrice) !!};

    const showing = "{{ __('frontend.showing') }}";
    const off = "{{ __('frontend.of') }}";
    const results = "{{ __('frontend.results') }}";

    const filter = {
        categories: [],
        ratings: [],
        minPrice: initialMin,
        maxPrice: initialMax,
        on_sale: false,
        in_stock: false,
        out_of_stock: false,
        sort_by: 'default',
        search: ''
    };

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('category')) {
        filter.categories = urlParams.get('category').split(',');
        filter.categories.forEach(id => $(`#cat-${id}`).prop('checked', true));
    }
    if (urlParams.has('ratings')) {
        filter.ratings = urlParams.get('ratings').split(',');
        filter.ratings.forEach(r => $(`#rating_${r}`).prop('checked', true));
    }
    if (urlParams.has('min_price')) filter.minPrice = parseInt(urlParams.get('min_price'), 10) || initialMin;
    if (urlParams.has('max_price')) filter.maxPrice = parseInt(urlParams.get('max_price'), 10) || initialMax;
    if (urlParams.has('on_sale')) {
        filter.on_sale = urlParams.get('on_sale') === 'true';
        $('#on_sale').prop('checked', true);
    }
    if (urlParams.has('in_stock')) {
        filter.in_stock = true;
        filter.out_of_stock = false;
        $('#in_stock').prop('checked', true);
    } else if (urlParams.has('out_of_stock')) {
        filter.in_stock = false;
        filter.out_of_stock = true;
        $('#out_of_stock').prop('checked', true);
    }
    if (urlParams.has('sort_by')) {
        filter.sort_by = urlParams.get('sort_by');
        $('#shopSortBy').val(filter.sort_by);
    }
    if (urlParams.has('search')) {
        filter.search = urlParams.get('search');
        $('#productSearch').val(filter.search);
    }

    $('#searchBtn').on('click', function () {
        filter.search = $('#productSearch').val().trim();
        updateUrl();
        fetchProducts();
    });

    $('#productSearch').on('keypress', function (e) {
        if (e.which === 13) $('#searchBtn').click();
    });

    $("#slider-range").slider({
        range: true,
        min: initialMin,
        max: initialMax,
        step: 1,
        values: [filter.minPrice, filter.maxPrice],
        slide: function (event, ui) {
            $("#amount").val(`${currency_code}${ui.values[0]} - ${currency_code}${ui.values[1]}`);
        },
        change: function (event, ui) {
            // ensure integers
            filter.minPrice = parseInt(ui.values[0], 10);
            filter.maxPrice = parseInt(ui.values[1], 10);
            updateUrl();
            fetchProducts();
        }
    });

    $("#amount").val(`${currency_code}${filter.minPrice} - ${currency_code}${filter.maxPrice}`);

    $('.reset-price-filter-btn').on('click', function () {
        filter.minPrice = initialMin;
        filter.maxPrice = initialMax;
        $("#slider-range").slider("values", [filter.minPrice, filter.maxPrice]);
        $("#amount").val(`${currency_code}${filter.minPrice} - ${currency_code}${filter.maxPrice}`);
        updateUrl();
        fetchProducts();
    });

    function updateUrl(page = 1) {
        const params = new URLSearchParams();
        if (filter.categories.length) params.set('category', filter.categories.join(','));
        if (filter.ratings.length) params.set('ratings', filter.ratings.join(','));
        if (filter.minPrice > initialMin) params.set('min_price', filter.minPrice);
        if (filter.maxPrice < initialMax) params.set('max_price', filter.maxPrice);
        if (filter.on_sale) params.set('on_sale', 'true');
        if (filter.in_stock) params.set('in_stock', 'true');
        if (filter.out_of_stock) params.set('out_of_stock', 'true');
        if (filter.sort_by && filter.sort_by !== 'default') params.set('sort_by', filter.sort_by);
        if (filter.search) params.set('search', filter.search);
        if (page > 1) params.set('page', page);

        const url = `${location.pathname}?${params.toString()}`;
        window.history.replaceState({}, '', url);
    }

    function fetchProducts(page = 1) {
        const priceMinBase = Math.round(filter.minPrice);
        const priceMaxBase = Math.round(filter.maxPrice);

        $.ajax({
            url: window.location.pathname,
            method: 'GET',
            data: {
                categories: filter.categories,
                ratings: filter.ratings,
                price_min: priceMinBase,
                price_max: priceMaxBase,
                on_sale: filter.on_sale ? 1 : null,
                in_stock: filter.in_stock ? 1 : null,
                out_of_stock: filter.out_of_stock ? 1 : null,
                sort_by: filter.sort_by,
                search: filter.search,
                page: page,
            },
            beforeSend: function () {
                $('#ajax-loading').addClass('show');
            },
            success: function (response) {
                $("#productContainer").html(response.html);
                $('#product-count-container').html(response.count_html);
                $('html, body').animate({
                    scrollTop: $('#productContainer').offset().top - 200
                }, 500);
                bindPaginationLinks();
                toggleResetButton();
            },
            error: function (err) {
                console.error('Error:', err);
            },
            complete: function () {
                $('#ajax-loading').removeClass('show');
            }
        });
    }

    function bindPaginationLinks() {
        $('.pagination-container a').off('click').on('click', function (e) {
            e.preventDefault();
            let url = new URL($(this).attr('href'));
            let page = url.searchParams.get('page') || 1;
            updateUrl(page);
            fetchProducts(page);
        });
    }


    $('.category-filter').on('change', function () {
        const id = $(this).val();
        if ($(this).is(':checked')) {
            if (!filter.categories.includes(id)) filter.categories.push(id);
        } else {
            filter.categories = filter.categories.filter(c => c !== id);
        }
        updateUrl();
        fetchProducts();
    });

    $('.rating-filter').on('change', function () {
        const rating = $(this).val();
        if ($(this).is(':checked')) {
            if (!filter.ratings.includes(rating)) filter.ratings.push(rating);
        } else {
            filter.ratings = filter.ratings.filter(r => r !== rating);
        }
        updateUrl();
        fetchProducts();
    });

    $('.status-filter').on('change', function () {
        const val = $(this).val();
        if (val === 'in_stock') {
            filter.in_stock = true;
            filter.out_of_stock = false;
        } else if (val === 'out_of_stock') {
            filter.in_stock = false;
            filter.out_of_stock = true;
        } else {
            filter.in_stock = false;
            filter.out_of_stock = false;
        }
        updateUrl();
        fetchProducts();
    });

    $('#shopSortBy').on('change', function () {
        filter.sort_by = $(this).val();
        updateUrl();
        fetchProducts();
    });

    bindPaginationLinks();



    // Initial load
    if (
        filter.categories.length ||
        filter.ratings.length ||
        filter.minPrice !== initialMin ||
        filter.maxPrice !== initialMax ||
        filter.on_sale ||
        filter.in_stock ||
        filter.out_of_stock ||
        filter.sort_by !== 'default' ||
        filter.search !== ''
    ) {
        fetchProducts();
    } else {
        let total = {!! json_encode($products->total()) !!} || 0;
        let first = {!! json_encode($products->firstItem()) !!} || 0;
        let last = {!! json_encode($products->lastItem()) !!} || 0;
        if (total > 0) {
            $('#product-count-container').html(`<p class="mb-0">${showing} ${first}-${last} ${off} ${total} ${results}</p>`);
        }
    }

    $('.reset-filters-btn').on('click', function () {
        filter.categories = [];
        filter.ratings = [];
        filter.minPrice = initialMin;
        filter.maxPrice = initialMax;
        filter.on_sale = false;
        filter.in_stock = false;
        filter.out_of_stock = false;
        filter.sort_by = 'default';
        filter.search = '';
        $('#productSearch').val('');

        $('.category-filter').prop('checked', false);
        $('.rating-filter').prop('checked', false);
        $('#slider-range').slider("values", [filter.minPrice, filter.maxPrice]);
        $("#amount").val(`${currency_code}${filter.minPrice} - ${currency_code}${filter.maxPrice}`);
        $('#on_sale').prop('checked', false);
        $('#in_stock').prop('checked', false);
        $('#out_of_stock').prop('checked', false);
        $('#shopSortBy').val('default');

        updateUrl();
        fetchProducts();
        toggleResetButton();
    });

    function toggleResetButton() {
        const shouldShow =
            filter.categories.length > 0 ||
            filter.ratings.length > 0 ||
            filter.minPrice !== initialMin ||
            filter.maxPrice !== initialMax ||
            filter.on_sale ||
            filter.in_stock ||
            filter.out_of_stock ||
            filter.sort_by !== 'default' ||
            filter.search !== '';

        if (shouldShow) {
            $('.reset-filters-btn').removeClass('d-none');
        } else {
            $('.reset-filters-btn').addClass('d-none');
        }
    }
});
</script>
@endpush
