@extends('layouts.app')

@section('title', 'PasalMalla - ලමයෙක් පාසලට ගන්න ඕන හම දේකම!')
@section('description', 'Sri Lanka\'s best online school supplies store. Books, stationery, bags, uniforms and more with free delivery!')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white py-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    🎒 PasalMalla
                </h1>
                <h2 class="text-2xl lg:text-3xl mb-6 text-blue-100">
                    ලමයෙක් පාසලට ගන්න ඕන හම දේකම!
                </h2>
                <p class="text-xl mb-8 text-blue-100">
                    Everything your child needs for school - from books and stationery to bags and uniforms.
                    Shop online with free delivery across Sri Lanka!
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('products.index') }}" class="btn-secondary text-white px-8 py-4 rounded-xl font-semibold text-lg inline-flex items-center justify-center">
                        <i class="fas fa-shopping-bag mr-3"></i>
                        Shop Now
                    </a>
                    <a href="{{ route('bundles.index') }}" class="btn-glass px-8 py-4 rounded-xl font-semibold text-lg">
                        <i class="fas fa-gift mr-3"></i>
                        Special Packs
                    </a>
                </div>
            </div>
            <div class="text-center">
                <div class="relative">
                    <div class="w-80 h-80 mx-auto bg-white bg-opacity-10 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <div class="text-8xl">
                            🎒📚✏️
                        </div>
                    </div>
                    <div class="absolute -top-4 -right-4 bg-secondary-500 text-white px-4 py-2 rounded-full font-bold animate-bounce">
                        Free Delivery!
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Shop by Category</h2>
            <p class="text-xl text-gray-600">අයිතම වර්ග කරා යන්න</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 max-w-6xl mx-auto">
            @foreach($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->slug]) }}"
               class="card-hover bg-gray-50 rounded-2xl p-6 text-center group">
                <div class="text-4xl mb-4">{{ $category->icon ?? '📚' }}</div>
                <h3 class="font-semibold text-gray-800 mb-2">{{ $category->name }}</h3>
                <p class="text-sm text-gray-600">{{ $category->name_sinhala }}</p>
                <div class="mt-4 text-orange-600 group-hover:text-orange-700 transition-colors">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</section>

<!-- Featured Bundles Section -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Special Bundle Packs</h2>
            <p class="text-xl text-gray-600">Save money with our carefully curated school supply bundles</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($featuredBundles as $bundle)
            <div class="card-hover bg-white rounded-2xl overflow-hidden shadow-lg">
                <div class="relative">
                    <img src="https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=400"
                         alt="{{ $bundle->name }}" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                        Save {{ $bundle->getSavingsPercentage() }}%
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $bundle->name }}</h3>
                    <p class="text-gray-600 mb-2">{{ $bundle->name_sinhala }}</p>
                    <p class="text-sm text-gray-500 mb-4">{{ Str::limit($bundle->description, 80) }}</p>
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <span class="text-2xl font-bold text-orange-600">Rs. {{ number_format($bundle->price, 2) }}</span>
                            <span class="text-sm text-gray-500 line-through ml-2">Rs. {{ number_format($bundle->original_price, 2) }}</span>
                        </div>
                    </div>
                    <a href="{{ route('bundles.show', $bundle) }}"
                       class="w-full btn-primary text-white py-3 rounded-xl font-semibold text-center block">
                        View Bundle
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('bundles.index') }}" class="btn-secondary text-white px-8 py-4 rounded-xl font-semibold text-lg">
                <i class="fas fa-gift mr-3"></i>
                View All Bundles
            </a>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Featured Products</h2>
            <p class="text-xl text-gray-600">Popular items loved by students and parents</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($featuredProducts as $product)
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
                         alt="{{ $product->name }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
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
                    <div class="absolute bottom-4 left-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                        <i class="fas fa-star mr-1"></i>Featured
                    </div>
                </div>
                <div class="p-6">
                    <div class="text-sm text-orange-600 font-semibold bg-orange-50 px-3 py-1 rounded-full mb-3 inline-block">{{ $product->category->name }}</div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-orange-600 transition-colors">{{ $product->name }}</h3>
                    @if($product->name_sinhala)
                    <p class="text-gray-600 mb-3">{{ $product->name_sinhala }}</p>
                    @endif
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <span class="text-xl font-bold text-orange-600">Rs. {{ number_format($product->getCurrentPrice(), 2) }}</span>
                            @if($product->hasDiscount())
                            <div class="text-sm text-gray-500 line-through">Rs. {{ number_format($product->price, 2) }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('products.show', $product) }}" class="flex-1 btn-primary text-white py-3 rounded-xl font-semibold text-center text-sm hover:shadow-lg transition-all">
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

        <div class="text-center mt-12">
            <a href="{{ route('products.index') }}" class="btn-primary text-white px-8 py-4 rounded-xl font-semibold text-lg">
                <i class="fas fa-shopping-bag mr-3"></i>
                Shop All Products
            </a>
        </div>
    </div>
</section>

<!-- Trust & Service Section -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Why Choose PasalMalla?</h2>
            <p class="text-xl text-gray-600">අම්මලා හදුවේ අම්මලා සමරන්න ❤️</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-truck text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Free Island-wide Delivery</h3>
                <p class="text-gray-600">
                    Free delivery to your doorstep anywhere in Sri Lanka.
                    Fast and reliable service you can trust.
                </p>
            </div>

            <div class="text-center">
                <div class="w-20 h-20 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-money-bill-wave text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Cash on Delivery</h3>
                <p class="text-gray-600">
                    Pay when you receive your order. No advance payments required.
                    Shop with complete confidence.
                </p>
            </div>

            <div class="text-center">
                <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Quality Guaranteed</h3>
                <p class="text-gray-600">
                    Only the best quality school supplies for your children.
                    Trusted by thousands of parents across Sri Lanka.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 hero-gradient text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready to Get Started?</h2>
        <p class="text-xl mb-8 text-blue-100">
            Join thousands of happy parents who trust PasalMalla for their children's school needs
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('products.index') }}" class="btn-white px-8 py-4 rounded-xl font-semibold text-lg">
                <i class="fas fa-shopping-bag mr-3"></i>
                Start Shopping
            </a>
            <a href="{{ route('contact') }}" class="btn-glass px-8 py-4 rounded-xl font-semibold text-lg border-white">
                <i class="fas fa-phone mr-3"></i>
                Contact Us
            </a>
        </div>
    </div>
</section>
@endsection
