<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Modules\Shop\Models\Product;
use Modules\Shop\Models\ProductCategory;
use Modules\Shop\Models\ProductReview;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with([
            'translations',
            'category',
            'category.translations',
            'reviews'
        ])->active();

        if (auth()->check() && auth()->user()->type !== 'admin') {
            $query->withExists([
                'wishlists as is_wishlisted' => fn($q) => $q->where('user_id', auth()->id())
            ]);
        } else {
            $query->select('products.*')->selectRaw('0 as is_wishlisted');
        }

        $priceQuery = Product::active();
        if ($request->filled('categories')) {
            $priceQuery->whereIn('product_category_id', $request->categories);
        }
        if ($request->boolean('in_stock')) {
            $priceQuery->where('qty', '>', 0);
        } elseif ($request->boolean('out_of_stock')) {
            $priceQuery->where('qty', '<=', 0);
        }
        if ($request->boolean('on_sale')) {
            $priceQuery->onSale();
        }
        if ($request->filled('price_min') && $request->filled('price_max')) {
            $priceQuery->whereBetween('price', [(float)$request->price_min, (float)$request->price_max]);
        }
        if ($request->filled('search')) {
            $query->whereHas('translations', fn($q) =>
                $q->where('title', 'like', '%' . $request->search . '%')
            );
        }

        $priceData = $priceQuery
            ->selectRaw('MIN(price) as min_price, MAX(price) as max_price')
            ->first();


        $minPrice = $priceData->min_price !== null ? themeCurrency($priceData->min_price, false, false) : 0;
        $maxPrice = $priceData->max_price !== null ? themeCurrency($priceData->max_price, false, false) : 0;


        $categories = ProductCategory::with(['translations'])
            ->withCount(['products as products_count' => fn($q) => $q->active()])
            ->active()
            ->whereHas('products', fn($q) => $q->active())
            ->get();


        if ($request->filled('categories')) {
            $query->whereIn('product_category_id', $request->categories);
        }

        if ($request->filled('ratings')) {
            $ratings = $request->input('ratings');
            if (!is_array($ratings)) {
                $ratings = array_filter(explode(',', (string)$ratings), 'strlen');
            }
            $ratings = array_map('intval', $ratings);
            $ratings = array_values(array_filter($ratings, fn($r) => $r >= 1 && $r <= 5));

            if (!empty($ratings)) {
                $ratingSub = ProductReview::selectRaw('product_id, ROUND(AVG(rating)) as avg_rating')
                    ->where('status', 1)
                    ->groupBy('product_id');

                $query->leftJoinSub($ratingSub, 'rating_agg', 'rating_agg.product_id', '=', 'products.id')
                    ->whereIn('rating_agg.avg_rating', $ratings)
                    ->select('products.*', DB::raw('rating_agg.avg_rating as avg_rating'));
            }
        }

        if ($request->boolean('in_stock')) {
            $query->where('qty', '>', 0);
        } elseif ($request->boolean('out_of_stock')) {
            $query->where('qty', '<=', 0);
        }

        if ($request->boolean('on_sale')) {
            $query->onSale();
        }

        if ($request->filled('price_min') && $request->filled('price_max')) {

            $currency = getSessionCurrency();
            $min = (float) round($request->price_min / $currency['rate'], 2);
            $max = (float) round($request->price_max / $currency['rate'], 2);

            $query->whereBetween('price', [$min, $max]);
        }

        // Sorting
        if ($request->filled('sort_by')) {
            switch ($request->sort_by) {
                case 'low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'high':
                    $query->orderBy('price', 'desc');
                    break;
                case 'new':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'sale':
                    $query->onSale()->orderBy('created_at', 'desc');
                    break;
            }
        } else {
            $query->latest();
        }

        $products = $query->paginate(12);

        // AJAX response
        if ($request->ajax()) {
            return response()->json([
                'html' => view('frontend.products.partials.products-grid', ['products' => $products])->render(),
                'count_html' => view('frontend.products.partials.product-result', [
                    'firstItem' => $products->firstItem(),
                    'lastItem' => $products->lastItem(),
                    'total' => $products->total(),
                ])->render(),
            ]);
        }

        // Initial page load
        return view('frontend.products.index', compact('products', 'categories', 'minPrice', 'maxPrice'));
    }



    public function show(string $slug, Request $request)
    {
        // Fetch the main product
        $product = Product::with([
            'gallery',
            'translations',
            'category',
            'category.translations',
            'reviews'
        ])->where('slug', $slug)->firstOrFail();

        // Reviews query (approved and paginated)
        $reviews = $product->reviews()
            ->approved()
            ->with('user')
            ->latest()
            ->paginate(10);

        // AJAX request: return only reviews list
        if ($request->ajax()) {
            return response()->json([
                'html' => view('frontend.products.partials.details.tabs._review-list', compact('reviews'))->render(),
            ]);
        }

        // Related products query
        $relatedProducts = Product::with([
                'translations',
                'category',
                'category.translations',
                'reviews'
            ])
            ->active()
            ->where('id', '!=', $product->id) // exclude current product
            ->where('product_category_id', $product->product_category_id) // match same category
            ->latest()
            ->take(8)
            ->get();

        return view('frontend.products.show', compact('product', 'reviews', 'relatedProducts'));

    }

    public function quickView($id)
    {
        $product = Product::with(['gallery', 'translations', 'category', 'category.translations', 'wishlists', 'reviews' => fn($q) => $q->approved()])->find($id);

        if(!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        return response()->json([
            'success' => true,
            'html' => view('frontend.products.partials.details.details-content', compact('product'))->render()
        ], 200);
    }

}
