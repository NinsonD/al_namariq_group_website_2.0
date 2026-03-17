<?php

namespace Modules\Menu\Models;

use Modules\Menu\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Menu\Database\Factories\MenuTranslationFactory;

class MenuTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'menu_items', 'locale'];

    protected $casts = [
        'menu_items' => 'json',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
