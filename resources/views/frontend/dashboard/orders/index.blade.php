@extends('frontend.layouts.master')

@section('meta_title', __('frontend.orders'))

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
    @php
        $user = auth()->user();
    @endphp
    <!-- my-acount-area-start -->
    <section class="tp-my-acount-area fix pt-110 pb-110 tp-sticky-placeholder">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="profile__tab-content">
                        <h3 class="profile__info-title mb-30">{{ __('frontend.my_orders') }}</h3>
                        @if ($orders->isNotEmpty())
                        <div class="profile__ticket table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('admin.order_id') }}</th>
                                        <th scope="col">{{ __('admin.date') }}</th>
                                        <th scope="col">{{ __('admin.amount') }}</th>
                                        <th scope="col">{{ __('admin.payment') }}</th>
                                        <th scope="col">{{ __('admin.status') }}</th>
                                        <th scope="col">{{ __('admin.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order->order_no }}</th>
                                        <td data-info="title">{{ pureDate($order->created_at) }}</td>
                                        <td data-info="amount">{{ $order->user_paid_amount }}</td>
                                        <td data-info="status">
                                            <span class="ss-badge ss-badge-{{ $order->payment_status }}">
                                                {{ ucfirst($order->payment_status) }}
                                            </span>
                                        </td>
                                        <td data-info="status">
                                            <span class="ss-badge ss-badge-{{ $order->order_status }}">
                                                {{ ucfirst($order->order_status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{ route('user.orders.show', ['id' => $order->id]) }}" class="ss-order-action-btn view" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="View Order">
                                                    <svg width="23" height="15" viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M21.5634 6.38435C21.8316 6.68146 21.98 7.06746 21.98 7.46768C21.98 7.86791 21.8316 8.25391 21.5634 8.55102C19.8657 10.3781 16.0012 13.9354 11.49 13.9354C6.97879 13.9354 3.11435 10.3781 1.41658 8.55102C1.14843 8.25391 1 7.86791 1 7.46768C1 7.06746 1.14843 6.68146 1.41658 6.38435C3.11435 4.55723 6.97879 1 11.49 1C16.0012 1 19.8657 4.55723 21.5634 6.38435Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M11.4898 10.7025C13.2758 10.7025 14.7237 9.25471 14.7237 7.46871C14.7237 5.6827 13.2758 4.23486 11.4898 4.23486C9.70382 4.23486 8.25598 5.6827 8.25598 7.46871C8.25598 9.25471 9.70382 10.7025 11.4898 10.7025Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>

                                                @if ($order->payment_status == 'pending' || $order->order_status == 'draft')
                                                <a href="{{ route('user.checkout.make-payment', ['order_id' => $order->id]) }}" class="ss-order-action-btn payment" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Pay Now">
                                                    <svg width="23" height="17" viewBox="0 0 23 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.51194H21.47M15.1717 12.0223H17.5336M2.57462 1H19.8954C20.765 1 21.47 1.70498 21.47 2.57462V14.3842C21.47 15.2539 20.765 15.9588 19.8954 15.9588H2.57462C1.70498 15.9588 1 15.2539 1 14.3842V2.57462C1 1.70498 1.70498 1 2.57462 1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                                @endif

                                                @if ($order->payment_status === 'success' && in_array($order->order_status, ['success', 'process', 'pending']))
                                                <button class="ss-order-action-btn refund" data-bs-toggle="modal" data-bs-target="#refundModal-{{ $order->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refund Request">
                                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.3462 12.6925L19.2692 11.9617M19.2692 11.9617L20 14.8848M19.2692 11.9617C18.6201 13.8013 17.4407 15.4073 15.8802 16.5777C14.3196 17.7481 12.4476 18.4304 10.4999 18.5385C8.69948 18.5388 6.9426 17.9849 5.46788 16.9521C3.99317 15.9193 2.87211 14.4575 2.25696 12.7654M4.65378 6.84662L1.73076 7.57739M1.73076 7.57739L1 4.65433M1.73076 7.57739C2.95843 4.21587 6.72908 1 10.4998 1C12.309 1.00508 14.0723 1.56964 15.548 2.61627C17.0238 3.66291 18.1397 5.14038 18.7427 6.84613M10.4999 6.11507V3.92277M8.30777 11.9602C8.30777 13.0563 9.28698 13.4217 10.5 13.4217M10.5 13.4217C11.7131 13.4217 12.6923 13.4217 12.6923 11.9602C12.6923 9.7679 8.30777 9.7679 8.30777 7.5756C8.30777 6.11407 9.28698 6.11407 10.5 6.11407C11.7131 6.11407 12.6923 6.66945 12.6923 7.5756M10.5 13.4217L10.4999 15.6149" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>


                                                @push('modal-stack')
                                                <!-- Modal -->
                                                <div class="modal fade refund-modal" id="refundModal-{{ $order->id }}" tabindex="-1" aria-labelledby="refundModal-{{ $order->id }}Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="refundModal-{{ $order->id }}Label">
                                                                    {{ __('frontend.refund_request') }}
                                                                </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                @if ($order->refund)
                                                                    <p class="mb-2"><strong>{{ __('frontend.status') }}:</strong> {{ ucfirst($order->refund->status) }}</p>
                                                                    <p class="mb-2"><strong>{{ __('frontend.reason') }}:</strong> {{ $order->refund->reason }}</p>
                                                                    @if ($order->refund->admin_response)
                                                                        <p class="mb-2"><strong>{{ __('frontend.admin_response') }}:</strong> {{ $order->refund->admin_response }}</p>
                                                                    @endif
                                                                    @if ($order->refund->status === 'pending')
                                                                        <p>
                                                                            {{ __('frontend.you_can_contact_support_if_you_have_any_questions') }}
                                                                        </p>
                                                                    @elseif ($order->refund->status === 'rejected')
                                                                        <p>{{ __('frontend.your_refund_request_has_been_rejected') }}</p>
                                                                    @elseif ($order->refund->status === 'success')
                                                                        <p>{{ __('frontend.your_refund_request_has_been_approved') }}</p>
                                                                    @endif

                                                                <div class="ss-refund-modal-footer d-flex align-items-center justify-content-end gap-2">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                        {{ __('frontend.close') }}
                                                                    </button>
                                                                </div>
                                                                @else
                                                                <form action="{{ route('user.refund-request') }}" method="POST">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                                    <div class="mb-2">
                                                                        <label for="reason-{{ $order->id }}" class="form-label">{{ __('frontend.reason') }}</label>
                                                                        <textarea id="reason-{{ $order->id }}" name="reason" rows="3" required></textarea>
                                                                        <x-input-error :field="'reason-{{ $order->id }}'" />
                                                                    </div>
                                                                    <div class="ss-refund-modal-footer d-flex align-items-center justify-content-end gap-2">
                                                                        <button type="button" class="ss-shop-btn cancel-btn" data-bs-dismiss="modal">
                                                                            {{ __('frontend.close') }}
                                                                        </button>
                                                                        <button type="submit" class="ss-shop-btn">{{ __('frontend.submit') }}</button>
                                                                    </div>
                                                                </form>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endpush
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-30 dashboard-pagination">
                            {{ $orders->links('components.frontend-pagination') }}
                        </div>
                        @else
                        <div class="alert alert-info">{{ __('frontend.no_orders_found') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my-acount-area-end -->
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

        $(function() {
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        });
    </script>
@endpush
