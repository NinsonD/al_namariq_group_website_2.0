<?php

namespace Modules\Brand\Models;

use Modules\Brand\Models\BrandTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['url', 'image', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getTitleAttribute()
    {
        $locale = getSiteLocale();

        $translation = $this->translations->where('locale', $locale)->first();

        if (!$translation && $locale !== 'en') {
            $translation = $this->translations->where('locale', 'en')->first();
        }

        return $translation?->title;
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
        return $this->hasMany(BrandTranslation::class, 'brand_id');
    }

    public function translation()
    {
        $locale = getSiteLocale();

        return $this->hasOne(BrandTranslation::class)->where('locale', $locale)
            ->withDefault(function ($translation, $brand) {
                $fallback = $brand->translations()->where('locale', 'en')->first();

                if ($fallback) {
                    $translation->fill($fallback->getAttributes());
                }
            });
    }
}
