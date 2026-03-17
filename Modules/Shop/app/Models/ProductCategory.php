<?php

namespace Modules\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Models\ProductCategoryTranslation;
use Modules\Shop\Models\Product;

class ProductCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['slug', 'image', 'parent_id', 'position', 'status'];


    // check if the category has products
    public function hasProducts(): bool
    {
        return $this->products()->exists();
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
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
        return $this->hasMany(ProductCategoryTranslation::class, 'category_id');
    }

    public function translation()
    {
        $locale = getSiteLocale();

        return $this->hasOne(ProductCategoryTranslation::class)->where('locale', $locale)
            ->withDefault(function ($translation, $category) {
                $fallback = $category->translations()->where('locale', 'en')->first();

                if ($fallback) {
                    $translation->fill($fallback->getAttributes());
                }
            });
    }

}
