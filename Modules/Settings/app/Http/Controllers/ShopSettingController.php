<?php

namespace Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Settings\Http\Requests\ShopSettingRequest;
use Modules\Settings\Models\Setting;
use Modules\Settings\Traits\SettingsCacheTrait;

class ShopSettingController extends Controller implements HasMiddleware
{
    use SettingsCacheTrait;

    public static function middleware()
    {
        return [
            new Middleware('permission:shop_settings-show', ['index']),
            new Middleware('permission:shop_settings-update', ['update']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('settings::shop');
    }

    public function update(ShopSettingRequest $request)
    {

        $fields = ['cart_empty_image', 'cartmini_empty_image', 'order_success_image', 'order_failed_image'];

        foreach ($fields as $field) {
            $setting = Setting::where('key', $field)->first();
            if ($setting && $request->hasFile($field)) {
                Setting::where('key', $field)->update([
                    'value' => updateMedia($request->file($field), $setting->value, 'website')
                ]);
            }
        }

        Setting::where('key', 'reviews_auto_approved')->update(['value' => $request->has('reviews_auto_approved') ? 1 : 0]);
        Setting::where('key', 'enable_shop')->update(['value' => $request->has('enable_shop') ? 1 : 0]);
        Setting::where('key', 'tax')->update(['value' => $request->tax]);

        $this->cacheSettings();

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.shop_settings')]));

    }

}
