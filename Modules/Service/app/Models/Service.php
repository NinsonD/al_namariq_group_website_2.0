<?php

namespace Modules\Service\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Service\Models\ServiceTranslation;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['slug', 'image', 'icon', 'status', 'tags'];

    protected $casts = [
        'tags' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
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

    public function getCategoryAttribute(): ?string
    {
        return $this->translatedAttribute('category');
    }

    public function getSeoTitleAttribute(): ?string
    {
        return $this->translatedAttribute('seo_title');
    }

    public function getSeoKeywordsAttribute(): ?string
    {
        return $this->translatedAttribute('seo_keywords');
    }

    public function getSeoDescriptionAttribute(): ?string
    {
        return $this->translatedAttribute('seo_description');
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
        return $this->hasMany(ServiceTranslation::class, 'service_id');
    }

    public function translation()
    {
        $locale = getSiteLocale();

        return $this->hasOne(ServiceTranslation::class)->where('locale', $locale)
            ->withDefault(function ($translation, $service) {
                $fallback = $service->translations()->where('locale', 'en')->first();

                if ($fallback) {
                    $translation->fill($fallback->getAttributes());
                }
            });
    }
}
