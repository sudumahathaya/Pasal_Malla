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

        <!-- Mobile Filter Toggle -->
        <div class="lg:hidden mb-6">
            <button id="mobile-filter-toggle" class="w-full bg-white rounded-xl p-4 shadow-lg border border-gray-100 font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                <i class="fas fa-filter mr-2"></i>
                Show Filters
                @if(request()->hasAny(['search', 'category', 'grade', 'min_price', 'max_price', 'availability', 'featured', 'on_sale']))
                <span class="bg-orange-500 text-white px-2 py-1 rounded-full text-xs ml-2">Active</span>
                @endif
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Filters Sidebar -->
            <div class="lg:col-span-1 order-2 lg:order-1 filter-sidebar hidden lg:block">
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
                            <select name="category" class="w-full px-4 py-3 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div class="mb-8">
                            <label class="block text-sm font-medium text-gray-700 mb-4">Price Range (Rs.)</label>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <input type="number" name="min_price" value="{{ request('min_price') }}"
                                           placeholder="Min" min="0" step="0.01"
                                           class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-sm">
                                </div>
                                <div>
                                    <input type="number" name="max_price" value="{{ request('max_price') }}"
                                           placeholder="Max" min="0" step="0.01"
                                           class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-sm">
                                </div>
                            </div>
                            <div class="mt-2 text-xs text-gray-500">
                                Range: Rs. {{ number_format($priceRange['min'], 2) }} - Rs. {{ number_format($priceRange['max'], 2) }}
                            </div>
                        </div>

                        <!-- Availability -->
                        <div class="mb-8">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Availability</label>
                            <select name="availability" class="w-full px-4 py-3 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                <option value="">All Products</option>
                                <option value="in_stock" {{ request('availability') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                                <option value="low_stock" {{ request('availability') == 'low_stock' ? 'selected' : '' }}>Low Stock</option>
                                <option value="out_of_stock" {{ request('availability') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                            </select>
                        </div>

                        <!-- Special Filters -->
                        <div class="mb-8">
                            <label class="block text-sm font-medium text-gray-700 mb-4">Special Filters</label>
                            <div class="space-y-3">
                                <label class="flex items-center">
                                    <input type="checkbox" name="featured" value="1" {{ request('featured') ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-orange-600 shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50">
                                    <span class="ml-2 text-sm text-gray-700">Featured Products</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="on_sale" value="1" {{ request('on_sale') ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-orange-600 shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50">
                                    <span class="ml-2 text-sm text-gray-700">On Sale</span>
                                </label>
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
                                <option value="popularity" {{ request('sort') == 'popularity' ? 'selected' : '' }}>Most Popular</option>
                                <option value="discount" {{ request('sort') == 'discount' ? 'selected' : '' }}>Highest Discount</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full btn-primary text-white py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold mb-4">
                            <i class="fas fa-filter mr-2"></i>
                            Apply Filters
                        </button>

                        @if(request()->hasAny(['search', 'category', 'grade', 'sort', 'min_price', 'max_price', 'availability', 'featured', 'on_sale']))
                        <a href="{{ route('products.index') }}" class="w-full bg-gray-100 text-gray-700 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-center block hover:bg-gray-200 transition-colors flex items-center justify-center">
                            <i class="fas fa-times mr-2"></i>
                            Clear Filters
                        </a>
                        @endif
                    </form>

                    <!-- Active Filters Display -->
                    @if(request()->hasAny(['search', 'category', 'min_price', 'max_price']))
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h4 class="text-sm font-medium text-gray-700 mb-3">Active Filters:</h4>
                        <div class="flex flex-wrap gap-2">
                            @if(request('search'))
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                Search: "{{ request('search') }}"
                                <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" class="ml-1 text-orange-600 hover:text-orange-800">
                                    <i class="fas fa-times"></i>
                                </a>
                            </span>
                            @endif
                            @if(request('category'))
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Category: {{ $categories->where('slug', request('category'))->first()->name ?? request('category') }}
                                <a href="{{ request()->fullUrlWithQuery(['category' => null]) }}" class="ml-1 text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-times"></i>
                                </a>
                            </span>
                            @endif
                            @if(request('min_price') || request('max_price'))
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Price: Rs. {{ request('min_price', '0') }} - Rs. {{ request('max_price', '∞') }}
                                <a href="{{ request()->fullUrlWithQuery(['min_price' => null, 'max_price' => null]) }}" class="ml-1 text-green-600 hover:text-green-800">
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
                        Showing {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
                        @if(request()->hasAny(['search', 'category', 'min_price', 'max_price']))
                        <span class="text-orange-600 font-medium">(filtered)</span>
                        @endif
                    </p>

                    <!-- Quick Sort (Mobile Friendly) -->
                    <div class="flex items-center space-x-2">
                        <label class="text-sm font-medium text-gray-700">Sort:</label>
                        <select name="sort" onchange="this.form.submit()" class="px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-sm">
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price ↑</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price ↓</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                            <option value="popularity" {{ request('sort') == 'popularity' ? 'selected' : '' }}>Popular</option>
                            <option value="discount" {{ request('sort') == 'discount' ? 'selected' : '' }}>Best Deals</option>
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
                            @elseif($product->stock_quantity == 0)
                            <div class="absolute top-2 sm:top-4 left-2 sm:left-4 bg-gradient-to-r from-red-500 to-red-600 text-white px-2 sm:px-4 py-1 sm:py-2 rounded-full text-xs sm:text-sm font-bold shadow-lg">
                                Out of Stock
                            </div>
                            @endif
                            @if($product->is_featured)
                            <div class="absolute bottom-2 sm:bottom-4 left-2 sm:left-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-2 sm:px-4 py-1 sm:py-2 rounded-full text-xs font-bold shadow-lg">
                                <i class="fas fa-star mr-1"></i>Featured
                            </div>
                            @endif
                            @if($product->stock_quantity == 0)
                            <div class="absolute inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
                                <span class="bg-red-500 text-white px-4 py-2 rounded-lg font-bold">Out of Stock</span>
                            </div>
                            @endif
                        </div>
                        <div class="p-4 sm:p-6 lg:p-8">
                            <div class="flex items-center justify-between mb-2 sm:mb-3">
                                <div class="text-xs sm:text-sm text-orange-600 font-bold bg-orange-50 px-2 sm:px-4 py-1 sm:py-2 rounded-full">
                                    {{ $product->category->name }}
                                </div>
                                @if($product->stock_quantity > 5)
                                <div class="text-green-600 text-base sm:text-lg">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                @elseif($product->stock_quantity > 0)
                                <div class="text-orange-600 text-base sm:text-lg">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                @else
                                <div class="text-red-600 text-base sm:text-lg">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                                @endif
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3 group-hover:text-orange-600 transition-colors">{{ $product->name }}</h3>
                            @if($product->name_sinhala)
                            <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">{{ $product->name_sinhala }}</p>
                            @endif

                            <!-- Grades Display -->
                            <div class="flex items-center justify-between mb-4 sm:mb-6">
                                <div>
                                    <span class="text-xl sm:text-2xl lg:text-3xl font-bold text-orange-600">Rs. {{ number_format($product->getCurrentPrice(), 2) }}</span>
                                    @if($product->hasDiscount())
                                    <div class="text-xs sm:text-sm text-gray-500 line-through mt-1">Rs. {{ number_format($product->price, 2) }}</div>
                                    @endif
                                </div>
                                <div class="text-right">
                                    @if($product->stock_quantity > 5)
                                    <span class="text-xs text-green-600 font-medium">In Stock</span>
                                    @elseif($product->stock_quantity > 0)
                                    <span class="text-xs text-orange-600 font-medium">{{ $product->stock_quantity }} left</span>
                                    @else
                                    <span class="text-xs text-red-600 font-medium">Out of Stock</span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('products.show', $product) }}" class="flex-1 btn-primary text-white py-3 sm:py-4 rounded-xl sm:rounded-2xl font-bold text-center hover:shadow-lg transition-all text-sm sm:text-base">
                                    <i class="fas fa-eye mr-2"></i>
                                    View Details
                                </a>
                                @if($product->stock_quantity > 0)
                                <button class="add-to-cart bg-gradient-to-r from-orange-100 to-orange-200 hover:from-orange-200 hover:to-orange-300 text-orange-700 px-2 sm:px-3 md:px-5 py-2.5 sm:py-3 md:py-4 rounded-xl sm:rounded-2xl transition-all hover:scale-110 hover:shadow-lg min-w-[44px] sm:min-w-[48px]"
                                        data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}"
                                        data-name-sinhala="{{ $product->name_sinhala }}"
                                        data-price="{{ $product->getCurrentPrice() }}"
                                        data-image="{{ $product->getImageUrl() }}"
                                        data-type="product">
                                    <i class="fas fa-shopping-cart text-xs sm:text-sm md:text-base"></i>
                                </button>
                                @else
                                <button disabled class="bg-gray-200 text-gray-400 cursor-not-allowed px-2 sm:px-3 md:px-5 py-2.5 sm:py-3 md:py-4 rounded-xl sm:rounded-2xl min-w-[44px] sm:min-w-[48px]">
                                    <i class="fas fa-shopping-cart text-xs sm:text-sm md:text-base"></i>
                                </button>
                                @endif
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
                    <p class="text-lg sm:text-xl text-gray-600 mb-6 sm:mb-8">
                        @if(request()->hasAny(['search', 'category', 'min_price', 'max_price']))
                        No products match your current filters. Try adjusting your search criteria.
                        @else
                        No products available at the moment.
                        @endif
                    </p>
                    <a href="{{ route('products.index') }}" class="btn-primary text-white px-6 sm:px-8 lg:px-12 py-4 lg:py-5 rounded-xl sm:rounded-2xl font-bold text-lg lg:text-xl">
                        {{ request()->hasAny(['search', 'category', 'min_price', 'max_price']) ? 'Clear Filters' : 'View All Products' }}
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- Filter Summary for Mobile -->
        @if(request()->hasAny(['search', 'category', 'min_price', 'max_price']))
        <div class="lg:hidden mt-8 bg-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-gray-800">Active Filters</h3>
                <a href="{{ route('products.index') }}" class="text-orange-600 hover:text-orange-700 font-medium text-sm">
                    Clear All
                </a>
            </div>
            <div class="flex flex-wrap gap-2">
                @if(request('search'))
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                    Search: "{{ request('search') }}"
                    <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" class="ml-1 text-orange-600 hover:text-orange-800">
                        <i class="fas fa-times"></i>
                    </a>
                </span>
                @endif
                @if(request('category'))
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    Category: {{ $categories->where('slug', request('category'))->first()->name ?? request('category') }}
                    <a href="{{ request()->fullUrlWithQuery(['category' => null]) }}" class="ml-1 text-blue-600 hover:text-blue-800">
                        <i class="fas fa-times"></i>
                    </a>
                </span>
                @endif
                @if(request('min_price') || request('max_price'))
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Price: Rs. {{ request('min_price', '0') }} - Rs. {{ request('max_price', '∞') }}
                    <a href="{{ request()->fullUrlWithQuery(['min_price' => null, 'max_price' => null]) }}" class="ml-1 text-green-600 hover:text-green-800">
                        <i class="fas fa-times"></i>
                    </a>
                </span>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
