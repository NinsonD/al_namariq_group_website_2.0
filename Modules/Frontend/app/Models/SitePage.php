<?php

namespace Modules\Frontend\Models;

use Modules\Frontend\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SitePage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'slug', 'status'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function getSection(string $slug)
    {
        return $this->sections->firstWhere('slug', $slug);
    }

}
