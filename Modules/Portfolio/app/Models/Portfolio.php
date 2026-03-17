<?php

namespace Modules\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Portfolio\Models\PortfolioTranslation;

class Portfolio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'image',
        'website',
        'website_url',
        'client',
        'year',
        'tags',
        'status'
    ];


    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'tags' => 'array',
        'year' => 'integer',
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

    public function getRoleAttribute(): ?string
    {
        return $this->translatedAttribute('role');
    }


    public function getServiceAttribute(): ?string
    {
        return $this->translatedAttribute('service');
    }

    public function getDurationAttribute(): ?string
    {
        return $this->translatedAttribute('duration');
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
        return $this->hasMany(PortfolioTranslation::class, 'portfolio_id');
    }

    public function translation()
    {
        $locale = getSiteLocale();

        return $this->hasOne(PortfolioTranslation::class)->where('locale', $locale)
            ->withDefault(function ($translation, $portfolio) {
                $fallback = $portfolio->translations()->where('locale', 'en')->first();

                if ($fallback) {
                    $translation->fill($fallback->getAttributes());
                }
            });
    }
}
