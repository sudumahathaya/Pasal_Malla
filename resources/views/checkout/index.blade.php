@extends('layouts.app')

@section('title', 'Checkout - PasalMalla')
@section('description', 'Complete your order with cash on delivery option')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Checkout</h1>
            <p class="text-gray-600">Complete your order - Cash on Delivery Available</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Order Form -->
            <div class="lg:col-span-2">
                <form id="checkout-form" class="space-y-8">
                    <!-- Customer Information -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Customer Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                <input type="text" name="first_name" required
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                <input type="text" name="last_name" required
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                <input type="email" name="email" required
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                                <input type="tel" name="phone" required placeholder="077 123 4567"
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Address -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Shipping Address</h2>
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Address *</label>
                                <textarea name="address" rows="3" required placeholder="House number, street name, area"
                                          class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                                    <input type="text" name="city" required
                                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Postal Code</label>
                                    <input type="text" name="postal_code"
                                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Payment Method</h2>
                        <div class="space-y-4">
                            <div class="border-2 border-orange-200 rounded-lg p-4 bg-orange-50">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="payment_method" value="cod" checked class="mr-3">
                                    <div class="flex-1">
                                        <div class="flex items-center mb-2">
                                            <i class="fas fa-money-bill-wave text-orange-600 text-xl mr-3"></i>
                                            <span class="font-bold text-gray-800">Cash on Delivery (Recommended)</span>
                                            <span class="bg-orange-500 text-white px-2 py-1 rounded text-xs ml-2">Popular</span>
                                        </div>
                                        <p class="text-gray-600 text-sm">Pay in cash when you receive your order. No advance payment required.</p>
                                    </div>
                                </label>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-4">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="payment_method" value="bank_transfer" class="mr-3">
                                    <div class="flex-1">
                                        <div class="flex items-center mb-2">
                                            <i class="fas fa-university text-blue-600 text-xl mr-3"></i>
                                            <span class="font-bold text-gray-800">Bank Transfer</span>
                                        </div>
                                        <p class="text-gray-600 text-sm">Transfer to our bank account. Details will be provided after order confirmation.</p>
                                    </div>
                                </label>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-4 opacity-60">
                                <label class="flex items-center cursor-not-allowed">
                                    <input type="radio" name="payment_method" value="card" disabled class="mr-3">
                                    <div class="flex-1">
                                        <div class="flex items-center mb-2">
                                            <i class="fas fa-credit-card text-purple-600 text-xl mr-3"></i>
                                            <span class="font-bold text-gray-800">Online Payment</span>
                                            <span class="bg-blue-500 text-white px-2 py-1 rounded text-xs ml-2">Coming Soon</span>
                                        </div>
                                        <p class="text-gray-600 text-sm">Pay online using credit/debit card or digital wallet.</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Order Notes -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Order Notes (Optional)</h2>
                        <textarea name="notes" rows="3" placeholder="Any special instructions for delivery..."
                                  class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
                    </div>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl p-6 shadow-lg sticky top-24">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">Order Summary</h2>
<<<<<<< HEAD

=======
                    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                    <!-- Sample Cart Items -->
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-lg">
                            <img src="https://images.pexels.com/photos/159751/book-address-book-learning-learn-159751.jpeg?auto=compress&cs=tinysrgb&w=60"
                                 alt="Product" class="w-12 h-12 object-cover rounded">
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-800">Exercise Book - 200 Pages</h4>
                                <p class="text-sm text-gray-600">Qty: 3</p>
                            </div>
                            <span class="font-bold text-gray-800">Rs. 360.00</span>
                        </div>
<<<<<<< HEAD

=======
                        
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                        <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-lg">
                            <img src="https://images.pexels.com/photos/159751/book-address-book-learning-learn-159751.jpeg?auto=compress&cs=tinysrgb&w=60"
                                 alt="Product" class="w-12 h-12 object-cover rounded">
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-800">Blue Ballpoint Pen</h4>
                                <p class="text-sm text-gray-600">Qty: 5</p>
                            </div>
                            <span class="font-bold text-gray-800">Rs. 100.00</span>
                        </div>
                    </div>

                    <!-- Order Totals -->
                    <div class="border-t border-gray-200 pt-4 space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-medium">Rs. 460.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Delivery:</span>
                            <span class="font-medium text-green-600">Free</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold border-t border-gray-200 pt-3">
                            <span>Total:</span>
                            <span class="text-orange-600">Rs. 460.00</span>
                        </div>
                    </div>

                    <!-- Place Order Button -->
                    <button type="submit" form="checkout-form" class="w-full btn-primary text-white py-4 rounded-xl font-bold text-lg mt-6">
                        <i class="fas fa-check-circle mr-2"></i>
                        Place Order
                    </button>

                    <!-- Security Notice -->
                    <div class="mt-6 p-4 bg-green-50 rounded-lg">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-shield-alt text-green-600 mr-2"></i>
                            <span class="font-medium text-green-800">Secure Checkout</span>
                        </div>
                        <p class="text-sm text-green-700">Your information is protected and secure. Cash on delivery available.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('checkout-form').addEventListener('submit', function(e) {
    e.preventDefault();
<<<<<<< HEAD

    // Show success message
    alert('Order placed successfully! We will call you within 24 hours to confirm your order and delivery details.');

=======
    
    // Show success message
    alert('Order placed successfully! We will call you within 24 hours to confirm your order and delivery details.');
    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
    // Redirect to home page
    window.location.href = '/';
});
</script>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
