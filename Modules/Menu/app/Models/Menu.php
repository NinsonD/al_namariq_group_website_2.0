<?php

namespace Modules\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use Log;
use Modules\Menu\Models\MenuTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
    */
    protected $fillable = ['location'];

    /**
     * Relation: all translations (no filtering)
     */
    public function translations()
    {
        return $this->hasMany(MenuTranslation::class, 'menu_id');
    }

    /**
     * Get translation model for the given locale or fallback to 'en'
     */
    public function getTranslation()
    {
        $locale = getSiteLocale();

        $translation = $this->translations->where('locale', $locale)->first();

        if (!$translation) {
            $translation = $this->translations->where('locale', 'en')->first();
        }

        return $translation;
    }

    /**
     * Accessor for title (uses getTranslation)
     */
    public function getTitleAttribute()
    {
        return $this->getTranslation()?->title ?? '';
    }

    /**
     * Accessor for English title (directly from translations)
     */
    public function getEnTitleAttribute()
    {
        return $this->translations->firstWhere('locale', 'en')?->title ?? '';
    }

    /**
     * Accessor for menu items (decoded JSON)
     */
    public function getMenuItemsAttribute()
    {
        $items = $this->getTranslation()?->menu_items;

        if (is_string($items)) {
            return json_decode($items, true) ?: [];
        }

        // If already array or null
        return $items ?? [];
    }

    /**
     * Accessor for language code of the translation
     */
    public function getLangCodeAttribute()
    {
        return $this->getTranslation()?->locale ?? '';
    }
}
