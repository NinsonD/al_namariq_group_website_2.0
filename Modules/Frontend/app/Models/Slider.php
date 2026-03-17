<?php

namespace Modules\Frontend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['image', 'nav_image', 'btn_link', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getTitleAttribute(): ?string
    {
        return $this->translatedAttribute('title');
    }

    public function getSubtitleAttribute(): ?string
    {
        return $this->translatedAttribute('subtitle');
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
        return $this->hasMany(SliderTranslation::class, 'slider_id');
    }

    public function translation()
    {
        $locale = getSiteLocale();

        return $this->hasOne(SliderTranslation::class)->where('locale', $locale)
            ->withDefault(function ($translation, $slider) {
                $fallback = $slider->translations()->where('locale', 'en')->first();

                if ($fallback) {
                    $translation->fill($fallback->getAttributes());
                }
            });
    }
}
