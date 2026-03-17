<!-- JS here -->
<script src="{{ asset('global/js/jquery-3.7.1.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-bundle.js') }}"></script>
<script src="{{ asset('frontend/assets/js/swiper-bundle.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugin.js') }}"></script>
<script src="{{ asset('frontend/assets/js/three.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slick.js') }}"></script>
<script src="{{ asset('frontend/assets/js/scroll-magic.js') }}"></script>
<script src="{{ asset('frontend/assets/js/hover-effect.umd.js') }}"></script>
<script src="{{ asset('frontend/assets/js/magnific-popup.js') }}"></script>
<script src="{{ asset('frontend/assets/js/parallax-slider.js') }}"></script>
<script src="{{ asset('frontend/assets/js/nice-select.js') }}"></script>
<script src="{{ asset('frontend/assets/js/purecounter.js') }}"></script>
<script src="{{ asset('frontend/assets/js/isotope-pkgd.js') }}"></script>
<script src="{{ asset('frontend/assets/js/imagesloaded-pkgd.js') }}"></script>
<script src="{{ asset('frontend/assets/js/Observer.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/splitting.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/webgl.js') }}"></script>
<script src="{{ asset('frontend/assets/js/parallax-scroll.js') }}"></script>
<script src="{{ asset('frontend/assets/js/atropos.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slider-active.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
<script src="{{ asset('frontend/assets/js/tp-cursor.js') }}"></script>
<script src="{{ asset('frontend/assets/js/portfolio-slider-1.js') }}"></script>
<script type="module" src="{{ asset('frontend/assets/js/distortion-img.js') }}"></script>
<script type="module" src="{{ asset('frontend/assets/js/skew-slider/index.js') }}"></script>
<script type="module" src="{{ asset('frontend/assets/js/img-revel/index.js') }}"></script>

<script src="{{ asset('frontend/assets/js/cookieconsent.min.js')}}"></script>
<script src="{{ asset('admin/assets/vendor/libs/toastr/toastr.js')}}"></script>

