<?php

namespace Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Language\Enums\TranslatableModels;
use Modules\Language\Traits\TranslationGenerateTrait;
use Modules\Order\Http\Requests\ShippingMethodRequest;
use Modules\Order\Models\ShippingMethod;

class ShippingMethodController extends Controller implements HasMiddleware
{
    use TranslationGenerateTrait;

    public static function middleware()
    {
        return [
            new Middleware('permission:shipping_method-show', ['index']),
            new Middleware('permission:shipping_method-create', ['create', 'store']),
            new Middleware('permission:shipping_method-edit', ['update','edit']),
            new Middleware('permission:shipping_method-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $methods = ShippingMethod::latest()->paginate(10);
        return view('order::shipping-methods.index', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order::shipping-methods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShippingMethodRequest $request)
    {
        $data = $request->validated();
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['is_free'] = $request->has('set_as_free') ? 1 : 0;
        $data['default'] = $request->has('set_as_default') ? 1 : 0;

        // Validation: Default must be active
        if ($data['default'] === 1 && $data['status'] == 0) {
            return back()->withInput()->withErrors([
                'status' => __('notification.default_shipping_must_be_active')
            ]);
        }

        // If new method is default, remove default from others
        if ($data['default'] === 1) {
            ShippingMethod::query()->update(['default' => 0]);
        }

        $shippingMethod = ShippingMethod::create($data);

        $this->generateTranslations(
            TranslatableModels::SHIPPING_METHOD,
            $shippingMethod,
            'shipping_method_id',
            $request
        );

        cache()->forget('shipping_methods');

        return redirect()->route('admin.shipping-methods.index')->with('success', __('notification.created', ['field' => __('admin.shipping_method')]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shippingMethod = ShippingMethod::findOrFail($id);
        return view('order::shipping-methods.edit', compact('shippingMethod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShippingMethodRequest $request, $id)
    {
        $code = $request->code ?? 'en';

        if(!isLanguageAvailable($code)){
            return redirect()->back()->with('error', __('notification.language_not_available'));
        }

        $shippingMethod = ShippingMethod::findOrFail($id);

        $data = $request->validated();
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['is_free'] = $request->has('set_as_free') ? 1 : 0;
        $data['default'] = $request->has('set_as_default') ? 1 : 0;

        // Validation: Default must be active
        if ($data['default'] === 1 && $data['status'] == 0) {
            return back()->withInput()->withErrors([
                'status' => __('notification.default_shipping_must_be_active')
            ]);
        }

        // Prevent removing default if no other default exists
        if ($shippingMethod->default && $data['default'] == 0) {
            $otherDefaultExists = ShippingMethod::where('id', '!=', $shippingMethod->id)
                ->where('default', 1)
                ->exists();

            if (!$otherDefaultExists) {
                return back()->with('error', __('notification.at_least_one_shipping_default'));
            }
        }

        // If updated as default, remove default from others
        if ($data['default'] === 1) {
            ShippingMethod::where('id', '!=', $shippingMethod->id)->update(['default' => 0]);
        }

        $shippingMethod->update($data);


        $this->updateTranslations($shippingMethod, $request, $data);
        cache()->forget('shipping_methods');

        return redirect()->route('admin.shipping-methods.index')
            ->with('success', __('notification.updated', ['field' => __('admin.shipping_method')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shippingMethod = ShippingMethod::findOrFail($id);

        if ($shippingMethod->default) {
            return redirect()->route('admin.shipping-methods.index')->with('error', __('notification.cannot_delete_default_shipping_method'));
        }

        $shippingMethod->delete();

        cache()->forget('shipping_methods');

        return redirect()->route('admin.shipping-methods.index')->with('success', __('notification.deleted', ['field' => __('admin.shipping_method')]));
    }
}
