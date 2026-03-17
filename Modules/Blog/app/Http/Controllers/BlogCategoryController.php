<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Modules\Blog\Models\BlogCategory;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Blog\Http\Requests\BlogCategoryRequest;
use Modules\Language\Enums\TranslatableModels;
use Modules\Language\Traits\TranslationGenerateTrait;


class BlogCategoryController extends Controller implements HasMiddleware
{
    use TranslationGenerateTrait;
    public static function middleware(){
        return [
            new Middleware('permission:blog_category-show', ['index']),
            new Middleware('permission:blog_category-create', ['create', 'store']),
            new Middleware('permission:blog_category-edit', ['update','edit']),
            new Middleware('permission:blog_category-delete', ['destroy']),
            new Middleware('permission:blog_category-status', ['status']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BlogCategory::orderByDesc('id')->paginate(15);
        return view('blog::category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog::category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['slug']);

        $category = BlogCategory::create($data);

        $this->generateTranslations(
            TranslatableModels::BLOG_CATEGORY,
            $category,
            'blog_category_id',
            $request
        );

        return redirect()->route('admin.blog-category.index')->with('success', __('notification.created', ['field' => __('admin.blog_category')]));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);
        return view('blog::category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCategoryRequest $request, $id)
    {

        $code = $request->code ?? 'en';
        $category = BlogCategory::findOrFail($id);
        $data = $request->validated();
        $data['slug'] = Str::slug($data['slug']);
        $data['code'] = $code;

        $category->update($data);

        $this->updateTranslations(
            $category,
            $request,
            $data
        );

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.blog_category')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = BlogCategory::findOrFail($id);
        // delete translations
        $category->translations()->delete();
        $category->delete();
        return redirect()->route('admin.blog-category.index')->with('success', __('notification.deleted', ['field' => __('admin.blog_category')]));
    }

    public function status($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->status = !$category->status;
        $category->save();

        $notification = __('notification.status_updated', ['field' => __('admin.blog_category')]);

        return response()->json([
            'success' => true,
            'message' => $notification,
        ]);
    }
}
