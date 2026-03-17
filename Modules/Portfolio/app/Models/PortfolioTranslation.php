<?php

namespace Modules\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Portfolio\Models\Portfolio;

class PortfolioTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'portfolio_id',
        'locale',
        'title',
        'short_description',
        'description',
        'role',
        'service',
        'duration',
        'seo_title',
        'seo_keywords',
        'seo_description',
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

}
