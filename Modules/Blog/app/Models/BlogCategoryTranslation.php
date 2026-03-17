<?php

namespace Modules\Blog\Models;

use Modules\Blog\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategoryTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'locale'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
