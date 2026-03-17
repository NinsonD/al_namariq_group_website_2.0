<?php

namespace Modules\Frontend\Models;

use Modules\Frontend\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SectionTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['section_id', 'locale', 'content'];
   public function section()
    {
        return $this->belongsTo(Section::class);
    }


    public function getContentAttribute($value):object|null {

       // Try first decode
        $decoded = json_decode($value);

        if (is_string($decoded)) {
            $decoded = json_decode($decoded);
        }

        if (is_array($decoded)) {
            return (object) $decoded;
        }

        return $decoded instanceof \stdClass ? $decoded : null;
    }

    protected $casts = [
        'content' => 'array',
    ];

}
