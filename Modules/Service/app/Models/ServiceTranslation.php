<?php

namespace Modules\Service\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Service\Models\Service;

class ServiceTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'short_description', 'description', 'category', 'seo_title', 'seo_keywords', 'seo_description'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
