<?php

namespace Modules\Core\Http\Controllers\Admin;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Faqs\Models\Faq;
use Modules\Blog\Models\Blog;
use Modules\Order\Models\Order;
use Modules\Order\Models\Refund;
use Modules\Page\Models\Page;
use Modules\Shop\Models\Product;
use Modules\Team\Models\Team;
use Modules\Brand\Models\Brand;
use Modules\Pricing\Models\Pricing;
use Modules\Service\Models\Service;
use App\Http\Controllers\Controller;
use Modules\Blog\Models\BlogCategory;
use Modules\Portfolio\Models\Portfolio;
use Modules\NewsLetter\Models\NewsLetter;
use Modules\Testimonial\Models\Testimonial;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $month = (int) $request->input('month', now()->month);
        $year = (int) $request->input('year', now()->year);

        // Get available years from orders
        $availableYears = Order::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->pluck('year');

        // Daily stats
        $orderStats = Order::whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->where('order_status', 'success')
            ->where('payment_status', 'success')
            ->selectRaw('DATE(created_at) as date, COUNT(id) as total_orders, SUM(amount_default) as total_amount')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Transform for chart
        $dates = [];
        $orderCounts = [];
        $orderAmounts = [];

        $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $dateObj = Carbon::createFromDate($year, $month, $day);
            $dateStr = $dateObj->toDateString(); // for lookup
            $dates[] = $dateObj->toIso8601String(); // ISO for chart

            $stat = $orderStats->firstWhere('date', $dateStr);
            $orderCounts[] = $stat ? $stat->total_orders : 0;
            $orderAmounts[] = $stat ? (float)$stat->total_amount : 0;
        }

        // Other stats
        $orderQuery = Order::query();

        $pendingOrder = (clone $orderQuery)->where('order_status', 'pending')->count();
        $totalOrder   = (clone $orderQuery)->count();
        $totalRevenue = (clone $orderQuery)->where('order_status', 'success')->where('payment_status', 'success')->sum('amount_default');
        $draftOrders  = (clone $orderQuery)->where('order_status', 'draft')->count();
        $latestOrders = (clone $orderQuery)->with('user')->latest()->take(5)->get();




        $refundRequests = Refund::where('status', 'pending')->count();
        $productsCount = Product::count();

        $latestUsers = User::user()->latest()->take(5)->get();
        $latestProducts = Product::with(['translations'])->latest()->take(5)->get();
        $latestPosts = Blog::with(['translations'])->latest()->take(5)->get();

        return view('core::dashboard', compact(
            'dates', 'orderCounts', 'orderAmounts', 'month', 'year', 'availableYears',
            'pendingOrder', 'refundRequests', 'draftOrders',
            'totalOrder', 'totalRevenue', 'productsCount',
            'latestUsers', 'latestProducts', 'latestOrders',
            'latestPosts'
        ));
    }
}
