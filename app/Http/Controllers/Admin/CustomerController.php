<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::select([
            'customer_name',
            'customer_email',
            'customer_phone',
            'city',
            DB::raw('COUNT(*) as total_orders'),
            DB::raw('SUM(total) as total_spent'),
            DB::raw('MAX(created_at) as last_order_date'),
            DB::raw('MIN(created_at) as first_order_date')
        ])
            ->groupBy('customer_email', 'customer_name', 'customer_phone', 'city');

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('customer_name', 'like', "%{$search}%")
                    ->orWhere('customer_email', 'like', "%{$search}%")
                    ->orWhere('customer_phone', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%");
            });
        }

        $customers = $query->orderBy('total_spent', 'desc')->paginate(20);

        $stats = [
            'total_customers' => Order::distinct('customer_email')->count(),
            'new_customers_this_month' => Order::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->distinct('customer_email')
                ->count(),
            'repeat_customers' => Order::select('customer_email')
                ->groupBy('customer_email')
                ->havingRaw('COUNT(*) > 1')
                ->get()
                ->count(),
            'average_order_value' => Order::avg('total'),
        ];

        return view('admin.customers.index', compact('customers', 'stats'));
    }

    public function show(Request $request, $email)
    {
        $customer = Order::where('customer_email', $email)->first();

        if (!$customer) {
            abort(404);
        }

        $orders = Order::where('customer_email', $email)
            ->with('orderItems')
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total_orders' => $orders->count(),
            'total_spent' => $orders->sum('total'),
            'average_order_value' => $orders->avg('total'),
            'first_order' => $orders->min('created_at'),
            'last_order' => $orders->max('created_at'),
        ];

        return view('admin.customers.show', compact('customer', 'orders', 'stats'));
    }
}
