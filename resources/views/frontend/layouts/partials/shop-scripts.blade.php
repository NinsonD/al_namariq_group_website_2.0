<script>
    const cartAddUrl = "{{ route('user.cart.add') }}";
    const cartUpdateQtyUrl = "{{ route('user.cart.update-qty') }}";
    const cartRemoveUrlTemplate = "{{ route('user.cart.remove', ['item' => ':id']) }}";
    const productQuickViewUrl = "{{ route('products.quick-view', ['id' => ':id']) }}";

    // messages
    const somethingWentWrongMessage = "{{ __('notification.something_went_wrong') }}";
    const anErrorOccurredMessage = "{{ __('notification.unknown_error') }}";
    const adminOnlyMsg = "{{ __('notification.this_action_is_disabled_for_admin') }}";

    function thumbnailSliderActive()
    {
        var productDetailsNav = new Swiper(".tp-product-details-nav", {
            loop: true,
            spaceBetween: 15,
            slidesPerView: 5,
        });

        var productDetailsSlider = new Swiper(".tp-product-details-slider", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".tp-product-details-swiper-button-next",
                prevEl: ".tp-product-details-swiper-button-prev",
            },
            thumbs: {
                swiper: productDetailsNav,
            },
        });
    }

    // Show or hide loading spinner in cart area
    function cartLoading(isLoading) {
        isLoading ? $(".ss-cart-loading").addClass("show") : $(".ss-cart-loading").removeClass("show");
    }

    // Update header cart count badge
    function updateHeaderCartCount(count) {
        $('.ss-header-cart-count').text(count ?? 0);
    }

    // Replace mini cart container HTML
    function updateCartMini(html) {
        $("#cartmini-area").html(html);
    }

    // Replace main cart table HTML
    function updateCartTable(html) {
        $("#cart-area").html(html);
    }

    // Update subtotal shown in mini cart and full cart (if you have elements for this)
    function updateCheckoutSubtotal(subtotal) {
        $('.ss-cart-checkout-subtotal').text(subtotal);
        $('.ss-cartmini-subtotal').text(subtotal);
    }

    function updateWishlistTable(html) {
        $("#wishlist-data").html(html);
    }

    // Remove an item from cart by product ID
    function removeFromCart(productId) {
        const url = cartRemoveUrlTemplate.replace(':id', productId);
        $.ajax({
            url: url,
            type: 'DELETE',
            beforeSend: function () {
                cartLoading(true);
            },
            success: function (res) {
                if (res.success) {
                    updateHeaderCartCount(res.count);
                    updateCartMini(res.cart_mini);
                    updateCartTable(res.cart);
                    updateCheckoutSubtotal(res.subtotal);

                    if (res.is_empty) {
                        // If cart is empty, you can optionally replace cart area with empty message HTML
                        $("#cart-area").html(res.cart_empty_html || "{{ __('frontend.your_cart_is_empty') }}");
                    }

                    toastr.success(res.message);
                } else {
                    toastr.error(res.message || "{{ __('frontend.failed_to_remove_item') }}");
                }
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || "{{ __('frontend.failed_to_remove_item') }}");
            },
            complete: function () {
                cartLoading(false);
            }
        });
    }

    // Add product to cart
    function addToCart(productId, $btn) {
        if (!productId) return;

        $.ajax({
            url: cartAddUrl,
            type: 'POST',
            data: { product_id: productId },
            beforeSend: function () {
                $btn.prop('disabled', true).text('Adding...');
            },
            success: function (res) {
                if (res.success) {
                    updateHeaderCartCount(res.count);
                    updateCartMini(res.cart_mini);
                    toastr.success(res.message);
                } else {
                    toastr.error(res.message || "{{ __('notification.this_action_is_disabled_for_admin') }}");
                }
            },
            error: function (xhr) {
                if ([401, 403, 422].includes(xhr.status) && xhr.responseJSON?.message) {
                    toastr.error(xhr.responseJSON.message);
                }
                else {
                    toastr.error(somethingWentWrongMessage);
                }
            },
            complete: function () {
                $btn.prop('disabled', false).text("{{ __('frontend.add_to_cart') }}");
            }
        });
    }

    // Update product quantity in cart
    function updateProductQty(productId, qty) {
        if (!productId || qty < 1) return;

        $.ajax({
            url: cartUpdateQtyUrl,
            type: 'POST',
            data: { product_id: productId, qty: qty },
            beforeSend: function () {
                cartLoading(true);
            },
            success: function (res) {
                if (res.success) {
                    updateHeaderCartCount(res.count);
                    updateCartMini(res.cart_mini);
                    updateCartTable(res.cart);
                    updateCheckoutSubtotal(res.subtotal);

                    if (res.max_reached) {
                        toastr.warning("{{ __('frontend.reached_max_available_quantity') }}");
                    }
                } else {
                    toastr.error(res.message || "{{ __('frontend.failed_to_update_quantity') }}");
                }
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || "{{ __('frontend.failed_to_update_quantity') }}");
            },
            complete: function () {
                cartLoading(false);
            }
        });
    }

    // Wishlist handling (optional)
    function addToWishlist(productId, $btn) {
        if (!productId) return;

        let originalHtml = $btn.html();

        $.ajax({
            url: "{{ route('user.wishlist.store') }}",
            type: 'POST',
            data: { product_id: productId },
            beforeSend: function () {
                $btn.prop('disabled', true).html(`<i class="fas fa-spinner fa-spin"></i>`);
            },
            success: function (res) {
                if (res.success) {
                    toastr.success(res.message);
                    if (res.action === 'added') {
                        $btn.addClass('added');
                    } else if (res.action === 'removed') {
                        $btn.removeClass('added');
                    }
                }
                else {
                    toastr.error(res.message || "{{ __('notification.this_action_is_disabled_for_admin') }}");
                }
            },
            error: function (xhr) {
                if ([401, 403, 422].includes(xhr.status)) {
                    toastr.error(xhr.responseJSON?.message || "{{ __('frontend.you_need_to_login_first') }}");
                } else {
                    toastr.error(anErrorOccurredMessage);
                }
            },
            complete: function () {
                $btn.prop('disabled', false).html(originalHtml);
            }
        });
    }

    // wishlist remove
    function removeFromWishlist(productId, $btn) {
        if (!productId) return;

        $.ajax({
            url: "{{ route('user.wishlist.destroy', ['wishlist' => ':id']) }}".replace(':id', productId),
            type: 'DELETE',
            beforeSend: function () {
                cartLoading(true);
                $btn.prop('disabled', true).html(`<i class="fas fa-spinner fa-spin"></i>`);
            },
            success: function (res) {
                if (res.success) {
                    updateWishlistTable(res.html);
                    toastr.success(res.message);

                } else {
                    toastr.error(res.message || "{{ __('frontend.failed_to_remove_item') }}");
                }
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || anErrorOccurredMessage);
            },
            complete: function () {
                cartLoading(false);
                $btn.prop('disabled', false).html('<i class="fas fa-heart"></i>');
            }
        });
    }


    // quick view
    function showProductQuickView($productId){

        if(!$productId) return;

        const url = productQuickViewUrl.replace(':id', $productId);

        $.ajax({
            url: url,
            type: 'GET',
            data: { id: $productId },
            beforeSend: function () {
                $('#product-quick-view-modal').html('');
            },
            success: function (res) {
                if (res.success) {
                    $('#product-quick-view-modal').html(res.html);
                    $('#producQuickViewModal').modal('show');
                    setTimeout(function () {
                        thumbnailSliderActive();
                    }, 50);
                } else {
                    toastr.error(res.message || "{{ __('frontend.failed_to_load_product_details') }}");
                }
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || anErrorOccurredMessage);
            },
            complete: function () {
                // do someting
            }
        });
    }

    // get cart counts for header
    function updateCartCount() {
        let cartCount = $('.cartmini__widget .cartmini__widget-item').length;
        updateHeaderCartCount(cartCount);
    }

    // apply shipping method
    function applyShippingMethod(shippingMethodId, position = null) {
        if (!shippingMethodId) return;
        let page = null;

        if (position) {
            page = position;
        }

        $.ajax({
            url: "{{ route('user.cart.applyShipping') }}",
            type: "POST",
            data: {
                shipping_method_id: shippingMethodId,
                page: page,
                _token: "{{ csrf_token() }}"
            },
            beforeSend: function() {
                // TODO:: show loading spinner
            },
            success: function(res) {
                if (res.success) {
                    if(res.page === 'checkout') {
                        $('#checkout-content').html(res.checkout_html);
                    }else{
                        updateCartTable(res.cart);
                    }

                    toastr.success(res.message);
                } else {
                    $('#checkout-content').html(res.checkout_html);
                    updateCartTable(res.cart);
                    toastr.error(res.message || somethingWentWrongMessage);
                }
            },
            error: function(xhr) {

                if (xhr.status === 422 && xhr.responseJSON.message && xhr.responseJSON.cart) {
                    updateCartTable(xhr.responseJSON.cart);
                    $('#checkout-content').html(xhr.responseJSON.checkout_html);
                    toastr.error(xhr.responseJSON.message);
                }
                else if(xhr.status === 422 && xhr.responseJSON.message) {
                    toastr.error(xhr.responseJSON.message);
                }
                else {
                    toastr.error(somethingWentWrongMessage);
                }
            }
        });
    }

    // apply coupon
    function applyCoupon(couponCode) {
        if (!couponCode) return;

        $.ajax({
            url: "{{ route('user.cart.apply-coupon') }}",
            type: "POST",
            data: {
                coupon_code: couponCode,
            },
            beforeSend: function() {
                // TODO:: show loading spinner
            },
            success: function(res) {
                console.log(res);
                if (res.success) {
                    updateCartTable(res.cart);
                    toastr.success(res.message);
                } else {
                    toastr.error(res.message || somethingWentWrongMessage);
                }
            },
            error: function(xhr) {

                if(xhr.status == 422 && xhr.responseJSON.errors?.coupon_code) {
                    toastr.error(xhr.responseJSON.errors.coupon_code[0]);
                }
                else if(xhr.status == 422 && xhr.responseJSON.message) {
                    toastr.error(xhr.responseJSON.message);
                }
                else {
                    toastr.error(somethingWentWrongMessage);
                }
            }
        });
    }

    function removeCoupon(page = null){

        let userPage = null;

        if (page) {
            userPage = page;
        }

        $.ajax({
            url: "{{ route('user.cart.remove-coupon') }}",
            type: "POST",
            data: {
                page: userPage
            },
            beforeSend: function() {
                // TODO:: show loading spinner
            },
            success: function(res) {
                if (res.success) {
                    if(res.page == 'checkout'){
                        $('#checkout-content').html(res.checkout_html);
                    }else{
                        updateCartTable(res.cart);
                    }
                    toastr.success(res.message);
                } else {
                    toastr.error(res.message || somethingWentWrongMessage);
                }
            },
            error: function(xhr) {
                if (xhr.status === 422 && xhr.responseJSON.message && xhr.responseJSON.cart) {
                    updateCartTable(xhr.responseJSON.cart);
                    toastr.error(xhr.responseJSON.message);
                } else {
                    toastr.error(somethingWentWrongMessage);
                }
            }
        });
    }

    // validate product quantity for details page
    function addToCartWithQty(productId, qty, $element) {
        if (!productId) return;

        let btnText = $element.html();

        $.ajax({
            url: cartAddUrl,
            type: "POST",
            data: {
                product_id: productId,
                quantity: qty,
                position: 'details_page'
            },
            beforeSend: function() {
                $element.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function(res) {
                if(res.success) {
                    updateHeaderCartCount(res.count);
                    updateCartMini(res.cart_mini);
                    toastr.success(res.message);
                } else {
                    toastr.error(res.message || adminOnlyMsg);
                }
            },
            error: function(xhr) {
                if ([401, 403, 422].includes(xhr.status) && xhr.responseJSON.message) {
                    toastr.error(xhr.responseJSON.message);
                } else {
                    toastr.error(somethingWentWrongMessage);
                }
            },
            complete: function() {
                $element.prop('disabled', false).html(btnText);
            }
        });
    }

    $(function () {
        const isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};

        updateCartCount();
        thumbnailSliderActive();

        $(document).on('hidden.bs.modal', '#producQuickViewModal', function () {
            $('#product-quick-view-modal').html('');
        });

        // Quantity plus button
        $(document).on('click', '.ss-cart-plus', function () {
            const $input = $(this).siblings('input.tp-cart-input');
            const pid = $input.data('id');
            let val = parseInt($input.val()) || 1;
            const maxQty = parseInt($input.data('qty')) || 1;

            if (val < maxQty) {
                val++;
                $input.val(val);
                updateProductQty(pid, val);
            } else {
                toastr.warning('{{ __("frontend.reached_max_available_quantity") }}');
            }
        });

        // Quantity minus button
        $(document).on('click', '.ss-cart-minus', function () {
            const $input = $(this).siblings('input.tp-cart-input');
            const pid = $input.data('id');
            let val = parseInt($input.val()) || 1;

            if (val > 1) {
                val--;
                $input.val(val);
                updateProductQty(pid, val);
            }
        });

        // Quantity input manual change
        $(document).on('input', 'input.ss-cart-input', function () {
            const $input = $(this);
            const pid = $input.data('id');
            let val = parseInt($input.val()) || 1;
            const maxQty = parseInt($input.data('qty')) || 1;

            if (val > maxQty) {
                val = maxQty;
                toastr.warning('Max quantity reached');
            } else if (val < 1) {
                val = 1;
            }

            $input.val(val);
            updateProductQty(pid, val);
        });

        // Quantity input for details page
        $(document).on('click', '.ss-pro-details-minus', function () {
            const $input = $(this).siblings('input.ss-pro-details-input');
            let val = parseInt($input.val()) || 1;

            // decrease the value and min value must be 1
            if (val > 1) {
                val--;
            }
            $input.val(val);
        });

        $(document).on('click', '.ss-pro-details-plus', function () {
            const $input = $(this).siblings('input.ss-pro-details-input');
            let val = parseInt($input.val()) || 1;
            val++
            $input.val(val);
        });

        $(document).on('input', 'input.ss-pro-details-input', function () {
            const $input = $(this);
            let val = parseInt($input.val()) || 1;

            if (val < 1) {
                val = 1;
            }

            $input.val(val);
        });

        $(document).on('click', '.ss-pro-details-addToCart', function () {
            const productId = $(this).data('id');
            const qty = parseInt($(this).closest('.tp-product-details-action-wrapper').find('input.ss-pro-details-input').val()) || 1;

            if (!isAuthenticated) {
                $('#loginModal').modal('show');
                return;
            }

            addToCartWithQty(productId, qty, $(this));
        });

        // Remove item from cart (mini or full cart buttons)
        $(document).on('click', '.ss-remove-cartmini-item, .ss-cart-item-remove-btn', function () {
            const productId = $(this).data('id');
            removeFromCart(productId);
        });

        // Add to cart button
        $(document).on('click', '.ss-add-to-cart-btn', function () {
            if (!isAuthenticated) {
                $('#loginModal').modal('show');
                return;
            }
            const productId = $(this).data('id');
            addToCart(productId, $(this));
        });

        // Add to wishlist button
        $(document).on('click', '.ss-add-to-wishlist-btn', function () {
            if (!isAuthenticated) {
                $('#loginModal').modal('show');
                return;
            }
            const productId = $(this).data('id');
            addToWishlist(productId, $(this));
        });

        // remove from wishlist button
        $(document).on('click', '.ss-wishlist-item-remove-btn', function () {
            const productId = $(this).data('id');
            removeFromWishlist(productId, $(this));
        });

        // product quick view button
        $(document).on('click', '.ss-quick-view-btn', function () {
            const productId = $(this).data('id');
            showProductQuickView(productId);
        });

        // when hide remove the html
        $('#productQuickViewModal').on('hidden.bs.modal', function () {
            $(document).find('#product-quick-view-modal').html('');
        });

        // apply shipping method
        $(document).on('change', 'input[name="shipping"]', function() {
            const $this = $(this);
            let methodId = $this.data('id');

            let position = null;

            if($this.hasClass('from-checkout')) {
                position = 'checkout';
            }

            applyShippingMethod(methodId, position);

        });

        // Coupon apply button
        $(document).on('click', '#apply-coupon-btn', function (e) {
            e.preventDefault();

            const couponCode = $('#coupon-code-input').val().trim();
            if (!couponCode) {
                toastr.warning("{{ __('frontend.please_enter_coupon_code') }}");
                return;
            }

            applyCoupon(couponCode);

        });

        // remove coupon button
        $(document).on('click', '.ss-remove-coupon-btn', function (e) {
            e.preventDefault();

            let page= $(this).data('page') || null;

            removeCoupon(page);

        });

        // remove coupon button
        $("#ship_to_diff_address").on('change', function (e) {
            e.preventDefault();
            // Show or hide the shipping address form
            if ($(this).is(':checked')) {
                $('.ss-shipping-form').slideDown();
            } else {
                $('.ss-shipping-form').slideUp();
            }

        });

        // check on first load
        $("#ship_to_diff_address").is(':checked') ? $('.ss-shipping-form').show() : $('.ss-shipping-form').hide();

        // product reviews pagination
        $(document).on('click', '#reviews-container .reviews-pagination a', function(e) {
            e.preventDefault();

            let url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function() {
                    $('#reviews-container .review-loading').show();
                },
                success: function(response) {
                    $('#reviews-container').html(response.html);
                },
                error: function() {
                    toastr.error(anErrorOccurredMessage);
                },
                complete: function() {
                    $('#reviews-container .review-loading').hide();
                }
            });
        });

    });
</script>
