<?php

namespace Modules\Blog\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Models\BlogTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id', 'blog_category_id','slug', 'image', 'status', 'is_popular', 'show_homepage', 'tags', 'views'];

    protected $casts = [
        'tags' => 'array',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1)
                     ->whereHas('category', function ($q) {
                         $q->where('status', 1);
                     });
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

    public function scopePopular($query)
    {
        return $query->where('is_popular', 1);
    }

    public function scopeShowOnHomepage($query)
    {
        return $query->where('show_homepage', 1);
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

    public function getSeoTitleAttribute(): ?string
    {
        return $this->translatedAttribute('seo_title');
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
        return $this->hasMany(BlogTranslation::class, 'blog_id');
    }

    public function translation()
    {
        $locale = getSiteLocale();

        return $this->hasOne(BlogTranslation::class)->where('locale', $locale)
            ->withDefault(function ($translation, $blog) {
                $fallback = $blog->translations()->where('locale', 'en')->first();

                if ($fallback) {
                    $translation->fill($fallback->getAttributes());
                }
            });
    }

}
