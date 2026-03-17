<?php

namespace Modules\Language\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'code', 'direction', 'flag', 'status', 'is_default'];

    // get default language
    public static function getDefaultLanguage()
    {
        return self::where('is_default', true)->first();
    }
}
