<?php

namespace Modules\Social\Http\Controllers;

use App\Traits\RedirectTrait;
use Modules\Social\Models\Social;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Social\Http\Requests\SocialRequest;
use Illuminate\Routing\Controllers\HasMiddleware;

class SocialController extends Controller implements HasMiddleware
{
    use RedirectTrait;

    public static function middleware(){
        return [
            new Middleware('permission:social-show', ['index']),
            new Middleware('permission:social-create', ['create', 'store']),
            new Middleware('permission:social-edit', ['update','edit']),
            new Middleware('permission:social-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socials = Social::orderByDesc("id")->paginate(15); 
        return view('social::index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('social::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocialRequest $request) 
    {
        Social::create([
            'icon' => $request->icon,
            'link' => $request->link,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        cache()->forget('social_links');

        return redirect()->route('admin.social.index')->with('success', __('notification.created', ['field' => __('admin.social')]));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $social = Social::findOrFail($id);
        return view('social::edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialRequest $request, $id) 
    {

        $social = Social::findOrFail($id);

        $social->update([
            'icon' => $request->icon,
            'link' => $request->link,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        cache()->forget('social_links');

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.social')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) 
    {
        $social = Social::findOrFail($id);
        $social->delete();
        
        cache()->forget('social_links');

        return redirect()->route('admin.social.index')->with('success', __('notification.deleted', ['field' => __('admin.social')]));
    }
}
