@extends('layouts.app')

@section('title', 'Contact Us - PasalMalla')
@section('description', 'Get in touch with PasalMalla. We\'re here to help with your school supply needs. Call, email, or visit us.')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Contact Us</h1>
            <p class="text-xl text-gray-600">We're here to help with all your school supply needs</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Send us a Message</h2>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                            <input type="text" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                            <input type="text" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                        <input type="email" required
                               class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="tel"
                               class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subject *</label>
                        <select required class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            <option value="">Select a subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="order">Order Related</option>
                            <option value="delivery">Delivery Issue</option>
                            <option value="product">Product Question</option>
                            <option value="bundle">Bundle Inquiry</option>
                            <option value="complaint">Complaint</option>
                            <option value="suggestion">Suggestion</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                        <textarea required rows="5"
                                  class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                  placeholder="Please describe your inquiry in detail..."></textarea>
                    </div>

                    <button type="submit" class="w-full btn-primary text-white py-4 rounded-lg font-semibold text-lg">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="space-y-8">
                <!-- Contact Details -->
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Get in Touch</h2>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-primary-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-1">Phone</h3>
                                <p class="text-gray-600">077 123 4567</p>
                                <p class="text-gray-600">011 234 5678</p>
                                <p class="text-sm text-gray-500 mt-1">Mon-Sat: 8:00 AM - 8:00 PM</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-secondary-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-1">Email</h3>
                                <p class="text-gray-600">info@pasalmalla.lk</p>
                                <p class="text-gray-600">support@pasalmalla.lk</p>
                                <p class="text-sm text-gray-500 mt-1">We reply within 24 hours</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-1">Address</h3>
                                <p class="text-gray-600">123 Main Street<br>Colombo 07<br>Sri Lanka</p>
                                <p class="text-sm text-gray-500 mt-1">Visit our showroom</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fab fa-whatsapp text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-1">WhatsApp</h3>
                                <p class="text-gray-600">077 123 4567</p>
                                <p class="text-sm text-gray-500 mt-1">Quick support via WhatsApp</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Business Hours</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="font-medium text-gray-800">Monday - Friday</span>
                            <span class="text-gray-600">8:00 AM - 8:00 PM</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="font-medium text-gray-800">Saturday</span>
                            <span class="text-gray-600">8:00 AM - 6:00 PM</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="font-medium text-gray-800">Sunday</span>
                            <span class="text-gray-600">10:00 AM - 4:00 PM</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="font-medium text-gray-800">Public Holidays</span>
                            <span class="text-gray-600">Closed</span>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Follow Us</h2>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center text-white hover:bg-blue-700 transition-colors">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-pink-600 rounded-lg flex items-center justify-center text-white hover:bg-pink-700 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center text-white hover:bg-green-700 transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-blue-400 rounded-lg flex items-center justify-center text-white hover:bg-blue-500 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                    <p class="text-gray-600 mt-4">Stay updated with our latest products and offers!</p>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <section class="mt-16">
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Frequently Asked Questions</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-2">How long does delivery take?</h3>
                        <p class="text-gray-600 text-sm">We deliver island-wide within 2-5 working days depending on your location.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-2">Do you offer cash on delivery?</h3>
                        <p class="text-gray-600 text-sm">Yes! You can pay when you receive your order. No advance payment required.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-2">Can I return items?</h3>
                        <p class="text-gray-600 text-sm">Yes, we accept returns within 7 days if items are unused and in original condition.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-2">Do you have a physical store?</h3>
                        <p class="text-gray-600 text-sm">Yes, you can visit our showroom in Colombo 07 during business hours.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
