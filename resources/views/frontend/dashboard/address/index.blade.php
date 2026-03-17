@extends('frontend.layouts.master')


@section('meta_title', __('frontend.my_addresses') . ' | ' . $settings->app_name)

@php
    extract(getSiteMenus());
@endphp

@section('header')
    @if($settings->enable_shop)
        @include('frontend.layouts.headers.header-shop', ['main_menu' => $main_menu])
    @else
        @include('frontend.layouts.headers.header-inner', ['main_menu' => $main_menu])
    @endif
@endsection


@section('content')

<!-- profile area start -->
<section class="profile__area pt-200 pb-120">
    <div class="container">
        <div class="profile__inner p-relative">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="tp-my-acount-wrap profile__tab-content mb-30">
                        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-4">
                            <h3 class="profile__info-title mb-0">
                                {{ __('frontend.my_addresses') }}
                            </h3>
                            <div class="profile__ticket-btn">
                                <a href="{{ route('user.address.create') }}" class="ss-shop-btn">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 1V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1 9H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    {{ __('frontend.add_new_address') }}
                                </a>
                            </div>
                        </div>

                        @if ($allAddress->isNotEmpty())
                        <div class="profile__ticket table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            {{ __('admin.sn') }}
                                        </th>
                                        <th scope="col">{{ __('admin.title') }}</th>
                                        <th scope="col">{{ __('admin.details') }}</th>
                                        <th scope="col">{{ __('admin.action') }}</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach($allAddress as $address)
                                    <tr>
                                        <th scope="row"> {{ ($allAddress->currentPage() - 1) * $allAddress->perPage() + $loop->iteration }}</th>
                                        <td data-info="title">{{ $address->title }}</td>
                                        <td>
                                             <address class="mb-0">
                                                {{ $address?->first_name }} {{ $address?->last_name }}<br>
                                                {{ $address?->address }}<br>
                                                {{ $address?->city }}, {{ $address?->province }}
                                                {{ $address?->zip_code }}<br>
                                                <strong>{{ __('admin.phone') }}:</strong>
                                                {{ $address?->phone }}<br>
                                                <strong>{{ __('admin.email') }}:</strong>
                                                {{ $address?->email }}
                                            </address>
                                        </td>
                                        <td>
                                            <div class="profile__ticket-btn d-flex gap-2">
                                                <a href="{{ route('user.address.edit', $address->id) }}" class="ss-order-edit-btn">
                                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.0737 2.88545C13.8189 2.07808 14.1915 1.6744 14.5874 1.43893C15.5427 0.870759 16.7191 0.853091 17.6904 1.39232C18.0929 1.6158 18.4769 2.00812 19.245 2.79276C20.0131 3.5774 20.3972 3.96972 20.6159 4.38093C21.1438 5.37312 21.1265 6.57479 20.5703 7.5507C20.3398 7.95516 19.9446 8.33578 19.1543 9.09701L9.75063 18.1543C8.25288 19.5969 7.504 20.3182 6.56806 20.6837C5.63212 21.0493 4.6032 21.0224 2.54536 20.9686L2.26538 20.9613C1.63891 20.9449 1.32567 20.9367 1.14359 20.73C0.961503 20.5234 0.986362 20.2043 1.03608 19.5662L1.06308 19.2197C1.20301 17.4235 1.27297 16.5255 1.62371 15.7182C1.97444 14.9109 2.57944 14.2555 3.78943 12.9445L13.0737 2.88545Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                    <path d="M12 3L19 10" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                    <path d="M13 21L21 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                                <button type="button" class="ss-order-edit-btn tp-btn-danger address-delete-modal-btn" data-bs-toggle="modal" data-bs-target="#deleteModal" data-action="{{ route('user.address.destroy', ['address' => $address->id]) }}">
                                                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.5 4.5L16.8803 14.5251C16.7219 17.0864 16.6428 18.3671 16.0008 19.2879C15.6833 19.7431 15.2747 20.1273 14.8007 20.416C13.8421 21 12.559 21 9.99274 21C7.42312 21 6.1383 21 5.17905 20.4149C4.7048 20.1257 4.296 19.7408 3.97868 19.2848C3.33688 18.3626 3.25945 17.0801 3.10461 14.5152L2.5 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M19 4.5H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M14.0557 4.5L13.373 3.09173C12.9196 2.15626 12.6928 1.68852 12.3017 1.39681C12.215 1.3321 12.1231 1.27454 12.027 1.2247C11.5939 1 11.0741 1 10.0345 1C8.96882 1 8.43598 1 7.99568 1.23412C7.89809 1.28601 7.80498 1.3459 7.71729 1.41317C7.32163 1.7167 7.10062 2.20155 6.6586 3.17126L6.05292 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M7.5 15.5L7.5 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M12.5 15.5L12.5 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-30 dashboard-pagination">
                            {{ $allAddress->links('components.frontend-pagination') }}
                        </div>
                        @else
                        <div class="alert alert-info">{{ __('frontend.no_address_found') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- profile area end -->

@endsection


@section('modals')
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">{{ __('frontend.delete_address') }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{ __('frontend.are_you_sure_want_to_delete_this_address') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="ss-shop-btn cancel-btn" data-bs-dismiss="modal">
            {{ __('frontend.cancel') }}
        </button>
        <form id="address-delete-form" action="" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="ss-shop-btn address-delete-btn">{{ __('frontend.delete') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


@section('footer')
    @if($settings->enable_shop)
        @include('frontend.layouts.footers.footer-shop',
        [
            'footer_menu_one' => $footer_menu_one,
            'footer_menu_two' => $footer_menu_two,
            'footer_menu_three' => $footer_menu_three,
            'footer_menu_four' => $footer_menu_four
        ])
    @else
        @include('frontend.layouts.footers.footer-inner', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
    @endif
@endsection


@push('js')
<script>
    'use strict';
    $(function(){
        $(document).on('click', '.address-delete-modal-btn', function(e) {
            e.preventDefault();
            let deletingText = "{{ __('frontend.deleting') }}";
            let form = $('#address-delete-form');
            let actionUrl = $(this).data('action');
            $('#address-delete-form').attr('action', actionUrl);
        });

        $(document).on('click', '.address-delete-btn', function(e) {
            e.preventDefault();
            let deletingText = "{{ __('frontend.deleting') }}";
            let form = $('#address-delete-form');
            $('.address-delete-btn').prop('disabled', true);
            $('.address-delete-btn').text(deletingText);
            form.submit();
        });
    })
</script>
@endpush

