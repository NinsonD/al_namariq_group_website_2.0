<?php

namespace Modules\Payment\Enums;

enum PaymentMethodEnum:string
{
    case STRIPE = 'stripe';
    case PAYPAL = 'paypal';
    case COD = 'cash_on_delivery';
}
