<?php

namespace Modules\Shop\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Str;
use Modules\Language\Enums\TranslatableModels;
use Modules\Language\Traits\TranslationGenerateTrait;
use Modules\Shop\Http\Requests\ProductCategoryRequest;
use Modules\Shop\Models\ProductCategory;

class ProductCategoryController extends Controller implements HasMiddleware
{
    use TranslationGenerateTrait;


    public static function middleware(){
        return [
            new Middleware('permission:product_category-show', ['index']),
            new Middleware('permission:product_category-create', ['create', 'store']),
            new Middleware('permission:product_category-edit', ['update','edit']),
            new Middleware('permission:product_category-status', ['updateStatus']),
            new Middleware('permission:product_category-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::with('translations')->latest()->paginate(15);
        return view('shop::category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shop::category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {

        $image = null;
        if($request->hasFile('image')){
            $image = storeMedia($request->file('image'), 'product-categories') ?? null;
        }

        $category = new ProductCategory();
        $category->slug = Str::slug($request->slug);
        $category->image = $image;
        $category->position = $request->position ?? 0;
        $category->status = $request->has('status') ? 1 : 0;
        $category->parent_id = $request->parent_id ?? null;
        $category->save();

         $this->generateTranslations(
            TranslatableModels::PRODUCT_CATEGORY,
            $category,
            'category_id',
            $request
        );

        return redirect()->route('admin.product-category.index')->with('success', __('notification.created', ['field' => __('admin.category')]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $code = request('code') ?? getDefaultLocale();

        if(!isLanguageAvailable($code)){
            return redirect()->back()->with('error', __('notification.language_not_available'));
        }

        $category = ProductCategory::with('translations')->findOrFail($id);
        return view('shop::category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, $id)
    {
        $code = $request->code ?? 'en';

         if(!isLanguageAvailable($code)){
            return redirect()->back()->with('error', __('notification.language_not_available'));
        }

        $category = ProductCategory::findOrFail($id);

        if($category->hasProducts()) {
            return redirect()->back()->with('error', __('notification.cant_deactivate_category_with_products'));
        }

        $image = $category->image;
        if($request->hasFile('image')){
            $image = updateMedia($request->file('image'), $category->image, 'product-categories') ?? null;
        }

        $category->slug = $request->has('slug') ? Str::slug($request->slug) : $category->slug;
        $category->image = $image;
        $category->position = $request->position ?? 0;
        $category->status = $request->has('status') ? 1 : 0;
        $category->parent_id = $request->parent_id ?? null;
        $category->save();

        $this->updateTranslations(
            $category,
            $request,
            $request->validated()
        );

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.category')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);

        if($category->hasProducts()) {
            return redirect()->back()->with('error', __('notification.cant_delete_category_with_products'));
        }

        if ($category->image) {
            deleteMedia($category->image);
        }

        // delete translations
        $category->translations()->delete();

        $category->delete();

        return redirect()->route('admin.product-category.index')->with('success', __('notification.deleted', ['field' => __('admin.category')]));
    }

    public function updateStatus($id)
    {
        $category = ProductCategory::find($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => __('notification.not_found', ['field' => __('admin.category')]),
            ]);
        }

        if($category->hasProducts() && request('column') === 'status' && !request('status')) {
            return response()->json([
                'status' => false,
                'message' => __('notification.cant_deactivate_category_with_products'),
            ]);
        }


        $category->status = !$category->status;
        $category->save();

        return response()->json([
            'status' => true,
            'message' => __('notification.status_updated', ['field' => __('admin.category')]),
        ]);
    }
}
