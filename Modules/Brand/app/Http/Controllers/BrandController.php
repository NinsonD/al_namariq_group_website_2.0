<?php

namespace Modules\Brand\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Brand\Models\Brand;
use App\Http\Controllers\Controller;
use Modules\Brand\Http\Requests\BrandRequest;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Language\Enums\TranslatableModels;
use Modules\Language\Traits\TranslationGenerateTrait;

class BrandController extends Controller implements HasMiddleware
{
    use TranslationGenerateTrait;

    public static function middleware(): array
    {
        return [
            new Middleware('permission:brands-show', ['index']),
            new Middleware('permission:brands-create', ['create', 'store']),
            new Middleware('permission:brands-edit', ['edit', 'update']),
            new Middleware('permission:brands-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderByDesc("id")->paginate(15);
        return view('brand::index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brand::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {

        $image = null;
        if($request->hasFile('image')){
            $image = storeMedia($request->file('image'), 'brand');
        }

        $brand = Brand::create([
            'url' => $request->url,
            'image' => $image,
            'status' => $request->has('status') ? 1 : 0,
        ]);

         $this->generateTranslations(
            TranslatableModels::BRAND,
            $brand,
            'brand_id',
            $request
        );

        return redirect()->route('admin.brand.index')->with('success', __('notification.created', ['field' => __('admin.brand')]));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brand::edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $image = $brand->image;
        if($request->hasFile('image')){
            $image = updateMedia($request->file('image'), $brand->image, 'brand');
        }

        $brand->update([
            'url' => $request->url,
            'image' => $image,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $this->updateTranslations(
            $brand,
            $request,
            $request->validated()
        );

        return redirect()->back()->with('success', __('notification.updated', ['field'=> __('admin.brand')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        if($brand->image){
            deleteMedia($brand->image);
        }

        // delete translations
        $brand->translations()->delete();

        $brand->delete();

        return redirect()->route('admin.brand.index')->with('success', __('notification.deleted', ['field' => __('admin.brand')]));
    }
}
