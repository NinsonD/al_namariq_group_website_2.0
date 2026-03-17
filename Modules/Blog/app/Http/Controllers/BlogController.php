<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Blog\Models\Blog;
use App\Http\Controllers\Controller;
use Modules\Blog\Models\BlogCategory;
use Modules\Blog\Http\Requests\BlogRequest;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Language\Enums\TranslatableModels;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Language\Traits\TranslationGenerateTrait;

class BlogController extends Controller implements HasMiddleware
{

    use TranslationGenerateTrait;

     public static function middleware(): array
        {
            return [
                new Middleware('permission:blog-show', ['index']),
                new Middleware('permission:blog-create', ['create', 'store']),
                new Middleware('permission:blog-edit', ['edit', 'update']),
                new Middleware('permission:blog-delete', ['destroy']),
                new Middleware('permission:blog-status', ['status']),
            ];
        }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $query = Blog::with(['translation']);

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->whereHas('translation', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $status = $request->get('status') == 'active' ? 1 : 0;
            $query->where('status', $status);
        }

        if ($request->filled('order_by')) {
            $order = $request->get('order_by') === 'asc' ? 'asc' : 'desc';
            $query->orderBy('created_at', $order);
        } else {
            $query->latest();
        }


        $perPage = $request->get('per_page', 10);
        if ($perPage === 'all') {
            $posts = $query->get();
        } else {
            $posts = $query->paginate((int) $perPage);
        }

        return view('blog::blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::active()->get() ?? collect();

        return view('blog::blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['slug']);
        $data['user_id'] = auth()->user()->id;
        $data['tags'] = is_string($request->tags) ? json_decode($request->tags, true) : $request->tags;
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['show_homepage'] = $request->has('show_homepage') ? 1 : 0;
        $data['is_popular'] = $request->has('is_popular') ? 1 : 0;

        if($request->hasFile('image')){
            $data['image'] = storeMedia($request->file('image'), 'blog') ?? null;
        }

        $blog = Blog::create($data);

        $this->generateTranslations(
            TranslatableModels::BLOG,
            $blog,
            'blog_id',
            $request
        );

        return redirect()->route('admin.blog.index')->with('success', __('notification.created', ['field' => __('admin.blog')]));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $code = request('code') ?? getSiteLocale();

        if(!isLanguageAvailable($code)){
            return redirect()->back()->with('error', __('notification.language_not_available'));
        }

        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::active()->get() ?? collect();
        return view('blog::blog.edit', compact('blog', 'categories', 'code'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, $id)
    {
        $code = $request->code ?? 'en';


        if(!isLanguageAvailable($code)){
            return redirect()->back()->with('error', __('notification.language_not_available'));
        }

        $blog = Blog::findOrFail($id);

        $data = $request->validated();

        $data['slug'] = Str::slug($data['slug']);
        $data['tags'] = is_string($request->tags) ? json_decode($request->tags, true) : $request->tags;
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['show_homepage'] = $request->has('show_homepage') ? 1 : 0;
        $data['is_popular'] = $request->has('is_popular') ? 1 : 0;

        if($request->hasFile('image')){
            $data['image'] = updateMedia($request->file('image'), $blog->image, 'blog');
        }

        $blog->update($data);


        $this->updateTranslations(
            $blog,
            $request,
            $data
        );

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.blog')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if($blog->image){
            deleteMedia($blog->image);
        }

        // delete translations
        $blog->translations()->delete();

        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', __('notification.deleted', ['field' => __('admin.blog')]));

    }


    public function status($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = !$blog->status;
        $blog->save();

        $notification = __('notification.status_updated', ['field' => __('admin.blog_status')]);

        return response()->json([
            'success' => true,
            'message' => $notification,
        ]);
    }
}
