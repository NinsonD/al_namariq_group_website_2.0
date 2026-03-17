<?php

namespace Modules\Team\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Team\Database\Factories\TeamFactory;

class Team extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'username', 'designation', 'phone', 'email', 'image', 'social_links', 'bio', 'status', 'qualification', 'location', 'age', 'gender'];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'social_links' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
