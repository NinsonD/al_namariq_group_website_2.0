<?php

namespace Modules\Pricing\Http\Controllers;

use App\Enums\RedirectType;
use Illuminate\Http\Request;
use App\Traits\RedirectTrait;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Language\Enums\TranslatableModels;
use Modules\Language\Traits\TranslationGenerateTrait;
use Modules\Pricing\Models\Pricing;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Pricing\Http\Requests\PricingRequest;

class PricingController extends Controller implements HasMiddleware
{
    use TranslationGenerateTrait;

    public static function middleware(){
        return [
            new Middleware('permission:pricing-show', ['index']),
            new Middleware('permission:pricing-create', ['create', 'store']),
            new Middleware('permission:pricing-edit', ['update','edit']),
            new Middleware('permission:pricing-delete', ['destroy']),
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricings = Pricing::orderByDesc("id")->paginate(15);
        return view('pricing::index', compact('pricings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pricing::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PricingRequest $request)
    {

        $data = $request->validated();
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['show_on_home'] = $request->has('show_on_home') ? 1 : 0;
        $data['is_popular'] = $request->has('is_popular') ? 1 : 0;

        $price = Pricing::create($data);

        $this->generateTranslations(
            TranslatableModels::PRICEING,
            $price,
            'pricing_id',
            $request
        );

        return redirect()->route('admin.pricing.index')->with('success', __('notification.created', ['field' => __('admin.pricing')]));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pricing = Pricing::findOrFail($id);

        return view('pricing::edit', compact('pricing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PricingRequest $request, $id)
    {
        $pricing = Pricing::findOrFail($id);

        $data = $request->validated();
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['show_on_home'] = $request->has('show_on_home') ? 1 : 0;
        $data['is_popular'] = $request->has('is_popular') ? 1 : 0;

        $pricing->update($data);

        $this->updateTranslations(
            $pricing,
            $request,
            $request->validated()
        );

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.pricing')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pricing = Pricing::findOrFail($id);

        if($pricing->image) {
            deleteMedia($pricing->image);
        }

        // delete translations
        $pricing->translations()->delete();

        $pricing->delete();

        return redirect()->route('admin.pricing.index')->with('success', __('notification.deleted', ['field' => __('admin.pricing')]));
    }
}
