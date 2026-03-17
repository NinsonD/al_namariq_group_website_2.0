<?php

namespace Modules\Shop\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Shop\Http\Requests\AddressRequest;
use Modules\Shop\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $allAddress = Address::where("user_id", $userId)->latest()->paginate(15);
        return view('frontend.dashboard.address.index', compact('allAddress'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.dashboard.address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Address::create($data);
        return redirect()->route('user.address.index')->with('success', __('notification.created', ['field' => __('admin.address')]));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $address = Address::findOrFail($id);
        return view('frontend.dashboard.address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, $id)
    {
        $address = Address::findOrFail($id);
        $address->update($request->validated());
        return redirect()->route('user.address.index')->with('success', __('notification.updated', ['field' => __('admin.address')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return redirect()->route('user.address.index')->with('success', __('notification.deleted', ['field' => __('admin.address')]));
    }
}
