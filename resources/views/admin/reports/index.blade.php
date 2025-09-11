@extends('admin.layouts.app')

@section('title', 'Reports')
@section('page-title', 'Reports & Analytics')
@section('page-description', 'Business insights and performance metrics')

@section('content')
<!-- Sales Overview -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm font-medium">Today's Sales</p>
                <p class="text-3xl font-bold">Rs. {{ number_format($salesStats['today_sales'], 2) }}</p>
            </div>
            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                <i class="fas fa-calendar-day text-white text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm font-medium">This Week</p>
                <p class="text-3xl font-bold">Rs. {{ number_format($salesStats['this_week_sales'], 2) }}</p>
            </div>
            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                <i class="fas fa-calendar-week text-white text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm font-medium">This Month</p>
                <p class="text-3xl font-bold">Rs. {{ number_format($salesStats['this_month_sales'], 2) }}</p>
            </div>
            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                <i class="fas fa-calendar-alt text-white text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-orange-100 text-sm font-medium">This Year</p>
                <p class="text-3xl font-bold">Rs. {{ number_format($salesStats['this_year_sales'], 2) }}</p>
            </div>
            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                <i class="fas fa-calendar text-white text-xl"></i>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Order Statistics -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800 mb-6">Order Statistics</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-shopping-cart text-white"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Total Orders</p>
                        <p class="text-sm text-gray-600">All time orders</p>
                    </div>
                </div>
                <span class="text-2xl font-bold text-blue-600">{{ $orderStats['total_orders'] }}</span>
            </div>

            <div class="flex items-center justify-between p-4 bg-yellow-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-clock text-white"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Pending Orders</p>
                        <p class="text-sm text-gray-600">Awaiting confirmation</p>
                    </div>
                </div>
                <span class="text-2xl font-bold text-yellow-600">{{ $orderStats['pending_orders'] }}</span>
            </div>

            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-check-circle text-white"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Completed Orders</p>
                        <p class="text-sm text-gray-600">Successfully delivered</p>
                    </div>
                </div>
                <span class="text-2xl font-bold text-green-600">{{ $orderStats['completed_orders'] }}</span>
            </div>

            <div class="flex items-center justify-between p-4 bg-red-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-times-circle text-white"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Cancelled Orders</p>
                        <p class="text-sm text-gray-600">Cancelled by customer</p>
                    </div>
                </div>
                <span class="text-2xl font-bold text-red-600">{{ $orderStats['cancelled_orders'] }}</span>
            </div>
        </div>
    </div>

    <!-- Product Statistics -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800 mb-6">Product Statistics</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-box text-white"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Total Products</p>
                        <p class="text-sm text-gray-600">All products in catalog</p>
                    </div>
                </div>
                <span class="text-2xl font-bold text-blue-600">{{ $productStats['total_products'] }}</span>
            </div>

            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-check text-white"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Active Products</p>
                        <p class="text-sm text-gray-600">Available for sale</p>
                    </div>
                </div>
                <span class="text-2xl font-bold text-green-600">{{ $productStats['active_products'] }}</span>
            </div>

            <div class="flex items-center justify-between p-4 bg-orange-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Low Stock</p>
                        <p class="text-sm text-gray-600">5 or fewer items</p>
                    </div>
                </div>
                <span class="text-2xl font-bold text-orange-600">{{ $productStats['low_stock_products'] }}</span>
            </div>

            <div class="flex items-center justify-between p-4 bg-red-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-times text-white"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Out of Stock</p>
                        <p class="text-sm text-gray-600">No items available</p>
                    </div>
                </div>
                <span class="text-2xl font-bold text-red-600">{{ $productStats['out_of_stock_products'] }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Top Selling Products -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">Top Selling Products</h3>
    </div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-3 px-4 font-medium text-gray-600">Rank</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-600">Product Name</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-600">Units Sold</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topProducts as $index => $product)
                    <tr class="border-b border-gray-100">
                        <td class="py-3 px-4">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full
                                @if($index == 0) bg-yellow-100 text-yellow-800
                                @elseif($index == 1) bg-gray-100 text-gray-800
                                @elseif($index == 2) bg-orange-100 text-orange-800
                                @else bg-blue-100 text-blue-800 @endif font-bold">
                                {{ $index + 1 }}
                            </span>
                        </td>
                        <td class="py-3 px-4 font-medium text-gray-800">{{ $product->name }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $product->total_sold }} units</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <a href="{{ route('admin.reports.sales') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-chart-line text-blue-600 text-xl"></i>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800">Sales Report</h4>
                <p class="text-sm text-gray-600">Detailed sales analytics</p>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.reports.products') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-box text-green-600 text-xl"></i>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800">Product Report</h4>
                <p class="text-sm text-gray-600">Product performance metrics</p>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.reports.customers') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-users text-purple-600 text-xl"></i>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800">Customer Report</h4>
                <p class="text-sm text-gray-600">Customer analytics</p>
            </div>
        </div>
    </a>
</div>
@endsection
