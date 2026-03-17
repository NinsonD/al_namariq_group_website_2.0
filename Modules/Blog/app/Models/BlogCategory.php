<?php

namespace Modules\Blog\Models;

use Modules\Blog\Models\Blog;
use Modules\Blog\Models\BlogCategoryTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['slug', 'position', 'parent_id', 'status'];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

    // get categories count
    public function scopeWithCount($query)
    {
        return $query->withCount('blogs');
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
        return $this->hasMany(BlogCategoryTranslation::class, 'blog_category_id');
    }

    public function translation()
    {
        $locale = getSiteLocale();

        return $this->hasOne(BlogCategoryTranslation::class)->where('locale', $locale)
            ->withDefault(function ($translation, $category) {
                $fallback = $category->translations()->where('locale', 'en')->first();

                if ($fallback) {
                    $translation->fill($fallback->getAttributes());
                }
            });
    }
}
