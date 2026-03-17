<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Order\Models\Order;

class UserOrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with(['refund'])->where('user_id', auth()->user()->id)->latest()->paginate(10);
        return view('frontend.dashboard.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['orderProducts.product', 'payment', 'address'])->where('user_id', auth()->user()->id)->where('id', $id)->firstOrFail();
        return view('frontend.dashboard.orders.show', compact('order'));
    }

    public function invoice($id)
    {
        $order = Order::with(['orderProducts.product', 'user', 'payment', 'address'])->where('user_id', auth()->user()->id)->where('id', $id)->firstOrFail();
        return view('frontend.dashboard.invoice', compact('order'));
    }
}
