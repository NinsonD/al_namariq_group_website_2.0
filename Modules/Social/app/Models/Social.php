<?php

namespace Modules\Social\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Social\Database\Factories\SocialFactory;

class Social extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
    */
    protected $fillable = ['icon', 'link', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
