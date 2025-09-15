@extends('layouts.app')

@section('title', 'All Products - PasalMalla')
@section('description', 'Browse our complete collection of school supplies including books, stationery, bags, uniforms and more.')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-4">
                    <span class="gradient-text">All Products</span>
                </h1>
                <p class="text-2xl text-gray-600 font-medium">Find everything your child needs for school</p>
                <div class="w-24 h-1 bg-gradient-to-r from-orange-500 to-red-500 mx-auto mt-4 rounded-full"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Filters Sidebar -->
            <div class="lg:col-span-1 order-2 lg:order-1">
                <div class="bg-white rounded-2xl sm:rounded-3xl p-4 sm:p-6 lg:p-8 shadow-xl lg:sticky lg:top-24 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-8">
                        <i class="fas fa-filter mr-2 text-orange-500"></i>
                        Filters
                    </h3>

                    <form method="GET" action="{{ route('products.index') }}">
                        <!-- Search -->
                        <div class="mb-8">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   placeholder="Search products..."
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>

                        <!-- Categories -->
                        <div class="mb-8">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                            <select name="category" onchange="this.form.submit()" class="w-full px-4 py-3 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id || request('category') == $category->slug ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div class="mb-8">
                            <label class="block text-sm font-medium text-gray-700 mb-4">Price Range</label>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input type="radio" name="price_range" value="" id="price_all"
                                           {{ !request('price_range') ? 'checked' : '' }}
                                           class="mr-3 text-orange-500 focus:ring-orange-500">
                                    <label for="price_all" class="text-sm text-gray-700">All Prices</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" name="price_range" value="0-100" id="price_0_100"
                                           {{ request('price_range') == '0-100' ? 'checked' : '' }}
                                           class="mr-3 text-orange-500 focus:ring-orange-500">
                                    <label for="price_0_100" class="text-sm text-gray-700">Under Rs. 100</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" name="price_range" value="100-500" id="price_100_500"
                                           {{ request('price_range') == '100-500' ? 'checked' : '' }}
                                           class="mr-3 text-orange-500 focus:ring-orange-500">
                                    <label for="price_100_500" class="text-sm text-gray-700">Rs. 100 - 500</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" name="price_range" value="500-1000" id="price_500_1000"
                                           {{ request('price_range') == '500-1000' ? 'checked' : '' }}
                                           class="mr-3 text-orange-500 focus:ring-orange-500">
                                    <label for="price_500_1000" class="text-sm text-gray-700">Rs. 500 - 1,000</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" name="price_range" value="1000-2000" id="price_1000_2000"
                                           {{ request('price_range') == '1000-2000' ? 'checked' : '' }}
                                           class="mr-3 text-orange-500 focus:ring-orange-500">
                                    <label for="price_1000_2000" class="text-sm text-gray-700">Rs. 1,000 - 2,000</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" name="price_range" value="2000+" id="price_2000_plus"
                                           {{ request('price_range') == '2000+' ? 'checked' : '' }}
                                           class="mr-3 text-orange-500 focus:ring-orange-500">
                                    <label for="price_2000_plus" class="text-sm text-gray-700">Above Rs. 2,000</label>
                                </div>
                            </div>
                        </div>


                        <!-- Sort -->
                        <div class="mb-8">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sort By</label>
                            <select name="sort" class="w-full px-4 py-3 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                                <option value="discount" {{ request('sort') == 'discount' ? 'selected' : '' }}>Highest Discount</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full btn-primary text-white py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold mb-4">
                            <i class="fas fa-filter mr-2"></i>
                            Apply Filters
                        </button>

                        @if(request()->hasAny(['search', 'category', 'sort', 'price_range']))
                        <a href="{{ route('products.index') }}" class="w-full bg-gray-100 text-gray-700 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-center block hover:bg-gray-200 transition-colors flex items-center justify-center">
                            <i class="fas fa-times mr-2"></i>
                            Clear Filters
                        </a>
                        @endif
                    </form>

                    <!-- Active Filters Display -->
                    @if(request()->hasAny(['search', 'category', 'price_range']))
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h4 class="text-sm font-medium text-gray-700 mb-3">Active Filters:</h4>
                        <div class="flex flex-wrap gap-2">
                            @if(request('search'))
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                Search: "{{ request('search') }}"
                                <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" class="ml-2 text-orange-600 hover:text-orange-800">
                                    <i class="fas fa-times"></i>
                                </a>
                            </span>
                            @endif
                            @if(request('category'))
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Category: {{ $currentCategory ? $currentCategory->name : 'Unknown' }}
                                <a href="{{ request()->fullUrlWithQuery(['category' => null]) }}" class="ml-2 text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-times"></i>
                                </a>
                            </span>
                            @endif
                            @if(request('price_range'))
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Price: {{ request('price_range') == '2000+' ? 'Above Rs. 2,000' : 'Rs. ' . str_replace('-', ' - ', request('price_range')) }}
                                <a href="{{ request()->fullUrlWithQuery(['price_range' => null]) }}" class="ml-2 text-green-600 hover:text-green-800">
                                    <i class="fas fa-times"></i>
                                </a>
                            </span>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Products Grid -->
            <div class="lg:col-span-3 order-1 lg:order-2">
                <!-- Results Info -->
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 gap-4">
                    <p class="text-gray-600">
                        @if($currentCategory)
                        Showing products in <span class="font-semibold text-orange-600">{{ $currentCategory->name }}</span> -
                        @endif
                        Showing {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
                        @if(request()->hasAny(['search', 'category', 'price_range']))
                        <span class="text-orange-600 font-medium">(filtered)</span>
                        @endif
                    </p>

                    <!-- Quick Sort (Mobile Friendly) -->
                    <div class="sm:hidden">
                        <select onchange="updateSort(this.value)"
                                class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-sm">
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                            <option value="discount" {{ request('sort') == 'discount' ? 'selected' : '' }}>Highest Discount</option>
                        </select>
                    </div>
                </div>

                @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-8 lg:gap-10">
                    @foreach($products as $product)
                    <div class="card-hover bg-white rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl border border-gray-100 group relative">
                        <div class="relative">
                            <img src="{{ $product->getImageUrl() }}"
                                 alt="{{ $product->name }}" class="w-full h-48 sm:h-56 lg:h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                            @if($product->hasDiscount())
                            <div class="absolute top-2 sm:top-4 right-2 sm:right-4 bg-gradient-to-r from-red-500 to-red-600 text-white px-2 sm:px-4 py-1 sm:py-2 rounded-full text-xs sm:text-sm font-bold shadow-lg animate-pulse">
                                -{{ $product->getDiscountPercentage() }}%
                            </div>
                            @endif
                            @if($product->stock_quantity <= 5)
                            <div class="absolute top-2 sm:top-4 left-2 sm:left-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white px-2 sm:px-4 py-1 sm:py-2 rounded-full text-xs sm:text-sm font-bold shadow-lg">
                                Low Stock
                            </div>
                            @endif
                            @if($product->is_featured)
                            <div class="absolute bottom-2 sm:bottom-4 left-2 sm:left-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-2 sm:px-4 py-1 sm:py-2 rounded-full text-xs font-bold shadow-lg">
                                <i class="fas fa-star mr-1"></i>Featured
                            </div>
                            @endif
                        </div>
                        <div class="p-4 sm:p-6 lg:p-8">
                            <div class="flex items-center justify-between mb-2 sm:mb-3">
                                <div class="text-xs sm:text-sm text-orange-600 font-bold bg-orange-50 px-2 sm:px-4 py-1 sm:py-2 rounded-full">
                                    {{ $product->category->name }}
                                </div>
                                @if($product->stock_quantity > 10)
                                <div class="text-green-600 text-base sm:text-lg">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                @endif
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3 group-hover:text-orange-600 transition-colors">{{ $product->name }}</h3>
                            @if($product->name_sinhala)
                            <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">{{ $product->name_sinhala }}</p>
                            @endif
                            <div class="flex items-center justify-between mb-4 sm:mb-6">
                                <div>
                                    <span class="text-xl sm:text-2xl lg:text-3xl font-bold text-orange-600">Rs. {{ number_format($product->getCurrentPrice(), 2) }}</span>
                                    @if($product->hasDiscount())
                                    <div class="text-xs sm:text-sm text-gray-500 line-through mt-1">Rs. {{ number_format($product->price, 2) }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('products.show', $product) }}" class="flex-1 btn-primary text-white py-3 sm:py-4 rounded-xl sm:rounded-2xl font-bold text-center hover:shadow-lg transition-all text-sm sm:text-base">
                                    <i class="fas fa-eye mr-2"></i>
                                    View Details
                                </a>
                                <button class="add-to-cart bg-gradient-to-r from-orange-100 to-orange-200 hover:from-orange-200 hover:to-orange-300 text-orange-700 px-4 sm:px-5 py-3 sm:py-4 rounded-xl sm:rounded-2xl transition-all hover:scale-110 hover:shadow-lg"
                                        data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}"
                                        data-name-sinhala="{{ $product->name_sinhala }}"
                                        data-price="{{ $product->getCurrentPrice() }}"
                                        data-image="{{ $product->getImageUrl() }}"
                                        data-type="product">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $products->appends(request()->query())->links() }}
                </div>
                @else
                <div class="text-center py-12">
                    <div class="text-6xl sm:text-8xl lg:text-9xl mb-6 sm:mb-8 float-animation">🔍</div>
                    <h3 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 sm:mb-6">No products found</h3>
                    <p class="text-lg sm:text-xl text-gray-600 mb-6 sm:mb-8">Try adjusting your filters or search terms</p>
                    <a href="{{ route('products.index') }}" class="btn-primary text-white px-6 sm:px-8 lg:px-12 py-4 lg:py-5 rounded-xl sm:rounded-2xl font-bold text-lg lg:text-xl">
                        View All Products
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
function updateSort(sortValue) {
    const url = new URL(window.location);
    url.searchParams.set('sort', sortValue);
    window.location.href = url.toString();
}

function updateUrlParameter(url, param, paramVal) {
    const urlObj = new URL(url);
    if (paramVal) {
        urlObj.searchParams.set(param, paramVal);
    } else {
        urlObj.searchParams.delete(param);
    }
    return urlObj.toString();
}

// Auto-submit form when filters change
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action*="products"]');
    const inputs = form.querySelectorAll('input[type="radio"], input[type="checkbox"], select[name="category"]');

    inputs.forEach(input => {
        input.addEventListener('change', function() {
            // Add a small delay to allow multiple quick changes
            clearTimeout(window.filterTimeout);
            window.filterTimeout = setTimeout(() => {
                // For category dropdown, submit immediately
                if (this.name === 'category') {
                    form.submit();
                } else {
                    form.submit();
                }
            }, 300);
        });
    });

    // Handle search input with debounce
    const searchInput = form.querySelector('input[name="search"]');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(window.searchTimeout);
            window.searchTimeout = setTimeout(() => {
                form.submit();
            }, 1000); // 1 second delay for search
        });
    }
});
</script>
@endsection
