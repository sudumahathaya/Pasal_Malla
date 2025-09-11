<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Bundle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        // Sales Overview
        $salesStats = [
            'today_sales' => Order::whereDate('created_at', today())->sum('total'),
            'this_week_sales' => Order::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->sum('total'),
            'this_month_sales' => Order::whereMonth('created_at', now()->month)->sum('total'),
            'this_year_sales' => Order::whereYear('created_at', now()->year)->sum('total'),
        ];

        // Order Statistics
        $orderStats = [
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'completed_orders' => Order::where('status', 'delivered')->count(),
            'cancelled_orders' => Order::where('status', 'cancelled')->count(),
        ];

        // Product Statistics
        $productStats = [
            'total_products' => Product::count(),
            'active_products' => Product::where('is_active', true)->count(),
            'low_stock_products' => Product::where('stock_quantity', '<=', 5)->count(),
            'out_of_stock_products' => Product::where('stock_quantity', 0)->count(),
        ];

        // Top Selling Products
        $topProducts = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->groupBy('products.id', 'products.name')
            ->orderBy('total_sold', 'desc')
            ->limit(10)
            ->get();

        // Monthly Sales Chart Data
        $monthlySales = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total) as total_sales'),
            DB::raw('COUNT(*) as total_orders')
        )
        ->whereYear('created_at', now()->year)
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->orderBy('month')
        ->get();

        return view('admin.reports.index', compact(
            'salesStats',
            'orderStats', 
            'productStats',
            'topProducts',
            'monthlySales'
        ));
    }

    public function sales(Request $request)
    {
        $startDate = $request->get('start_date', now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->get('end_date', now()->endOfMonth()->format('Y-m-d'));

        $salesData = Order::whereBetween('created_at', [$startDate, $endDate])
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total) as total_sales'),
                DB::raw('COUNT(*) as total_orders'),
                DB::raw('AVG(total) as average_order_value')
            )
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get();

        $totalSales = $salesData->sum('total_sales');
        $totalOrders = $salesData->sum('total_orders');
        $averageOrderValue = $totalOrders > 0 ? $totalSales / $totalOrders : 0;

        return view('admin.reports.sales', compact(
            'salesData',
            'totalSales',
            'totalOrders',
            'averageOrderValue',
            'startDate',
            'endDate'
        ));
    }

    public function products()
    {
        $productStats = Product::with('category')
            ->select('products.*')
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->selectRaw('COALESCE(SUM(order_items.quantity), 0) as total_sold')
            ->selectRaw('COALESCE(SUM(order_items.total), 0) as total_revenue')
            ->groupBy('products.id')
            ->orderBy('total_sold', 'desc')
            ->paginate(20);

        return view('admin.reports.products', compact('productStats'));
    }

    public function customers()
    {
        $customerStats = Order::select([
            'customer_name',
            'customer_email',
            'customer_phone',
            'city',
            DB::raw('COUNT(*) as total_orders'),
            DB::raw('SUM(total) as total_spent'),
            DB::raw('AVG(total) as average_order_value'),
            DB::raw('MAX(created_at) as last_order_date')
        ])
        ->groupBy('customer_email', 'customer_name', 'customer_phone', 'city')
        ->orderBy('total_spent', 'desc')
        ->paginate(20);

        return view('admin.reports.customers', compact('customerStats'));
    }
}