<?php

namespace Modules\Frontend\Models;

use Modules\Frontend\Models\SitePage;
use Illuminate\Database\Eloquent\Model;
use Modules\Frontend\Models\SectionTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'slug', 'default_content', 'status', 'site_page_id'];

    public function page()
    {
        return $this->belongsTo(SitePage::class, 'site_page_id');
    }

    public function getDefaultContentAttribute($value):object|null
    {
        if (is_null($value)) return null;

        $decoded = json_decode($value);

        // If decoded as array, cast to object
        if (is_array($decoded)) {
            return (object) $decoded;
        }

        return $decoded instanceof \stdClass ? $decoded : null;
    }

    protected function translatedAttribute(string $key): mixed
    {
        $locale = session('lang', getSiteLocale());

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


    public function getContentAttribute(): mixed
    {
        return $this->translatedAttribute('content');
    }

    public function translation(){
        return $this->hasOne(SectionTranslation::class)->where('locale', session('lang', getSiteLocale()));
    }

    public function translations()
    {
        return $this->hasMany(SectionTranslation::class);
    }


    protected $casts = [
        'default_content' => 'array',
    ];
}
