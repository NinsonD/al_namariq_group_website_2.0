<?php

namespace Modules\Faqs\Models;

use Modules\Faqs\Models\FaqTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['status', 'show_on_homepage'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    public function scopeHomePage($query)
    {
        return $query->where('show_on_homepage', 1);
    }

    public function getQuestionAttribute(): ?string
    {
        return $this->translatedAttribute('question');
    }

    public function getAnswerAttribute(): ?string
    {
        return $this->translatedAttribute('answer');
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
        return $this->hasMany(FaqTranslation::class, 'faq_id');
    }

    public function translation()
    {
        $locale = getSiteLocale();

        return $this->hasOne(FaqTranslation::class)->where('locale', $locale)
            ->withDefault(function ($translation, $faq) {
                $fallback = $faq->translations()->where('locale', 'en')->first();

                if ($fallback) {
                    $translation->fill($fallback->getAttributes());
                }
            });
    }
}
