<?php

namespace Modules\NewsLetter\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsLetter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['email', 'is_verified', 'verify_token'];

    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }
    public function scopeUnverified($query)
    {
        return $query->where('is_verified', false);
    }
}
