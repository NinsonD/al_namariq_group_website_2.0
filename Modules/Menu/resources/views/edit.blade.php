@extends('core::layout.app')

@section('title', __('admin.edit_menu'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.edit_menu')]
    ]
])
@endsection
@php
    $menu_data = $menu->menu_items;
    $code = request()->get('code', 'en');
@endphp
@section('content')
<x-admin.language-nav route="admin.menu.edit" :params="['menu' => $menu_id]" />

    <div class="row">
        <div class="col-lg-4">
            <form id="menuBuilderForm" class="form-horizontal">
                <x-card :heading="__('admin.menu_builder')">
                    <div class="mb-3">
                        <label class="form-label" for="page-select">{{ __('admin.menu_select_page') }}</label>
                        @php
                            $defaultPageList = \Modules\Page\Traits\DefualtPageListTrait::getDefaultPageList();
                        @endphp

                        <select id="page-select" class="form-select conca-select2">
                            <option value="">{{ __('admin.menu_select_page') }}</option>
                            @foreach ($defaultPageList as $key => $page)
                                <option value="{{$key}}" data-title="{{$page}}" data-type="default" data-url="/{{$key}}">{{Str::limit($page, 20, '...')}}</option>
                            @endforeach

                            @foreach (\Modules\Page\Models\Page::all() as $page)
                            <option value="{{$page->id}}" data-title="{{$page->title}}" data-type="{{$page->type}}" data-url="/{{$page->slug}}">{{Str::limit($page->title, 20, '...')}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="text" class="form-label">{{ __('attribute.title') }}</label>
                        <div class="input-group">
                            <input type="text" class="form-control item-menu" name="text" id="text" placeholder="{{ __('attribute.title') }}">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="href" class="form-label">{{ __('attribute.slug') }}</label>
                        <input type="text" class="form-control item-menu" id="href" name="href" placeholder="{{ __('attribute.slug') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="target" class="form-label">{{ __('attribute.target') }}</label>
                        <select name="target" id="target" class="form-select item-menu">
                            <option value="_self">{{ __('attribute.self') }}</option>
                            <option value="_blank">{{ __('attribute.blank') }}</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">{{ __('attribute.tooltip') }}</label>
                        <input type="text" name="title" class="form-control item-menu" id="title" placeholder="{{ __('attribute.tooltip') }}">
                    </div>


                    <x-slot name="footer">
                        <div class="d-flex gap-3">
                            <button type="button" id="menuAddBtn" class="btn btn-primary gap-1">
                                <x-icons.plus />
                                {{ __('admin.add') }}
                            </button>

                            <button type="button" id="menuUpdateBtn" class="btn btn-success gap-1" disabled>
                                <x-icons.update />
                                {{ __('admin.update') }}
                            </button>
                        </div>
                    </x-slot>

                </x-card>
            </form>
        </div>
        <div class="col-lg-8">
            <x-card :heading="__('admin.menu_items')">

                @isset($menu)
                <form id="menuUpdateForm" action="{{route('admin.menu.update', ['menu' => $menu_id, 'code' => $code])}}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="menu_data" value="">

                    <div class="mb-2">
                        <label for="menu_title" class="form-label">{{ __('attribute.title') }}</label>
                        <input class="form-control" type="text" name="menu_title" value="{{old('menu_title', $menu->title)}}" required />
                        <div class="input-group">
                        </div>
                    </div>

                    <p class="text-secondary mb-8">
                        {{ __('admin.menu_builder_description') }}
                    </p>

                    <div class="menu-box">
                        <div class="card-body p-0">
                            <ul id="menuBuilderArea" class="sortableLists list-group">
                            </ul>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success gap-2 mt-7" id="updateMenu">
                        <x-icons.update />
                        {{ __('admin.update_menu') }}
                    </button>
                </form>

                @else
                    <div class="alert alert-warning">
                        {{ __('admin.no_menu_available') }}
                    </div>
                @endisset
            </x-card>
        </div>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/font-awesome-pro.css')}}">
    <style>
        .drag-icon{
            width: 30px;
            height: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: var(--bs-primary);
            border-radius: var(--bs-border-radius);
        }

        .list-group-item .txt{
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--bs-black);
            font-weight: 500;
            flex-grow: 1;
        }

        .list-group-item > div{
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: wrap;
        }
        .list-group-item > div:hover{
            cursor: move;
        }
        .list-group-item > div:hover .btn-group,
        .list-group-item > div:hover .opener-class{
            cursor: pointer;
        }

        .opener-class{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            background: #92DE8B;
            color: #000;
            flex-shrink: 0;
            border-radius: var(--bs-border-radius)
        }

        .menu-editor-btn{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .list-group-item{
            padding: 16px 16px;
        }
    </style>
@endpush

@push('js')
<script type="text/javascript" src="{{asset('admin/js/menu-editor.min.js')}}"></script>

    <script>
        "use strict";

        // Global slug validator
        function isValidSlug(slug) {
            slug = slug.trim();
            const slugRegex = /^\/$|^\/?[a-z0-9]+(?:-[a-z0-9]+)*$/;
            return slugRegex.test(slug);
        }

        // Show a standardized error alert
        function showError(title, message) {
            Swal.fire({
                icon: 'error',
                title: title,
                text: message,
            });
        }

        // Capitalize each word
        function capitalizeWords(str) {
            return str.replace(/\b\w/g, char => char.toUpperCase());
        }

        // Initialize menu editor
        const deletText = "{{ __('admin.are_your_sure_delete') }}";
        const editor = new MenuEditor('menuBuilderArea', deletText, {
            textConfirmDelete: "{{ __('admin.are_your_sure_delete') }}",
            textConfirmDeleteTitle: "{{ __('admin.you_wont_be_able_to_revert') }}",
            confirmButtonText: "{{ __('admin.yes_delete_it') }}",
            cancelButtonText: "{{ __('admin.no_cancel') }}",
        });

        editor.setForm($('#menuBuilderForm'));
        editor.setUpdateButton($('#menuUpdateBtn'));

        const menuData = @json($menu_data);
        editor.setData(menuData);

        // Handle page select
        $('#page-select').on('change', function () {
            const page = $('#page-select option:selected');
            let text = page.data('title') || '';
            let href = page.data('url') || '';
            const type = page.data('type');

            if (type === 'custom') {
                href = '/page' + href;
            }

            $('#text').val(capitalizeWords(text));
            $('#href').val(href);
        });

        // Validate menu item fields before adding/updating
        function validateMenuFields() {
            const text = $('#text').val().trim();
            const href = $('#href').val().trim();

            if (!text) {
                showError("{{ __('admin.oops') }}", "{{ __('admin.menu_title_required') }}");
                return false;
            }

            if (!href) {
                showError("{{ __('admin.oops') }}", "{{ __('admin.slug_is_required') }}");
                return false;
            }

            if (!isValidSlug(href)) {
                showError("{{ __('admin.oops') }}", "{{ __('admin.slug_is_invalid') }}");
                return false;
            }

            return true;
        }

        // Add menu item
        $('#menuAddBtn').on('click', function () {
            if (validateMenuFields()) {
                editor.add();
            }
        });

        // Update menu item
        $('#menuUpdateBtn').on('click', function () {
            if (validateMenuFields()) {
                editor.update();
            }
        });

        // Submit entire menu
        $('#updateMenu').on('click', function (e) {
            e.preventDefault();

            const menuTitle = $('input[name="menu_title"]').val().trim();
            const menuDataInput = $('input[name="menu_data"]');
            const menuItems = editor.getString();

            if (!menuTitle) {
                showError("{{ __('admin.oops') }}", "{{ __('admin.menu_title_required') }}");
                return;
            }

            if (JSON.parse(menuItems).length === 0) {
                showError("{{ __('admin.oops') }}", "{{ __('admin.menu_items_are_required') }}");
                return;
            }

            menuDataInput.val(menuItems);
            $('#menuUpdateForm').submit();
        });

        // Add selected page directly
        $('#btn-add-page').on('click', function () {
            const page = $('#page-select option:selected');
            editor.add({
                name: page.data('title'),
                href: page.data('url'),
                target: "_self",
                icon: "fas fa-link"
            });
        });

        $('#btnRemove').on('click', function () {
           $('#menuBuilderForm').trigger('reset');
            $('#menuUpdateBtn').prop('disabled', true);
        });


    </script>
@endpush
