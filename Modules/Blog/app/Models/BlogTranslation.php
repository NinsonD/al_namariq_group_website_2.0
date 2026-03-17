<?php

namespace Modules\Blog\Models;

use Modules\Blog\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'short_description', 'description', 'seo_title', 'seo_description', 'locale'];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
