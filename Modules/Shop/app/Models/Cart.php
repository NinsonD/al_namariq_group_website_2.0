<?php

namespace Modules\Shop\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Coupon\Models\Coupon;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id', 'coupon_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->hasMany(CartItem::class);
    }

    public function loadProducts()
    {
        $this->load('items.product.translations');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }


    public function getTotalAmountAttribute()
    {
        return $this->items->sum(fn($item) => $item->product->price * $item->qty);
    }

    public function getFinalAmountAttribute()
    {
        $total = $this->total_amount;
        if ($this->coupon) {
            $discount = $this->coupon->discount_type === 'percentage'
                ? ($total * $this->coupon->discount / 100)
                : $this->coupon->discount;
            return max(0, $total - $discount);
        }
        return $total;
    }

}
