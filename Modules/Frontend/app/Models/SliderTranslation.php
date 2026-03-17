<?php

namespace Modules\Frontend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Frontend\Models\Slider;

class SliderTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['slider_id', 'locale', 'title', 'subtitle', 'btn_text'];

    public function slider()
    {
        return $this->belongsTo(Slider::class, 'slider_id');
    }
}
