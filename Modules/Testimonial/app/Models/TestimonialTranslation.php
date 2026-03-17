<?php

namespace Modules\Testimonial\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Testimonial\Models\Testimonial;

class TestimonialTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['testimonial_id', 'locale', 'name', 'designation', 'comment'];

    public function testimonial()
    {
        return $this->belongsTo(Testimonial::class);
    }
}
