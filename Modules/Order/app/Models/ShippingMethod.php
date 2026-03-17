<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;
use Modules\Order\Models\ShippingMethodTranslation;

class ShippingMethod extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['fee', 'min_amount', 'min_days', 'max_days', 'is_free', 'status', 'default'];


    public function scopeActive()
    {
        return $this->where('status', true);
    }


    public function getTitleAttribute(): ?string
    {
        return $this->translatedAttribute('title');
    }


    protected function translatedAttribute(string $key): ?string
    {
        $locale = getSiteLocale();

        $translation = $this->translations->where('locale', $locale)->first()
            ?? $this->translations->where('locale', 'en')->first();

        return $translation?->$key;
    }


    public function getTranslation($code)
    {
        $translation = $this->translations->where('locale', $code)->first();

        if (!$translation && $code !== 'en') {
            $translation = $this->translations->where('locale', 'en')->first();
        }

        return $translation;
    }


    public function translations()
    {
        return $this->hasMany(ShippingMethodTranslation::class, 'shipping_method_id');
    }

    public function translation()
    {
        $locale = getSiteLocale();

        return $this->hasOne(ShippingMethodTranslation::class)->where('locale', $locale)
            ->withDefault(function ($translation, $blog) {
                $fallback = $blog->translations()->where('locale', 'en')->first();

                if ($fallback) {
                    $translation->fill($fallback->getAttributes());
                }
            });
    }

    protected static function booted()
    {
        static::saved(fn() => Cache::forget('shipping_methods'));
        static::deleted(fn() => Cache::forget('shipping_methods'));
    }
}
