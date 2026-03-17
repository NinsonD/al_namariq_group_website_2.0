<?php

namespace Modules\Blog\Models;

use App\Models\User;
use Modules\Blog\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id', 'blog_id', 'parent_id', 'comment', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function parent()
    {
        return $this->belongsTo(BlogComment::class, 'parent_id')->where('status', 1);
    }

    public function replies()
    {
        return $this->hasMany(BlogComment::class, 'parent_id')->with(['user', 'replies'])->where('status', 1);
    }


}
