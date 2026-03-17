<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Modules\Order\Models\Order;
use Modules\Shop\Models\ProductReview;
use Modules\Shop\Models\Wishlist;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $wishlistCount = DB::table('wishlist_product')
            ->join('wishlists', 'wishlist_product.wishlist_id', '=', 'wishlists.id')
            ->where('wishlists.user_id', $userId)
            ->count();

        $orderStats = Order::where('user_id', $userId)
            ->selectRaw("
                COUNT(*) as totalOrder,
                SUM(CASE WHEN payment_status = 'success' THEN amount_default ELSE 0 END) as totalSpent
            ")
            ->first();

        $reviewCount = ProductReview::where('user_id', $userId)->count();

        return view("frontend.dashboard.index", [
            'totalSpent'    => $orderStats->totalSpent ?? 0,
            'totalOrder'    => $orderStats->totalOrder ?? 0,
            'wishlistCount' => $wishlistCount,
            'reviewCount'   => $reviewCount,
        ]);
    }
}
