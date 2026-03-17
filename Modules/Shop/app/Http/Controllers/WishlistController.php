<?php

namespace Modules\Shop\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Shop\Models\Product;
use Modules\Shop\Models\Wishlist;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('translations')
                        ->whereHas('wishlists', function ($query) {
                            $query->where('user_id', auth()->id());
                        })
                        ->latest()
                        ->paginate(10);

        return view('frontend.ecommerce.wishlist', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => __('notification.please_login_first')
            ], 401);
        }

        if (auth()->user()->type === 'admin') {
            return response()->json([
                'success' => false,
                'message' => __('notification.this_action_is_disabled_for_admin')
            ], 401);
        }

        // Get or create wishlist
        $wishlist = Wishlist::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        // Check if already in wishlist
        $exists = $wishlist->products()->where('product_id', $request->product_id)->exists();

        if ($exists) {
            // Remove from wishlist
            $wishlist->products()->detach($request->product_id);
            return response()->json([
                'success' => true,
                'action' => 'removed',
                'message' => __('notification.product_removed_from_wishlist')
            ]);
        } else {
            // Add to wishlist
            $wishlist->products()->attach($request->product_id);
            return response()->json([
                'success' => true,
                'action' => 'added',
                'message' => __('notification.product_added_to_wishlist')
            ]);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $wishlist = Wishlist::where('user_id', auth()->id())->first();

        if (!$wishlist) {
            return response()->json([
                'success' => false,
                'message' => __('notification.wishlist_not_found')
            ], 404);
        }

        $wishlist->products()->detach($id);

        $products = Product::with('translations')
                        ->whereHas('wishlists', function ($query) {
                            $query->where('user_id', auth()->id());
                        })
                        ->latest()
                        ->paginate(10);


        return response()->json([
            'success' => true,
            'message' => 'Product removed from wishlist',
            'html' => view('frontend.ecommerce.partials.wishlist-content', ['products' => $products])->render()
        ]);
    }
}
