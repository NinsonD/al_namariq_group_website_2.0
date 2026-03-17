<?php

namespace Modules\Payment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['key', 'value'];

    public function scopeActive($query)
    {
        return $query->where('value->status', 1);
    }

    protected $casts = [
        'value' => 'array',
    ];
}
