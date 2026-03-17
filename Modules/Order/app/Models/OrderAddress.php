<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Models\Order;

class OrderAddress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
     protected $fillable = [
        'order_id',

        // Billing
        'billing_first_name',
        'billing_last_name',
        'billing_email',
        'billing_phone',
        'billing_address',
        'billing_province',
        'billing_city',
        'billing_zip_code',
        'billing_country',

        // Shipping
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_phone',
        'shipping_address',
        'shipping_province',
        'shipping_city',
        'shipping_zip_code',
        'shipping_country',
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getBillingFullNameAttribute()
    {
        return $this->billing_first_name . ' ' . $this->billing_last_name;
    }

    public function getShippingFullNameAttribute()
    {
        return $this->shipping_first_name . ' ' . $this->shipping_last_name;
    }

}
