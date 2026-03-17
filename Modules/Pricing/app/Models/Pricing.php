<?php

namespace Modules\Pricing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pricing\Models\PricingTranslation;

class Pricing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['price', 'currency', 'expiration', 'serial', 'btn_url', 'status', 'show_on_home', 'is_popular'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeShowOnHome($query)
    {
        return $query->where('show_on_home', 1);
    }

    public function scopeOrderBySerial($query)
    {
        return $query->orderBy('serial', 'asc');
    }

    public function scopePopular($query)
    {
        return $query->where('is_popular', 1);
    }

    public function getTitleAttribute(): ?string
    {
        return $this->translatedAttribute('title');
    }

    public function getShortDescriptionAttribute(): ?string
    {
        return $this->translatedAttribute('short_description');
    }

    public function getDescriptionAttribute(): ?string
    {
        return $this->translatedAttribute('description');
    }

    public function getBtnTextAttribute(): ?string
    {
        return $this->translatedAttribute('btn_text');
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
        return $this->hasMany(PricingTranslation::class, 'pricing_id');
    }

    public function translation()
    {
        $locale = getSiteLocale();

        return $this->hasOne(PricingTranslation::class)->where('locale', $locale)
            ->withDefault(function ($translation, $pricing) {
                $fallback = $pricing->translations()->where('locale', 'en')->first();

                if ($fallback) {
                    $translation->fill($fallback->getAttributes());
                }
            });
    }

}
