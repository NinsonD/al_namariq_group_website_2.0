<?php

use Modules\Payment\Models\Payment;

if(!function_exists('getAllPaymentMethods'))
{
    function getAllPaymentMethods(){
        return Payment::active()->get();
    }
}
