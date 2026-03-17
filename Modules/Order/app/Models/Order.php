<?php

namespace Modules\Order\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Models\OrderProduct;
use Modules\Order\Models\Refund;
use Modules\Payment\Models\Payment;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'order_no',

        // default currency values
        'subtotal_default',
        'tax_default',
        'discount_default',
        'shipping_charge_default',
        'amount_default',

        // user’s paid currency values
        'subtotal',
        'tax',
        'discount',
        'shipping_charge',
        'paid_amount',

        // gateway charges
        'gateway_charge',
        'payable_with_charge',
        'paid_currency',

        // payment
        'payment_method',
        'transaction_id',
        'payment_status',
        'payment_details',

        // order
        'order_status',
        'order_note',
    ];


    protected $casts = [
        'payment_details' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function refund()
    {
        return $this->hasOne(Refund::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_method');
    }

    public function getUserPaidAmountAttribute()
    {
        return $this->paid_amount . ' ' . $this->paid_currency;
    }

    public function address()
    {
        return $this->hasOne(OrderAddress::class);
    }

    public function getOrderPayment()
    {
       $payment = Payment::where('id', $this->payment_method)->first();
       return $payment ? $payment : null;
    }

    public function getOrderPaymentMethodAttribute()
    {
        return $this->getOrderPayment() ?? null;
    }

    public function getUserTotalSpentAttribute()
    {
        $user_id = auth()->user()->id;
        return Order::where('user_id', $user_id)->where('payment_status', 'success')->sum('amount_default');
    }
}
