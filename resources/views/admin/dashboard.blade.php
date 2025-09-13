@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Overview of your store performance')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600">Total Products</p>
                <p class="text-2xl sm:text-3xl font-bold text-gray-900" data-stat="total_products">{{ $stats['total_products'] }}</p>
                <p class="text-xs sm:text-sm text-green-600"><span data-stat="active_products">{{ $stats['active_products'] }}</span> active</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-box text-blue-600 text-lg sm:text-xl"></i>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600">Total Orders</p>
                <p class="text-2xl sm:text-3xl font-bold text-gray-900" data-stat="total_orders">{{ $stats['total_orders'] }}</p>
                <p class="text-xs sm:text-sm text-orange-600"><span data-stat="pending_orders">{{ $stats['pending_orders'] }}</span> pending</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-shopping-cart text-green-600 text-lg sm:text-xl"></i>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600">Categories</p>
                <p class="text-2xl sm:text-3xl font-bold text-gray-900" data-stat="total_categories">{{ $stats['total_categories'] }}</p>
                <p class="text-xs sm:text-sm text-gray-500">Active categories</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-tags text-purple-600 text-lg sm:text-xl"></i>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600">Bundle Packs</p>
                <p class="text-2xl sm:text-3xl font-bold text-gray-900" data-stat="total_bundles">{{ $stats['total_bundles'] }}</p>
                <p class="text-xs sm:text-sm text-gray-500">Special offers</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-gift text-yellow-600 text-lg sm:text-xl"></i>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
    <!-- Recent Orders -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-4 sm:p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-base sm:text-lg font-semibold text-gray-900">Recent Orders</h3>
                <a href="#" class="text-blue-600 hover:text-blue-800 text-xs sm:text-sm font-medium">View All</a>
            </div>
        </div>
        <div class="p-4 sm:p-6">
            @if($recent_orders->count() > 0)
            <div class="space-y-4">
                @foreach($recent_orders as $order)
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-3 sm:p-4 bg-gray-50 rounded-lg gap-2 sm:gap-0">
                    <div>
                        <p class="text-sm sm:text-base font-medium text-gray-900">#{{ $order->order_number }}</p>
                        <p class="text-xs sm:text-sm text-gray-600">{{ $order->customer_name }}</p>
                        <p class="text-xs text-gray-500">{{ $order->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    <div class="text-left sm:text-right">
                        <p class="text-sm sm:text-base font-bold text-gray-900">Rs. {{ number_format($order->total, 2) }}</p>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                            @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($order->status == 'confirmed') bg-blue-100 text-blue-800
                            @elseif($order->status == 'delivered') bg-green-100 text-green-800
                            @else bg-gray-100 text-gray-800 @endif>
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <i class="fas fa-shopping-cart text-gray-400 text-4xl mb-4"></i>
                <p class="text-sm sm:text-base text-gray-500">No orders yet</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Low Stock Alert -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-4 sm:p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-base sm:text-lg font-semibold text-gray-900">Low Stock Alert</h3>
                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                    <span data-stat="low_stock_products">{{ $stats['low_stock_products'] }}</span> items
                </span>
            </div>
        </div>
        <div class="p-4 sm:p-6">
            @if($low_stock_products->count() > 0)
            <div class="space-y-4">
                @foreach($low_stock_products as $product)
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-3 sm:p-4 bg-red-50 rounded-lg border border-red-200 gap-2 sm:gap-0">
                    <div>
                        <p class="text-sm sm:text-base font-medium text-gray-900">{{ $product->name }}</p>
                        <p class="text-xs sm:text-sm text-gray-600">SKU: {{ $product->sku }}</p>
                    </div>
                    <div class="text-left sm:text-right">
                        <span class="text-sm sm:text-base text-red-600 font-bold">{{ $product->stock_quantity }} left</span>
                        <p class="text-xs text-gray-500">{{ $product->category->name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <i class="fas fa-check-circle text-green-400 text-4xl mb-4"></i>
                <p class="text-sm sm:text-base text-gray-500">All products are well stocked</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="mt-8">
    <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
        <a href="{{ route('admin.products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white p-4 sm:p-6 rounded-lg sm:rounded-xl transition-colors text-center">
            <i class="fas fa-shopping-bag text-xl sm:text-2xl mb-2"></i>
            <p class="text-sm sm:text-base font-semibold">Add Product</p>
        </a>
        <a href="#" class="bg-green-500 hover:bg-green-600 text-white p-4 sm:p-6 rounded-lg sm:rounded-xl transition-colors text-center">
            <i class="fas fa-gift text-xl sm:text-2xl mb-2"></i>
            <p class="text-sm sm:text-base font-semibold">Create Bundle</p>
        </a>
        <a href="#" class="bg-purple-500 hover:bg-purple-600 text-white p-4 sm:p-6 rounded-lg sm:rounded-xl transition-colors text-center">
            <i class="fas fa-tags text-xl sm:text-2xl mb-2"></i>
            <p class="text-sm sm:text-base font-semibold">Add Category</p>
        </a>
        <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white p-4 sm:p-6 rounded-lg sm:rounded-xl transition-colors text-center">
            <i class="fas fa-chart-bar text-xl sm:text-2xl mb-2"></i>
            <p class="text-sm sm:text-base font-semibold">View Reports</p>
        </a>
    </div>
</div>
@endsection





