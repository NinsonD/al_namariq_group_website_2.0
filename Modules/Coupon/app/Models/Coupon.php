<?php

namespace Modules\Coupon\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Coupon\Models\CouponHistory;

class Coupon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['author_id', 'coupon_code', 'min_price', 'discount', 'discount_type', 'per_user_limit', 'start_date', 'end_date', 'status', 'image'];


    public function couponHistories()
    {
        return $this->hasMany(CouponHistory::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true)->where('start_date', '<=', now())->where('end_date', '>=', now());
    }

    public function isValidByPrice($price)
    {
        return $price >= $this->min_price;
    }

    public function isValidByDate()
    {
        return $this->start_date <= now() && $this->end_date >= now();
    }

    public function isLimitExceeded($userId)
    {
        return $this->couponHistories()->where('user_id', $userId)->count() >= $this->per_user_limit;
    }
    public function getDiscountAmountAttribute()
    {
        return $this->discount_type === 'percentage' ? round($this->discount) . '%' : themeCurrency($this->discount);
    }
}
