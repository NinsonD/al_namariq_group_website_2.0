@extends('core::layout.app')

@section('title', __('admin.orders') . '-'. $order->order_no)

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.orders'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.orders'), 'url' => route('admin.orders.index')],
        ['label' => $order->order_no]
    ]
])
@endsection

@section('content')

@can('order-edit')
<form action="{{ route('admin.orders.update', ['order' => $order->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <x-card :heading="__('admin.edit_order')" :route="route('admin.orders.index')" btnType="back">

        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>
                            {{ __('admin.customer') }}
                        </th>
                        <th>
                            {{ __('admin.payment_status') }}
                        </th>
                        <th>
                            {{ __('admin.status') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="{{ route('admin.user.edit' , ['user' => $order->user->id]) }}">
                                {{ $order->user->name }}
                            </a>
                        </td>
                        <td>

                            <span class="custom-badge {{ $order->payment_status  }}">
                            {{ $order->payment_status }}
                            </span>
                        </td>
                        <td>

                            <select name="order_status" class="form-select">
                                <option value="draft" {{ $order->order_status == 'draft' ? 'selected' : '' }}>{{ __('admin.draft') }}</option>
                                <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>{{ __('admin.pending') }}</option>
                                <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>{{ __('admin.processing') }}</option>
                                <option value="success" {{ $order->order_status == 'success' ? 'selected' : '' }}>{{ __('admin.success') }}</option>
                                <option value="rejected" {{ $order->order_status == 'rejected' ? 'selected' : '' }}>{{ __('admin.rejected') }}</option>
                                <option value="refund" {{ $order->order_status == 'refund' ? 'selected' : '' }}>{{ __('admin.refund') }}</option>
                            </select>

                            <x-input-error field="order_status" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-card>
</form>


<x-card :heading="__('admin.order_details')">
    <div id="order_invoice_print">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center mb-4 justify-content-between flex-wrap gap-5">
                    <div class="ps-6">
                        <img width="120" src="{{ asset($settings->logo) }}" alt="{{ $settings->app_name }}">
                    </div>
                    <div class="pe-6">
                        <h2>{{ __('admin.invoice') }}</h2>
                        <h6>
                            {{ __('admin.order_id') }} - <i>#{{ $order->order_no }}</i>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <table class="table" width="100%">
                    <tr>
                        <td>
                            <h6>{{ __('admin.billed_to') }}</h6>
                            <address class=" text-black">

                                <b>{{ $order->address->billing_first_name }}  {{ $order->address->billing_last_name }}</b> <br>
                                {{ $order->address->billing_email }}<br>
                                {{ $order->address->billing_phone }}<br>
                                {{ $order->address->billing_address }}<br>
                                {{ $order->address->billing_province }}<br>
                                {{ $order->address->billing_city }}<br>
                                {{ $order->address->billing_zip_code }}<br>
                                {{ $order->address->billing_country }}<br>
                            </address>

                            <h6>{{ __('admin.payment_method') }}</h6>
                            <p class="text-black text-capitalize">
                                {{ $order->getOrderPayment() ? Str::replace('_', ' ', $order->getOrderPayment()->key) : null }}
                            </p>
                            <h6>{{ __('admin.transaction_id') }}</h6>
                            <p class="text-black">
                                {{ $order->transaction_id }}
                            </p>
                        </td>
                        <td>
                            <h6>{{ __('admin.shipped_to') }}</h6>
                            <address class=" text-black">
                                <b>{{ $order->address->shipping_first_name }}  {{ $order->address->shipping_last_name }}</b> <br>
                                {{ $order->address->shipping_email }}<br>
                                {{ $order->address->shipping_phone }}<br>
                                {{ $order->address->shipping_address }}<br>
                                {{ $order->address->shipping_province }}<br>
                                {{ $order->address->shipping_city }}<br>
                                {{ $order->address->shipping_zip_code }}<br>
                                {{ $order->address->shipping_country }}<br>
                            </address>

                            <h6>{{ __('admin.order_date') }}</h6>
                            <p class="text-black text-capitalize">
                                {{ $order->created_at }}
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row  mt-10">
            <div class="col-md-12">
                <h5 class="mb-4">
                    {{ __('admin.order_items') }}
                </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>
                                    {{ __('admin.sn') }}
                                </th>
                                <th>
                                    {{ __('admin.product_title') }}
                                </th>
                                <th>
                                    {{ __('admin.quantity') }}
                                </th>
                                <th>
                                    {{ __('admin.unit_price') }}
                                </th>
                                <th>
                                    {{ __('admin.amount') }}
                                </th>
                            </tr>
                        </thead>
                        @php
                            $products = $order->orderProducts;
                        @endphp
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->product_title }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ getCurrencyWithSymbol($product->price, $order->paid_currency) }}</td>
                                <td>{{ getCurrencyWithSymbol($product->price * $product->qty, $order->paid_currency) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                 <div class="text-end pe-3 ss-dashboard-order-details-summary">
                    <p>{{ __('admin.subtotal') }}:
                        <strong>{{ getCurrencyWithSymbol($order->subtotal, $order->paid_currency) }}</strong>
                    </p>
                    <p>{{ __('admin.discount') }}:
                        <strong>(-) {{ getCurrencyWithSymbol($order->discount, $order->paid_currency) }}</strong>
                    </p>
                    <p>{{ __('admin.tax') }}:
                        <strong>{{ getCurrencyWithSymbol($order->tax, $order->paid_currency) }}</strong>
                    </p>
                    <p>{{ __('admin.shipping_charge') }}:
                        <strong>{{ $order->shipping_charge > 0 ? getCurrencyWithSymbol($order->shipping_charge, $order->paid_currency) : __('Free') }}</strong>
                    </p>
                    <p>{{ __('admin.gateway_charge') }}:
                        <strong>{{ getCurrencyWithSymbol($order->gateway_charge, $order->paid_currency) }}</strong>
                    </p>
                    <p>{{ __('admin.total_payment') }}:
                        <strong>{{ getCurrencyWithSymbol($order->paid_amount, $order->paid_currency) }}</strong>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <div class="text-md-right">
        <div class="float-lg-left mb-lg-0 mb-3">
                <button class="btn btn-success gap-2" id="printInvoiceBtn">
                    <i class="fas fa-print"></i>
                    {{ __('admin.print') }}
                </button>

                <button type="button" data-bs-toggle="modal" data-bs-target="#orderPaymentStatus" class="btn btn-primary gap-2">
                    <i class="fas fa-credit-card"></i>
                    {{ __('admin.payment_status') }}
                </button>

                <button type="button" class="btn btn-label-danger gap-2" data-bs-toggle="modal" data-bs-target="#orderDeleteModal">
                    <i class="fas fa-times"></i>
                    {{ __('admin.delete_order') }}
                </button>


        </div>
    </div>

</x-card>

 <!--Order Status Modal -->
<div class="modal fade" id="orderDeleteModal" tabindex="-1" role="dialog" aria-labelledby="orderDeleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('admin.are_you_sure') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                {{ __('admin.are_you_sure_you_want_to_delete_this_order') }}
                <form action="{{ route('admin.orders.destroy', ['order' => $order->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer mt-5">
                        <button type="button" class="btn btn-outline-secondary-custom" data-bs-dismiss="modal">{{ __('admin.close') }}</button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('admin.yes_delete_it') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

 <!--Order Status Modal -->
<div class="modal fade" id="orderStatusUpdate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('admin.order_status_update') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{ route('admin.orders.status-update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="order_status" id="order_status">
                        <p>{{ __('admin.are_you_sure_you_want_to_update_the_order_status') }}</p>
                        <div class="modal-footer mt-5">
                            <button type="button" class="btn btn-outline-secondary-custom" data-bs-dismiss="modal">{{ __('admin.close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('admin.update_and_send_mail') }}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!--Payment Reject Modal -->
<div class="modal fade" id="orderPaymentStatus" tabindex="-1" role="dialog" aria-labelledby="orderPaymentStatus"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('admin.payment_status') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.orders.payment-status', ['id' => $order->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-input-label for="payment_status" :value="__('admin.payment_status')" />
                    <select name="payment_status" id="payment_status" class="form-select">
                        <option value="pending" @if ($order->payment_status === 'pending') selected @endif>{{ __('admin.pending') }}</option>
                        <option value="success" @if ($order->payment_status === 'success') selected @endif>{{ __('admin.success') }}</option>
                        <option value="rejected" @if ($order->payment_status === 'rejected') selected @endif>{{ __('admin.rejected') }}</option>
                        <option value="refund" @if ($order->payment_status === 'refund') selected @endif>{{ __('admin.refund') }}</option>
                    </select>
                    <x-input-error field="payment_status" />
                    <div class="modal-footer mt-5">
                        <button type="button" class="btn btn-outline-secondary-custom" data-bs-dismiss="modal">{{ __('admin.close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('admin.update_and_send_mail') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection

@push('js')
    <script>
        $(function() {
            $('[name="order_status"]').on('change', function(e) {
                e.preventDefault();
                let order_status = $(this).val();
                $('#order_status').val(order_status);
                $('#orderStatusUpdate').modal('show');
            });

            $(document).on("click", "#printInvoiceBtn", function(e) {
                let body = document.body.innerHTML;
                let data = document.getElementById('order_invoice_print').innerHTML;
                document.body.innerHTML = data;
                document.title = "invoice-#{{ $order->order_no }}";
                window.print();
                document.body.innerHTML = body;
            });
        });
    </script>
@endpush
