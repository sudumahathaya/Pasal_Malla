@extends('layouts.app')

@section('title', 'PasalMalla - ලමයෙක් පාසලට ගන්න ඕන හම දේකම!')
@section('description', 'Sri Lanka\'s best online school supplies store. Books, stationery, bags, uniforms and more with free delivery!')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white py-24 lg:py-32 relative overflow-hidden min-h-[70vh] lg:min-h-[80vh]">
    <!-- Banner image covering full hero area -->
    <div class="absolute inset-0 bg-black bg-opacity-20"></div>
    <div class="absolute top-10 right-10 float-animation opacity-20">
        <i class="fas fa-graduation-cap text-6xl"></i>
    </div>
    <div class="absolute bottom-10 left-10 float-animation opacity-20" style="animation-delay: 1s;">
        <i class="fas fa-book text-4xl"></i>
    </div>
    <div class="absolute top-1/2 right-1/4 float-animation opacity-20" style="animation-delay: 2s;">
        <i class="fas fa-pencil-alt text-5xl"></i>
    </div>
    <div class="container mx-auto px-4 relative z-10 min-h-[70vh] lg:min-h-[80vh] flex items-center">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center w-full">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl lg:text-7xl font-bold mb-6 leading-tight">
                    <span class="block">PasalMalla</span>
                    <span class="block text-3xl lg:text-4xl text-blue-100 font-normal">ලමයෙක් පාසලට ගන්න ඕන හම දේකම!</span>
                </h1>
                <p class="text-xl lg:text-2xl mb-8 text-blue-100 leading-relaxed">
                    Sri Lanka's most trusted online school supplies store.<br>
                    <span class="text-yellow-300 font-semibold">Free delivery island-wide</span> with cash on delivery!
                </p>
                <div class="relative">
                    <div class="w-96 h-96 mx-auto relative">
                        <div class="absolute inset-0 bg-white bg-opacity-10 rounded-full animate-pulse"></div>
                        <div class="absolute inset-4 bg-white bg-opacity-20 rounded-full float-animation"></div>
                        <div class="absolute inset-8 bg-white bg-opacity-30 rounded-full float-animation" style="animation-delay: 0.5s;"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-school text-8xl mb-4 text-white"></i>
                                <p class="text-2xl font-bold">Quality Education<br>Supplies</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-20 bg-gradient-to-br from-white to-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-5xl font-bold mb-4">
                <span class="gradient-text">Shop by Category</span>
            </h2>
            <p class="text-2xl text-gray-600 font-medium">අයිතම වර්ග කරා යන්න</p>
            <div class="w-24 h-1 bg-gradient-to-r from-orange-500 to-red-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 max-w-7xl mx-auto">
            @foreach($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->slug]) }}"
               class="card-hover bg-white rounded-3xl p-8 text-center group shadow-lg border border-gray-100">
                <div class="text-5xl mb-6 group-hover:scale-110 transition-transform duration-300">{{ $category->icon ?? '📚' }}</div>
                <h3 class="font-bold text-gray-800 mb-3 text-lg">{{ $category->name }}</h3>
                <p class="text-sm text-gray-600 mb-4">{{ $category->name_sinhala }}</p>
                <div class="mt-4 text-orange-600 group-hover:text-orange-700 transition-colors group-hover:scale-110 transform duration-300">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</section>

<!-- Featured Bundles Section -->
<section class="py-20 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-5xl font-bold mb-4">
                <span class="gradient-text">Special Bundle Packs</span>
            </h2>
            <p class="text-2xl text-gray-600 font-medium">Save money with our carefully curated school supply bundles</p>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            @foreach($featuredBundles as $bundle)
            <div class="card-hover bg-white rounded-3xl overflow-hidden shadow-xl border border-gray-100">
                <div class="relative">
            50% { box-shadow: 0 0 30px rgba(249, 115, 22, 0.6); }
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }
        
        /* Improved header styling */
        .header-glass {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Enhanced cart icon */
        .cart-icon-wrapper {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .cart-icon-wrapper:hover {
            transform: scale(1.1);
        }
        
        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 50%, #dc2626 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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
                    <img src="{{ $product->getImageUrl() }}"
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
                        <button class="add-to-cart bg-gradient-to-r from-orange-100 to-orange-200 hover:from-orange-200 hover:to-orange-300 text-orange-700 px-4 py-3 rounded-xl transition-all hover:scale-105 hover:shadow-md"
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
