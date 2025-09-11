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
                <div id="cart-items" class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <!-- Cart Header -->
                    <div class="bg-orange-50 px-6 py-4 border-b border-orange-100">
                        <h2 class="text-lg font-bold text-gray-800">Your Items</h2>
                    </div>

                    <!-- Cart items will be loaded here by JavaScript -->

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
                <div id="cart-summary">
                    <!-- Cart summary will be loaded here by JavaScript -->
                </div>
            </div>
        </div>

        <!-- Customer Details Modal -->
        <div id="customer-details-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4 max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Customer Details</h3>
                    <button id="close-modal" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
<<<<<<< HEAD

=======
                
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                <form id="customer-details-form" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                        <input type="text" id="customer-name" required
                               class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                               placeholder="Enter your full name">
                    </div>
<<<<<<< HEAD

=======
                    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                        <input type="tel" id="customer-phone" required
                               class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                               placeholder="077 123 4567">
                    </div>
<<<<<<< HEAD

=======
                    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="customer-email"
                               class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                               placeholder="your@email.com (optional)">
                    </div>
<<<<<<< HEAD

=======
                    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Delivery Address *</label>
                        <textarea id="customer-address" required rows="3"
                                  class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                                  placeholder="House number, street name, area, city"></textarea>
                    </div>
<<<<<<< HEAD

=======
                    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                        <input type="text" id="customer-city" required
                               class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                               placeholder="Enter your city">
                    </div>
<<<<<<< HEAD

=======
                    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Special Instructions</label>
                        <textarea id="customer-notes" rows="2"
                                  class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                                  placeholder="Any special delivery instructions (optional)"></textarea>
                    </div>
<<<<<<< HEAD

=======
                    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                    <div class="flex gap-4">
                        <button type="button" id="cancel-order" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white py-3 rounded-lg font-semibold transition-colors">
                            Cancel
                        </button>
                        <button type="submit" class="flex-1 bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-semibold transition-colors">
                            <i class="fab fa-whatsapp mr-2"></i>
                            Send Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
