<?php

namespace Modules\Coupon\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Coupon\Http\Requests\CouponRequest;
use Modules\Coupon\Models\Coupon;
use Modules\Coupon\Models\CouponHistory;

class CouponController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('permission:coupon-show', ['index']),
            new Middleware('permission:coupon-create', ['create', 'store']),
            new Middleware('permission:coupon-edit', ['update', 'edit']),
            new Middleware('permission:coupon-delete', ['destroy']),
            new Middleware('permission:coupon-history', ['history']),
            new Middleware('permission:coupon-history_delete', ['destroyHistory']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::latest()->paginate(15);
        return view('coupon::index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coupon::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        $data = $request->validated();
        $data['author_id'] = auth()->id();
        $data['image'] = null;
        $data['status'] = $request->has('status') ? true : false;
        $data['free_shipping'] = $request->has('free_shipping') ? true : false;

        if($request->hasFile('image')){
            $data['image'] = storeMedia($request->file('image'), 'coupons');
        }

        Coupon::create($data);

        return redirect()->route('admin.coupons.index')->with('success', __('notification.created', ['field' => __('admin.coupon')]));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('coupon::edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, $id)
    {
        $data = $request->validated();
        $coupon = Coupon::findOrFail($id);

        $data['image'] = $coupon->image;
        $data['status'] = $request->has('status') ? true : false;
        $data['free_shipping'] = $request->has('free_shipping') ? true : false;

        if($request->hasFile('image')){
            $data['image'] = updateMedia($request->file('image'), $coupon->image, 'coupons');
        }

        $coupon->update($data);

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.coupon')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        if ($coupon->image) {
            deleteMedia($coupon->image);
        }
        $coupon->delete();

        return redirect()->route('admin.coupons.index')->with('success', __('notification.deleted', ['field' => __('admin.coupon')]));
    }

    public function history()
    {
        $coupon_history = CouponHistory::with(['user', 'coupon', 'order'])->latest()->paginate(15);
        return view('coupon::history', compact('coupon_history'));
    }

    public function destroyHistory($id)
    {
        $coupon_history = CouponHistory::findOrFail($id);
        $coupon_history->delete();

        return redirect()->route('admin.coupons-history')->with('success', __('notification.deleted', ['field' => __('admin.coupon_history')]));
    }

}
