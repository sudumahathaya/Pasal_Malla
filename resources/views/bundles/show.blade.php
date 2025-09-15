@extends('layouts.app')

@section('title', $bundle->name . ' - PasalMalla')
@section('description', $bundle->description ?? 'Special bundle pack at PasalMalla')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('home') }}" class="text-primary-600 hover:text-primary-700">Home</a></li>
                <li><span class="text-gray-400">/</span></li>
                <li><a href="{{ route('bundles.index') }}" class="text-primary-600 hover:text-primary-700">Bundles</a></li>
                <li><span class="text-gray-400">/</span></li>
                <li class="text-gray-600">{{ $bundle->name }}</li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            <!-- Bundle Image -->
            <div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
                    <img src="https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=800"
                         alt="{{ $bundle->name }}" class="w-full h-96 object-cover">
                </div>
            </div>

            <!-- Bundle Info -->
            <div>
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    @if($bundle->grade_level)
                    <div class="text-sm text-orange-600 font-medium mb-2">{{ $bundle->grade_level }}</div>
                    @endif
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $bundle->name }}</h1>
                    <p class="text-xl text-gray-600 mb-6">{{ $bundle->name_sinhala }}</p>

                    <!-- Savings Badge -->
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-red-800 font-bold text-lg">Special Bundle Offer!</p>
                                <p class="text-red-600">Save {{ $bundle->getSavingsPercentage() }}% when you buy this bundle</p>
                            </div>
                            <div class="text-red-600 text-3xl">
                                <i class="fas fa-gift"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing -->
                    <div class="mb-8">
                        <div class="flex items-center space-x-4 mb-2">
                            <span class="text-4xl font-bold text-orange-600">Rs. {{ number_format($bundle->price, 2) }}</span>
                            <span class="text-2xl text-gray-500 line-through">Rs. {{ number_format($bundle->original_price, 2) }}</span>
                        </div>
                        <p class="text-lg text-green-600 font-bold">
                            You save Rs. {{ number_format($bundle->getSavingsAmount(), 2) }}
                        </p>
                    </div>

                    <!-- Description -->
                    @if($bundle->description)
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Bundle Description</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $bundle->description }}</p>
                        @if($bundle->description_sinhala)
                        <p class="text-gray-600 leading-relaxed mt-2">{{ $bundle->description_sinhala }}</p>
                        @endif
                    </div>
                    @endif

                    <!-- Add to Cart -->
                    <div class="flex gap-4">
                        <div class="flex items-center border border-gray-200 rounded-lg">
                            <button class="qty-btn-decrease px-4 py-2 text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" value="1" min="1" id="bundle-quantity-input"
                                   class="w-16 text-center border-0 focus:outline-none" readonly>
                            <button class="qty-btn-increase px-4 py-2 text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <button class="add-to-cart flex-1 btn-primary text-white py-3 rounded-lg font-semibold"
                                data-id="{{ $bundle->id }}"
                                data-name="{{ $bundle->name }}"
                                data-name-sinhala="{{ $bundle->name_sinhala }}"
                                data-price="{{ $bundle->price }}"
                                data-image="{{ $bundle->getImageUrl() }}"
                                data-type="bundle">
                            <i class="fas fa-shopping-cart mr-2"></i>
                            Add Bundle to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bundle Contents -->
        @if($bundle->products->count() > 0)
        <section class="mb-16">
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">What's Included in This Bundle</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($bundle->products as $product)
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                        <div class="flex items-start space-x-4">
                            <img src="https://images.pexels.com/photos/159751/book-address-book-learning-learn-159751.jpeg?auto=compress&cs=tinysrgb&w=100"
                                 alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-lg">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800">{{ $product->name }}</h3>
                                @if($product->name_sinhala)
                                <p class="text-sm text-gray-600">{{ $product->name_sinhala }}</p>
                                @endif
                                <div class="flex items-center justify-between mt-2">
                                    <span class="text-orange-600 font-bold">Rs. {{ number_format($product->getCurrentPrice(), 2) }}</span>
                                    <span class="text-sm text-gray-500">Qty: {{ $product->pivot->quantity }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Total Value Comparison -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="bg-green-50 rounded-lg p-6">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-700">If bought separately:</p>
                                <p class="text-2xl font-bold text-gray-800">Rs. {{ number_format($bundle->original_price, 2) }}</p>
                            </div>
                            <div class="text-center">
                                <p class="text-green-600 font-bold text-lg">Bundle Price:</p>
                                <p class="text-3xl font-bold text-green-600">Rs. {{ number_format($bundle->price, 2) }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-green-600 font-bold">You Save:</p>
                                <p class="text-2xl font-bold text-green-600">Rs. {{ number_format($bundle->getSavingsAmount(), 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <!-- Why This Bundle Section -->
        <section class="mb-16">
            <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Why Choose This Bundle?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-check-double text-white text-xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Complete Set</h3>
                        <p class="text-gray-600">Everything your child needs in one convenient package</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-piggy-bank text-white text-xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Great Value</h3>
                        <p class="text-gray-600">Significant savings compared to individual purchases</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shipping-fast text-white text-xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Free Delivery</h3>
                        <p class="text-gray-600">Free island-wide delivery with cash on delivery option</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const quantityInput = document.getElementById('bundle-quantity-input');
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
            quantityInput.value = currentValue + 1;
        });
    }

    // The cart.js will automatically handle the quantity from the input field
    // No need to override the click event as cart.js already checks for quantity inputs
});
</script>
@endsection
