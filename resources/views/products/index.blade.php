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
                                   class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        </div>

                        <!-- Categories -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                            <select name="category" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
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
                            <select name="grade" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
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
                            <select name="sort" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full btn-primary text-white py-3 rounded-lg font-semibold">
                            Apply Filters
                        </button>

                        @if(request()->hasAny(['search', 'category', 'grade', 'sort']))
                        <a href="{{ route('products.index') }}" class="w-full bg-gray-100 text-gray-700 py-3 rounded-lg font-semibold text-center block mt-3 hover:bg-gray-200 transition-colors">
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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                    <div class="card-hover bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                        <div class="relative">
                            <img src="https://images.pexels.com/photos/159751/book-address-book-learning-learn-159751.jpeg?auto=compress&cs=tinysrgb&w=400"
                                 alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            @if($product->hasDiscount())
                            <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                -{{ $product->getDiscountPercentage() }}%
                            </div>
                            @endif
                            @if($product->stock_quantity <= 5)
                            <div class="absolute top-4 left-4 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                Low Stock
                            </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="text-sm text-primary-600 font-medium mb-2">{{ $product->category->name }}</div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $product->name }}</h3>
                            @if($product->name_sinhala)
                            <p class="text-gray-600 mb-3">{{ $product->name_sinhala }}</p>
                            @endif
                            @if($product->grades)
                            <div class="flex flex-wrap gap-1 mb-3">
                                @foreach($product->grades as $grade)
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">{{ $grade }}</span>
                                @endforeach
                            </div>
                            @endif
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <span class="text-xl font-bold text-primary-600">Rs. {{ number_format($product->getCurrentPrice(), 2) }}</span>
                                    @if($product->hasDiscount())
                                    <span class="text-sm text-gray-500 line-through ml-2">Rs. {{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <a href="{{ route('products.show', $product) }}"
                                   class="flex-1 btn-primary text-white py-2 rounded-lg font-semibold text-center text-sm">
                                    View Details
                                </a>
                                <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-colors">
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
                    <div class="text-6xl mb-4">🔍</div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">No products found</h3>
                    <p class="text-gray-600 mb-6">Try adjusting your filters or search terms</p>
                    <a href="{{ route('products.index') }}" class="btn-primary text-white px-6 py-3 rounded-lg font-semibold">
                        View All Products
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
