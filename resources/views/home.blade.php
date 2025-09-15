@extends('layouts.app')

@section('title', 'PasalMalla - ලමයෙක් පාසලට ගන්න ඕන හම දේකම!')
@section('description',
    'Sri Lanka\'s best online school supplies store. Books, stationery, bags, uniforms and more with
    free delivery!')

@section('content')
    <!-- Hero Section -->
    <section
        class="hero-gradient text-white py-8 sm:py-10 md:py-12 lg:py-14 relative overflow-hidden min-h-[50vh] sm:min-h-[55vh] md:min-h-[60vh] lg:min-h-[65vh]">

        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="https://images.pexels.com/photos/1370296/pexels-photo-1370296.jpeg?auto=compress&cs=tinysrgb&w=1920"
                alt="School supplies background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-600/90 via-orange-500/80 to-red-600/90"></div>
        </div>
        <div
            class="container mx-auto px-3 sm:px-4 relative z-10 min-h-[60vh] sm:min-h-[65vh] md:min-h-[70vh] lg:min-h-[75vh] flex items-center">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:gap-10 items-center w-full">
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-4 sm:mb-6 md:mb-8 leading-tight">
                        <span class="block">Pasal Malla</span>
                        <span
                            class="block text-lg sm:text-xl md:text-3xl lg:text-4xl text-blue-100 font-normal mt-3 sm:mt-4">
                            <span id="typewriter-text"></span>
                            <span class="animate-pulse">|</span>
                        </span>
                    </h1>
                    <p
                        class="text-base sm:text-lg md:text-xl lg:text-2xl mb-6 sm:mb-8 text-blue-100 leading-relaxed px-2 sm:px-0">
                        Sri Lanka's most trusted online school supplies store.<br class="hidden sm:block">
                        <span class="text-yellow-300 font-semibold">Free delivery island-wide</span> with cash on delivery!
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 px-2 sm:px-0 mt-6 sm:mt-8">
                        <a href="{{ route('products.index') }}"
                            class="btn-secondary text-white px-6 sm:px-8 md:px-10 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-base sm:text-lg md:text-xl inline-flex items-center justify-center pulse-glow">
                            <i class="fas fa-shopping-bag mr-2 sm:mr-3 md:mr-4"></i>
                            Shop Now
                        </a>
                        <a href="{{ route('bundles.index') }}"
                            class="btn-glass px-6 sm:px-8 md:px-10 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-base sm:text-lg md:text-xl">
                            <i class="fas fa-gift mr-2 sm:mr-3 md:mr-4"></i>
                            Special Packs
                        </a>
                    </div>
                </div>
                <div class="hidden lg:block text-center">
                    <div class="relative">
                        <div class="w-96 h-96 lg:w-[28rem] lg:h-[28rem] mx-auto relative">
                            <div class="absolute inset-8 rounded-full float-animation" style="animation-delay: 0.5s;">
                                <img src="image/PasalMalla.png" alt="logo" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section
        class="mt-4 sm:mt-6 md:mt-8 lg:mt-10 py-16 sm:py-20 md:py-24 lg:py-32 bg-gradient-to-br from-white to-gray-50">
        <div class="container mx-auto px-3 sm:px-4">
            <div class="text-center mb-6 sm:mb-8 md:mb-12">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-2 sm:mb-3 md:mb-4">
                    <span class="gradient-text">Shop by Category</span>
                </h2>

                <div
                    class="w-12 sm:w-16 md:w-20 lg:w-24 h-1 bg-gradient-to-r from-orange-500 to-red-500 mx-auto mt-2 sm:mt-3 md:mt-4 rounded-full">
                </div>
            </div>

            <div
                class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 sm:gap-4 md:gap-6 lg:gap-8 max-w-7xl mx-auto">
                @foreach ($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                        class="card-hover bg-white rounded-xl sm:rounded-2xl md:rounded-3xl p-3 sm:p-4 md:p-6 lg:p-8 text-center group shadow-lg border border-gray-100 min-h-[120px] sm:min-h-[140px] md:min-h-[160px] flex flex-col justify-center">
                        <div
                            class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl mb-2 sm:mb-3 md:mb-4 lg:mb-6 group-hover:scale-110 transition-transform duration-300">
                            {{ $category->icon ?? '📚' }}</div>
                        <h3
                            class="font-bold text-gray-800 mb-1 sm:mb-2 md:mb-3 text-xs sm:text-sm md:text-base lg:text-lg leading-tight">
                            {{ $category->name }}</h3>
                        <p class="text-xs sm:text-sm text-gray-600 mb-2 sm:mb-3 md:mb-4 leading-tight">
                            {{ $category->name_sinhala }}</p>
                        <div
                            class="mt-1 sm:mt-2 md:mt-4 text-orange-600 group-hover:text-orange-700 transition-colors group-hover:scale-110 transform duration-300">
                            <i class="fas fa-arrow-right text-xs sm:text-sm md:text-base"></i>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </section>

    <!-- Featured Bundles Section -->
    <section class="py-8 sm:py-12 md:py-16 lg:py-20 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-100">
        <div class="container mx-auto px-3 sm:px-4">
            <div class="text-center mb-6 sm:mb-8 md:mb-12">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-2 sm:mb-3 md:mb-4">
                    <span class="gradient-text">Special Bundle Packs</span>
                </h2>
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-600 font-medium px-2 sm:px-0">Save money
                    with our carefully curated school supply bundles
                </p>
                <div
                    class="w-12 sm:w-16 md:w-20 lg:w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mt-2 sm:mt-3 md:mt-4 rounded-full">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 md:gap-8 lg:gap-10">
                @foreach ($featuredBundles as $bundle)
                    <div
                        class="card-hover bg-white rounded-xl sm:rounded-2xl md:rounded-3xl overflow-hidden shadow-xl border border-gray-100">
                        <div class="relative">
                            <img src="https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=400"
                                alt="{{ $bundle->name }}"
                                class="w-full h-40 sm:h-48 md:h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                            <div
                                class="absolute top-2 sm:top-3 md:top-4 right-2 sm:right-3 md:right-4 bg-gradient-to-r from-red-500 to-red-600 text-white px-2 sm:px-3 md:px-4 py-1 sm:py-1.5 md:py-2 rounded-full text-xs sm:text-sm font-bold shadow-lg animate-pulse">
                                Save {{ $bundle->getSavingsPercentage() }}%
                            </div>
                            <div
                                class="absolute bottom-2 sm:bottom-3 md:bottom-4 left-2 sm:left-3 md:left-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-2 sm:px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                <i class="fas fa-gift mr-1"></i>Bundle
                            </div>
                        </div>
                        <div class="p-3 sm:p-4 md:p-6 lg:p-8">
                            <h3
                                class="text-base sm:text-lg md:text-xl font-bold text-gray-800 mb-1 sm:mb-2 md:mb-3 group-hover:text-orange-600 transition-colors leading-tight">
                                {{ $bundle->name }}</h3>
                            <p class="text-xs sm:text-sm md:text-base text-gray-600 mb-1 sm:mb-2 md:mb-3 leading-tight">
                                {{ $bundle->name_sinhala }}</p>
                            <p class="text-xs sm:text-sm text-gray-500 mb-3 sm:mb-4 md:mb-6 leading-tight">
                                {{ Str::limit($bundle->description, 50) }}</p>
                            <div class="flex items-center justify-between mb-2 sm:mb-3 md:mb-4">
                                <div>
                                    <span class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold text-orange-600">Rs.
                                        {{ number_format($bundle->price, 2) }}</span>
                                    <div class="text-xs sm:text-sm text-gray-500 line-through">Rs.
                                        {{ number_format($bundle->original_price, 2) }}</div>
                                </div>
                            </div>
                            <a href="{{ route('bundles.show', $bundle) }}"
                                class="w-full btn-primary text-white py-2.5 sm:py-3 md:py-4 rounded-xl sm:rounded-2xl font-bold text-center block text-xs sm:text-sm md:text-base lg:text-lg">
                                <i class="fas fa-eye mr-1 sm:mr-2"></i>
                                View Bundle
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-6 sm:mt-8 md:mt-12">
                <a href="{{ route('bundles.index') }}"
                    class="btn-secondary text-white px-6 sm:px-8 md:px-10 lg:px-12 py-3 sm:py-4 lg:py-5 rounded-xl sm:rounded-2xl font-bold text-sm sm:text-base md:text-lg lg:text-xl">
                    <i class="fas fa-gift mr-2 sm:mr-3"></i>
                    View All Bundles
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-8 sm:py-12 md:py-16 lg:py-20 bg-gradient-to-br from-white to-orange-50">
        <div class="container mx-auto px-3 sm:px-4">
            <div class="text-center mb-6 sm:mb-8 md:mb-12">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-2 sm:mb-3 md:mb-4">
                    <span class="gradient-text">Featured Products</span>
                </h2>
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-600 font-medium px-2 sm:px-0">Popular items
                    loved by students and parents</p>
                <div
                    class="w-12 sm:w-16 md:w-20 lg:w-24 h-1 bg-gradient-to-r from-orange-500 to-red-500 mx-auto mt-2 sm:mt-3 md:mt-4 rounded-full">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 md:gap-8 lg:gap-10">
                @foreach ($featuredProducts as $product)
                    <div
                        class="card-hover bg-white rounded-xl sm:rounded-2xl md:rounded-3xl overflow-hidden shadow-xl border border-gray-100 group relative">
                        <div class="relative">
                            <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}"
                                class="w-full h-40 sm:h-48 md:h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                            @if ($product->hasDiscount())
                                <div
                                    class="absolute top-2 sm:top-3 md:top-4 right-2 sm:right-3 md:right-4 bg-gradient-to-r from-red-500 to-red-600 text-white px-2 sm:px-3 md:px-4 py-1 sm:py-1.5 md:py-2 rounded-full text-xs sm:text-sm font-bold shadow-lg animate-pulse">
                                    -{{ $product->getDiscountPercentage() }}%
                                </div>
                            @endif
                            @if ($product->stock_quantity <= 5)
                                <div
                                    class="absolute top-2 sm:top-3 md:top-4 left-2 sm:left-3 md:left-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white px-2 sm:px-3 md:px-4 py-1 sm:py-1.5 md:py-2 rounded-full text-xs sm:text-sm font-bold shadow-lg">
                                    Low Stock
                                </div>
                            @endif
                            <div
                                class="absolute bottom-2 sm:bottom-3 md:bottom-4 left-2 sm:left-3 md:left-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-2 sm:px-3 md:px-4 py-1 sm:py-1.5 md:py-2 rounded-full text-xs font-bold shadow-lg">
                                <i class="fas fa-star mr-1"></i>Featured
                            </div>
                        </div>
                        <div class="p-3 sm:p-4 md:p-6 lg:p-8">
                            <div
                                class="text-xs sm:text-sm text-orange-600 font-bold bg-orange-50 px-2 sm:px-3 md:px-4 py-1 sm:py-1.5 md:py-2 rounded-full mb-2 sm:mb-3 md:mb-4 inline-block">
                                {{ $product->category->name }}</div>
                            <h3
                                class="text-base sm:text-lg md:text-xl font-bold text-gray-800 mb-1 sm:mb-2 md:mb-3 group-hover:text-orange-600 transition-colors leading-tight">
                                {{ $product->name }}</h3>
                            @if ($product->name_sinhala)
                                <p class="text-xs sm:text-sm md:text-base text-gray-600 mb-2 sm:mb-3 md:mb-4 leading-tight">
                                    {{ $product->name_sinhala }}</p>
                            @endif
                            <div class="flex items-center justify-between mb-3 sm:mb-4 md:mb-6">
                                <div>
                                    <span class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold text-orange-600">Rs.
                                        {{ number_format($product->getCurrentPrice(), 2) }}</span>
                                    @if ($product->hasDiscount())
                                        <div class="text-xs sm:text-sm text-gray-500 line-through mt-1">Rs.
                                            {{ number_format($product->price, 2) }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="flex gap-2 sm:gap-3">
                                <a href="{{ route('products.show', $product) }}"
                                    class="flex-1 btn-primary text-white py-2.5 sm:py-3 md:py-4 rounded-xl sm:rounded-2xl font-bold text-center hover:shadow-lg transition-all text-xs sm:text-sm md:text-base">
                                    <i class="fas fa-eye mr-1 sm:mr-2"></i>
                                    View Details
                                </a>
                                <button
                                    class="add-to-cart bg-gradient-to-r from-orange-100 to-orange-200 hover:from-orange-200 hover:to-orange-300 text-orange-700 px-2 sm:px-3 md:px-5 py-2.5 sm:py-3 md:py-4 rounded-xl sm:rounded-2xl transition-all hover:scale-110 hover:shadow-lg min-w-[44px] sm:min-w-[48px]"
                                    data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                    data-name-sinhala="{{ $product->name_sinhala }}"
                                    data-price="{{ $product->getCurrentPrice() }}"
                                    data-image="{{ $product->getImageUrl() }}" data-type="product">
                                    <i class="fas fa-shopping-cart text-xs sm:text-sm md:text-base"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-6 sm:mt-8 md:mt-12">
                <a href="{{ route('products.index') }}"
                    class="btn-primary text-white px-6 sm:px-8 md:px-10 lg:px-12 py-3 sm:py-4 lg:py-5 rounded-xl sm:rounded-2xl font-bold text-sm sm:text-base md:text-lg lg:text-xl">
                    <i class="fas fa-shopping-bag mr-2 sm:mr-3"></i>
                    Shop All Products
                </a>
            </div>
        </div>
    </section>

    <!-- Trust & Service Section -->
    <section class="py-8 sm:py-12 md:py-16 lg:py-20 bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-100">
        <div class="container mx-auto px-3 sm:px-4">
            <div class="text-center mb-6 sm:mb-8 md:mb-12">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-2 sm:mb-3 md:mb-4">
                    <span class="gradient-text">Why Choose PasalMalla?</span>
                </h2>

                <div
                    class="w-12 sm:w-16 md:w-20 lg:w-24 h-1 bg-gradient-to-r from-orange-500 to-red-500 mx-auto mt-2 sm:mt-3 md:mt-4 rounded-full">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8 lg:gap-10">
                <div class="text-center group">
                    <div
                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4 md:mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="fas fa-truck text-white text-lg sm:text-xl md:text-2xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 mb-2 sm:mb-3 md:mb-4">Free
                        Island-wide Delivery</h3>
                    <p class="text-gray-600 text-sm sm:text-base md:text-lg leading-relaxed px-2 sm:px-0">
                        Free delivery to your doorstep anywhere in Sri Lanka.
                        Fast and reliable service you can trust.
                    </p>
                </div>

                <div class="text-center group">
                    <div
                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4 md:mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="fas fa-money-bill-wave text-white text-lg sm:text-xl md:text-2xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 mb-2 sm:mb-3 md:mb-4">Cash on
                        Delivery</h3>
                    <p class="text-gray-600 text-sm sm:text-base md:text-lg leading-relaxed px-2 sm:px-0">
                        Pay when you receive your order. No advance payments required.
                        Shop with complete confidence.
                    </p>
                </div>

                <div class="text-center group">
                    <div
                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4 md:mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="fas fa-shield-alt text-white text-lg sm:text-xl md:text-2xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 mb-2 sm:mb-3 md:mb-4">Quality
                        Guaranteed</h3>
                    <p class="text-gray-600 text-sm sm:text-base md:text-lg leading-relaxed px-2 sm:px-0">
                        Only the best quality school supplies for your children.
                        Trusted by thousands of parents across Sri Lanka.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-8 sm:py-12 md:py-16 lg:py-20 hero-gradient text-white relative overflow-hidden">
        <div class="absolute top-2 sm:top-4 md:top-10 right-2 sm:right-4 md:right-10 float-animation opacity-10">
            <i class="fas fa-star text-2xl sm:text-4xl md:text-6xl lg:text-8xl"></i>
        </div>
        <div class="absolute bottom-2 sm:bottom-4 md:bottom-10 left-2 sm:left-4 md:left-10 float-animation opacity-10"
            style="animation-delay: 1s;">
            <i class="fas fa-heart text-xl sm:text-3xl md:text-4xl lg:text-6xl"></i>
        </div>
        <div class="container mx-auto px-3 sm:px-4 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold mb-4 sm:mb-6 md:mb-8">Ready to
                Get Started?</h2>
            <p
                class="text-base sm:text-lg md:text-xl lg:text-2xl mb-6 sm:mb-8 md:mb-12 text-blue-100 font-medium px-2 sm:px-0">
                Join thousands of happy parents who trust PasalMalla for their children's school needs
            </p>
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                <a href="{{ route('products.index') }}"
                    class="btn-white px-6 sm:px-8 md:px-10 lg:px-12 py-3 sm:py-4 lg:py-5 rounded-xl sm:rounded-2xl font-bold text-sm sm:text-base md:text-lg lg:text-xl">
                    <i class="fas fa-shopping-bag mr-2 sm:mr-3"></i>
                    Start Shopping
                </a>
                <a href="{{ route('contact') }}"
                    class="btn-glass px-6 sm:px-8 md:px-10 lg:px-12 py-3 sm:py-4 lg:py-5 rounded-xl sm:rounded-2xl font-bold text-sm sm:text-base md:text-lg lg:text-xl border-white">
                    <i class="fas fa-mug-hot mr-2 sm:mr-3"></i>
                    Contact Us
                </a>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typewriterText = document.getElementById('typewriter-text');
            const text = 'ළමයෙක්ට පාසලට ඕන හැම දේම එකම තැනකින්!';
            let index = 0;

            function typeWriter() {
                if (index < text.length) {
                    typewriterText.textContent += text.charAt(index);
                    index++;
                    setTimeout(typeWriter, 100); // Adjust speed here (100ms per character)
                }
            }

            // Start typewriter effect after a short delay
            setTimeout(typeWriter, 1000);
        });
    </script>
@endsection
