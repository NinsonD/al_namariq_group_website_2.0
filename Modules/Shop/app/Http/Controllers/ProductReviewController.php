<?php

namespace Modules\Shop\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Shop\Http\Requests\ProductReviewRequest;
use Modules\Shop\Models\Product;
use Modules\Shop\Models\ProductReview;

class ProductReviewController extends Controller implements HasMiddleware
{

    public static function middleware(){
        return [
            new Middleware('permission:product_review-show', ['index', 'show']),
            new Middleware('permission:product_review-update', ['update']),
            new Middleware('permission:product_review-status_update', ['updateStatus']),
            new Middleware('permission:product_review-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ProductReview::with(['product', 'user']);

        if ($request->filled('status')) {
            $status = $request->get('status') == 'active' ? 1 : 0;
            $query->where('status', $status);
        }


        if ($request->filled('rating')) {
            $query->where('rating', $request->get('rating'));
        }


        $perPage = $request->get('per_page', 15);
        if ($perPage === 'all') {
            $reviews = $query->latest()->get();
        } else {
            $reviews = $query->latest()->paginate((int) $perPage);
        }

        return view('shop::reviews.index', compact('reviews'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductReviewRequest $request)
    {
        $product = Product::with('reviews')->find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', __('notification.item_not_found', ['item' => __('attribute.product')]));
        }

        // check if user has purchased the product
        if (auth()->check() && !$product->isPurchasedByUser(auth()->id())) {
            return redirect()->back()->with('error', __('notification.you_must_purchase_product_to_review'));
        }

        // check if user has already reviewed the product
        $existingReview = $product->reviews()->where('user_id', auth()->id())->first();
        if ($existingReview) {
            return redirect()->back()->with('error', __('notification.you_have_already_reviewed_this_product'));
        }

        $product->reviews()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
            'rating' => $request->rating,
            'status' => cache('setting')->reviews_auto_approved ? true : false,
        ]);

        if(cache('setting')->reviews_auto_approved){
            // update product average rating
            return redirect()->back()->with('success', __('notification.thanks_for_your_review'));
        }else{
            return redirect()->back()->with('success', __('notification.review_submitted_successfully'));
        }

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $reviews = ProductReview::with(['product', 'user'])->where('product_id', $id)->paginate(15);
        return view('shop::reviews.show', compact('reviews'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductReviewRequest $request, $id)
    {
        $review = ProductReview::find($id);

        // check if auth user
        if($review->user_id !== auth()->id()) {
            return redirect()->back()->with('error', __('notification.unauthorized_action'));
        }

        if (!$review) {
            return redirect()->back()->with('error', __('notification.item_not_found', ['item' => __('attribute.review')]));
        }

        $data = $request->validated();
        $data['status'] = false;

        $review->update($data);

        return redirect()->back()->with('success', __('notification.review_updated_successfully_with_pending_approval'));
    }

    public function updateStatus($id)
    {
        $review = ProductReview::find($id);

        if (!$review) {
            return response()->json([
                'status' => false,
                'message' => __('notification.not_found', ['field' => __('admin.review')]),
            ]);
        }


        $review->status = !$review->status;
        $review->save();

        return response()->json([
            'status' => true,
            'message' => __('notification.status_updated', ['field' => __('admin.review')]),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $review = ProductReview::find($id);

        if (!$review) {
            return redirect()->back()->with('error', __('notification.item_not_found', ['item' => __('attribute.review')]));
        }

        $review->delete();

        return redirect()->route('admin.product-review.index')->with('success', __('notification.deleted', ['field' => __('admin.review')]));
    }
}
