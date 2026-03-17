<?php

namespace Modules\Pricing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pricing\Models\Pricing;

class PricingTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['pricing_id', 'locale', 'title', 'short_description', 'description', 'btn_text'];

    public function pricing()
    {
        return $this->belongsTo(Pricing::class);
    }
}
