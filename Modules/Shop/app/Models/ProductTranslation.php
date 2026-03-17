<?php

namespace Modules\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Models\Product;

class ProductTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['product_id' , 'title', 'locale', 'description', 'short_description', 'seo_title', 'seo_description', 'additional_information'];

    protected $casts = [
        'additional_information' => 'array',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
