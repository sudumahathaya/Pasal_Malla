@extends('admin.layouts.app')

@section('title', 'Products')
@section('page-title', 'Products')
@section('page-description', 'Manage your product inventory')

@section('content')
<!-- Filters and Actions -->
<div class="bg-white rounded-xl shadow-sm p-4 sm:p-6 mb-4 sm:mb-6 border border-gray-200">
    <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4">
        <div class="flex-1">
            <form method="GET" action="{{ route('admin.products.index') }}" class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Search products..."
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <select name="category" class="w-full sm:w-auto px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition-colors">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
                @if(request()->hasAny(['search', 'category']))
                <a href="{{ route('admin.products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors text-center">
                    <i class="fas fa-times mr-2"></i>Clear
                </a>
                @endif
            </form>
        </div>
        <div>
            <a href="{{ route('admin.products.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg transition-colors inline-flex items-center justify-center w-full sm:w-auto">
                <i class="fas fa-plus mr-2"></i>Add Product
            </a>
        </div>
    </div>
</div>

<!-- Products Table -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto -mx-4 sm:mx-0">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                    <th class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Category</th>
                    <th class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Stock</th>
                    <th class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Status</th>
                    <th class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-3 sm:px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 sm:h-12 sm:w-12">
                                <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}"
                                     class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg object-cover border border-gray-200"
                                     onerror="this.src='https://via.placeholder.com/48x48?text=No+Image'">
                            </div>
                            <div class="ml-2 sm:ml-4 min-w-0">
                                <div class="text-xs sm:text-sm font-medium text-gray-900 truncate">{{ Str::limit($product->name, 30) }}</div>
                                <div class="text-xs text-gray-500">{{ $product->sku }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap hidden sm:table-cell">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ Str::limit($product->category->name, 15) }}
                        </span>
                    </td>
                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                        <div class="text-xs sm:text-sm text-gray-900">
                            Rs. {{ number_format($product->getCurrentPrice(), 2) }}
                            @if($product->hasDiscount())
                            <div class="text-xs text-gray-500 line-through hidden sm:block">Rs. {{ number_format($product->price, 2) }}</div>
                            @endif
                        </div>
                    </td>
                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap hidden md:table-cell">
                        <span class="text-xs sm:text-sm font-medium
                            @if($product->stock_quantity <= 5) text-red-600
                            @elseif($product->stock_quantity <= 20) text-yellow-600
                            @else text-green-600 @endif">
                            {{ $product->stock_quantity }}
                        </span>
                    </td>
                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap hidden lg:table-cell">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                            @if($product->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        @if($product->is_featured)
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 ml-1">
                            Featured
                        </span>
                        @endif
                    </td>
                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-1 sm:space-x-2">
                            <a href="{{ route('admin.products.show', $product) }}" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-green-600 hover:text-green-900">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="inline"
                                  onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="text-gray-500">
                            <i class="fas fa-box text-4xl mb-4"></i>
                            <p class="text-base sm:text-lg">No products found</p>
                            <p class="text-sm">Add your first product to get started</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($products->hasPages())
    <div class="px-4 sm:px-6 py-4 border-t border-gray-200">
        {{ $products->appends(request()->query())->links() }}
    </div>
    @endif
</div>
@endsection
