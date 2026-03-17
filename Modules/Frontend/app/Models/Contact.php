<?php

namespace Modules\Frontend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['key', 'default', 'value'];

    protected $casts = [
        'value' => 'array',
    ];

    public function scopeDefault($query)
    {
        return $query->where('default', true);
    }
}
