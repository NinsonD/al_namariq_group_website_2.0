<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\RedirectTrait;
use Modules\Menu\Models\Menu;
use App\Http\Controllers\Controller;
use Modules\Menu\Http\Requests\MenuRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Menu\Models\MenuTranslation;

class MenuController extends Controller implements HasMiddleware
{
    use RedirectTrait;

    public static function middleware(): array
    {
        return [
            new Middleware('permission:menu-show', ['index']),
            new Middleware('permission:menu-edit', ['edit', 'update']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $all_menu = Menu::paginate(15);
        return view('menu::index', compact('all_menu'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

        $code = request('code') ?? 'en';

        if(!isLanguageAvailable($code)){
            return redirect()->back()->with('error', __('notification.language_not_available'));
        }

        // get code parameter from the request
        $menu = MenuTranslation::where('menu_id', $id)->where('locale', $code)->first();

        $menu_id = $id;

        if (!$menu) {
            return redirect()->back()->with('error', __('notification.not_found', ['field' => __('admin.menu')]));
        }

        return view('menu::edit', compact('menu', 'code', 'menu_id'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, $id)
    {

        $code = request('code') ?? 'en';

        if(!isLanguageAvailable($code)){
            return redirect()->back()->with('error', __('notification.language_not_available'));
        }

        $validated = $request->validated();

        $menu = MenuTranslation::where('menu_id', $id)->where('locale', $code)->first();

        if (!$menu) {
            return redirect()->route('admin.menu.index')->with('error', __('notification.not_found', ['field' => __('admin.menu')]));
        }

        $menu->title = $validated['menu_title'];
        $menu->menu_items = json_decode($validated['menu_data'], true);
        $menu->save();

        $locations = ['header', 'footer_col_1', 'footer_col_2'];
        $cacheLocations = ['main_menu', 'footer_col_1', 'footer_col_2'];
        if (in_array($menu->location, $locations)) {
            cache()->forget($cacheLocations[array_search($menu->location, $locations)]);
        }

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.menu')]));
    }
}
