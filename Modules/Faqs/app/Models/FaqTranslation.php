<?php

namespace Modules\Faqs\Models;

use Modules\Faqs\Models\Faq;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Faqs\Database\Factories\FaqTranslationFactory;

class FaqTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['question', 'answer', 'locale'];

    public function faq()
    {
        return $this->belongsTo(Faq::class);
    }
}
