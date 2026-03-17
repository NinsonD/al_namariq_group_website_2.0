<script src="{{ asset('global/js/jquery-3.7.1.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{ asset('admin/assets/vendor/libs/toastr/toastr.js')}}"></script>
<script src="{{ asset('admin/assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{ asset('admin/assets/js/bootstrap.js')}}"></script>
<script src="{{ asset('admin/assets/js/conca-sidebar.js')}}"></script>
<script src="{{ asset('admin/assets/js/conca.js')}}"></script>

<script>
    'use strict';

        // ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#setLanguageForm').on('change', function () {
            $(this).submit();
        });

        $('#setCurrencyForm').on('change', function () {
            $(this).submit();
        });

        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
        };


        @if (Session::has('messege'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Str::replace('.', ' ', Session::get('messege'))  }}");
                    break;
                case 'success':
                    toastr.success("{{ Str::replace('.', ' ', Session::get('messege'))  }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Str::replace('.', ' ', Session::get('messege'))  }}");
                    break;
                case 'error':
                    toastr.error("{{ Str::replace('.', ' ', Session::get('messege'))  }}");
                    break;
            }
        @endif

        @foreach (['success', 'error', 'info', 'warning'] as $msg)
            @if(Session::has($msg))
                toastr.{{ $msg }}("{{ Session::get( Str::replace('.', ' ', $msg)) }}");
            @endif
        @endforeach


        @if($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ Str::replace('.', ' ', $error) }}");
            @endforeach
        @endif


    $(function(){

        $('#searchResult, #searchResult2').hide();

            let menuData = [];

            // Collect menu links
            $('#app-sidebar-menu ul li a').each(function () {
                var href = $(this).attr('href');
                var text = $(this).text().trim();

                if (!href || href === '#' || href.startsWith('javascript')) {
                    return;
                }

                menuData.push({ href: href, text: text });
            });

            function updateSearchResults(inputSelector, resultSelector) {
                const searchValue = $(inputSelector).val().toLowerCase().trim();
                let result = '';

                if (searchValue.length > 0) {
                    menuData.forEach(function (item) {
                        if (item.text.toLowerCase().includes(searchValue)) {
                            result += '<a href="' + item.href + '">' + item.text + '</a>';
                        }
                    });

                    $(resultSelector).html(result).toggle(result !== '');
                } else {
                    $(resultSelector).hide().empty();
                }
            }


            function bindSearchEvents(inputSelector, resultSelector) {
                $(inputSelector).on('keyup focus', function () {
                    updateSearchResults(inputSelector, resultSelector);
                });

                $(resultSelector).on('click', function () {
                    $(this).hide();
                });
            }

            bindSearchEvents('#searchBox', '#searchResult');
            bindSearchEvents('#searchBox2', '#searchResult2');

            // === Initial check on page load ===
            updateSearchResults('#searchBox', '#searchResult');
            updateSearchResults('#searchBox2', '#searchResult2');

            // === Hide results if clicked outside ===
            $(document).on('click', function (e) {
                if (!$(e.target).closest('#searchBox, #searchResult, #searchBox2, #searchResult2').length) {
                    $('#searchResult, #searchResult2').hide();
                }
            });

         $('.logout-btn').on('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: "{{ __('admin.are_you_sure') }}",
                    text: "{{ __('admin.logout_confirmation') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{ __('admin.yes_logout') }}"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('.logout-form').submit();
                    }
                });
            });

        $('.show-loading-btn').on('click', function(e){
            e.preventDefault();

            var $this = $(this);
            // add loading in button
            $this.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
        })

        $('.conca-select2').each(function() {
            $(this).wrap('<div class="position-relative"></div>').select2({
                placeholder: "{{ __('admin.select_value') }}",
                dropdownParent: $(this).parent()
            });
        });

        // image upload
        $('.conca-image-upload-btn').on('click', function (e) {
            e.preventDefault();
            $(this).closest('.conca-image-upload-container').find('.image-input').trigger('click');
        });

        // Preview selected image
        $('.image-input').on('change', function () {
            let input = this;
            let container = $(this).closest('.conca-image-upload-container');
            let previewImg = container.find('img.conca-img-thumbnail');
            let resetBtn = container.find('.conca-image-reset-btn');
            let uploadBtn = container.find('.conca-image-upload-btn');

            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.attr('src', e.target.result);
                    resetBtn.removeClass('d-none');
                    uploadBtn.addClass('d-none');
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        // Reset to default image
        $('.conca-image-reset-btn').on('click', function (e) {
            e.preventDefault();
            let container = $(this).closest('.conca-image-upload-container');
            let input = container.find('.image-input');
            let previewImg = container.find('img.conca-img-thumbnail');
            let defaultImg = previewImg.data('default');

            input.val('');
            previewImg.attr('src', defaultImg);

            $(this).addClass('d-none');
            container.find('.conca-image-upload-btn').removeClass('d-none');
        });

        $(document).on('click', '.common-delete-btn', function(e){
            e.preventDefault();

            Swal.fire({
                title: "{{ __('admin.are_you_sure') }}",
                text: "{{ __('admin.you_wont_be_able_to_revert') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "{{ __('admin.yes_delete_it') }}",
                cancelButtonText: "{{ __('admin.no_cancel') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').submit();
                }
            })
        })

        if($('.tinymce').length > 0){
            tinymce.init({
                selector: ".tinymce",
                plugins:
                    "anchor autolink charmap link lists searchreplace wordcount ",
                toolbar:
                    "undo redo | blocks | bold italic underline strikethrough | link mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | removeformat",
                tinycomments_mode: "embedded",
                tinycomments_author: "Author name",
                menubar: false,
            });
        }


        const makeSlug = (text) => {
            return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/\-\-+/g, '-')
                    .replace(/^-+/, '')
                    .replace(/-+$/, '');
        }

        if($('#title').length > 0 && $('#slug').length > 0 && !$('.has-multi-lang').length > 0) {
            $("#title").on('input', function() {
                $("#slug").val(makeSlug($(this).val()));
            });
        }


        $(document).on("change", ".change-status", function (e) {
            e.preventDefault();
            const url = $(this).data("href");

            if (!url) {
                return;
            }

            $.ajax({
                url: url,
                type: "PUT",
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
                    } else {
                        toastr.warning(response.message);
                    }

                    window.location.reload();
                },
                error: function(err) {
                    console.log(err);
                    if (err.responseJSON && err.responseJSON.message) {
                        toastr.error(err.responseJSON.message);
                    } else {
                        toastr.error("{{ __('notification.something_went_wrong') }}");
                    }
                }
            });
        });

        $(document).on("change", '.conca-status-switch', function(e){
            e.preventDefault();
            var status = $(this).is(':checked') ? 1 : 0;
            $(this).val(status);
        })

        $(document).on('click', '.delete-btn', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $('#deleteForm').attr('action', url);
            $('#deleteModal').modal('show');
        })

        // reset deleteForm
        $('#deleteModal').on('hidden.bs.modal', function () {
            $('#deleteForm').attr('action', '');
        });

        $(document).on('focusout', '.quantity-field', function(e){
            e.preventDefault();
            $(this).next('.form-text').remove();
            var value = $(this).val();


            const TEXT = "{{ __('admin.quantity_must_be_at_least_1') }}";
            const ERROR_HTML = `<div class="form-text text-danger" role="alert">${TEXT}</div>`;
            if (value < 1) {
                $(this).val(1);
            }
            if (value < 1) {
                $(this).after(ERROR_HTML);
            }
        });

        $(document).on('click', '.generate-sku-btn', function(e){
            e.preventDefault();
            var sku = 'SKU-' + Math.random().toString(36).substring(2, 10).toUpperCase();
            $('#sku').val(sku);
            toastr.success("{{ __('admin.sku_generated') }}");
        });
    })

</script>