<script type="text/javascript">
    'use strict';

        // ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#language").on('change', function () {
            $(this).closest('form').submit();
        });

        $('#sidebar-currency').on('change', function () {
            $(this).closest('form').submit();
        });

        $('#sidebar-language').on('change', function () {
            $(this).closest('form').submit();
        });

        $('.change-lang-btn').on('click', function(e){
            e.preventDefault();
            var languageCode = $(this).siblings('input[name="language_code"]').val();
            $('#language-form').find('input[name="language_code"]').val(languageCode);
            $('#language-form').submit();
        });

        $('.change-currency-btn').on('click', function(e){
            e.preventDefault();
            var currencyCode = $(this).siblings('input[name="currency_code"]').val();
            $('#currency-form').find('input[name="currency_code"]').val(currencyCode);
            $('#currency-form').submit();
        });


        @if (Session::has('messege'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
            }
        @endif

        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-left",
            "timeOut": "3000",
        };

        @if($errors->any())
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-left",
                "timeOut": "3000",
            };

            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        $(document).on('click', '.footer-subscribe-btn', function(e){
            e.preventDefault();

            let formData = $(this).closest('form').serialize();
            let url = $(this).closest('form').attr('action');
            let button = $(this);
            let sendHTML = '';
            let afterHTML = $(this).html();
            let msgBox = $(this).closest('form').find('.subscribe-ajax-msg');

            let sending = "{{ __('frontend.sending') }}"

            if($(this).hasClass('icon-btn')){
                sendHTML = '<i class="spinner-border spinner-border-sm text-light"></i>';
            }else{
                sendHTML = `<i class="spinner-border spinner-border-sm text-light"></i> ${sending}`;
            }

            let errorHTML = "{{ __('frontend.something_went_wrong') }}";

            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                beforeSend: function () {
                    button.html();
                    button.attr('disabled', true);
                },
                success: function (response) {
                    if (response.status) {
                        toastr.success(response.message);
                        button.closest('form').find('input[name="email"]').val('');
                        msgBox.html(`<div class="alert alert-success fw-medium">${response.message}</div>`);
                    } else if (response.success === false) {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        let ul = "<ul class='mb-0 pl-20'>";

                        $.each(errors, function (key, value) {
                            toastr.error(value[0]);
                            ul += `<li>${value[0]}</li>`;
                        });
                        ul += "</ul>";
                        msgBox.html(`<div class="alert alert-danger fw-medium">${ul}</div>`);
                    } else {
                        toastr.error(errorHTML);
                        msgBox.html(`<div class="alert alert-danger fw-medium">${errorHTML}</div>`);
                    }
                },
                complete: function () {
                    button.html(afterHTML).attr('disabled', false);
                }
            });
        })

        $(document).on('submit', '.ajax-contact-form', function (e) {
            e.preventDefault();

            const form = $(this);
            const action = form.attr('action');
            const method = form.attr('method') || 'POST';
            const formData = new FormData(this);
            const ajaxMessage = form.find('.ajax-message');
            const submitBtn = form.find('[type="submit"]');
            let submitBtnText = submitBtn.html();
            let sending = "{{ __('frontend.sending') }}";
            let errorHTML = "{{ __('frontend.something_went_wrong') }}";

            // Clear previous errors
            form.find('span.error-text').text('');
            ajaxMessage.html('');

            $.ajax({
                url: action,
                type: method,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    submitBtn.prop('disabled', true);
                    submitBtn.html(`<i class="spinner-border spinner-border-sm text-light"></i> ${sending}`);
                    ajaxMessage.html('');
                },
                success: function (response) {
                    if (response.success) {
                        form[0].reset();
                        ajaxMessage.html(`<div class="alert alert-success fw-medium">${response.message}</div>`);
                    } else if (response.error) {
                        ajaxMessage.html(`<div class="alert alert-danger fw-medium">${response.error}</div>`);
                    }
                },
                error: function (xhr) {

                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, messages) {
                            form.find(`.${key}-error`).text(messages[0]);
                        });
                    }
                    else if (xhr.status === 429) {
                        ajaxMessage.html(`<div class="alert alert-danger fw-medium">${xhr.responseJSON?.message || xhr.responseJSON?.error}</div>`);
                    }
                    else if (xhr.status === 403) {
                        ajaxMessage.html(`<div class="alert alert-danger fw-medium">${xhr.responseJSON?.message || xhr.responseJSON?.error}</div>`);
                    }

                    else {
                        ajaxMessage.html(`<div class="alert alert-danger fw-medium">${errorHTML}</div>`);
                    }
                },
                complete: function () {
                    submitBtn.html(submitBtnText).prop('disabled', false);
                }
            });
        });

        if(('.the-title').length){
            let idCounter = 0;
            $('.the-title').each(function () {
                let $el = $(this);
                let html = $el.html();

                let $wrapper = $('<div>').html(html);

                $wrapper.find('span').each(function () {
                    const word = $(this).text();
                    const uniqueId = `paint0_linear_${Date.now()}_${idCounter++}`;

                    const replacement = `
                        <span class="p-relative">
                            ${word}
                            <span class="tp-section-title-shape">
                                <svg width="280" height="15" viewBox="0 0 280 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M157.643 0.463566C152.553 0.665187 132.813 1.06843 113.879 1.37086C64.4049 2.12693 43.5474 2.7822 26.6628 3.94151C13.5027 4.8488 1.02542 6.15933 0.342587 6.71379C0.218435 6.8146 0.094283 8.07472 0.0322071 9.48606C-0.0919446 11.7543 0.094283 12.1575 1.45995 12.964C2.32901 13.4681 3.50846 13.9721 4.00506 14.1233C4.87413 14.3753 38.5193 12.8632 46.527 12.2079C50.0654 11.9559 159.009 10.847 185.577 10.7966C195.137 10.7966 217.36 11.099 234.927 11.5023C252.495 11.9055 268.386 12.1575 270.186 12.1071C274.656 12.0063 278.629 10.2421 278.815 8.32675C278.877 7.16743 278.691 6.96581 277.263 6.91541C275.711 6.865 275.711 6.8146 277.636 6.46176C280.305 5.95771 280.615 5.65528 279.063 4.94961C277.573 4.29435 277.325 3.43746 278.691 3.43746C279.187 3.43746 279.622 3.18544 279.622 2.93341C279.622 2.63098 279.312 2.42936 278.877 2.42936C278.505 2.42936 276.891 1.92531 275.339 1.32045L272.483 0.211542L219.719 0.161136C190.729 0.110732 162.795 0.261946 157.643 0.463566ZM200.475 2.47977C200.848 2.68139 204.572 2.88301 208.855 2.88301C213.139 2.93341 221.209 3.13503 226.857 3.38706C235.858 3.7903 234.865 3.8407 218.788 3.63908C208.731 3.53827 192.281 3.43746 182.225 3.43746C172.169 3.43746 164.099 3.33665 164.223 3.23584C164.409 3.08463 171.3 2.93341 179.556 2.88301C187.812 2.7822 194.888 2.58058 195.323 2.32855C196.254 1.87491 199.544 1.92531 200.475 2.47977ZM264.538 3.28625C263.296 3.38706 261.31 3.38706 260.192 3.28625C259.137 3.18544 260.192 3.08463 262.551 3.08463C264.972 3.08463 265.841 3.18544 264.538 3.28625ZM128.095 3.63908C127.971 3.73989 113.631 3.89111 96.1877 3.99192C78.8065 4.14313 68.8744 4.09273 74.1508 3.94151C85.2624 3.58868 128.467 3.33665 128.095 3.63908ZM159.009 3.73989C158.822 3.89111 158.264 3.94151 157.829 3.7903C157.332 3.63908 157.519 3.48787 158.202 3.48787C158.884 3.43746 159.257 3.58868 159.009 3.73989ZM268.759 7.01622C269.193 7.36905 267.393 7.46986 263.172 7.41946C259.758 7.31865 247.591 7.31865 236.169 7.36905C224.747 7.41946 213.822 7.36905 211.959 7.26824C206.435 6.91541 176.576 6.865 154.229 7.11703C131.261 7.41946 129.833 7.16743 150.815 6.51217C169.624 5.90731 267.952 6.36095 268.759 7.01622ZM118.845 7.52027C100.099 7.92351 80.7929 7.92351 85.3245 7.46986C87.1867 7.26824 98.7949 7.11703 111.086 7.11703C132.999 7.16743 133.185 7.16743 118.845 7.52027ZM200.786 7.97391C200.786 8.22594 200.351 8.32675 199.854 8.17553C199.358 7.97391 198.923 7.77229 198.923 7.67148C198.923 7.57067 199.358 7.46986 199.854 7.46986C200.351 7.46986 200.786 7.67148 200.786 7.97391ZM202.648 7.97391C202.648 8.22594 202.338 8.47796 201.965 8.47796C201.655 8.47796 201.531 8.22594 201.717 7.97391C201.903 7.67148 202.213 7.46986 202.4 7.46986C202.524 7.46986 202.648 7.67148 202.648 7.97391ZM207.304 7.97391C207.49 8.22594 207.242 8.47796 206.745 8.47796C206.186 8.47796 205.752 8.22594 205.752 7.97391C205.752 7.67148 206 7.46986 206.31 7.46986C206.683 7.46986 207.117 7.67148 207.304 7.97391ZM266.276 8.47796C267.393 8.8812 267.393 8.93161 265.965 8.8812C265.096 8.8812 263.606 8.67958 262.551 8.47796L260.689 8.07472H262.862C264.041 8.07472 265.593 8.22594 266.276 8.47796ZM122.694 8.8308C113.383 8.93161 98.2983 8.93161 89.1732 8.8308C80.048 8.78039 87.6833 8.72999 106.12 8.72999C124.556 8.72999 132.006 8.78039 122.694 8.8308ZM5.86734 10.4942C5.86734 10.7462 4.9362 10.9982 3.88091 10.9478C2.14279 10.9478 2.01864 10.847 3.07393 10.4942C4.81205 9.8893 5.86734 9.8893 5.86734 10.4942ZM15.7374 10.1917C15.6133 10.2925 13.3785 10.4942 10.8334 10.6454C7.79169 10.847 6.4881 10.7966 7.10886 10.4942C7.97792 10.0405 16.3582 9.73809 15.7374 10.1917ZM258.392 11.351C257.461 11.4519 255.785 11.4519 254.667 11.351C253.55 11.2502 254.295 11.1494 256.344 11.1494C258.392 11.1494 259.323 11.2502 258.392 11.351Z" fill="url(#${uniqueId})" />
                                    <defs>
                                        <linearGradient id="${uniqueId}" x1="53.5" y1="18.1094" x2="56.4335" y2="31.6184" gradientUnits="userSpaceOnUse">
                                            <stop offset="1" stop-color="#43E508" />
                                            <stop offset="1" stop-color="#F7EF33" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </span>
                        </span>
                    `;

                    $(this).replaceWith(replacement);
                });

                $el.html($wrapper.html());
            });
        }

