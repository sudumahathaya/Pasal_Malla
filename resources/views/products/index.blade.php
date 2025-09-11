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
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl p-8 shadow-xl sticky top-24 border border-gray-100">
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
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>

                        <!-- Categories -->
                        <div class="mb-8">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                            <select name="category" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Sort -->
                        <div class="mb-8">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sort By</label>
                            <select name="sort" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full btn-primary text-white py-4 rounded-xl font-bold mb-4">
                            <i class="fas fa-filter mr-2"></i>
                            Apply Filters
                        </button>

                        @if(request()->hasAny(['search', 'category', 'grade', 'sort']))
                        <a href="{{ route('products.index') }}" class="w-full bg-gray-100 text-gray-700 py-4 rounded-xl font-bold text-center block hover:bg-gray-200 transition-colors flex items-center justify-center">
                            <i class="fas fa-times mr-2"></i>
                            Clear Filters
                        </a>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="lg:col-span-3">
                <!-- Results Info -->
                <div class="flex justify-between items-center mb-6">
                    <p class="text-gray-600">
                        Showing {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
                    </p>
                </div>

                @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($products as $product)
                    <div class="card-hover bg-white rounded-3xl overflow-hidden shadow-xl border border-gray-100 group relative">
                        <div class="relative">
                            <img src="{{ $product->getImageUrl() }}"
                                 alt="{{ $product->name }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                            @if($product->hasDiscount())
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg animate-pulse">
                                -{{ $product->getDiscountPercentage() }}%
                            </div>
                            @endif
                            @if($product->stock_quantity <= 5)
                            <div class="absolute top-4 left-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Low Stock
                            </div>
                            @endif
                            @if($product->is_featured)
                            <div class="absolute bottom-4 left-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                                <i class="fas fa-star mr-1"></i>Featured
                            </div>
                            @endif
                        </div>
                        <div class="p-8">
                            <div class="flex items-center justify-between mb-3">
                                <div class="text-sm text-orange-600 font-bold bg-orange-50 px-4 py-2 rounded-full">
                                    {{ $product->category->name }}
                                </div>
                                @if($product->stock_quantity > 10)
                                <div class="text-green-600 text-lg">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-orange-600 transition-colors">{{ $product->name }}</h3>
                            @if($product->name_sinhala)
                            <p class="text-gray-600 mb-4">{{ $product->name_sinhala }}</p>
                            @endif
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <span class="text-3xl font-bold text-orange-600">Rs. {{ number_format($product->getCurrentPrice(), 2) }}</span>
                                    @if($product->hasDiscount())
                                    <div class="text-sm text-gray-500 line-through mt-1">Rs. {{ number_format($product->price, 2) }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('products.show', $product) }}" class="flex-1 btn-primary text-white py-4 rounded-2xl font-bold text-center hover:shadow-lg transition-all">
                                    <i class="fas fa-eye mr-2"></i>
                                    View Details
                                </a>
                                <button class="add-to-cart bg-gradient-to-r from-orange-100 to-orange-200 hover:from-orange-200 hover:to-orange-300 text-orange-700 px-5 py-4 rounded-2xl transition-all hover:scale-110 hover:shadow-lg"
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
                    <div class="text-9xl mb-8 float-animation">🔍</div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-6">No products found</h3>
                    <p class="text-xl text-gray-600 mb-8">Try adjusting your filters or search terms</p>
                    <a href="{{ route('products.index') }}" class="btn-primary text-white px-12 py-5 rounded-2xl font-bold text-xl">
                        View All Products
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
