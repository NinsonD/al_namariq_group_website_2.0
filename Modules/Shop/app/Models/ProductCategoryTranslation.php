<?php

namespace Modules\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Models\ProductCategory;

class ProductCategoryTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'locale', 'category_id'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

}
