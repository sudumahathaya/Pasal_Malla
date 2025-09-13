@extends('layouts.app')

@section('title', $product->name . ' - PasalMalla')
@section('description', $product->description ?? 'Quality school supplies at PasalMalla')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('home') }}" class="text-primary-600 hover:text-primary-700">Home</a></li>
                <li><span class="text-gray-400">/</span></li>
                <li><a href="{{ route('products.index') }}" class="text-primary-600 hover:text-primary-700">Products</a></li>
                <li><span class="text-gray-400">/</span></li>
                <li><a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="text-primary-600 hover:text-primary-700">{{ $product->category->name }}</a></li>
                <li><span class="text-gray-400">/</span></li>
                <li class="text-gray-600">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            <!-- Product Images -->
            <div>
                <div class="bg-white rounded-xl sm:rounded-2xl overflow-hidden shadow-lg">
                    <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}"
                         class="w-full h-64 sm:h-80 lg:h-96 object-cover">
                </div>
            </div>

            <!-- Product Info -->
            <div>
                <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 lg:p-8 shadow-lg">
                    <div class="text-sm text-orange-600 font-medium mb-2">{{ $product->category->name }}</div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                    @if($product->name_sinhala)
                    <p class="text-lg sm:text-xl text-gray-600 mb-4 sm:mb-6">{{ $product->name_sinhala }}</p>
                    @endif

                    <!-- Price -->
                    <div class="mb-6">
                        <div class="flex items-center space-x-4">
                            <span class="text-2xl sm:text-3xl font-bold text-orange-600">Rs. {{ number_format($product->getCurrentPrice(), 2) }}</span>
                            @if($product->hasDiscount())
                            <span class="text-lg sm:text-xl text-gray-500 line-through">Rs. {{ number_format($product->price, 2) }}</span>
                            <span class="bg-red-500 text-white px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-bold">
                                Save {{ $product->getDiscountPercentage() }}%
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- Stock Status -->
                    <div class="mb-6">
                        @if($product->stock_quantity > 10)
                        <span class="text-green-600 font-medium">
                            <i class="fas fa-check-circle mr-2"></i>In Stock
                        </span>
                        @elseif($product->stock_quantity > 0)
                        <span class="text-orange-600 font-medium">
                            <i class="fas fa-exclamation-triangle mr-2"></i>Only {{ $product->stock_quantity }} left!
                        </span>
                        @else
                        <span class="text-red-600 font-medium">
                            <i class="fas fa-times-circle mr-2"></i>Out of Stock
                        </span>
                        @endif
                    </div>

                    <!-- Description -->
                    @if($product->description)
                    <div class="mb-8">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3">Description</h3>
                        <p class="text-sm sm:text-base text-gray-600 leading-relaxed">{{ $product->description }}</p>
                        @if($product->description_sinhala)
                        <p class="text-sm sm:text-base text-gray-600 leading-relaxed mt-2">{{ $product->description_sinhala }}</p>
                        @endif
                    </div>
                    @endif

                    <!-- Add to Cart -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex items-center border border-gray-200 rounded-lg">
                            <button class="qty-btn-decrease px-3 sm:px-4 py-2 sm:py-3 text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" value="1" min="1" max="{{ $product->stock_quantity }}" id="quantity-input"
                                   class="w-12 sm:w-16 text-center border-0 focus:outline-none" readonly>
                            <button class="qty-btn-increase px-3 sm:px-4 py-2 sm:py-3 text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <button class="add-to-cart flex-1 btn-primary text-white py-3 sm:py-4 rounded-lg font-semibold {{ $product->stock_quantity <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                {{ $product->stock_quantity <= 0 ? 'disabled' : '' }}
                                data-id="{{ $product->id }}"
                                data-name="{{ $product->name }}"
                                data-name-sinhala="{{ $product->name_sinhala }}"
                                data-price="{{ $product->getCurrentPrice() }}"
                                data-image="{{ $product->getImageUrl() }}"
                                data-type="product">
                            <i class="fas fa-shopping-cart mr-2"></i>
                            {{ $product->stock_quantity > 0 ? 'Add to Cart' : 'Out of Stock' }}
                        </button>
                    </div>

                    <!-- Product Details -->
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-4 text-sm">
                            <div>
                                <span class="text-gray-500">SKU:</span>
                                <span class="font-medium">{{ $product->sku }}</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Category:</span>
                                <span class="font-medium">{{ $product->category->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <section class="mb-16">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6 sm:mb-8">Related Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                @foreach($relatedProducts as $relatedProduct)
                <div class="card-hover bg-white rounded-xl sm:rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                    <div class="relative">
                        <img src="https://images.pexels.com/photos/159751/book-address-book-learning-learn-159751.jpeg?auto=compress&cs=tinysrgb&w=400"
                             alt="{{ $relatedProduct->name }}" class="w-full h-40 sm:h-48 object-cover">
                        @if($relatedProduct->hasDiscount())
                        <div class="absolute top-2 sm:top-4 right-2 sm:right-4 bg-red-500 text-white px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-bold">
                            -{{ $relatedProduct->getDiscountPercentage() }}%
                        </div>
                        @endif
                    </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="text-base sm:text-lg font-bold text-gray-800 mb-2">{{ $relatedProduct->name }}</h3>
                        <div class="flex items-center justify-between mb-3 sm:mb-4">
                            <span class="text-lg sm:text-xl font-bold text-orange-600">Rs. {{ number_format($relatedProduct->getCurrentPrice(), 2) }}</span>
                        </div>
                        <a href="{{ route('products.show', $relatedProduct) }}" class="w-full btn-primary text-white py-2 sm:py-3 rounded-lg font-semibold text-center block text-xs sm:text-sm">
                            <i class="fas fa-eye mr-1"></i>
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const quantityInput = document.getElementById('quantity-input');
    const decreaseBtn = document.querySelector('.qty-btn-decrease');
    const increaseBtn = document.querySelector('.qty-btn-increase');
    const addToCartBtn = document.querySelector('.add-to-cart');

    if (quantityInput && decreaseBtn && increaseBtn) {
        decreaseBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            let maxValue = parseInt(quantityInput.max);
            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;
            }
        });
    }

    // Override add to cart to include quantity
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const quantity = parseInt(quantityInput.value);

            // Add multiple items based on quantity
            for (let i = 0; i < quantity; i++) {
                window.cart.addToCart(this);
            }
        });
    }
});
</script>
@endsection
