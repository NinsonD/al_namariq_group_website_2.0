<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.png" rel="icon" />
    <title>{{__('frontend.invoice')}} - {{$settings->app_name}} </title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
    ======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

    <!-- Stylesheet
    ======================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('global/css/pdf.css')}}"/>
</head>
<body>
  <!-- Container -->
  <div class="container-fluid invoice-container">
    <!-- Header -->
    <header>
        <div class="row align-items-center gy-3">
            <div class="col-sm-7 text-center text-sm-start">
                <img id="logo" src="{{asset($settings->logo)}}" width="120" alt="{{ $settings->app_name }}" />
            </div>
            <div class="col-sm-5 text-center text-sm-end">
                <h4 class="mb-0">{{__('frontend.invoice')}}</h4>
                <p class="mb-0">{{__('frontend.order_id')}} - #{{$order->order_no}}</p>
            </div>
        </div>
        <hr>
    </header>

    <!-- Main Content -->
    <main>
        <div class="row align-items-center">
            <div class="col-sm-6 mb-3">
                <strong>{{ __('frontend.billing_to') }}</strong>
                <br>
                <span>
                    {{ $order->address->billing_full_name }}
                    <br>
                    {{ $order->address->billing_email }}
                    <br>
                    {{ $order->address->billing_phone }}
                    <br>
                    {{ $order->address->billing_address }},
                    {{ $order->address->billing_city }},
                    {{ $order->address->billing_state }},
                    {{ $order->address->billing_zip_code }},
                    {{ $order->address->billing_country }}.
                </span>
            </div>
            <div class="col-sm-6 mb-3 text-sm-end">
                <strong>{{ __('frontend.shipping_to') }}</strong>
                <br>
                <span>
                    {{ $order->address->shipping_full_name }}
                    <br>
                    {{ $order->address->shipping_email }}
                    <br>
                    {{ $order->address->shipping_phone }}
                    <br>
                    {{ $order->address->shipping_address }},
                    {{ $order->address->shipping_city }},
                    {{ $order->address->shipping_state }},
                    {{ $order->address->shipping_zip_code }},
                    {{ $order->address->shipping_country }}.
                </span>
            </div>
        </div>
        <hr class="mt-0">

        <div class="table-responsive">
            <table class="table border mb-0">
                <thead>
                    <tr class="bg-light">
                        <th class="col-5">{{__('frontend.product_title')}}</th>
                        <th class="col-2 text-end">{{__('frontend.quantity')}}</th>
                        <th class="col-2 text-end">{{__('frontend.price')}}</th>
                        <th class="col-3 text-end">{{__('frontend.total_amount')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderProducts as $product)
                    <tr>
                        <td>
                            {{$product->product_title}}
                        </td>
                        <td class="text-end">
                            {{$product->qty}}
                        </td>
                        <td class="text-end">
                        {{ getCurrencyWithSymbol($product->price_default, $order->paid_currency) }}
                        </td>
                        <td class="text-end">
                            {{ getCurrencyWithSymbol($product->price_default * $product->qty, $order->paid_currency) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-responsive mt-2">
            <table class="table mb-0">
                <tr>
                    <td colspan="2" class="text-end border-0 p-1">
                        <strong class="fw-medium">{{__('frontend.subtotal')}}:</strong>
                    </td>
                    <td class="col-sm-3 text-end border-0 p-1">
                        {{ getCurrencyWithSymbol($order->subtotal, $order->paid_currency) }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end border-0 p-1">
                        <strong class="fw-medium">{{__('frontend.discount')}}:</strong>
                    </td>
                    <td class="col-sm-3 text-end border-0 p-1">
                        (-) {{ getCurrencyWithSymbol($order->discount, $order->paid_currency) }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end border-0 p-1">
                        <strong class="fw-medium">{{__('frontend.tax')}} ({{$settings->tax}}%):</strong>
                    </td>
                    <td class="col-sm-3 text-end border-0 p-1">
                        {{ getCurrencyWithSymbol($order->tax, $order->paid_currency) }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end border-0 p-1">
                        <strong class="fw-medium">{{__('frontend.shipping_charge')}}:</strong>
                    </td>
                    <td class="col-sm-3 text-end border-0 p-1">
                        {{ getCurrencyWithSymbol($order->shipping_charge, $order->paid_currency) }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end border-0 p-1">
                        <strong class="fw-medium">{{__('frontend.gateway_charge')}} ({{$order->payment->value['gateway_charge'] ?? 0}}%):</strong>
                    </td>
                    <td class="col-sm-3 text-end border-0 p-1">
                        {{getCurrencyWithSymbol($order->gateway_charge, $order->paid_currency)}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end border-0 p-1">
                        <strong class="fw-medium">{{__('frontend.total')}}:</strong>
                    </td>
                    <td class="col-sm-3 text-end border-0 p-1">
                        {{getCurrencyWithSymbol($order->paid_amount, $order->paid_currency)}}
                    </td>
                </tr>
            </table>
        </div>
        <br>
        @if ($order->payment_status == 'refund' )
        <p class="text-1 text-muted ">
            <strong>{{__('frontend.status')}}: </strong> <span class="tp-badge failed">{{__('frontend.refunded')}}</span>
        </p>
        @endif
    </main>
    <!-- Footer -->
    <footer class="text-center">
        <hr>
        <div class="btn-group btn-group-sm d-print-none">
            <button type="button" class="btn btn-light border text-black-50 shadow-none print-btn">
                <i class="fa fa-print"></i> {{__('frontend.print_and_download')}}
            </button>
        </div>
    </footer>
  </div>

  <!-- Back to My Account Link -->
  <p class="text-center d-print-none">
    <a href="{{route('user.dashboard')}}">&laquo; {{__('frontend.back_to_my_account')}}</a>
  </p>

  <!-- Scripts -->
   <script type="text/javascript" src="{{asset('global/js/jquery-3.7.1.js')}}"></script>
   <script type="text/javascript" src="{{asset('global/js/pdf.js')}}"></script>

</body>
</html>
