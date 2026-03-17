<?php

namespace Modules\Brand\Models;

use Modules\Brand\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrandTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'locale'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
