@extends('layouts.app')

@section('title', 'Delivery Information - PasalMalla')
@section('description', 'Learn about PasalMalla\'s delivery service. Free island-wide delivery, cash on delivery, and fast shipping across Sri Lanka.')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Delivery Information</h1>
            <p class="text-xl text-gray-600">Fast, reliable, and free delivery across Sri Lanka</p>
        </div>

        <!-- Delivery Overview -->
        <section class="mb-16">
            <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-3xl p-8 lg:p-12">
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-primary-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-truck text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Free Island-wide Delivery</h2>
                    <p class="text-xl text-gray-600">We deliver to every corner of Sri Lanka at no extra cost</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shipping-fast text-white text-xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Fast Delivery</h3>
                        <p class="text-gray-600">2-5 working days island-wide</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-secondary-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-money-bill-wave text-white text-xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Cash on Delivery</h3>
                        <p class="text-gray-600">Pay when you receive</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-white text-xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Safe & Secure</h3>
                        <p class="text-gray-600">Careful packaging & handling</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Delivery Areas & Times -->
        <section class="mb-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Delivery Areas -->
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Delivery Areas & Times</h2>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-4 bg-green-50 rounded-lg">
                            <div>
                                <h3 class="font-semibold text-gray-800">Colombo District</h3>
                                <p class="text-sm text-gray-600">Colombo, Mount Lavinia, Dehiwala, Kotte</p>
                            </div>
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">1-2 Days</span>
                        </div>

                        <div class="flex justify-between items-center p-4 bg-blue-50 rounded-lg">
                            <div>
                                <h3 class="font-semibold text-gray-800">Western Province</h3>
                                <p class="text-sm text-gray-600">Gampaha, Kalutara, Negombo</p>
                            </div>
                            <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-bold">2-3 Days</span>
                        </div>

                        <div class="flex justify-between items-center p-4 bg-yellow-50 rounded-lg">
                            <div>
                                <h3 class="font-semibold text-gray-800">Major Cities</h3>
                                <p class="text-sm text-gray-600">Kandy, Galle, Matara, Kurunegala, Anuradhapura</p>
                            </div>
                            <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-bold">3-4 Days</span>
                        </div>

                        <div class="flex justify-between items-center p-4 bg-orange-50 rounded-lg">
                            <div>
                                <h3 class="font-semibold text-gray-800">Other Areas</h3>
                                <p class="text-sm text-gray-600">All other districts in Sri Lanka</p>
                            </div>
                            <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-bold">4-5 Days</span>
                        </div>
                    </div>

                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <p class="text-sm text-gray-600">
                            <i class="fas fa-info-circle mr-2 text-primary-500"></i>
                            Delivery times may vary during peak seasons or due to weather conditions.
                        </p>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Payment Methods</h2>

                    <div class="space-y-4">
                        <div class="p-4 border-2 border-green-200 rounded-lg bg-green-50">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-money-bill-wave text-green-600 text-xl mr-3"></i>
                                <h3 class="font-bold text-gray-800">Cash on Delivery (Recommended)</h3>
                            </div>
                            <p class="text-gray-600 text-sm">Pay in cash when you receive your order. No advance payment required.</p>
                            <div class="mt-2">
                                <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Most Popular</span>
                            </div>
                        </div>

                        <div class="p-4 border border-gray-200 rounded-lg">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-university text-blue-600 text-xl mr-3"></i>
                                <h3 class="font-bold text-gray-800">Bank Transfer</h3>
                            </div>
                            <p class="text-gray-600 text-sm">Transfer to our bank account before delivery. Details provided after order.</p>
                        </div>

                        <div class="p-4 border border-gray-200 rounded-lg">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-credit-card text-purple-600 text-xl mr-3"></i>
                                <h3 class="font-bold text-gray-800">Online Payment</h3>
                            </div>
                            <p class="text-gray-600 text-sm">Pay online using your credit/debit card or digital wallet.</p>
                            <div class="mt-2">
                                <span class="bg-blue-500 text-white px-2 py-1 rounded text-xs">Coming Soon</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Order Process -->
        <section class="mb-16">
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">How It Works</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-primary-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white font-bold text-xl">1</span>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Place Order</h3>
                        <p class="text-gray-600 text-sm">Browse and add items to cart, then checkout with your details</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-secondary-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white font-bold text-xl">2</span>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Order Confirmation</h3>
                        <p class="text-gray-600 text-sm">We'll call you to confirm your order and delivery details</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white font-bold text-xl">3</span>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Prepare & Ship</h3>
                        <p class="text-gray-600 text-sm">We carefully pack your items and ship them to your address</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white font-bold text-xl">4</span>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Receive & Pay</h3>
                        <p class="text-gray-600 text-sm">Receive your order and pay cash to our delivery partner</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Delivery Policy -->
        <section class="mb-16">
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Delivery Policy</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">What We Deliver</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                All school supplies and stationery
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                School bags and accessories
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Books and educational materials
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Bundle packs and special offers
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Art and craft supplies
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Important Notes</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-info-circle text-blue-500 mr-2 mt-1"></i>
                                <span>Someone must be available to receive the delivery</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-info-circle text-blue-500 mr-2 mt-1"></i>
                                <span>Please provide accurate address and phone number</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-info-circle text-blue-500 mr-2 mt-1"></i>
                                <span>Delivery times are estimates and may vary</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-info-circle text-blue-500 mr-2 mt-1"></i>
                                <span>We'll call before delivery to confirm timing</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-info-circle text-blue-500 mr-2 mt-1"></i>
                                <span>Check items before paying the delivery person</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact for Delivery -->
        <section>
            <div class="bg-gradient-to-r from-primary-500 to-primary-700 rounded-2xl p-8 text-white text-center">
                <h2 class="text-2xl font-bold mb-4">Questions About Delivery?</h2>
                <p class="text-blue-100 mb-6">Our customer service team is here to help with any delivery-related questions</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:+94771869132" class="btn-white px-6 py-3 rounded-lg font-semibold">
                        <i class="fas fa-phone mr-2"></i>
                        Call: 077 186 9132
                    </a>
                    <a href="https://wa.me/94771869132" class="bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors inline-flex items-center justify-center hover:scale-105">
                        <i class="fab fa-whatsapp mr-2"></i>
                        WhatsApp Us
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
