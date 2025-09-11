import './bootstrap';

// Real-time updates functionality
class RealTimeUpdater {
    constructor() {
        this.init();
    }

    init() {
        // Auto-refresh data every 30 seconds
        setInterval(() => {
            this.updateDashboardStats();
            this.updateProductList();
        }, 30000);

        // Listen for form submissions to trigger immediate updates
        this.setupFormListeners();
    }

    async updateDashboardStats() {
        if (window.location.pathname.includes('/admin/dashboard')) {
            try {
                const response = await fetch('/admin/dashboard-stats');
                if (response.ok) {
                    const data = await response.json();
                    this.updateStatsCards(data);
                }
            } catch (error) {
                console.log('Stats update failed:', error);
            }
        }
    }

    async updateProductList() {
        if (window.location.pathname.includes('/admin/products')) {
            try {
                const currentUrl = new URL(window.location);
                const response = await fetch(currentUrl.pathname + currentUrl.search, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                if (response.ok) {
                    const html = await response.text();
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newTable = doc.querySelector('table');
                    const currentTable = document.querySelector('table');
                    if (newTable && currentTable) {
                        currentTable.innerHTML = newTable.innerHTML;
                    }
                }
            } catch (error) {
                console.log('Product list update failed:', error);
            }
        }
    }

    updateStatsCards(data) {
        // Update stats cards with new data
        const statsElements = {
            'total_products': document.querySelector('[data-stat="total_products"]'),
            'active_products': document.querySelector('[data-stat="active_products"]'),
            'total_orders': document.querySelector('[data-stat="total_orders"]'),
            'pending_orders': document.querySelector('[data-stat="pending_orders"]'),
            'total_categories': document.querySelector('[data-stat="total_categories"]'),
            'total_bundles': document.querySelector('[data-stat="total_bundles"]'),
            'low_stock_products': document.querySelector('[data-stat="low_stock_products"]')
        };

        Object.keys(statsElements).forEach(key => {
            if (statsElements[key] && data[key] !== undefined) {
                statsElements[key].textContent = data[key];
            }
        });
    }

    setupFormListeners() {
        // Listen for product form submissions
        document.addEventListener('submit', (e) => {
            if (e.target.matches('form[action*="products"]')) {
                setTimeout(() => {
                    this.updateDashboardStats();
                    this.updateProductList();
                }, 1000);
            }
        });

        // Listen for delete actions
        document.addEventListener('click', (e) => {
            if (e.target.matches('button[type="submit"]') && 
                e.target.closest('form[method="POST"]') && 
                e.target.closest('form').action.includes('products')) {
                setTimeout(() => {
                    this.updateDashboardStats();
                    this.updateProductList();
                }, 1000);
            }
        });
    }
}

// Initialize real-time updates when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new RealTimeUpdater();
});

// Auto-refresh page data for public pages
if (!window.location.pathname.includes('/admin/')) {
    setInterval(() => {
        // Refresh cart count
        const cartCount = document.querySelector('.fa-shopping-cart + span');
        if (cartCount) {
            // This would typically fetch from your cart API
            // cartCount.textContent = newCount;
        }
    }, 60000); // Every minute
}
