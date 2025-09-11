@extends('layouts.app')

@section('title', 'All Products - PasalMalla')
@section('description', 'Browse our complete collection of school supplies including books, stationery, bags, uniforms and more.')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">All Products</h1>
            <p class="text-xl text-gray-600">Find everything your child needs for school</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Filters Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl p-6 shadow-lg sticky top-24">
                    <h3 class="text-lg font-bold text-gray-800 mb-6">Filters</h3>

                    <form method="GET" action="{{ route('products.index') }}">
                        <!-- Search -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   placeholder="Search products..."
                                   class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>

                        <!-- Categories -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                            <select name="category" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Grade Level -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Grade Level</label>
                            <select name="grade" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <option value="">All Grades</option>
                                <option value="Grade 1" {{ request('grade') == 'Grade 1' ? 'selected' : '' }}>Grade 1</option>
                                <option value="Grade 2" {{ request('grade') == 'Grade 2' ? 'selected' : '' }}>Grade 2</option>
                                <option value="Grade 3" {{ request('grade') == 'Grade 3' ? 'selected' : '' }}>Grade 3</option>
                                <option value="Grade 4" {{ request('grade') == 'Grade 4' ? 'selected' : '' }}>Grade 4</option>
                                <option value="Grade 5" {{ request('grade') == 'Grade 5' ? 'selected' : '' }}>Grade 5</option>
                                <option value="Grade 6-9" {{ request('grade') == 'Grade 6-9' ? 'selected' : '' }}>Grade 6-9</option>
                                <option value="O/L" {{ request('grade') == 'O/L' ? 'selected' : '' }}>O/L</option>
                                <option value="A/L" {{ request('grade') == 'A/L' ? 'selected' : '' }}>A/L</option>
                            </select>
                        </div>

                        <!-- Sort -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sort By</label>
                            <select name="sort" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full btn-primary text-white py-3 rounded-lg font-semibold mb-3">
                            <i class="fas fa-filter mr-2"></i>
                            Apply Filters
                        </button>

                        @if(request()->hasAny(['search', 'category', 'grade', 'sort']))
                        <a href="{{ route('products.index') }}" class="w-full bg-gray-100 text-gray-700 py-3 rounded-lg font-semibold text-center block mt-3 hover:bg-gray-200 transition-colors flex items-center justify-center">
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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($products as $product)
                    <div class="card-hover bg-white rounded-3xl overflow-hidden shadow-xl border border-gray-100 group">
                        <div class="relative">
                            @php
                                $imageUrl = match($product->category->slug) {
                                    'books-notebooks' => 'https://images.pexels.com/photos/159751/book-address-book-learning-learn-159751.jpeg?auto=compress&cs=tinysrgb&w=400',
                                    'stationery' => 'https://images.pexels.com/photos/207662/pexels-photo-207662.jpeg?auto=compress&cs=tinysrgb&w=400',
                                    'school-bags' => 'https://images.pexels.com/photos/2905238/pexels-photo-2905238.jpeg?auto=compress&cs=tinysrgb&w=400',
                                    'lunch-water-bottles' => 'https://images.pexels.com/photos/6195129/pexels-photo-6195129.jpeg?auto=compress&cs=tinysrgb&w=400',
                                    'art-craft' => 'https://images.pexels.com/photos/1148998/pexels-photo-1148998.jpeg?auto=compress&cs=tinysrgb&w=400',
                                    default => 'https://images.pexels.com/photos/159751/book-address-book-learning-learn-159751.jpeg?auto=compress&cs=tinysrgb&w=400'
                                };
                            @endphp
                            <img src="{{ $imageUrl }}"
                                 alt="{{ $product->name }}" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                            @if($product->hasDiscount())
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-2 rounded-full text-sm font-bold shadow-lg animate-pulse">
                                -{{ $product->getDiscountPercentage() }}%
                            </div>
                            @endif
                            @if($product->stock_quantity <= 5)
                            <div class="absolute top-4 left-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-2 rounded-full text-sm font-bold shadow-lg">
                                Low Stock
                            </div>
                            @endif
                            @if($product->is_featured)
                            <div class="absolute bottom-4 left-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                <i class="fas fa-star mr-1"></i>Featured
                            </div>
                            @endif
                        </div>
                        <div class="p-8">
                            <div class="flex items-center justify-between mb-3">
                                <div class="text-sm text-orange-600 font-semibold bg-orange-50 px-3 py-1 rounded-full">
                                    {{ $product->category->name }}
                                </div>
                                @if($product->stock_quantity > 10)
                                <div class="text-green-600">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-orange-600 transition-colors">{{ $product->name }}</h3>
                            @if($product->name_sinhala)
                            <p class="text-gray-600 mb-4 text-sm">{{ $product->name_sinhala }}</p>
                            @endif
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <span class="text-2xl font-bold text-orange-600">Rs. {{ number_format($product->getCurrentPrice(), 2) }}</span>
                                    @if($product->hasDiscount())
                                    <div class="text-sm text-gray-500 line-through">Rs. {{ number_format($product->price, 2) }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('products.show', $product) }}" class="flex-1 btn-primary text-white py-3 rounded-xl font-semibold text-center text-sm hover:shadow-lg transition-all">
                                    <i class="fas fa-eye mr-1"></i>
                                    View Details
                                </a>
                                <button class="bg-gradient-to-r from-orange-100 to-orange-200 hover:from-orange-200 hover:to-orange-300 text-orange-700 px-4 py-3 rounded-xl transition-all hover:scale-105 hover:shadow-md">
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
                    <div class="text-8xl mb-6">🔍</div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">No products found</h3>
                    <p class="text-gray-600 mb-6">Try adjusting your filters or search terms</p>
                    <a href="{{ route('products.index') }}" class="btn-primary text-white px-8 py-4 rounded-xl font-semibold text-lg">
                        View All Products
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
