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

    // Initialize product filters
    initializeProductFilters();
});

// Product filters functionality
function initializeProductFilters() {
    // Auto-submit form when certain filters change
    const autoSubmitSelects = document.querySelectorAll('select[name="category"], select[name="grade"], select[name="availability"]');
    autoSubmitSelects.forEach(select => {
        select.addEventListener('change', function() {
            // Add a small delay to prevent rapid submissions
            setTimeout(() => {
                this.form.submit();
            }, 100);
        });
    });

    // Price range validation
    const minPriceInput = document.querySelector('input[name="min_price"]');
    const maxPriceInput = document.querySelector('input[name="max_price"]');

    if (minPriceInput && maxPriceInput) {
        function validatePriceRange() {
            const minPrice = parseFloat(minPriceInput.value) || 0;
            const maxPrice = parseFloat(maxPriceInput.value) || Infinity;

            if (minPrice > maxPrice && maxPrice !== Infinity) {
                maxPriceInput.setCustomValidity('Maximum price must be greater than minimum price');
            } else {
                maxPriceInput.setCustomValidity('');
            }
        }

        minPriceInput.addEventListener('input', validatePriceRange);
        maxPriceInput.addEventListener('input', validatePriceRange);
    }

    // Mobile filter toggle
    const mobileFilterToggle = document.getElementById('mobile-filter-toggle');
    const filterSidebar = document.querySelector('.filter-sidebar');

    if (mobileFilterToggle && filterSidebar) {
        mobileFilterToggle.addEventListener('click', function() {
            filterSidebar.classList.toggle('hidden');
            const icon = this.querySelector('i');
            if (filterSidebar.classList.contains('hidden')) {
                icon.className = 'fas fa-filter';
                this.innerHTML = '<i class="fas fa-filter mr-2"></i>Show Filters';
            } else {
                icon.className = 'fas fa-times';
                this.innerHTML = '<i class="fas fa-times mr-2"></i>Hide Filters';
            }
        });
    }

    // Filter count display
    updateFilterCount();
}

function updateFilterCount() {
    const filterCount = document.querySelectorAll('input[type="checkbox"]:checked, select:not([name="sort"]) option:checked:not([value=""]), input[type="text"][value!=""], input[type="number"][value!=""]').length;
    const filterButton = document.querySelector('.filter-count');

    if (filterButton) {
        if (filterCount > 0) {
            filterButton.textContent = `Filters (${filterCount})`;
            filterButton.classList.add('bg-orange-500', 'text-white');
            filterButton.classList.remove('bg-gray-100', 'text-gray-700');
        } else {
            filterButton.textContent = 'Filters';
            filterButton.classList.remove('bg-orange-500', 'text-white');
            filterButton.classList.add('bg-gray-100', 'text-gray-700');
        }
    }
}

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
