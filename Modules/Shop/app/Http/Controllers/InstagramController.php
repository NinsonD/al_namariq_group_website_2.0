<?php

namespace Modules\Shop\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Shop\Http\Requests\InstagramRequest;
use Modules\Shop\Models\Instagram;

class InstagramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instagrams = Instagram::latest()->paginate(15);
        return view('shop::instagram.index', compact('instagrams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shop::instagram.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstagramRequest $request)
    {
        $data = $request->validated();
        $data['status'] = $request->has('status') ? 1 : 0;
        if ($request->hasFile('image')) {
            $data['image'] = storeMedia($request->file('image'), 'instagram');
        }
        Instagram::create($data);
        return redirect()->route('admin.instagram.index')->with('success', __('notification.created', ['field' => __('admin.instagram')]));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $instagram = Instagram::findOrFail($id);
        return view('shop::instagram.edit', compact('instagram'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstagramRequest $request, $id)
    {
        $instagram = Instagram::findOrFail($id);
        $data = $request->validated();
        $data['status'] = $request->has('status') ? 1 : 0;
        if ($request->hasFile('image')) {
            $data['image'] = updateMedia($request->file('image'), $instagram->image, 'instagram');
        }
        $instagram->update($data);
        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.instagram')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $instagram = Instagram::findOrFail($id);
        if( $instagram->image ){
            deleteMedia($instagram->image);
        }
        $instagram->delete();
        return redirect()->route('admin.instagram.index')->with('success', __('notification.deleted', ['field' => __('admin.instagram')]));
    }
}
