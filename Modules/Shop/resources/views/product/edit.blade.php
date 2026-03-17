@extends('core::layout.app')

@section('title', __('admin.edit_product'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.all_products'), 'url' => route('admin.product.index')],
        ['label' => __('admin.edit_product')]
    ]
])
@endsection

@section('content')

@php
    $code = request()->get('code', 'en');
    $tags = implode(', ', collect($product->tags)->pluck('value')->toArray());
    $gallery = $product->gallery;
@endphp
@can('product-edit')


<x-admin.language-nav route="admin.product.edit" :params="['product' => $product->id]" />

<form id="product-edit-form" class="app-content-pb-0" action="{{ route('admin.product.update', ['product' => $product->id, 'code' => $code]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-card :heading="__('admin.edit_product')" :route="route('admin.product.index')" btnType="back">

        <div class="row gy-5 mb-5">
            <div class="col-md-12 {{ hideDivLang($code) }}">
                <x-image-uploader name="image" :label="__('attribute.image')" :value="$product->image" />
                <x-input-error field="image" />
            </div>
            <div class=" {{ str_contains(hideDivLang($code), 'd-none') ? 'col-md-12' : 'col-md-6' }}">
                <x-input-label for="title" :value="__('attribute.title')" />
                <x-text-input id="title" name="title" :value="old('title', $product->getTranslation($code)?->title)"/>
                <x-input-error field="title" />
            </div>

            <div class="col-md-6 {{ hideDivLang($code) }}">
                <x-input-label for="slug" :value="__('attribute.slug')" />
                <x-text-input id="slug" name="slug" :value="old('slug', $product->slug)"/>
                <x-input-error field="slug" />
            </div>


            <div class="col-md-6 {{ hideDivLang($code) }}">
                <x-input-label for="price" :value="__('attribute.price')" />
                <x-text-input id="price" class="price-field" name="price" type="number" step=".01" :value="old('price', $product->price)"/>
                <x-input-error field="price" />
            </div>
            <div class="col-md-6 {{ hideDivLang($code) }}">
                <x-input-label for="sale_price" :value="__('attribute.sale_price')" />
                <x-text-input id="sale_price" class="price-field" name="sale_price" type="number" step=".01" :value="old('sale_price', $product->sale_price)"/>
                <x-input-error field="sale_price" />
            </div>

             <div class="col-md-4 {{ hideDivLang($code) }}">
                <div class="">
                    <x-input-label for="sku" :value="__('attribute.sku')" />
                    -
                    <button type="button" class="generate-sku-btn text-success">({{ __('admin.generate_sku') }})</button>
                </div>
                <x-text-input id="sku" name="sku" :value="old('sku', $product->sku)"/>
                <x-input-error field="sku" />
            </div>

            <div class="col-md-4 {{ hideDivLang($code) }}">
                <x-input-label for="quantity" :value="__('attribute.quantity')" />
                <x-text-input class="quantity-field" id="quantity" name="qty" type="number" :value="old('qty', $product->qty)"/>
                <x-input-error field="quantity" />
            </div>

            <div class="col-md-4 {{ hideDivLang($code) }}">
                <x-input-label for="product_category_id" :value="__('attribute.category')" />
                <select name="product_category_id" id="product_category_id" class="form-select conca-select2">
                    <option value="">{{ __('admin.select_category') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('product_category_id', $product->product_category_id) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
                <x-input-error field="product_category_id" />
            </div>

            <div class="col-md-12">
                <x-input-label for="short_description"  :value="__('attribute.short_description')" />
                <x-textarea name="short_description" id="short_description" rows="7" :value="old('short_description', $product->getTranslation($code)?->short_description)" />
                <x-input-error field="short_description" />
            </div>

            <div class="col-md-12">
                <x-input-label for="description" :value="__('attribute.description')" />
                <textarea  id="description" name="description" rows="7" class="form-control tinymce">{{ $product->getTranslation($code)?->description }}</textarea>
                <x-input-error field="description" />
            </div>



            <div class="col-md-12 {{ hideDivLang($code) }}">
                <x-input-label for="tags" :value="__('attribute.tags')" />
                <input id="tagifyBasic" class="form-control" name="tags" value="{{ old('tags', $tags) }}" />
                <x-input-error field="tags" />
            </div>

            <div class="col-md-12">
                <x-input-label for="seo_title" :value="__('attribute.seo_title')" />
                <x-text-input id="seo_title" name="seo_title" :value="old('seo_title', $product->getTranslation($code)?->seo_title)"/>
                <x-input-error field="seo_title" />
            </div>

            <div class="col-md-12">
                <x-input-label for="seo_description" :value="__('attribute.seo_description')" />
                <x-textarea name="seo_description" id="seo_description" rows="7" :value="old('seo_description', $product->getTranslation($code)?->seo_description)" />
                <x-input-error field="seo_description" />
            </div>

            <div class="d-flex flex-wrap aliign-items-center gap-8 {{ hideDivLang($code) }}">
                <div class="mb-5">
                    <x-input-switch name="is_popular" :label="__('attribute.set_as_popular')" :checked="old('is_popular', $product->is_popular)" />
                </div>

                <div class="mb-5">
                    <x-input-switch name="is_new" :label="__('attribute.set_as_new')" :checked="old('is_new', $product->is_new)" />
                </div>
                <div class="mb-5">
                    <x-input-switch name="status" :label="__('attribute.status')" :checked="old('status', $product->status)" />
                </div>
            </div>
            <div class="col-md-12">
                    <h5>{{ __('attribute.additional_information') }}</h5>

                <div class="form-repeater">
                    <div data-repeater-list="additional_information">
                        @if (count($product->getTranslation($code)?->additional_information) > 0)
                            @foreach ($product->getTranslation($code)?->additional_information as $item)
                            <div data-repeater-item>
                                <div class="row mb-4">
                                    <div class="col">
                                        <x-input-label for="key" :value="__('attribute.key')" />
                                        <x-text-input id="key" name="key" :value="$item['key']" />
                                    </div>
                                    <div class="col">
                                        <x-input-label for="value" :value="__('attribute.value')" />
                                        <x-text-input id="value" name="value" :value="$item['value']" />
                                    </div>
                                    <div class="col d-flex align-items-end">
                                        <button class="btn btn-label-danger gap-1" type="button" data-repeater-delete>
                                            <svg width="12" height="12" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 0.999939L1 14.9999M1 0.999939L15 14.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            {{ __('admin.delete') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif

                        <div data-repeater-item>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label for="key" :value="__('attribute.key')" />
                                    <x-text-input id="key" name="key" />
                                </div>
                                <div class="col">
                                    <x-input-label for="value" :value="__('attribute.value')" />
                                    <x-text-input id="value" name="value" />
                                </div>
                                <div class="col d-flex align-items-end">
                                    <button class="btn btn-label-danger gap-1" type="button" data-repeater-delete>
                                        <svg width="12" height="12" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 0.999939L1 14.9999M1 0.999939L15 14.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ __('admin.delete') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <button class="btn btn-sm btn-label-primary" type="button" data-repeater-create>{{ __('admin.add_new') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <x-admin.button-update />
        </x-slot>

    </x-card>

</form>

<form action="{{ route('admin.product.gallery', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-card :heading="__('admin.product_gallery')">


        @if ($gallery && $gallery->count() > 0)
        <div class="image-preview-container row g-4 row-cols-1 row-cols-sm-2 row-cols-md-4 mb-6">
            @foreach ($gallery as $item )
                <div class="col">
                    <div class="gallery-image-preview">
                        <img class=" img-thumbnail" src="{{asset($item->image)}}" alt="{{ $product->title }}">
                        <button type="button" class="remove-single-image" data-image-id="{{$item->id}}" data-field="images">
                            <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 1.98608L1 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M1 1.98608L9 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        @endif

        <div data-uploader>
            <div class="image-uploader">
                <button type="button" class="btn btn-sm btn-label-primary upload-image-btn mb-3">
                    {{__('admin.upload_images')}}
                </button>
                <input hidden type="file" class="image-input" name="images[]" accept=".jpg,.jpeg,.png" multiple>
                <div class="image-preview-container row g-4 row-cols-1 row-cols-sm-2 row-cols-md-4 mb-6 d-none" data-preview-container>
                    <!-- Image previews will appear here -->
                </div>

                 {{-- Show validation error --}}
                @if ($errors->has('images') || $errors->has('images.*'))
                    <div class="text-danger mt-2 small">
                        @foreach ($errors->get('images') as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                        @foreach ($errors->get('images.*') as $subErrors)
                            @foreach ($subErrors as $error)

                                <div>{{ Str::replace('.', ' ', $error) }}</div>
                            @endforeach
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

         <x-slot name="footer">
            <x-admin.button-save />
        </x-slot>
    </x-card>
</form>

@endcan

@endsection


@push('css')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/tagify/tagify.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/toastr/toastr.css') }}" />

@endpush

@push('js')
<script src="{{ asset('admin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/tagify/tagify.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/toastr/toastr.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
<script>
    'use strict';
    $(function(){
        const tagifyBasicEl = document.querySelector('#tagifyBasic');
        const TagifyBasic = new Tagify(tagifyBasicEl);

        $('.form-repeater').repeater({
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if(confirm("{{ __('admin.are_your_sure_delete') }}")) {
                    $(this).slideUp(deleteElement);
                }
            }
        });


        $(document).on('click', '.remove-single-image', function (e) {
            e.preventDefault();
            let image_id = $(this).data('image-id');

            Swal.fire({
                title: "{{ __('admin.are_you_sure') }}",
                text:"{{ __('admin.you_wont_be_able_to_revert') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "{{ __('admin.yes_delete_it') }}",
                cancelButtonText: "{{ __('admin.no_cancel') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.product.gallery.delete', ['id' => $product->id]) }}",
                        type: 'POST', // Correct HTTP method
                        data: {
                            '_method': 'DELETE',
                            'image_id': image_id,
                        },
                        beforeSend: function () {
                            Swal.fire({
                                title: "{{ __('notification.please_wait') }}",
                                html: "{{ __('notification.deleting_image') }}",
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                            });
                        },
                        success: function (response) {
                            $(this).closest('.gallery-image-preview').remove();
                            toastr.success("{{ __('notification.image_deleted_successfully') }}");
                            window.location.reload();
                        },
                        error: function (xhr) {
                            if (xhr.status == 404) {
                                toastr.error(xhr.responseJSON.message);
                            } else {
                                toastr.error("{{ __('notification.something_went_wrong') }}");
                            }
                        },
                        complete: function () {
                            Swal.close();
                        }
                    });
                }
            });
        });


        // Select all uploaders by the data-uploader attribute
        const uploaders = document.querySelectorAll('[data-uploader]');

        uploaders.forEach(uploader => {
            const input = uploader.querySelector('.image-input');
            const previewContainer = uploader.querySelector('[data-preview-container]');
            const uploadButton = uploader.querySelector('.upload-image-btn');

            // Store currently uploaded files
            let currentFiles = [];

            // Open file dialog when upload button is clicked
            uploadButton.addEventListener('click', function () {
                input.click();
            });

            // Handle image selection
            input.addEventListener('change', function () {
                // Store the selected files in a variable
                let files = Array.from(input.files);

                files.forEach((file) => {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        // Create preview element
                        const column = document.createElement('div');
                        column.classList.add('col');

                        const preview = document.createElement('div');
                        preview.classList.add('gallery-image-preview', 'd-flex');
                        preview.setAttribute('data-file-name', file.name); // Track file name for removal
                        column.appendChild(preview);

                        // Image element
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        preview.appendChild(img);

                        // Remove button
                        const removeIcon = `<svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 1.98608L1 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M1 1.98608L9 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>`;
                        const removeBtn = document.createElement('button');
                        removeBtn.classList.add('remove-image');
                        removeBtn.innerHTML = removeIcon;
                        removeBtn.addEventListener('click', (e) => {
                            e.preventDefault();
                            removeImage(preview, file.name); // Pass the file name for removal
                        });
                        preview.appendChild(removeBtn);

                        // Add preview to container
                        previewContainer.appendChild(column);
                        previewContainer.classList.remove('d-none');

                        // Add the file to the current files array
                        currentFiles.push(file);
                    };

                    reader.readAsDataURL(file);
                });
            });

            // Function to handle image removal
            function removeImage(previewElement, fileName) {
                // Remove the specific preview element
                previewElement.parentElement.remove(); // Remove the entire column

                // Filter out the file to be removed
                currentFiles = currentFiles.filter(file => file.name !== fileName);

                // Create a new DataTransfer object
                const dataTransfer = new DataTransfer();
                currentFiles.forEach(file => dataTransfer.items.add(file)); // Add remaining files

                // Update the input with the new file list
                input.files = dataTransfer.files;

                // Hide the preview container if no images are left
                if (currentFiles.length === 0) {
                    previewContainer.classList.add('d-none');
                }
            }
        });

    })
</script>

@endpush
