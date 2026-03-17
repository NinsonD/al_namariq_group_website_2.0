<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Blog\Models\Blog;
use Modules\Blog\Models\BlogCategory;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $categorySlug = $request->get('cat');
        $search = $request->get('keyword');
        $author = $request->get('author');

        $blogQuery = Blog::with([
            'translations',
            'author',
            'category',
            'category.translations',
        ])->active();

        if ($tag) {
            $blogQuery->whereJsonContains('tags', ['value' => $tag]);
        }

        if ($categorySlug) {
            $blogQuery->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        if ($author) {
            $blogQuery->whereHas('author', function ($q) use ($author) {
                $q->where('username', $author);
            });
        }

        if ($search) {
            $blogQuery->whereHas('translations', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('short_description', 'like', '%' . $search . '%');
            });
        }

        $blogs = $blogQuery->orderBy('created_at', 'desc')->paginate(7)->withQueryString();

        $popular_blogs = $this->popular_blogs();
        $blog_tags = $this->tags();
        $categories = $this->categories();

        return view('frontend.pages.blog.index', compact('blogs', 'popular_blogs', 'categories', 'blog_tags'));
    }

    public function popular_blogs(int $items = 3)
    {
        return Blog::select('id', 'slug', 'image', 'created_at', 'blog_category_id')
            ->with([
                'translations',
                'category',
                'category.translations',
            ])
            ->active()
            ->popular()
            ->latest()
            ->take($items)
            ->get();
    }


    public function categories()
    {
        return BlogCategory::with(['translations'])
            ->withCount(['blogs' => function ($query) {
                $query->active();
            }])
            ->whereHas('blogs', function ($query) {
                $query->active();
            })
            ->latest()
            ->get();
    }

    public function tags()
    {
        return Blog::pluck('tags')->flatten()->unique();
    }


    public function show($slug)
    {

        $blog = Blog::with([
            'translations',
            'author:id,name,username,avatar,bio,social_links',
            'category:id,slug',
            'category.translations',
            'comments' => function ($query) {
                $query->with(['user:id,name,avatar', 'replies.user:id,name,avatar'])->active();
            }
        ])->where('slug', $slug)->active()->firstOrFail();

        $next_blog = Blog::with('translations')
                    ->where('id', '>', $blog->id)
                    ->active()
                    ->orderBy('id', 'asc')
                    ->first();


        $blog->increment('views');


        $popular_blogs = $this->popular_blogs();
        $blog_tags = $this->tags();
        $categories = $this->categories();

        return view('frontend.pages.blog.show', compact('blog', 'next_blog', 'popular_blogs', 'categories', 'blog_tags'));
    }


}
