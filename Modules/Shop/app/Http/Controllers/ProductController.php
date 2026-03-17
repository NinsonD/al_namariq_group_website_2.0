<?php

namespace Modules\Shop\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Str;
use Modules\Language\Enums\TranslatableModels;
use Modules\Language\Traits\TranslationGenerateTrait;
use Modules\Shop\Http\Requests\ProductGalleryRequest;
use Modules\Shop\Http\Requests\ProductRequest;
use Modules\Shop\Models\Product;
use Modules\Shop\Models\ProductCategory;

class ProductController extends Controller implements HasMiddleware
{
    use TranslationGenerateTrait;

    public static function middleware(){
        return [
            new Middleware('permission:product-show', ['index']),
            new Middleware('permission:product-create', ['create', 'store', 'addProductGallery', 'removeProductGallery']),
            new Middleware('permission:product-edit', ['update','edit', 'removeProductGallery']),
            new Middleware('permission:product-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with(['translations', 'category', 'category.translations']);

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->whereHas('translations', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
        }

         if ($request->filled('on_sale')) {
            if ($request->get('on_sale') === 'yes') {
                $query->whereNotNull('sale_price')->where('sale_price', '>', 0);
            } elseif ($request->get('on_sale') === 'no') {
                $query->where(function ($q) {
                    $q->whereNull('sale_price')->orWhere('sale_price', '=', 0);
                });
            }
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


        $perPage = $request->get('per_page', 15);
        if ($perPage === 'all') {
            $products = $query->get();
        } else {
            $products = $query->paginate((int) $perPage);
        }
        return view('shop::product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::with('translations')->active()->get();
        return view('shop::product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $image = null;
        if($request->hasFile('image')){
            $image = storeMedia($request->file('image'), 'products') ?? null;
        }

        $product = new Product();
        $product->image = $image;
        $product->user_id = auth()->user()->id;
        $product->product_category_id = $request->product_category_id;
        $product->slug = Str::slug($request->slug);
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->sku = $request->sku;
        $product->is_new = $request->has('is_new') ? 1 : 0;
        $product->is_popular = $request->has('is_popular') ? 1 : 0;
        $product->status = $request->has('status') ? 1 : 0;
        $product->tags = is_string($request->tags) ? json_decode($request->tags, true) : $request->tags;

        $product->save();

        $this->generateTranslations(
            TranslatableModels::PRODUCT,
            $product,
            'product_id',
            $request
        );

        return redirect()->route('admin.product.edit', ['product' => $product->id, 'code' => getDefaultLocale()])->with('success', __('notification.created', ['field' => __('admin.product')]));
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

        $product = Product::with(['translations', 'category', 'category.translations', 'gallery'])->findOrFail($id);
        $categories = ProductCategory::with('translations')->active()->get();
        return view('shop::product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

       $image = $product->image;
        if($request->hasFile('image')){
            $image = updateMedia($request->file('image'), $product->image, 'products') ?? null;
        }

        $product->image = $image;
        $product->product_category_id = $request->product_category_id;
        $product->slug = Str::slug($request->slug);
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->sku = $request->sku;
        $product->is_new = $request->has('is_new') ? 1 : 0;
        $product->is_popular = $request->has('is_popular') ? 1 : 0;
        $product->status = $request->has('status') ? 1 : 0;
        $product->tags = is_string($request->tags) ? json_decode($request->tags, true) : $request->tags;

        $product->save();

        $this->updateTranslations(
            $product,
            $request,
            $request->validated()
        );

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.product')]));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', __('notification.not_found', ['field' => __('admin.product')]));
        }

        if ($product->image) {
            deleteMedia($product->image);
        }

        // delete product gallery images
        foreach ($product->gallery as $image) {
            deleteMedia($image->image);
            $image->delete();
        }

        // delete translations
        $product->translations()->delete();

        $product->delete();

        return redirect()->route('admin.product.index')->with('success', __('notification.deleted', ['field' => __('admin.product')]));
    }


    public function addProductGallery(ProductGalleryRequest $request, $id)
    {

        $product = Product::findOrFail($id);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $galleryImage = storeMedia($file, 'products-gallery');
                $product->gallery()->create(['image' => $galleryImage]);
            }
        }

        return redirect()->back()->with('success', __('notification.gallery_added', ['field' => __('admin.product')]));
    }

    public function removeProductGallery(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->has('image_id')) {
            $image = $product->gallery()->find($request->input('image_id'));

            if ($image) {
                deleteMedia($image->image);
                $image->delete();

                return redirect()->back()->with('success', __('notification.deleted', ['field' => __('admin.image')]));
            }
        }

        return redirect()->back()->with('error', __('notification.not_found', ['field' => __('admin.product')]));
    }
}
