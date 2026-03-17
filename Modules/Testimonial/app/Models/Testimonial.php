<?php

namespace Modules\Testimonial\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Testimonial\Models\TestimonialTranslation;

class Testimonial extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['image', 'rating', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getNameAttribute(): ?string
    {
        return $this->translatedAttribute('name');
    }

    public function getDesignationAttribute(): ?string
    {
        return $this->translatedAttribute('designation');
    }

    public function getCommentAttribute(): ?string
    {
        return $this->translatedAttribute('comment');
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
        return $this->hasMany(TestimonialTranslation::class, 'testimonial_id');
    }

    public function translation()
    {
        $locale = getSiteLocale();

        return $this->hasOne(TestimonialTranslation::class)->where('locale', $locale)
            ->withDefault(function ($translation, $testimonial) {
                $fallback = $testimonial->translations()->where('locale', 'en')->first();

                if ($fallback) {
                    $translation->fill($fallback->getAttributes());
                }
            });
    }
}
