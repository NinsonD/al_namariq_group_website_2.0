<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Shop\Http\Requests\ProductReviewRequest;
use Modules\Shop\Models\ProductReview;

class UserReviewController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $reviews = ProductReview::with(['product', 'user'])->where('user_id', $userId)->paginate(10);
        return view('frontend.dashboard.product-review.index', compact('reviews'));
    }

    public function edit($id)
    {
        $review = ProductReview::with(['product', 'user'])->findOrFail($id);
        if($review->user_id != auth()->user()->id){
            return redirect()->route('user.product-review.index')->with('error', __('notification.unauthorized_action'));
        }
        return view('frontend.dashboard.product-review.edit', compact('review'));
    }

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
}
