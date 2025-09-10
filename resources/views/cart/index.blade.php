@extends('layouts.app')

@section('title', 'Shopping Cart - PasalMalla')
@section('description', 'Review your cart and proceed to checkout with cash on delivery option')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Shopping Cart</h1>
            <p class="text-gray-600">Review your items and proceed to checkout</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <!-- Cart Header -->
                    <div class="bg-orange-50 px-6 py-4 border-b border-orange-100">
                        <h2 class="text-lg font-bold text-gray-800">Your Items</h2>
                    </div>

                    <!-- Cart Items List -->
                    <div class="divide-y divide-gray-100">
                        <!-- Sample Cart Item 1 -->
                        <div class="p-6">
                            <div class="flex items-center space-x-4">
                                <img src="https://images.pexels.com/photos/159751/book-address-book-learning-learn-159751.jpeg?auto=compress&cs=tinysrgb&w=100"
                                     alt="Exercise Book" class="w-20 h-20 object-cover rounded-lg">
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-gray-800">Exercise Book - 200 Pages</h3>
                                    <p class="text-gray-600">අභ්‍යාස පොත - පිටු 200</p>
                                    <p class="text-sm text-orange-600 font-medium">Books & Notebooks</p>
                                    <div class="flex items-center mt-2">
                                        <span class="text-lg font-bold text-orange-600">Rs. 120.00</span>
                                        <span class="text-sm text-gray-500 line-through ml-2">Rs. 150.00</span>
                                        <span class="bg-red-500 text-white px-2 py-1 rounded text-xs ml-2">20% OFF</span>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="flex items-center border border-gray-200 rounded-lg">
                                        <button class="px-3 py-2 text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" value="3" min="1" class="w-16 text-center border-0 focus:outline-none">
                                        <button class="px-3 py-2 text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <span class="text-lg font-bold text-gray-800 w-20 text-right">Rs. 360.00</span>
                                    <button class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Sample Cart Item 2 -->
                        <div class="p-6">
                            <div class="flex items-center space-x-4">
                                <img src="https://images.pexels.com/photos/159751/book-address-book-learning-learn-159751.jpeg?auto=compress&cs=tinysrgb&w=100"
                                     alt="Blue Ballpoint Pen" class="w-20 h-20 object-cover rounded-lg">
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-gray-800">Blue Ballpoint Pen</h3>
                                    <p class="text-gray-600">නිල් බෝල්පොයින්ට් පෑන</p>
                                    <p class="text-sm text-orange-600 font-medium">Stationery</p>
                                    <div class="flex items-center mt-2">
                                        <span class="text-lg font-bold text-orange-600">Rs. 20.00</span>
                                        <span class="text-sm text-gray-500 line-through ml-2">Rs. 25.00</span>
                                        <span class="bg-red-500 text-white px-2 py-1 rounded text-xs ml-2">20% OFF</span>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="flex items-center border border-gray-200 rounded-lg">
                                        <button class="px-3 py-2 text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" value="5" min="1" class="w-16 text-center border-0 focus:outline-none">
                                        <button class="px-3 py-2 text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <span class="text-lg font-bold text-gray-800 w-20 text-right">Rs. 100.00</span>
                                    <button class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Sample Bundle Item -->
                        <div class="p-6 bg-blue-50">
                            <div class="flex items-center space-x-4">
                                <img src="https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=100"
                                     alt="Grade 1 Bundle" class="w-20 h-20 object-cover rounded-lg">
                                <div class="flex-1">
                                    <div class="flex items-center mb-1">
                                        <i class="fas fa-gift text-blue-600 mr-2"></i>
                                        <span class="text-sm font-medium text-blue-600">BUNDLE PACK</span>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-800">Grade 1 Full Pack</h3>
                                    <p class="text-gray-600">පළමු ශ්‍රේණිය සම්පූර්ණ කට්ටලය</p>
                                    <div class="flex items-center mt-2">
                                        <span class="text-lg font-bold text-orange-600">Rs. 4,500.00</span>
                                        <span class="text-sm text-gray-500 line-through ml-2">Rs. 6,000.00</span>
                                        <span class="bg-green-500 text-white px-2 py-1 rounded text-xs ml-2">Save 25%</span>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="flex items-center border border-gray-200 rounded-lg">
                                        <button class="px-3 py-2 text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" value="1" min="1" class="w-16 text-center border-0 focus:outline-none">
                                        <button class="px-3 py-2 text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <span class="text-lg font-bold text-gray-800 w-20 text-right">Rs. 4,500.00</span>
                                    <button class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Continue Shopping -->
                    <div class="p-6 bg-gray-50 border-t border-gray-200">
                        <a href="{{ route('products.index') }}" class="text-orange-600 hover:text-orange-700 font-medium inline-flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl p-6 shadow-lg sticky top-24">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">Order Summary</h2>
                    
                    <!-- Totals -->
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Items (3):</span>
                            <span class="font-medium">Rs. 4,960.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Savings:</span>
                            <span class="font-medium text-green-600">-Rs. 1,540.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Delivery:</span>
                            <span class="font-medium text-green-600">Free</span>
                        </div>
                        <div class="border-t border-gray-200 pt-3">
                            <div class="flex justify-between text-xl font-bold">
                                <span>Total:</span>
                                <span class="text-orange-600">Rs. 4,960.00</span>
                            </div>
                        </div>
                    </div>

                    <!-- Checkout Button -->
                    <a href="{{ route('checkout.index') }}" class="w-full btn-primary text-white py-4 rounded-xl font-bold text-lg text-center block mb-4">
                        <i class="fas fa-credit-card mr-2"></i>
                        Proceed to Checkout
                    </a>

                    <!-- Payment Methods -->
                    <div class="bg-orange-50 rounded-lg p-4">
                        <h3 class="font-bold text-gray-800 mb-3">Payment Options:</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center">
                                <i class="fas fa-money-bill-wave text-orange-600 mr-2"></i>
                                <span>Cash on Delivery</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-university text-blue-600 mr-2"></i>
                                <span>Bank Transfer</span>
                            </div>
                            <div class="flex items-center opacity-60">
                                <i class="fas fa-credit-card text-purple-600 mr-2"></i>
                                <span>Online Payment (Coming Soon)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Info -->
                    <div class="mt-4 p-4 bg-green-50 rounded-lg">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-truck text-green-600 mr-2"></i>
                            <span class="font-medium text-green-800">Free Delivery</span>
                        </div>
                        <p class="text-sm text-green-700">Island-wide delivery in 2-5 working days</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection