<?php

namespace Modules\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Models\OrderProduct;
use Modules\Shop\Models\ProductTranslation;
use Modules\Shop\Models\ProductCategory;
use Modules\Shop\Models\ProductGallery;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id', 'product_category_id', 'image', 'slug', 'price', 'sale_price', 'qty', 'sku', 'is_new', 'is_popular', 'views', 'tags', 'status'];

    protected $casts = [
        'tags' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOnSale($query)
    {
        return $query->whereNotNull('sale_price')->whereColumn('sale_price', '<', 'price');
    }

    public function isOnSale(): bool
    {
        return !is_null($this->sale_price) && $this->sale_price < $this->price;
    }

    public function isNew(): bool
    {
        return (bool) $this->is_new;
    }

    public function isWishlisted(): bool
    {
        if (!auth()->check()) {
            return false;
        }

        return $this->wishlists()
            ->where('user_id', auth()->id())
            ->exists();
    }

    public function isPurchasedByUser($userId): bool
    {
        if (!$userId) {
            return false;
        }

        return OrderProduct::whereHas('order', function ($query) use ($userId) {
            $query->where('user_id', $userId)->where('order_status', 'success')->where('payment_status', 'success');
                })->where('product_id', $this->id)
                ->exists();
    }

    public function scopeGetByCategoryIds($query, array $categoryIds)
    {
        return $query->whereIn('product_category_id', $categoryIds);
    }

    public function scopeGetProductsByPriceRange($query, float|int $minPrice, float|int $maxPrice)
    {
        return $query->whereBetween('price', [(float)$minPrice, (float)$maxPrice]);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function gallery()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }

    public function wishlists()
    {
        return $this->belongsToMany(Wishlist::class, 'wishlist_product')->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    public function ratingCounts()
    {
        return $this->reviews()
            ->selectRaw('rating, COUNT(*) as count')
            ->groupBy('rating')
            ->pluck('count', 'rating');
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }

    public function reviewStats()
    {
       // use the loaded relation, or lazy load if missing
        $reviews = $this->relationLoaded('reviews')
            ? $this->reviews
            : $this->reviews()->get();

        // filter approved only
        $approved = $reviews->where('status', 1);

        $totalReviews  = $approved->count();
        $averageRating = $totalReviews > 0 ? round($approved->avg('rating'), 2) : 0;

        $ratings = [];
        for ($i = 5; $i >= 1; $i--) {
            $count = $approved->where('rating', $i)->count();
            $ratings[$i] = [
                'count'   => $count,
                'percent' => $totalReviews > 0 ? round(($count / $totalReviews) * 100) : 0,
            ];
        }

        return [
            'total_reviews'  => $totalReviews,
            'average_rating' => $averageRating,
            'ratings'        => $ratings,
        ];
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
    public function getAdditionalInformationAttribute(): string|array
    {
        return $this->translatedAttribute('additional_information');
    }

    protected function translatedAttribute(string $key): string|array
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
        return $this->hasMany(ProductTranslation::class, 'product_id');
    }

    public function translation()
    {
        $locale = getSiteLocale();

        return $this->hasOne(ProductTranslation::class)->where('locale', $locale)
            ->withDefault(function ($translation, $product) {
                $fallback = $product->translations()->where('locale', 'en')->first();

                if ($fallback) {
                    $translation->fill($fallback->getAttributes());
                }
            });
    }
}
