<?php

namespace Modules\Settings\Http\Controllers;

use App\Enums\RedirectType;
use Illuminate\Http\Request;
use App\Traits\RedirectTrait;
use App\Http\Controllers\Controller;
use Modules\Settings\Models\SeoSetting;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Settings\Http\Requests\SeoRequest;
use Illuminate\Routing\Controllers\HasMiddleware;

class SeoSettingController extends Controller implements HasMiddleware
{
    use RedirectTrait;

    public static function middleware(){
        return [
            new Middleware('permission:seo_settings-show', ['index']),
            new Middleware('permission:seo_settings-update', ['update']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seos = SeoSetting::all();

        return view('settings::seo', compact('seos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeoRequest $request, $id) 
    {
        $seo = SeoSetting::find($id);

        $seo->update([
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ]);
        
        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.seo_setting')]));
    }
}
