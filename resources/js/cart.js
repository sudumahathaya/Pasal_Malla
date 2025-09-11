class Cart {
    constructor() {
        this.items = JSON.parse(localStorage.getItem('cart') || '[]');
        this.init();
    }

    init() {
        this.updateCartDisplay();
        this.bindEvents();
    }

    bindEvents() {
        // Add to cart buttons
        document.addEventListener('click', (e) => {
            if (e.target.matches('.add-to-cart') || e.target.closest('.add-to-cart')) {
                e.preventDefault();
                const button = e.target.matches('.add-to-cart') ? e.target : e.target.closest('.add-to-cart');
                this.addToCart(button);
            }
        });

        // Quantity change buttons
        document.addEventListener('click', (e) => {
            if (e.target.matches('.qty-decrease')) {
                e.preventDefault();
                this.updateQuantity(e.target.dataset.id, -1);
            }
            if (e.target.matches('.qty-increase')) {
                e.preventDefault();
                this.updateQuantity(e.target.dataset.id, 1);
            }
        });

        // Remove item buttons
        document.addEventListener('click', (e) => {
            if (e.target.matches('.remove-item') || e.target.closest('.remove-item')) {
                e.preventDefault();
                const button = e.target.matches('.remove-item') ? e.target : e.target.closest('.remove-item');
                this.removeItem(button.dataset.id);
            }
        });

        // Send to WhatsApp button
        document.addEventListener('click', (e) => {
            if (e.target.matches('.send-whatsapp') || e.target.closest('.send-whatsapp')) {
                e.preventDefault();
                this.sendToWhatsApp();
            }
        });
    }

    addToCart(button) {
        const productData = {
            id: button.dataset.id,
            name: button.dataset.name,
            nameSinhala: button.dataset.nameSinhala || '',
            price: parseFloat(button.dataset.price),
            image: button.dataset.image || '',
            type: button.dataset.type || 'product' // product or bundle
        };

        const existingItem = this.items.find(item => item.id === productData.id && item.type === productData.type);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            this.items.push({
                ...productData,
                quantity: 1
            });
        }

        this.saveCart();
        this.updateCartDisplay();
        this.showAddedToCartMessage(productData.name);
    }

    updateQuantity(id, change) {
        const item = this.items.find(item => item.id === id);
        if (item) {
            item.quantity += change;
            if (item.quantity <= 0) {
                this.removeItem(id);
            } else {
                this.saveCart();
                this.updateCartDisplay();
            }
        }
    }

    removeItem(id) {
        this.items = this.items.filter(item => item.id !== id);
        this.saveCart();
        this.updateCartDisplay();
    }

    saveCart() {
        localStorage.setItem('cart', JSON.stringify(this.items));
    }

    updateCartDisplay() {
        // Update cart count in header
        const cartCount = document.querySelector('.cart-count');
        if (cartCount) {
            const totalItems = this.items.reduce((sum, item) => sum + item.quantity, 0);
            cartCount.textContent = totalItems;
            cartCount.style.display = totalItems > 0 ? 'flex' : 'none';
        }

        // Update cart page if we're on it
        if (window.location.pathname.includes('/cart')) {
            this.renderCartPage();
        }
    }

    renderCartPage() {
        const cartContainer = document.querySelector('#cart-items');
        const cartSummary = document.querySelector('#cart-summary');
        
        if (!cartContainer) return;

        if (this.items.length === 0) {
            cartContainer.innerHTML = `
                <div class="text-center py-12">
                    <div class="text-8xl mb-6">🛒</div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Your cart is empty</h3>
                    <p class="text-gray-600 mb-6">Add some items to get started</p>
                    <a href="/products" class="btn-primary text-white px-8 py-4 rounded-xl font-semibold text-lg">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Continue Shopping
                    </a>
                </div>
            `;
            if (cartSummary) cartSummary.style.display = 'none';
            return;
        }

        let cartHTML = '';
        let subtotal = 0;

        this.items.forEach(item => {
            const itemTotal = item.price * item.quantity;
            subtotal += itemTotal;

            cartHTML += `
                <div class="p-6 ${item.type === 'bundle' ? 'bg-blue-50' : ''}">
                    <div class="flex items-center space-x-4">
                        <img src="${item.image || '/images/default-product.jpg'}" 
                             alt="${item.name}" class="w-20 h-20 object-cover rounded-lg">
                        <div class="flex-1">
                            ${item.type === 'bundle' ? `
                                <div class="flex items-center mb-1">
                                    <i class="fas fa-gift text-blue-600 mr-2"></i>
                                    <span class="text-sm font-medium text-blue-600">BUNDLE PACK</span>
                                </div>
                            ` : ''}
                            <h3 class="text-lg font-bold text-gray-800">${item.name}</h3>
                            ${item.nameSinhala ? `<p class="text-gray-600">${item.nameSinhala}</p>` : ''}
                            <div class="flex items-center mt-2">
                                <span class="text-lg font-bold text-orange-600">Rs. ${item.price.toFixed(2)}</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center border border-gray-200 rounded-lg">
                                <button class="qty-decrease px-3 py-2 text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors" data-id="${item.id}">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" value="${item.quantity}" min="1" class="w-16 text-center border-0 focus:outline-none" readonly>
                                <button class="qty-increase px-3 py-2 text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors" data-id="${item.id}">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <span class="text-lg font-bold text-gray-800 w-20 text-right">Rs. ${itemTotal.toFixed(2)}</span>
                            <button class="remove-item text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition-colors" data-id="${item.id}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        });

        cartContainer.innerHTML = cartHTML;

        // Update cart summary
        if (cartSummary) {
            cartSummary.style.display = 'block';
            cartSummary.innerHTML = `
                <div class="bg-white rounded-2xl p-6 shadow-lg sticky top-24">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">Order Summary</h2>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Items (${this.items.reduce((sum, item) => sum + item.quantity, 0)}):</span>
                            <span class="font-medium">Rs. ${subtotal.toFixed(2)}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Delivery:</span>
                            <span class="font-medium text-green-600">Free</span>
                        </div>
                        <div class="border-t border-gray-200 pt-3">
                            <div class="flex justify-between text-xl font-bold">
                                <span>Total:</span>
                                <span class="text-orange-600">Rs. ${subtotal.toFixed(2)}</span>
                            </div>
                        </div>
                    </div>

                    <button class="send-whatsapp w-full btn-primary text-white py-4 rounded-xl font-bold text-lg mb-4">
                        <i class="fab fa-whatsapp mr-2"></i>
                        Send Order via WhatsApp
                    </button>

                    <div class="bg-green-50 rounded-lg p-4">
                        <h3 class="font-bold text-gray-800 mb-3">How it works:</h3>
                        <div class="space-y-2 text-sm text-gray-700">
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-600 mr-2"></i>
                                <span>Click "Send Order via WhatsApp"</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-600 mr-2"></i>
                                <span>Your order details will be sent to our WhatsApp</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-600 mr-2"></i>
                                <span>We'll confirm your order and delivery details</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-600 mr-2"></i>
                                <span>Pay cash when you receive your items</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                        <div class="flex items-center mb-2">
                            <i class="fab fa-whatsapp text-green-600 mr-2"></i>
                            <span class="font-medium text-gray-800">WhatsApp: 077 123 4567</span>
                        </div>
                        <p class="text-sm text-gray-600">Available 8:00 AM - 8:00 PM</p>
                    </div>
                </div>
            `;
        }
    }

    sendToWhatsApp() {
        if (this.items.length === 0) {
            alert('Your cart is empty!');
            return;
        }

        // Generate order message
        let message = "🛒 *New Order from PasalMalla*\n\n";
        message += "📋 *Order Details:*\n";
        message += "━━━━━━━━━━━━━━━━━━━━\n\n";

        let subtotal = 0;
        this.items.forEach((item, index) => {
            const itemTotal = item.price * item.quantity;
            subtotal += itemTotal;
            
            message += `${index + 1}. ${item.type === 'bundle' ? '🎁 ' : ''}*${item.name}*\n`;
            if (item.nameSinhala) {
                message += `   ${item.nameSinhala}\n`;
            }
            message += `   💰 Rs. ${item.price.toFixed(2)} x ${item.quantity} = Rs. ${itemTotal.toFixed(2)}\n\n`;
        });

        message += "━━━━━━━━━━━━━━━━━━━━\n";
        message += `💵 *Total Amount: Rs. ${subtotal.toFixed(2)}*\n`;
        message += "🚚 *Delivery: FREE*\n\n";
        
        message += "📞 *Next Steps:*\n";
        message += "• We'll call you to confirm this order\n";
        message += "• Provide your delivery address\n";
        message += "• Pay cash when you receive your items\n\n";
        
        message += "⏰ *Delivery Time: 2-5 working days*\n";
        message += "🌍 *Available island-wide*\n\n";
        
        message += "Thank you for choosing PasalMalla! 🙏";

        // WhatsApp number (replace with your actual number)
        const whatsappNumber = "94771234567"; // Format: country code + number without +
        
        // Create WhatsApp URL
        const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
        
        // Open WhatsApp
        window.open(whatsappURL, '_blank');
        
        // Show confirmation message
        this.showOrderSentMessage();
    }

    showAddedToCartMessage(productName) {
        // Create and show a toast notification
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
        toast.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                <span>${productName} added to cart!</span>
            </div>
        `;
        
        document.body.appendChild(toast);
        
        // Animate in
        setTimeout(() => {
            toast.classList.remove('translate-x-full');
        }, 100);
        
        // Remove after 3 seconds
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 300);
        }, 3000);
    }

    showOrderSentMessage() {
        // Show success message
        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
        modal.innerHTML = `
            <div class="bg-white rounded-2xl p-8 max-w-md mx-4 text-center">
                <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fab fa-whatsapp text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Order Sent Successfully!</h3>
                <p class="text-gray-600 mb-6">Your order has been sent to our WhatsApp. We'll contact you shortly to confirm the details and arrange delivery.</p>
                <button class="close-modal btn-primary text-white px-6 py-3 rounded-lg font-semibold">
                    <i class="fas fa-check mr-2"></i>
                    Got it!
                </button>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        // Close modal functionality
        modal.querySelector('.close-modal').addEventListener('click', () => {
            document.body.removeChild(modal);
            // Optionally clear cart after successful order
            // this.clearCart();
        });
        
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                document.body.removeChild(modal);
            }
        });
    }

    clearCart() {
        this.items = [];
        this.saveCart();
        this.updateCartDisplay();
    }
}

// Initialize cart when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    window.cart = new Cart();
});