</script>

@if ($settings?->recaptcha_status == 1)
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endif

@if ($settings?->tawk_status == 1)
<script type="text/javascript">
    'use strict';
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    let propertyID = "{{ $settings?->tawk_property_id }}";
    let widgetID = "{{ $settings?->tawk_widget_id }}";
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src= `https://embed.tawk.to/${propertyID}/${widgetID}`;
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
@endif


@if ($settings?->cookie_status == 1)
    <script src="{{ asset('frontend/assets/js/cookieconsent.min.js') }}"></script>

    <script>
        "use strict";
        window.addEventListener("load", function() {
            window.wpcc.init({
                "border": "{{ $settings?->cookie_border }}",
                "corners": "{{ $settings?->cookie_corners }}",
                "colors": {
                    "popup": {
                        "background": "{{ $settings?->cookie_background_color }}",
                        "text": "{{ $settings?->cookie_text_color }} !important",
                        "border": "{{ $settings?->cookie_border_color }}"
                    },
                    "button": {
                        "background": "{{ $settings?->cookie_btn_bg_color }}",
                        "text": "{{ $settings?->cookie_btn_text_color }}"
                    }
                },
                "content": {
                    "href": "{{ url($settings?->cookie_link ?? '#') }}",
                    "message": "{{ $settings?->cookie_message }}",
                    "link": "{{ $settings?->cookie_link_text }}",
                    "button": "{{ $settings?->cookie_btn_text }}"
                }
            })
        });
    </script>
@endif
